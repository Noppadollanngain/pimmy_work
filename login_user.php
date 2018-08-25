<?php

	require'class.php';
	$obj = new pimmy_work();

	$obj->login_user($_POST['id_login'],$_POST['pw_login'])
?>