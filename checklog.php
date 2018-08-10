<?php
	require'class.php';

	$user = $_POST['user'];
	$pass = $_POST['pass'];

	$log = new pimmy_work();
	$log->loginadmin($user,$pass);
?>
