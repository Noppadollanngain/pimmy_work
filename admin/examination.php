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
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
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
    <section class="content-header">
      <h1>
        เพิ่มข้อสอบ
        <small>ข้อสอบ 4 ตัวเลือก</small>
      </h1>
    </section>
    <div class="container" style="padding: 20px">
      <div class="row">
        
      <div class="col-lg-10">
      <div class="box-body">
        <form role="form" id="data_q" method="get" onsubmit="insert_q()">

          <div class="form-group">
            <label>เพิ่มข้อ</label>
            <input type="number" name="id" max="15" min="1">
          </div>
          <div class="form-group">
            <label>Question</label>
            <textarea name="q" class="form-control" rows="3" placeholder="Enter ..."></textarea>
          </div>
          <div class="form-group">
            <label>choice 1</label>
            <textarea name="c1" class="form-control" rows="" placeholder="Enter ..."></textarea>
          </div>
          <div class="form-group">
            <label>choice </label>
            <textarea name="c2" class="form-control" rows="" placeholder="Enter ..."></textarea>
          </div>
          <div class="form-group">
            <label>choice 3</label>
            <textarea name="c3" class="form-control" rows="" placeholder="Enter ..."></textarea>
          </div>
          <div class="form-group">
            <label>choice 4</label>
            <textarea name="c4" class="form-control" rows="" placeholder="Enter ..."></textarea>
          </div>
          <div class="form-group">
            <label>choice 5</label>
            <textarea name="c5" class="form-control" rows="" placeholder="Enter ..."></textarea>
          </div>
          <div class="form-group">
            <label>aws</label>
            <input type="number" name="aws" min="1" max="5">
          </div>
          <div class="box-footer">
              <button type="submit" class="btn btn-info pull-right">เพิ่มข้อ</button>
          </div> 
        </form>
      </div>
      </div> 

      </div>      
    </div>
    
       <!-- /.box-body -->

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
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })

  function insert_q()
  {
    var data_in = $('#data_q').serialize();
    $.ajax({
      url:'insert_q.php',
      tpye:'get',
      data:data_in,
      success:function(res){
        location.reload();
      }
    });
  }
</script>
</body>
</html>