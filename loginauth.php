<?php

include "server_vars.php";

$regname = strip_tags($_POST["regname"]);
$regpass = md5(strip_tags($_POST["regpass"]));

$conn = new mysqli($HOST, $USERNAME, $PASSWORD, $DBNAME_CORE);

if($conn->connect_errno)
{
	echo "MySQLi error: " . $conn->connect_error;
}
else
{
	echo "MySQLi connection successfully established";
}

if($q1 = $conn->prepare("SELECT count(*) FROM coreaccounts WHERE username=? AND password=?"))
{
	$q1->bind_param("ss", $regname, $regpass);
	$q1->execute();
	$q1->store_result();
	$count = $q1->num_rows;
	if($count == 1)
	{
		AuthorizeLogin();
	}
	else
	{
		echo "Username/Password is wrong, count is: \t " . $count;
	}
}
else
{
	echo "Query error!: " . $conn->error;
}

function AuthorizeLogin()
{
	setcookie("logged", 1);
	header("Location: meganote.php");
}

?>
