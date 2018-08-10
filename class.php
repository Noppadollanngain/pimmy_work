<?php
	/**
	* All data this here
	*/
	session_start();

	class pimmy_work
	{

		private $link;

		function __construct()
		{	
			$host = 'localhost';
			$user = 'root';
			$pass = '';
			$table = 'pimmy_work';
			$this->link = mysqli_connect($host,$user,$pass,$table) or die(mysqli_error());
		}

		public function loginadmin($user,$pass){
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
	}
?>