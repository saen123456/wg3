<?php
include('config_google.php');
include('config_facebook.php');
//session_destroy();

//google_btn
$login_button = $google_client->createAuthUrl();

//facebook_btn
$facebook_helper = $facebook->getRedirectLoginHelper();

$facebook_permissions = ['email']; // Optional permissions
$facebook_login_url = $facebook_helper->getLoginUrl('https://workgress.online/UserFacebookController/Facebook_Login', $facebook_permissions);
//$facebook_login_url = '<a href="'.$facebook_login_url.'"><img src="assets\img\btn_facebook.png" width="300" height="60"/></a>';

?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Workgress</title>

    <!-- Font Awesome Icons -->
    <link rel="preload" href="plugins/fontawesome-free/css/all.min.css" as="style" onload="this.rel='stylesheet'">
    <!-- Theme style -->
    <link rel="preload" href="dist2/css/adminlte.min.css" as="style" onload="this.rel='stylesheet'">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="preconnect" onload="this.rel='stylesheet'">
    <link rel="preload" href="<?php echo base_url('dist2/css/landing-page1.css'); ?>" as="style" onload="this.rel='stylesheet'">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js" rel="preconnect"></script>

    <link rel="preload" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css" as="style" onload="this.rel='stylesheet'">
    <link rel="preload" href="plugins/toastr/toastr.min.css" as="style" onload="this.rel='stylesheet'">

    <script src="plugins/sweetalert2/sweetalert2.min.js" rel="preload"></script>
    <script src="plugins/toastr/toastr.min.js" rel="preload"></script>

    <!-- Animate.css -->
    <link rel="preload" href="assets/course/css/animate.css" as="style" onload="this.rel='stylesheet'">

    <!-- Theme style  -->
    <link rel="preload" href="assets/course/css/style.css " as="style" onload="this.rel='stylesheet'">

    <!-- Modernizr JS -->
    <script src="assets/course/js/modernizr-2.6.2.min.js" rel="preload"></script>

    <link rel="preload" href="assets/css/footer.css " as="style" onload="this.rel='stylesheet'">

