<?php 
	session_start();
	if ($_SESSION['statusadmin']==0) {
		echo "<script>window.location.href = '../login.php';</script>";
		exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Data Tables</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" type="text/css" href="../assets/font/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href=".assets/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="assets/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="assets/css/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="sidebar-mini skin-purple" style="height: auto; min-height: 100%;">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="javascript:void(0)" onclick="location.reload()" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->

          <!-- Notifications: style can be found in dropdown.less -->

          <!-- Tasks: style can be found in dropdown.less -->
    
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs">Lanna Polytechnic <i class="fa fa-gears"></i> </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../assets/imges/logo_poly.png" class="img-circle" alt="User Image">

                <p>
                  Lanna Polytechnic
                  <small>Computer Principles and Peripheral</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../assets/imges/logo_poly.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="index.php"><i class="fa fa-circle-o text-red"></i> <span>ช้อมูลผู้เข้าสอบ</span></a></li>
        <li><a href="q.php?id_change=0"><i class="fa fa-circle-o text-yellow"></i> <span>แก้ไขข้อสอบ</span></a></li>
        <li><a href="examination.php"><i class="fa fa-circle-o text-aqua"></i> <span>เพิ่มข้อสอบ</span></a></li>
        <li><a href="major.php"><i class="fa fa-circle-o text-green"></i> <span>เพิ่มสาขา</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<div class="box">
  			<?php
  				require'../class.php';
  				$obj = new pimmy_work();
  				$obj->show_q($_GET['id_change']);
  				$data_q = mysqli_fetch_assoc($obj->data_q);
  			?>
  			<div class="form-group">
                  <label>Select</label><br>
                  	<?php
                  		$obj->show_q_num();
                  		while ($data_q_row = mysqli_fetch_assoc($obj->data_q_num)) {
                  			echo '<button onclick="change_q('.$data_q_row['id_examination'].')" type="button" class="btn btn-danger col-lg-12" style="text-align: left;">ข้อ '.$data_q_row['id_examination'].'คำถาม '.$data_q_row['examination_q'].
                  			' เฉลย '.$data_q_row['examination_aws'].'</button><br>';
                  		}
                  	?>
                </div>
            <div class="box-header" id="in_put">
              <h3 class="box-title">
              	<?php echo $data_q['examination_q']; ?> 
              </h3><i onclick="change_q_form_set(<?php echo $data_q['id_examination']; ?>)" class="fa fa-cog"></i>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-condensed">
                <tbody><tr>
                  <th style="width: 10px">ข้อ</th>
                  <th>คำถาม</th>
                  <th style="width: 40px">แก้ไข</th>
                </tr>
                <?php
                	while ($data_choice = mysqli_fetch_assoc($obj->data_choice)) {
                		echo '<tr>
		                  <td>'.$data_choice['choice_id'].'</td>
		                  <td id="id_choice'.$data_choice['choice_id'].'">'.$data_choice['choice_list'].'</td>
		                  <td><button onclick="change_q_form('.$data_choice['id_examination'].','.$data_choice['choice_id'].')" type="button" class="btn btn-block btn-info"><i class="fa fa-cog"></i></button></td>
		                </tr>';
                	}
                ?>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
</div>


<!-- jQuery 3 -->
<script src="assets/js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="assets/js/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="assets/js/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="assets/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/js/demo.js"></script>
<!-- page script -->
<script>
	function change_q(id) {
		window.location.replace('q.php?id_change='+id);
	}
	function change_q_form(id,id_ch){
		$('#id_choice'+id_ch).html('<div class="input-group"><input id="id_choice_set'+id_ch+'" type="text" class="form-control"><span class="input-group-addon"><i onclick="change_choice_form_get('+id+','+id_ch+')" class="fa fa-check"></i></span></div>');
	}
	function change_q_form_set(id){
		$('#in_put').html('<div class="input-group"><input id="data_get_q" type="text" class="form-control"><span class="input-group-addon"><i onclick="change_q_form_get('+id+')" class="fa fa-check"></i></span></div>');
	}
	function change_q_form_get(id){
		var	data_q = {'id':id,'data':$('#data_get_q').val()} ;
		$.ajax({
			url:'change_q.php',
			type:'post',
			data:data_q,
			success:function(res){
				location.reload();
			}
		})
	}

	function change_choice_form_get(id,id_ch){
		var	data_q = {'id':id,'id_choice':id_ch,'data':$('#id_choice_set'+id_ch).val()} ;
		$.ajax({
			url:'change_choice.php',
			type:'post',
			data:data_q,
			success:function(res){
				location.reload();
			}
		})
	}
</script>
</body>
</html>