<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Workgress | Add</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/fontawesome-free/css/all.min.css'); ?>" type="text/css" media="screen">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url('dist2/css/adminlte.min.css'); ?>" type="text/css" media="screen">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<?php
	$this->session = \Config\Services::session();
	if($this->session->get("Role_name") == 'student'){
		$role = 'นักเรียน';
	 }else if($this->session->get("Role_name") == 'teacher'){
		$role = 'คุณครู';
	 }else if($this->session->get("Role_name") == 'admin'){
		$role = 'ผู้ดูแล';
	 }
    ?>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href=""<?php echo base_url('/home');?>">หน้าแรก</a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3" action="<?= site_url('/AdminController/Search')?>" method="post">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" name="search_query">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url('/dashboard');?>" class="brand-link">
    <img src="dist2/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?php echo $this->session->get("Picture");?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo $this->session->get("Full_name"); ?></a>
          </div>
        </div>

      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admin Add</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('/home');?>">Home</a></li>
              <li class="breadcrumb-item active">Admin Add</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">เพิ่มผู้ใช้</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
            <form action="<?= site_url('/AdminController/insert_indatabase')?>" method="post" id="form-add">
              <div class="form-group">
                <label for="inputName">ชื่อ</label>
                <input type="text" name="first_name" id="inputName" class="form-control" placeholder="กรอกชื่อ">
              </div>
              <div class="form-group">
                <label for="inputDescription">อีเมล</label>
                <input type="text" name="email" id="email" class="form-control" value="" placeholder="กรอกอีเมล">
                <span id="email_result"></span>
              </div>
              <div class="form-group">
                <label for="inputDescription">รหัสผ่าน</label>
                <input type="text" name="password" id="input" class="form-control" value="" placeholder="กรอกรหัสผ่าน">
              </div>
              <div class="form-group">
                <label for="inputStatus">สถานะ</label>
                <select class="form-control custom-select" name="role_id" id="role_id">
                  <option value="1">Student</option>
                  <option value="2">Teacher</option>
                  <option value="3">Admin</option>
                </select>
              </div>
             
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Budget</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputEstimatedBudget">Estimated budget</label>
                <input type="number" id="inputEstimatedBudget" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputSpentBudget">Total amount spent</label>
                <input type="number" id="inputSpentBudget" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputEstimatedDuration">Estimated project duration</label>
                <input type="number" id="inputEstimatedDuration" class="form-control">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="<?php echo base_url('/dashboard');?>" class="btn btn-secondary">ยกเลิก</a>
          <input type="submit" value="เพิ่มผู้ใช้" class="btn btn-success float-right" form="form-add">
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
      <strong>Copyright &copy; 2020 <a href="$">Workgress</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1
      </div>
    </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('plugins/jquery/jquery.min.js'); ?>"></script>
<script type="text/javascript">
 $(document).ready(function(){  
      $('#email').change(function(){  
		   var Email = $('#email').val();
           //var Email = document.getElementById("Email_Register").value; 
           console.log(Email);
           if(Email != '')  
           {  
                $.ajax({  
                     url:"<?= site_url('/AdminController/Check_Email')?>",  
                     method:"POST",  
                     data:{Email:Email},  
                     success:function(data){  
                          $('#email_result').html(data);  
                     }  
                });  
           } 
      });  
 });  
 </script>  


<!-- Bootstrap 4 -->
<script src="<?php echo base_url('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('dist2/js/adminlte.min.js'); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('dist2/js/demo.js'); ?>"></script>
</body>
</html>