</head>


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
                        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">หมวดหมู่ <i class="fas fa-th-large" style="background: #7C5CE9;"></i></a>
                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                            <!-- <li><a href="#" class="dropdown-item">Some action </a></li>
                <li><a href="#" class="dropdown-item">Some other action</a></li> -->

                            <li class="dropdown-divider"></li>

                            <!-- Level two dropdown-->
                            <li class="dropdown-submenu dropdown-hover">
                                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">IT</a>
                                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                    <li>
                                        <a tabindex="-1" href="#" class="dropdown-item">PostgreSql</a>
                                    </li>

                                    <!-- Level three dropdown-->
                                    <li class="dropdown-submenu">
                                        <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">PHP</a>
                                        <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                                            <li><a href="#" class="dropdown-item">Codeigniter 4</a></li>
                                            <li><a href="#" class="dropdown-item">Laravel</a></li>
                                        </ul>
                                    </li>
                                    <!-- End Level three -->

                                    <li><a href="#" class="dropdown-item">Selenium</a></li>
                                    <li><a href="#" class="dropdown-item">AdoDB</a></li>
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
                <i class="fa fa-shopping-cart"></i>
                <!-- SEARCH FORM -->

                <!-- Right navbar links -->

                <div class="navbar-collapse collapse w-200 order-3 dual-collapse">
                    <ul class="order-1 order-md-5 navbar-nav navbar-no-expand ml-auto">
                        <!-- Messages Dropdown Menu -->
                        <div class="input-group input-group-sm">
                            <!-- Notifications Dropdown Menu -->

                        </div>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- /.navbar -->

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <header class="masthead">
                <div class="overlay"></div>
                <div class="container">

                    <div class="card">
                        <div class="card-body login-card-body">
                            <p class="login-box-msg">เข้าสู่ระบบเพื่อเริ่มระบบของคุณ</p>
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
                            <form action="<?= site_url('/UserController/User_Login') ?>" method="post" role="form" id="quickForm1">
                                <div class="input-group mb-3">

                                    <input type="email" name="Email_Login" id="Email_Login" class="form-control" id="exampleInputEmail1" placeholder="กรุณาใส่อีเมล">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div>
                                </div>
                                <span id="email_check_login"></span>
                                <div class="input-group mb-3">

                                    <input type="password" name="Password_Login" class="form-control" id="exampleInputPassword1" placeholder="กรุณาใส่รหัสผ่าน">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-eye-slash" id="eye"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                    </div>
                                    <!-- /.col -->

                                    <div class="col-3">
                                        <button type="submit" class="btn btn-primary btn-block">เข้าสู่ระบบ</button>
                                    </div>

                                    <!-- /.col -->
                                </div>
                            </form>

                            <div class=" social-auth-links text-center mb-3">
                                <p>- หรือ -</p>
                                <a href="<?php echo $facebook_login_url ?>" class="btn btn-block btn-primary">
                                    <i class="fab fa-facebook mr-2"></i> ล็อคอินกับ Facebook
                                </a>
                                <a href="<?php echo $login_button ?>" class="btn btn-block btn-danger">
                                    <i class="fab fa-google-plus mr-2"></i> ล็อคอินกับ Google
                                </a>
                            </div>
                            <!-- /.social-auth-links -->

                            <p class="mb-1">
                                <a href="forgot-password.html">ลืมรหัสผ่านใช่หรือไม่ ?</a>
                            </p>
                            <p class="mb-0">
                                <a href="<?php echo base_url('/register'); ?>" class="text-center">สมัครสมาชิกใหม่</a>
                            </p>
                        </div>
                        <!-- /.login-card-body -->
                    </div>
                    <!-- /.form-box -->

                </div>
            </header>
            <!-- /.content-header -->


            <!-- Main content -->

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="colorlib-loader"></div>
            <div class="colorlib-classes">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-3 col-md-offset-2 text-center colorlib-heading animate-box"><br>
                            <h2 style="font-family: Roboto;font-style: normal;font-weight: normal;">หลักสูตรยอดนิยม</h2>
                            <h3>
                                <svg width="38" height="2" viewBox="0 0 38 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="38" height="2" fill="black" />
                                </svg>
                            </h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 animate-box">
                            <div class="classes">
                                <div class="classes-img" style="background-image: url(assets/course/images/classes-1.jpg);">
                                    <span class="price text-center"><small>$450</small></span>
                                </div>
                                <div class="desc">
                                    <h3><a href="#">Developing Mobile Apps</a></h3>
                                    <p>Pointing has no control about the blind texts it is an almost unorthographic life</p>
                                    <p><a href="#" class="btn-learn">Learn More <i class="icon-arrow-right3"></i></a></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 animate-box">
                            <div class="classes">
                                <div class="classes-img" style="background-image: url(assets/course/images/classes-2.jpg);">
                                    <span class="price text-center"><small>$450</small></span>
                                </div>
                                <div class="desc">
                                    <h3><a href="#">Convert PSD to HTML</a></h3>
                                    <p>Pointing has no control about the blind texts it is an almost unorthographic life</p>
                                    <p><a href="#" class="btn-learn">Learn More <i class="icon-arrow-right3"></i></a></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 animate-box">
                            <div class="classes">
                                <div class="classes-img" style="background-image: url(assets/course/images/classes-3.jpg);">
                                    <span class="price text-center"><small>$450</small></span>
                                </div>
                                <div class="desc">
                                    <h3><a href="#">Convert HTML to WordPress</a></h3>
                                    <p>Pointing has no control about the blind texts it is an almost unorthographic life</p>
                                    <p><a href="#" class="btn-learn">Learn More <i class="icon-arrow-right3"></i></a></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 animate-box">
                            <div class="classes">
                                <div class="classes-img" style="background-image: url(assets/course/images/classes-4.jpg);">
                                    <span class="price text-center"><small>$450</small></span>
                                </div>
                                <div class="desc">
                                    <h3><a href="#">Developing Mobile Apps</a></h3>
                                    <p>Pointing has no control about the blind texts it is an almost unorthographic life</p>
                                    <p><a href="#" class="btn-learn">Learn More <i class="icon-arrow-right3"></i></a></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 animate-box">
                            <div class="classes">
                                <div class="classes-img" style="background-image: url(assets/course/images/classes-5.jpg);">
                                    <span class="price text-center"><small>$450</small></span>
                                </div>
                                <div class="desc">
                                    <h3><a href="#">Learned Smoke Effects</a></h3>
                                    <p>Pointing has no control about the blind texts it is an almost unorthographic life</p>
                                    <p><a href="#" class="btn-learn">Learn More <i class="icon-arrow-right3"></i></a></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 animate-box">
                            <div class="classes">
                                <div class="classes-img" style="background-image: url(assets/course/images/classes-6.jpg);">
                                    <span class="price text-center"><small>$450</small></span>
                                </div>
                                <div class="desc">
                                    <h3><a href="#">Convert HTML to WordPress</a></h3>
                                    <p>Pointing has no control about the blind texts it is an almost unorthographic life</p>
                                    <p><a href="#" class="btn-learn">Learn More <i class="icon-arrow-right3"></i></a></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 animate-box">
                            <div class="classes">
                                <div class="classes-img" style="background-image: url(assets/course/images/classes-6.jpg);">
                                    <span class="price text-center"><small>$450</small></span>
                                </div>
                                <div class="desc">
                                    <h3><a href="#">Convert HTML to WordPress</a></h3>
                                    <p>Pointing has no control about the blind texts it is an almost unorthographic life</p>
                                    <p><a href="#" class="btn-learn">Learn More <i class="icon-arrow-right3"></i></a></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 animate-box">
                            <div class="classes">
                                <div class="classes-img" style="background-image: url(assets/course/images/classes-6.jpg);">
                                    <span class="price text-center"><small>$450</small></span>
                                </div>
                                <div class="desc">
                                    <h3><a href="#">Convert HTML to WordPress</a></h3>
                                    <p>Pointing has no control about the blind texts it is an almost unorthographic life</p>
                                    <p><a href="#" class="btn-learn">Learn More <i class="icon-arrow-right3"></i></a></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div style="background-image: url(assets/img/bg3.png); background-size: 100%; height:501px;">
                <div class="overlay"></div>
                <div class="container"><br><br><br>
                    <h1 style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 64px;color: white;text-align: center;">เป้าหมาย Workgress</h1>
                    <h3 style="font-family: Roboto;font-style: normal;font-weight: 300;font-size: 26px;color: white;text-align: center;">เพิ่มประสบการณ์การเรียนรู้ที่ทันสมัย รวดเร็ว สะดวก</h3>
                    <br>
                    <div style="text-align:center;">

                    </div>
                </div>
                <!-- /.content -->
            </div>
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
            <footer class="main-footer">
                <div class="footernew">
                </div>
            </footer>
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



        <!-- Content Wrapper. Contains page content -->
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->

        <script src="plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- jquery-validation -->
        <script src="plugins/jquery-validation/jquery.validate.min.js"></script>
        <script src="plugins/jquery-validation/additional-methods.min.js"></script>
        <!-- AdminLTE App -->
        <script src="dist2/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="dist2/js/demo.js"></script>
