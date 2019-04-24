<?php

include "server_vars.php";

if($_COOKIE["logged"] == 1)
{
	header("Location: player.php");
}

session_start();

$no_err = 0;
$errors = "";

$regname = strip_tags($_POST["regname"]);
$regpass = strip_tags($_POST["regpass"]);
$confpass = strip_tags($_POST["confpass"]);
$regmail = strip_tags($_POST["regmail"]);
$phone = strip_tags($_POST["phone"]);
$today = time();

if($regpass != $confpass)
{
	$no_err++;
	$errors .= "Passwords don't match!<br>";
	$_SESSION["signup_errors"] = $errors;
	header("Location: signup.php");
}
else
{
	$regpass = md5($regpass);
}

$conn = new mysqli($HOST, $USERNAME, $PASSWORD, $DBNAME_CORE);

if($conn->connect_errno)
{
	$no_err++;
	$errors .= "Database error<br>";
}
else
{
	echo "MySQLi connection successfully established!";
}

if($q1 = $conn->prepare("SELECT username FROM coreaccounts WHERE username=?"))
{
	$q1->bind_param("s", $regname);
	$q1->execute();
	$q1->bind_result($ret_username);
	$q1->store_result();
	$count = $q1->num_rows;
	if($count == 0)
	{
		if($q2 = $conn->prepare("INSERT INTO coreaccounts VALUES (?, ?, ?, ?, ?)"))
		{
			$q2->bind_param("sssii", $regname, $regpass, $regmail, $phone, $today);
			$q2->execute();
			if($q2->affected_rows > 0)
			{
				echo "Successfully created an account!<br>";
				unset($_SESSION["signup_errors"]);
				header("Location: regsuccess.php");
			}
			else
			{
				$no_err++;
				$errors .= "Error creating account, try again<br>";
			}
		}
		else
		{
			$no_err++;
			$errors .= "Database Error";
		}
	}
	else
	{
		$no_err++;
		$errors .= "Account already exists<br>";
	}
}
else
{
	$no_err++;
	$errors .= "Database Error";
}

if($no_err > 0)
{
	$_SESSION["signup_errors"] = $errors;
	header("Location: signup.php");
}

?>
