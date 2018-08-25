<?php
	$user = $_POST['id_login'];
	$pws = $_POST['pw_login'];
	$fname = $_POST['fname_login'];
	$lname = $_POST['lname_login'];
	$major = $_POST['major'];
	$year = $_POST['year'];
	$number = $_POST['number'];

	if ($user==NULL||$pws==NULL||$fname==NULL||$lname==NULL||$major==NULL||$year==NULL||$number==NULL) {
		echo "กรอกข้อมูลให้ครบ";
	}
	else
	{
		require'class.php';

  		$obj = new pimmy_work();
  		$obj->regis($user,$pws,$fname,$lname,$major,$year,$number);
  		echo "การสมัครเสร็จสิ้น";
	}
?>