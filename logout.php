<?php

include "utility.php";

updateCookie("logged", 0);

echo "cookie value: " . $_COOKIE["logged"];

unset($_SESSION["signup_errors"]);
unset($_SESSION["signin_errors"]);

header("Location: index.php");

?>
