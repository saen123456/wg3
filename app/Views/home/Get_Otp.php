<!DOCTYPE html>
<html>

<head>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>Workgress</title>

        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="<?php echo base_url('plugins/fontawesome-free/css/all.min.css'); ?>">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url('dist2/css/adminlte.min.css'); ?>">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <link href="<?php echo base_url('dist2/css/landing-page1.css'); ?>" rel="stylesheet" media="screen">

        <link rel="stylesheet" href="<?php echo base_url('assets/css/dropdown.css'); ?>" type="text/css" media="screen">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css'>

        <!-- multistep.css -->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/multistep.css'); ?>" type="text/css" media="screen">

        <!-- Animate.css -->
        <link rel="stylesheet" href="<?php echo base_url('assets/course/css/animate.css'); ?>">

        <!-- Theme style  -->
        <link rel="stylesheet" href="<?php echo base_url('assets/course/css/style.css'); ?>">

        <!-- Modernizr JS -->
        <script src="<?php echo base_url('assets/course/js/modernizr-2.6.2.min.js'); ?>"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

        <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
        <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
        <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
        <script src="plugins/toastr/toastr.min.js"></script>
        <link rel="preload" href="assets/css/footer.css " as="style" onload="this.rel='stylesheet'">
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
                $(document).Toasts('create', {
                    class: 'bg-danger',
                    title: 'Workgress',
                    subtitle: '&nbsp&nbsp&nbsp&nbsp&nbspกรุณาลองใหม่&nbsp&nbsp&nbsp&nbsp',
                    body: '<?php echo session('incorrect') ?>'
                })
            });
        </script>
    <?php
    elseif (session('warning')) : ?>
        <script type="text/javascript">
            $(function() {
                $(document).Toasts('create', {
                    class: 'bg-warning',
                    title: 'Workgress',
                    subtitle: '&nbsp&nbsp&nbsp&nbspกรุณาลองใหม่&nbsp&nbsp&nbsp&nbsp',
                    body: '<?php echo session('warning') ?>'
                })
            });
        </script>
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
        <header class="masthead">
            <div class="overlay"></div>
            <div class="colorlib-loader"></div>
            <div class="container-fluid">
                <div class="row justify-content-center mt-0">
                    <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
                        <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                            <h2><strong>กรอก OTP ที่ได้รับจากอีเมลของคุณ</strong></h2>
                            <div class="row">
                                <div class="col-md-12 mx-0">
                                    <form action="<?= site_url('/UserController/Get_OTP') ?>" method="post" id="msform">
                                        <!-- fieldsets -->
                                        <fieldset>
                                            <div class="form-card">
                                                <label for="exampleInputEmail1">OTP :</label>
                                                <input type="number" name="User_Input_OTP" class="form-control" placeholder="กรอก OTP ที่ได้รับจากอีเมลของคุณ">
                                            </div>
                                            <button class="next action-button" value="ยืนยัน">ยืนยัน</button>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
        </header>


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

        <footer class="main-footer">
            <div class="footernew">
            </div>
        </footer>

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

    <!-- Content Wrapper. Contains page content -->
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="<?php echo base_url('plugins/jquery/jquery.min.js'); ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('dist2/js/adminlte.min.js'); ?>"></script>

    <!-- Waypoints -->
    <script src="<?php echo base_url('assets/course/js/jquery.waypoints.min.js'); ?>"></script>

    <!-- Flexslider -->
    <script src="<?php echo base_url('assets/course/js/jquery.flexslider-min.js'); ?>"></script>

    <!-- Main -->
    <script src="<?php echo base_url('assets/course/js/main.js'); ?>"></script>
</body>

</html>

</html>