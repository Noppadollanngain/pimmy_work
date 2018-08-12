<?php
	require'../class.php';
	
	$id = $_POST['data_put'];

	$obj = new pimmy_work();
	$obj->del_user($id);
?>