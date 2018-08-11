<?php
	/**
	* All data this here
	*/

	class pimmy_work
	{

		private $link;
		public $data_major;

		function __construct()
		{	
			$host = 'localhost';
			$user = 'root';
			$pass = '';
			$table = 'pimmy_work';
			$this->link = mysqli_connect($host,$user,$pass,$table) or die(mysqli_error());
			mysqli_set_charset($this->link,'utf8');
		}

		public function loginadmin($user,$pass)
		{
			session_start();
			$sql = "SELECT * FROM `admin` WHERE `user` = '".$user."' AND `pass` = '".$pass."'";
			$query = mysqli_query($this->link,$sql);
			$result = mysqli_num_rows($query);
			if($result==0){
				$_SESSION["statusadmin"] = 0;
				echo "fales";
			}
			else if ($result==1) {
				$_SESSION["statusadmin"] = 1;
				echo "success";
			}

		}

		public function showallmajor()
		{
			$sql = "SELECT * FROM `major`";
			$this->data_major = mysqli_query($this->link,$sql);
		}

		public function delete_major($id)
		{
			$sql = "DELETE FROM `major` WHERE `major_id` = ".$id;
			mysqli_query($this->link,$sql);
		}

		public function insert_major($name)
		{
			$sql = "INSERT INTO `major`(`name`) VALUES ('".$name."')";
			mysqli_query($this->link,$sql);
		}
		public function changr_major($id,$name){
			$sql = "UPDATE `major` SET `name`='".$name."' WHERE `major_id` = ".$id;
			mysqli_query($this->link,$sql);
		}

	}
?>