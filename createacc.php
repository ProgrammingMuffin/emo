<?php

include "server_vars.php";

$errors = 0;
$error_string = "";

$regname = strip_tags($_POST["regname"]);
$regpass = strip_tags($_POST["regpass"]);
$confpass = strip_tags($_POST["confpass"]);
$regmail = strip_tags($_POST["regmail"]);
$phone = strip_tags($_POST["phone"]);
$today = time();

if($regpass != $confpass)
{
	$errors++;
	$error_string .= "Passwords don't match!<br>";
	//header("Location: signup.php");
}
else
{
	$regpass = md5($regpass);
}

$conn = new mysqli($HOST, $USERNAME, $PASSWORD, $DBNAME_CORE);

if($conn->connect_errno)
{
	echo "MySQLi error occurred: " . $conn->connect_error;
}
else
{
	echo "MySQLi connection successfully established!";
}

if($q1 = $conn->prepare("SELECT COUNT(*) FROM coreaccounts WHERE username=?"))
{
	$q1->bind_param("s", $regname);
	$q1->execute();
	$q1->bind_result($count);
	$q1->store_result();
	if($count == 0)
	{
		if($q2 = $conn->prepare("INSERT INTO coreaccounts VALUES (?, ?, ?, ?, ?)"))
		{
			$q2->bind_param("sssii", $regname, $regpass, $regmail, $phone, $today);
			$q2->execute();
			if($q2->affected_rows > 0)
			{
				echo "Successfully created an account!<br>";
			}
			else
			{
				echo "Query Failed!: " . $conn->error;
			}
		}
		else
		{
			echo "Query Failed!: " . $conn->error;
		}
	}
}
else
{
	echo "Query Failed!: " . $conn->error;
}

?>
