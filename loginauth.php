<?php

include "server_vars.php";
include "utility.php";

if($_COOKIE["logged"] == 1)
{
	header("Location: player.php");
}

session_start();

$regname = strip_tags($_POST["regname"]);
$regpass = md5(strip_tags($_POST["regpass"]));

$errors = "";
$no_err = 0;

$conn = new mysqli($HOST, $USERNAME, $PASSWORD, $DBNAME_CORE);

if($conn->connect_errno)
{
	echo "MySQLi error: " . $conn->connect_error;
}
else
{
	echo "MySQLi connection successfully established";
}

if($q1 = $conn->prepare("SELECT username FROM coreaccounts WHERE username=? AND password=?"))
{
	$q1->bind_param("ss", $regname, $regpass);
	$q1->bind_result($user_name);
	$q1->execute();
	$q1->store_result();
	$count = $q1->num_rows;
	if($count == 1)
	{
		AuthorizeLogin();
	}
	else
	{
		$no_err++;
		$errors = $errors . "Wrong Username/Password<br>";
	}
}
else
{
	//echo "Query error!: " . $conn->error;
	$errors = $errors . "Database error!<br>";
}

if($no_err > 0)
{
	$_SESSION["signin_errors"] = $errors;
	header("Location: signin.php");
}


function AuthorizeLogin()
{
	updateCookie("logged", 1);
	unset($_SESSION["signin_errors"]);
	echo "successfully logged in<br>";
	echo "cookie value: " . $_COOKIE["logged"];
	header("Location: logsuccess.php");
}

?>
