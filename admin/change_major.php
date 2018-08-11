<?php
	$data = $_POST['data_input'];
	$id = $_POST['data_input_id'];

	require'../class.php';
	$obj = new pimmy_work();
	$obj->changr_major($id,$data);
?>