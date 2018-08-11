<?php 
	session_start();
	if ($_SESSION['statusadmin']==0) {
		echo "<script>window.location.href = '../login.php';</script>";
		exit();
	}
  require'../class.php';
  $obj = new pimmy_work();
  $obj->showallmajor();
  $result = $obj->data_major;
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
        <li><a href="javascript:void(0)"><i class="fa fa-circle-o text-yellow"></i> <span>แก้ไขข้อสอบ</span></a></li>
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
        เพิ่ม-แก้ไข
        <small> ข้อมูลสาขา</small>
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
                  <th>รหัสสาขา</th>
                  <th>ชื่อสาขา</th>
                  <th>เงือนไข</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    while ($data_show = mysqli_fetch_assoc($result))
                    {
                      echo '<tr>
                            <td>'.base64_encode($data_show['major_id']).'</td>
                            <td id="chang_'.$data_show['major_id'].'">'.$data_show['name'].'</td>
                            <td>
                             <div class="">
                              <div class="btn-group">
                               <button id="bt_c'.$data_show['major_id'].'" onclick="change_major('.$data_show['major_id'].')" type="button" class="btn btn-info">แก้ไข</button>
                              </div>
                              <div class="btn-group">
                               <button onclick="delete_major('.$data_show['major_id'].')" type="button" class="btn btn-danger">ลบ</button>
                              </div>
                             </div>
                            </td>';
                    }
                  ?>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>รหัสสาขา</th>
                  <th>ชื่อสาขา</th>
                  <th>เงือนไข</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /table -->
      </div>
      <!-- /.row -->
      <div class="col-lg-6">
        <div class="form-group has-success">
            <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i>ต้องการเพิ่มสาขาใหม่</label>
            <input id="insert_major_name" type="text" class="form-control" id="inputSuccess" placeholder="ชื่อสาขา...">
            <span class="help-block">Input data</span>
        </div>  
        <button onclick="insert_major()" type="button" class="btn btn-block btn-success btn-flat">เพิ่มสาขา</button>
      </div>
          
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

  function delete_major(id){
    $.ajax({
      url:'delete_major.php',
      type:'post',
      data:{data_put:id},
      success:function(result){
        location.reload();
      }
    });
  }

  function insert_major(){
    var data_input = $('#insert_major_name').val();

    if (data_input !== "") 
    {
      $.ajax({
        url:'insert_major.php',
        type:'post',
        data:{data_put:data_input},
        success:function(result){
          location.reload();
        }
      });
    }
    else{
      $('#insert_major_name').attr('style','background-color:#F1948A')
    }
  }

  function change_major(id){
    $('#chang_'+id).html('<input style="width:50%;" type="text" class="form-control" placeholder="Enter ..." id="var_chang_'+id+'">');
    $('#bt_c'+id).attr('onclick','change_major_set('+id+')');
  }

  function change_major_set(id){
    var data_input = { "data_input": $('#var_chang_'+id).val() , "data_input_id": id };

    if ($('#var_chang_'+id).val() !== "") 
    {
      $.ajax({
        url:'change_major.php',
        type:'post',
        data:data_input,
        success:function(result){
          location.reload();
        }
      });
    }
    else{
      $('#var_chang_'+id).attr('style','background-color:#F1948A;width:50%;')
    }
  }

</script>
</body>
</html>