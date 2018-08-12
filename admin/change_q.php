<?php
	$id = $_POST['id'];
	$data = $_POST['data'];

	require'../class.php';

	$obj = new pimmy_work();
	$obj->change_q($id,$data);
?>