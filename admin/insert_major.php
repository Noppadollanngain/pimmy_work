<?php
	$name = $_POST['data_put'];
	require'../class.php';
	$obj = new pimmy_work();
	$obj->insert_major($name);
?>