<?php
	$id = $_POST['id'];
	$id_ch = $_POST['id_choice'];
	$data = $_POST['data'];

	require'../class.php';

	$obj = new pimmy_work();
	$obj->change_choice($id,$id_ch,$data);
?>