<?php
session_start();
/*--- Проверка на вход ---*/
	if(!$_SESSION['session_username'])
		header('Location:login.php');
/*---  ---*/
?>