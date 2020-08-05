<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Workgress | Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/fontawesome-free/css/all.min.css'); ?>" type="text/css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); ?>" type="text/css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>" type="text/css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/jqvmap/jqvmap.min.css'); ?>" type="text/css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('dist2/css/adminlte.min.css'); ?>" type="text/css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>" type="text/css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/daterangepicker/daterangepicker.css'); ?>" type="text/css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/summernote/summernote-bs4.css'); ?>" type="text/css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


  <link rel="stylesheet" href="<?php echo base_url('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('plugins/toastr/toastr.min.css'); ?>">
  <script src="<?php echo base_url('plugins/sweetalert2/sweetalert2.min.js'); ?>"></script>
  <script src="<?php echo base_url('plugins/toastr/toastr.min.js'); ?>"></script>


</head>
<?php
if (session('correct')) : ?>
  <script type="text/javascript">
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000
      });
      Toast.fire({
        icon: 'success',
        title: '<?php echo session('correct') ?>'
      })
    });
  </script>
<?php
elseif (session('incorrect')) : ?>
  <script type="text/javascript">
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000
      });
      Toast.fire({
        icon: 'error',
        title: ' <?php echo session('incorrect') ?>'
      })
    });
  </script>
<?php
endif
?>

<?php
$this->session = \Config\Services::session();
if ($this->session->get("Role_name") == 'student') {
  $role = 'นักเรียน';
} else if ($this->session->get("Role_name") == 'teacher') {
  $role = 'คุณครู';
} else if ($this->session->get("Role_name") == 'admin') {
  $role = 'ผู้ดูแล';
}
?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?php echo base_url('/home'); ?>" class="nav-link">หน้าแรก</a>
        </li>
        <!-- <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li> -->
      </ul>

      <!-- SEARCH FORM -->
      <form class="form-inline ml-3" action="<?= base_url('/search') ?>" method="get">
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
      <a href="<?php echo base_url('/dashboard'); ?>" class="brand-link">
        <img src="dist2/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?php echo $this->session->get("Picture"); ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo $this->session->get("Full_name"); ?></a>
          </div>
        </div>
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview">
              <a href="<?= base_url('/dashboard') ?>" class="nav-link">
                <i class="nav-icon fas fa fa-user"></i>
                <p>
                  Admin
                </p>
              </a>
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Charts
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url('/chart'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>ChartJS</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <a class="btn btn-primary" href="<?php echo base_url('/add'); ?>"> <i class="fa fa-plus"></i> เพิ่มสมาชิก</a>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo base_url('/home'); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url('/dashboard'); ?>">แสดงทั้งหมด </a></li>

              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Workgress</h3>



            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
          </div>
          <div class="card-body p-0">
            <table class="table table-striped projects">
              <thead>
                <tr>
                  <th style="width: 10%">
                    รหัสผู้ใช้
                  </th>
                  <th style="width: 10%">
                    ชื่อ - นามสกุล
                  </th>
                  <th style="width: 12%">
                    อีเมล
                  </th>
                  <th style="width: 10%">
                    รูป Profile
                  </th>
                  <th style="width: 10%">
                    ตำแหน่ง
                  </th>
                  <th style="width: 8%">
                    Status
                  </th>
                  <th style="width: 7%" class="text-center">
                    ประเภทของผู้ใช้
                  </th>
                  <th style="width: 10%">
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($data as $row) :
                ?>
                  <tr>
                    <td>
                      <a>
                        <?php echo $row['user_id'] ?>
                      </a>
                    </td>
                    <td>
                      <a>
                        <?php echo $row['first_name'] ?>
                        <?php echo $row['last_name'] ?>
                      </a>
                      <br />
                      <small>
                        Created <?php echo $row['create_date'] ?>
                      </small>
                      <br/>
                      <small>
                        Updated <?php echo $row['update_date'] ?>
                      </small>
                    </td>
                    <td>
                      <a>
                        <?php echo $row['email'] ?>
                      </a>
                    </td>
                    <td>
                      <ul class="list-inline">
                        <li class="list-inline-item">
                          <?php
                          if ($row['picture']) { ?>
                            <img alt="Avatar" class="table-avatar" src="<?php echo $row['picture'] ?>"><?php
                                                                                                      } else { ?>
                            <img src="<?php echo base_url('assets/img/profile.jpg'); ?>" width="50px" height="50px"><?php
                                                                                                                  } ?>
                        </li>
                      </ul>
                    </td>
                    <td>
                      <a>
                        <?php echo $row['role_name'] ?>
                      </a>
                    </td>
                    <td class="project_progress">
                      <?php
                      if ($row['activated'] == 1) { ?>
                        <span class="badge badge-success">ยืนยันแล้ว</span><?php
                                                                          } else { ?>
                        <span class="badge badge-danger">ยังไม่ยืนยัน</span><?php
                                                                          } ?>
                    </td>
                    <td class="project-state"><?php
                                              if ($row['user_login_type'] == "normal") { ?>
                        <span class="badge badge-info">ธรรมดา</span><?php
                                                                  } else if ($row['user_login_type'] == "google") { ?>
                        <span class="badge badge-danger">google</span><?php
                                                                    } else if ($row['user_login_type'] == "facebook") { ?>
                        <span class="badge badge-primary">facebook</span><?php
                                                                        } ?>
                    </td>
                    <td class="project-actions text-right">

                      <a class="btn btn-info btn-sm" href="<?= site_url('/AdminController/update/' . $row['user_id']) ?>">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                      </a>
                      <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-danger" var user_id="<?= $row['user_id'] ?>" style="color: white;">
                        <i class="fas fa-trash">
                        </i>
                        Delete
                      </a>
                    </td>
                  </tr>
                <?php
                endforeach;
                ?>

              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
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

    <script type="text/javascript">
      $(".btn-danger").click(function() {
        $("#user_id").attr("value", $(this).attr('user_id'));
        var user_id = $(this).attr('user_id');
        //$($(this).attr('href')).modal('show');
        //console.log(user_id);
        document.getElementById('output').innerHTML = "รหัสผู้ใช้ " + user_id;
        document.cookie = "user_id = " + user_id;
      });
    </script>



    <div class="modal fade" id="modal-danger">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">ลบผู้ใช้</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>ยืนยันที่จะลบใช่หรือไม่ ?&hellip;</p>
            <p id="output"></p>
            <!-- <input id="user_id" name="user_id" value="" /> -->
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-warning" data-dismiss="modal">ยกเลิก</button>
            <button type="button" class="btn btn-primary" onclick="window.location.href = '<?= site_url('/AdminController/delete_indatabase') ?>';">ยืนยัน</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="<?php echo base_url('plugins/jquery/jquery.min.js'); ?>"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?php echo base_url('plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
  <!-- ChartJS -->
  <script src="<?php echo base_url('plugins/chart.js/Chart.min.js'); ?>"></script>
  <!-- Sparkline -->
  <script src="<?php echo base_url('plugins/sparklines/sparkline.js'); ?>"></script>
  <!-- JQVMap -->
  <script src="<?php echo base_url('plugins/jqvmap/jquery.vmap.min.js'); ?>"></script>
  <script src="<?php echo base_url('plugins/jqvmap/maps/jquery.vmap.usa.js'); ?>"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?php echo base_url('plugins/jquery-knob/jquery.knob.min.js'); ?>"></script>
  <!-- daterangepicker -->
  <script src="<?php echo base_url('plugins/moment/moment.min.js'); ?>"></script>
  <script src="<?php echo base_url('plugins/daterangepicker/daterangepicker.js'); ?>"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?php echo base_url('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'); ?>"></script>
  <!-- Summernote -->
  <script src="<?php echo base_url('plugins/summernote/summernote-bs4.min.js'); ?>"></script>
  <!-- overlayScrollbars -->
  <script src="<?php echo base_url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'); ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url('dist2/js/adminlte.js'); ?>"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="<?php echo base_url('dist2/js/pages/dashboard.js'); ?>"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url('dist2/js/demo.js'); ?>"></script>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</body>

</html>