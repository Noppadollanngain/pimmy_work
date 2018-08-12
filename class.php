<?php
	/**
	* All data this here
	*/

	class pimmy_work
	{

		private $link;
		public $data_major,$data_q,$data_choice,$data_q_num;

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

		public function insert_q($id,$q,$c1,$c2,$c3,$c4,$c5,$aws){
			$sql = "INSERT INTO `examination`(`id_examination`, `examination_q`, `examination_aws`) VALUES (".$id.",'".$q."',".$aws.")";
			$sql2 = "INSERT INTO `examination_q`(`id_examination`, `choice_id`, `choice_list`) VALUES (".$id.",1,'".$c1."')";
			$sql3 = "INSERT INTO `examination_q`(`id_examination`, `choice_id`, `choice_list`) VALUES (".$id.",2,'".$c2."')";
			$sql4 = "INSERT INTO `examination_q`(`id_examination`, `choice_id`, `choice_list`) VALUES (".$id.",3,'".$c3."')";
			$sql5 = "INSERT INTO `examination_q`(`id_examination`, `choice_id`, `choice_list`) VALUES (".$id.",4,'".$c4."')";
			$sql6 = "INSERT INTO `examination_q`(`id_examination`, `choice_id`, `choice_list`) VALUES (".$id.",5,'".$c5."')";
			mysqli_query($this->link,$sql);
			mysqli_query($this->link,$sql2);
			mysqli_query($this->link,$sql3);
			mysqli_query($this->link,$sql4);
			mysqli_query($this->link,$sql5);
			mysqli_query($this->link,$sql6);
		}

		public function show_q($id){
			$sql = "SELECT * FROM `examination` WHERE `id_examination` = ".$id;
			$sql1 = "SELECT * FROM `examination_q` WHERE `id_examination` =".$id;
			
			$this->data_q = mysqli_query($this->link,$sql);
			$this->data_choice = mysqli_query($this->link,$sql1);
			
		}

		public function show_q_num(){
			$sql3 = "SELECT * FROM `examination`";
			$this->data_q_num = mysqli_query($this->link,$sql3);
		}

		public function change_q($id,$data){
			$sql = "UPDATE `examination` SET `examination_q`= '".$data."' WHERE `id_examination` = ".$id;
			mysqli_query($this->link,$sql);
		}
		public function change_choice($id,$id_ch,$data){
			$sql = "UPDATE `examination_q` SET `choice_list`= '".$data."' WHERE `id_examination` = ".$id." AND `choice_id` = ".$id_ch;
			mysqli_query($this->link,$sql);
		}

	}
?>