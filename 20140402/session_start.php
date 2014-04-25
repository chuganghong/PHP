<?php
if(!isset($_SESSION))
{
	session_start();
}
$_SESSION['id'] = time();
var_dump($_SESSION);