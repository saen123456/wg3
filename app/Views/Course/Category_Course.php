<!DOCTYPE html>
<html>

<head>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>Workgress</title>

        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist2/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <link href="dist2/css/landing-page1.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/dropdown.css'); ?>" type="text/css" media="screen">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css'>



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
        <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
        <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
        <script src="plugins/toastr/toastr.min.js"></script>

        <!-- Animate.css -->
        <link rel="stylesheet" href="assets/course/css/animate.css">

        <!-- Theme style  -->
        <link rel="stylesheet" href="assets/course/css/style.css">

        <!-- Modernizr JS -->
        <script src="assets/course/js/modernizr-2.6.2.min.js"></script>

        <link rel="preload" href="assets/css/footer.css " as="style" onload="this.rel='stylesheet'">

        <!-- CSS Card Course -->
        <link rel="preload" href="<?php echo base_url('assets/css/categorycourse.css'); ?>" as="style" onload="this.rel='stylesheet'">

    </head>

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
    <?php
    if (session('correct')) : ?>
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Workgress!</strong> <?php echo session('correct') ?>
        </div>
    <?php
    elseif (session('incorrect')) : ?>
        <div class="alert alert-warning" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Workgress!</strong> <?php echo session('incorrect') ?>
        </div>
    <?php
    elseif (session('warning')) : ?>
        <div class="alert alert-warning" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Workgress!</strong> <?php echo session('warning') ?>
        </div>
    <?php
    endif
    ?>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <ul class="navbar-nav ml-5">
                <a href="<?php echo base_url('/home'); ?>" class="navbar-brand">
                    <img src="<?php echo base_url('assets/img/logo1.png'); ?>" width="108px" height="44px">
                </a>
            </ul>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url('/home'); ?>">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">หมวดหมู่ <i class="fas fa-th-large"></i></a>
                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                            <!-- <li><a href="#" class="dropdown-item">Some action </a></li>
                <li><a href="#" class="dropdown-item">Some other action</a></li> -->

                            <li class="dropdown-divider"></li>

                            <!-- Level two dropdown-->
                            <li class="dropdown-submenu dropdown-hover">
                                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Development</a>
                                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                    <li><a tabindex="-1" href="<?php echo base_url('/alldevelopment'); ?>" class="dropdown-item">All Development</a></li>
                                    <li><a tabindex="-1" href="#" class="dropdown-item">Web Development</a></li>
                                    <li><a tabindex="-1" href="#" class="dropdown-item">Programming Languages</a></li>
                                    <li><a tabindex="-1" href="#" class="dropdown-item">Mobile Apps</a></li>
                                    <li><a tabindex="-1" href="#" class="dropdown-item">Database</a></li>
                                    <li><a tabindex="-1" href="#" class="dropdown-item">Others</a></li>
                                </ul>
                            </li>

                            <li class="dropdown-submenu dropdown-hover">
                                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">IT & Software</a>
                                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                    <li><a tabindex="-1" href="#" class="dropdown-item">All IT & Software</a></li>
                                    <li><a tabindex="-1" href="#" class="dropdown-item">Network & Security</a></li>
                                    <li><a tabindex="-1" href="#" class="dropdown-item">Hardware</a></li>
                                    <li><a tabindex="-1" href="#" class="dropdown-item">Others</a></li>
                                </ul>
                            </li>
                            <!-- End Level two -->
                        </ul>
                    </li>

                </ul>

                <!-- SEARCH FORM -->
                <div class="container">
                    <ul class="nav navbar-nav mx-auto">

                        <form class="form-inline ml-1 ml-md-1">
                            <div class="input-group">
                                <div class="inputlong">
                                    <input type="text" class="form-control" placeholder="ค้นหาคอร์สเรียนได้ที่นี่">
                                </div>
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </ul>
                </div>
                <!-- SEARCH FORM -->
                <!-- Right navbar links -->

                <div class="navbar-collapse collapse w-200 order-3 dual-collapse upper" id="navbarSupportedContent">
                    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                        <!-- Messages Dropdown Menu -->
                        <div class="input-group input-group-sm">
                            <!-- Notifications Dropdown Menu -->
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php
                                if ($this->session->get("Picture")) { ?>
                                    <img src="<?php echo $this->session->get("Picture"); ?>" width="35" height="35" class="rounded-circle"><?php
                                                                                                                                        } else { ?>
                                    <img src="<?php echo base_url('assets/img/profile.jpg'); ?>" width="40" height="40" class="rounded-circle"><?php
                                                                                                                                            }
                                                                                                                                                ?>
                            </a>
                            <div class="dropdown-menu mx-auto" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="<?php echo base_url('/profile'); ?>">Profile</a>
                                <?php
                                if ($this->session->get("Role_name") == 'student') {
                                ?>
                                    <a class="dropdown-item" href="<?php echo base_url('/teacher'); ?>">สอนบน Workgress</a>
                                <?php
                                } else if ($this->session->get("Role_name") == 'admin') { ?>
                                    <a class="dropdown-item" href="<?php echo base_url('/dashboard'); ?>">Dashboard</a>
                                    <a class="dropdown-item" href="<?php echo base_url('/course'); ?>">Course</a>
                                <?php
                                } else if ($this->session->get("Role_name") == 'teacher') { ?>
                                    <a class="dropdown-item" href="<?php echo base_url('/course'); ?>">Course</a>
                                <?php
                                }
                                ?>

                                <a class="dropdown-item" href="<?= site_url('/UserController/User_Logout') ?>">Log Out</a>
                            </div>
                        </div>
                    </ul>
                </div>

            </div>
        </nav>
        <!-- /.navbar -->

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <header class="masthead text-white text-center">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-9 mx-auto">
                            <h1 class="mb-5">ยินดีต้อนรับเข้าสู่ Workgress</h1>
                            <h3>คุณพร้อมที่จะเรียนรู้สิ่งใหม่หรือยัง
                            </h3>
                        </div>
                        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                            <form>
                                <div class="form-row">


                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </header>
            <!-- /.content-header -->

            <!-- Main content -->
            <br>
            <div class="container">
                <div class="float-sm-right">
                    <label class="dropdown">
                        <div class="dd-button">
                            ตัวกรอง
                        </div>
                        <input type="checkbox" class="dd-input" id="test">
                        <ul class="dd-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>

                        </ul>

                    </label>
                </div>
                <div class="float-sm-left">
                    <h2 style="font-family: Roboto;font-style: normal;font-weight: normal;">หลักสูตร ไอทีและซอฟแวร์</h2>
                </div>
                <div class="col-md-1 col-md-offset-2 text-center colorlib-heading animate-box">
                    <h3>
                        <svg width="38" height="2" viewBox="0 0 38 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="38" height="2" fill="black" />
                        </svg>
                    </h3>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="<?php echo base_url('assets/img/course1.png'); ?>" class="img-fluid" alt="Sheep">
                                    <img src="<?php echo base_url('assets/img/profilecourse.png'); ?>" width="61px" height="61px" class="rounded-circle img-thumbnail">
                                </td>
                                <td>
                                    Internet of Things (IOT)<br>
                                    เรียนรู้และพัฒนา Internet of Thing สำหรับผู้เริ่มต้น<br>
                                    สร้างโดย Pipat Angkaew<br><br>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                </td>
                                <td style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #0DC08B;"><br><br><br>THB 600</td>
                            </tr>

                            <tr>
                                <td>
                                    <img src="<?php echo base_url('assets/img/course1.png'); ?>" class="img-fluid" alt="Sheep">
                                    <img src="<?php echo base_url('assets/img/profilecourse.png'); ?>" width="61px" height="61px" class="rounded-circle img-thumbnail">
                                </td>
                                <td>
                                    Internet of Things (IOT)<br>
                                    เรียนรู้และพัฒนา Internet of Thing สำหรับผู้เริ่มต้น<br>
                                    สร้างโดย Pipat Angkaew<br><br>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                </td>
                                <td style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #0DC08B;"><br><br><br>THB 600</td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="<?php echo base_url('assets/img/course1.png'); ?>" class="img-fluid" alt="Sheep">
                                    <img src="<?php echo base_url('assets/img/profilecourse.png'); ?>" width="61px" height="61px" class="rounded-circle img-thumbnail">
                                </td>
                                <td>
                                    Internet of Things (IOT)<br>
                                    เรียนรู้และพัฒนา Internet of Thing สำหรับผู้เริ่มต้น<br>
                                    สร้างโดย Pipat Angkaew<br><br>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                </td>
                                <td style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #0DC08B;"><br><br><br>THB 600</td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="<?php echo base_url('assets/img/course1.png'); ?>" class="img-fluid" alt="Sheep">
                                    <img src="<?php echo base_url('assets/img/profilecourse.png'); ?>" width="61px" height="61px" class="rounded-circle img-thumbnail">
                                </td>
                                <td>
                                    Internet of Things (IOT)<br>
                                    เรียนรู้และพัฒนา Internet of Thing สำหรับผู้เริ่มต้น<br>
                                    สร้างโดย Pipat Angkaew<br><br>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                </td>
                                <td style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #0DC08B;"><br><br><br>THB 600</td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="<?php echo base_url('assets/img/course1.png'); ?>" class="img-fluid" alt="Sheep">
                                    <img src="<?php echo base_url('assets/img/profilecourse.png'); ?>" width="61px" height="61px" class="rounded-circle img-thumbnail">
                                </td>
                                <td>
                                    Internet of Things (IOT)<br>
                                    เรียนรู้และพัฒนา Internet of Thing สำหรับผู้เริ่มต้น<br>
                                    สร้างโดย Pipat Angkaew<br><br>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                </td>
                                <td style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 24px;line-height: 28px;color: #0DC08B;"><br><br><br>THB 600</td>
                            </tr>
                        </tbody>
                    </table>
                </div>


            </div>


            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Profile</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->

        <div class="footernew2">
            <a href="<?php echo base_url('/home'); ?>">
                <div class="footerimg">
                    <img src="<?php echo base_url('assets/img/logo2.png'); ?>">
                </div>
            </a>

            <div class="footericonphone">
                <i class="fa fa-phone">
                </i>
            </div>
            <div class="fa-phonetext">
                <h6 style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px;">(000) 123 4567</h6>
            </div>

            <div class="footericonemail">
                <i class="fa fa-envelope">
                </i>
            </div>
            <div class="fa-envelopetext">
                <h6 style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px;">hello@workgress.com</h6>
            </div>

            <div class="footericonsocial">
                <i class="fab fa-facebook-square"></i>
                <i class="fab fa-twitter-square"></i>
                <i class="fab fa-google-plus-square"></i>
                <i class="fab fa-instagram"></i>
            </div>

            <!-- company row -->
            <div class="row">
                <div class="column">
                    <h2 style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 22px;">Company</h2><br>
                    <p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">เกี่ยวกับเรา</p>
                    <p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">บล็อค</p>
                    <p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">ติดค่อเรา</p>
                    <p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">Become a Teacger</p>
                </div>
            </div>

            <!-- links row -->
            <div class="row">
                <div class="column2">
                    <h2 style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 22px;">LINKS</h2><br>
                    <p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">Courses</p>
                    <p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">Events</p>
                    <p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">Gallery</p>
                    <p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">FAQs</p>
                </div>
            </div>

            <!-- SUPPORT row -->
            <div class="row">
                <div class="column3">
                    <h2 style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 22px;">SUPPORT</h2><br>
                    <p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">Documentation</p>
                    <p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">Forums</p>
                    <p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">Lauguage Packs</p>
                    <p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">Release Status</p>
                </div>
            </div>

            <!-- Recomment row -->
            <div class="row">
                <div class="column4">
                    <h2 style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 22px;">RECOMMEND</h2><br>
                    <p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">WordPress</p>
                    <p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">LearnPress</p>
                    <p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">WooCommerce</p>
                    <p style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 16px; color: #A7A7A7;">bbPress</p>
                </div>
            </div>

            <!-- line -->
            <hr class="line">

            <div class="footerinc">
                <p style="font-family: Roboto;font-style: normal;font-weight: normal;">ลิขสิทธิ์ © 2020 WorkGress, Inc. ข้อกำหนด นโยบายความเป็นส่วนตัวและคุกกี้</p>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">เข้าสู่บัญชี Workgress ของคุณ</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body login-card-body">
                            <p class="login-box-msg">เข้าสู่ระบบเพื่อเริ่มระบบของคุณ</p>

                            <form action="../../index3.html" method="post">
                                <div class="input-group mb-3">
                                    <input type="email" class="form-control" placeholder="Email">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" placeholder="Password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        <div class="icheck-primary">
                                            <input type="checkbox" id="remember">
                                            <label for="remember">
                                                Remember Me
                                            </label>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>


                            <p class="mb-1">
                                <a href="forgot-password.html">I forgot my password</a>
                            </p>
                            <p class="mb-0">
                                <a href="register.html" class="text-center">Register a new membership</a>
                            </p>
                        </div>
                        <!-- /.login-card-body -->
                    </div>

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <script type="text/javascript">
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 60000);
    </script>
    <!-- Content Wrapper. Contains page content -->
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist2/js/adminlte.min.js"></script>

    <!-- Waypoints -->
    <script src="assets/course/js/jquery.waypoints.min.js"></script>

    <!-- Flexslider -->
    <script src="assets/course/js/jquery.flexslider-min.js"></script>

    <!-- Main -->
    <script src="assets/course/js/main.js"></script>
</body>

</html>

</html>