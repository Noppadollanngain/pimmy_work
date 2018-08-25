<?php 
	session_start();
	if ($_SESSION['statusadmin']==0) {
		echo "<script>window.location.href = '../login.php';</script>";
		exit();
	}
      $host = 'localhost';
      $user = 'root';
      $pass = '';
      $table = 'pimmy_work';
      $con = mysqli_connect($host,$user,$pass,$table) or die(mysqli_error());
      mysqli_set_charset($con,'utf8');
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
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
      	<!--  table -->
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Hover Data Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ชื่อ-สกลุ</th>
                  <th>สาขา</th>
                  <th>ชั้นปี</th>
                  <th>เลขที่</th>
                  <th>คะแนนก่อน</th>
                  <th>คะแนนหลัง</th>
                  <th>ลบ</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    require'../class.php';
                    require'pagination/pagination.php';
                    $obj = new pimmy_work();
                    

                    $result_main = page_query($con, $obj->show_user(), 10);

                    while ($data_show = mysqli_fetch_assoc($result_main)) {
                      echo '<tr>
                            <td>'.$data_show['name'].'</td>
                            <td>'.$obj->show_major($data_show['major']).'</td>
                            <td>'.$data_show['year'].'</td>
                            <td>'.$data_show['number'].'</td>
                            <td>'.$data_show['point_p'].'</td>
                            <td>'.$data_show['point_l'].'</td>
                            <td><button onclick="delete_user('.$data_show['id_user'].')" type="button" class="btn btn-block btn-danger">ลบ</button></td>
                          </tr>';
                    }

                  ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>ชื่อ-สกลุ</th>
                  <th>สาขา</th>
                  <th>ชั้นปี</th>
                  <th>เลขที่</th>
                  <th>คะแนน</th>
                  <th>ลบ</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /table -->
        <center>
        <?php
            page_link_border("solid","1px","#2E9AFE");
              page_border_radius("1px");
              page_link_bg_color("#007bff","#81F7D8");
              page_link_font("16px","true","false","false");
              page_link_color("#FFFFFF");
              page_echo_pagenums(5,"true","true");
          ?>
            
          </center>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
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
  function delete_user(id){
    $.ajax({
      url:'delete_user.php',
      type:'post',
      data:{data_put:id},
      success:function(){
        location.reload();
      }
    })
  }
</script>
</body>
</html>