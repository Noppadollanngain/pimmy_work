<?php
	require'class.php';
	$sum = 0;

	$obj = new pimmy_work();

	if(isset($_POST["aws_1"]) && !empty($_POST["aws_1"])){
	 	$sum += $obj->check_aws($_POST['aws_1']);
	}
	if(isset($_POST["aws_2"]) && !empty($_POST["aws_2"])){
	 	$sum += $obj->check_aws($_POST['aws_2']);
	}
	if(isset($_POST["aws_3"]) && !empty($_POST["aws_3"])){
	 	$sum += $obj->check_aws($_POST['aws_3']);
	}
	if(isset($_POST["aws_4"]) && !empty($_POST["aws_4"])){
	 	$sum += $obj->check_aws($_POST['aws_4']);
	}
	if(isset($_POST["aws_5"]) && !empty($_POST["aws_5"])){
	 	$sum += $obj->check_aws($_POST['aws_5']);
	}
	if(isset($_POST["aws_6"]) && !empty($_POST["aws_6"])){
	 	$sum += $obj->check_aws($_POST['aws_6']);
	}
	if(isset($_POST["aws_7"]) && !empty($_POST["aws_7"])){
	 	$sum += $obj->check_aws($_POST['aws_7']);
	}
	if(isset($_POST["aws_8"]) && !empty($_POST["aws_8"])){
	 	$sum += $obj->check_aws($_POST['aws_8']);
	}
	if(isset($_POST["aws_9"]) && !empty($_POST["aws_9"])){
	 	$sum += $obj->check_aws($_POST['aws_9']);
	}
	if(isset($_POST["aws_10"]) && !empty($_POST["aws_10"])){
	 	$sum += $obj->check_aws($_POST['aws_10']);
	}
	if(isset($_POST["aws_11"]) && !empty($_POST["aws_11"])){
	 	$sum += $obj->check_aws($_POST['aws_11']);
	}
	if(isset($_POST["aws_12"]) && !empty($_POST["aws_12"])){
	 	$sum += $obj->check_aws($_POST['aws_12']);
	}
	if(isset($_POST["aws_13"]) && !empty($_POST["aws_13"])){
	 	$sum += $obj->check_aws($_POST['aws_13']);
	}
	if(isset($_POST["aws_14"]) && !empty($_POST["aws_14"])){
	 	$sum += $obj->check_aws($_POST['aws_14']);
	}
	if(isset($_POST["aws_15"]) && !empty($_POST["aws_15"])){
	 	$sum += $obj->check_aws($_POST['aws_15']);
	}

	if (isset($_POST["name"]) && !empty($_POST["name"]) && isset($_POST["number"]) && !empty($_POST["number"])) {
		$obj->insert_user($_POST["name"],$_POST["major"],$_POST["year"],$_POST["number"],$sum);
		echo "ต้องการทราบคะแนนติดต่อผู้ควบคุม";
	}
	else{
		echo "หรอกข้อมูลให้ครบ";
	}

	
?>