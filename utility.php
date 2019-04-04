<?php

function updateCookie($cookie_name, $cookie_val)
{
	setcookie($cookie_name, $cookie_val, time() - 36000);
	setcookie($cookie_name, $cookie_val);
}

?>
