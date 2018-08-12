<?php
	
	require'../class.php';
	$q = $_GET['q'];
	$c1 = $_GET['c1'];
	$c2 = $_GET['c2'];
	$c3 = $_GET['c3'];
	$c4 = $_GET['c4'];
	$c5 = $_GET['c5'];
	$aws = $_GET['aws'];
	$id = $_GET['id'];
	
	$obj = new pimmy_work();
	$obj->insert_q($id,$q,$c1,$c2,$c3,$c4,$c5,$aws);
?>