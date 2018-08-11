<?php
	$id = $_POST['data_put'];
	require'../class.php';
	$obj = new pimmy_work();
	$obj->delete_major($id);
?>