</body>

</html>

<!-- Check ของ Login -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#Email_Login').change(function() {
            var Email_Login = $('#Email_Login').val();
            //var Email_Login = document.getElementById("Email_Login").value; 
            console.log(Email_Login);
            if (Email_Login != '') {
                $.ajax({
                    url: "<?= site_url('/UserController/Check_Email_Login') ?>",
                    method: "POST",
                    data: {
                        Email_Login: Email_Login
                    },
                    success: function(data) {
                        $('#email_check_login').html(data);
                    }
                });
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#Email_Register').change(function() {
            var Email = $('#Email_Register').val();
            //var Email = document.getElementById("Email_Register").value; 
            console.log(Email);
            if (Email != '') {
                $.ajax({
                    url: "<?= site_url('/UserController/Check_Email') ?>",
                    method: "POST",
                    data: {
                        Email: Email
                    },
                    success: function(data) {
                        $('#email_result').html(data);
                    }
                });
            }
        });
    });
    $(function() {

        $('#eye').click(function() {

            if ($(this).hasClass('fa-eye-slash')) {

                $(this).removeClass('fa-eye-slash');

                $(this).addClass('fa-eye');

                $('#exampleInputPassword1').attr('type', 'text');

            } else {

                $(this).removeClass('fa-eye');

                $(this).addClass('fa-eye-slash');

                $('#exampleInputPassword1').attr('type', 'password');
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#Email_Forget').change(function() {
            var Email_Forget = $('#Email_Forget').val();
            //var Email_Login = document.getElementById("Email_Login").value; 
            console.log(Email_Forget);
            if (Email_Forget != '') {
                $.ajax({
                    url: "<?= site_url('/UserController/Check_Email_Login') ?>",
                    method: "POST",
                    data: {
                        Email_Login: Email_Forget
                    },
                    success: function(data) {
                        $('#email_check_forget').html(data);
                    }
                });
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#quickForm').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                    minlength: 5
                },
                terms: {
                    required: true
                },
            },
            messages: {
                email: {
                    required: "Please enter a email address",
                    email: "Please enter a vaild email address"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                terms: "Please accept our terms"
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
        $('#quickForm1').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                    minlength: 5
                },
                terms: {
                    required: true
                },
            },
            messages: {
                email: {
                    required: "Please enter a email address",
                    email: "Please enter a vaild email address"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                terms: "Please accept our terms"
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
<script type="text/javascript">
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 60000);


    $(document).ready(function() {

        var value = $("#password").val();
        $.validator.addMethod("checklower", function(value) {
            return /[a-z]/.test(value);
        });
        $.validator.addMethod("checkupper", function(value) {
            return /[A-Z]/.test(value);
        });
        $.validator.addMethod("checkdigit", function(value) {
            return /[0-9]/.test(value);
        });

        $('#RegisterForm').validate({
            rules: {
                Full_Name_Register: {
                    required: true,
                    minlength: 8,
                },
                Email_Register: {
                    required: true,
                    email: true,
                },
                Password_Register: {
                    minlength: 5,
                    required: true,
                    checklower: true,
                    checkupper: true,
                    checkdigit: true
                },
                terms: {
                    required: true
                },
                password_confirm: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
            },
            messages: {
                Full_Name_Register: {
                    required: "กรุณากรองชื่อ-นามสกุลด้วย",
                    minlength: "ต้องมากกว่า 8 ตัวขึ้นไป",
                },
                Email_Register: {
                    required: "กรุณากรองอีเมลด้วย",
                    email: "ช่วยใส่ที่เป็น email เช่น xxxx@gmail.com"
                },
                Password_Register: {
                    minlength: "ต้องมากกว่า 5 ตัวขึ้นไป",
                    checklower: "ต้องมี ตัวอักษรขนาดเล็กอย่างน้อย 1 ตัว",
                    checkupper: "ต้องมี ตัวอักษรขนาดใหญ่อย่างน้อย 1 ตัว",
                    checkdigit: "ต้องมี ตัวเลขอย่างน้อย 1 ตัว"
                },
                terms: "Please accept our terms",
                password_confirm: "รหัสผ่านไม่เหมือนกัน กรุณากรองใหม่อีกครั้ง"
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });

        $('#ForgetForm').validate({
            rules: {
                Email_Forget: {
                    required: true,
                    email: true,
                },
                Password_Forget: {
                    minlength: 5,
                    required: true,
                    checklower: true,
                    checkupper: true,
                    checkdigit: true
                },
                terms: {
                    required: true
                },
                Password_Forget_Confirm: {
                    required: true,
                    minlength: 5,
                    equalTo: "#Password_Forget"
                },
            },
            messages: {
                Email_Register: {
                    required: "กรุณากรองอีเมลด้วย",
                    email: "ช่วยใส่ที่เป็น email เช่น xxxx@gmail.com"
                },
                Password_Forget: {
                    minlength: "ต้องมากกว่า 5 ตัวขึ้นไป",
                    checklower: "ต้องมี ตัวอักษรขนาดเล็กอย่างน้อย 1 ตัว",
                    checkupper: "ต้องมี ตัวอักษรขนาดใหญ่อย่างน้อย 1 ตัว",
                    checkdigit: "ต้องมี ตัวเลขอย่างน้อย 1 ตัว"
                },
                terms: "Please accept our terms",
                Password_Forget_Confirm: "รหัสผ่านไม่เหมือนกัน กรุณากรองใหม่อีกครั้ง"
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
<?php include 'Register_Validate_Script.php'; ?>

<!-- Waypoints -->
<script src="assets/course/js/jquery.waypoints.min.js" rel="preload"></script>

<!-- Flexslider -->
<script src="assets/course/js/jquery.flexslider-min.js" rel="preload"></script>

<!-- Main -->
<script src="assets/course/js/main.js" rel="preload"></script>
</body>

</html>