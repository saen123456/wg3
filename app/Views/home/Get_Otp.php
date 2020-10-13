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

        <link rel="stylesheet" href="<?php echo base_url('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('plugins/toastr/toastr.min.css'); ?>">
        <script src="<?php echo base_url('plugins/sweetalert2/sweetalert2.min.js'); ?>"></script>
        <script src="<?php echo base_url('plugins/toastr/toastr.min.js'); ?>"></script>
        <link rel="preload" href="<?php echo base_url('assets/css/footer.css'); ?>" as="style" onload="this.rel='stylesheet'">

        <!-- CSS Card Course -->
        <link rel="preload" href="<?php echo base_url('assets/css/card.css'); ?>" as="style" onload="this.rel='stylesheet'">

    </head>


<body class="hold-transition layout-top-nav" style="font-family:Tahoma, Geneva, sans-serif">
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
                                    <li><a tabindex="-1" href="<?= base_url('/category/alldevelopment?category=all'); ?>" class="dropdown-item">All Development</a></li>
                                    <li><a tabindex="-1" href="<?= base_url('/category/webdevelopment?category=1'); ?>" class="dropdown-item">Web Development</a></li>
                                    <li><a tabindex="-1" href="<?= base_url('/category/programinglanguages?category=2'); ?>" class="dropdown-item">Programming Languages</a></li>
                                    <li><a tabindex="-1" href="<?= base_url('/category/mobileapp?category=3'); ?>" class="dropdown-item">Mobile Apps</a></li>
                                    <li><a tabindex="-1" href="<?= base_url('/category/database?category=4'); ?>" class="dropdown-item">Database</a></li>
                                    <li><a tabindex="-1" href="<?= base_url('/category/others?category=5'); ?>" class="dropdown-item">Others</a></li>
                                </ul>
                            </li>


                            <!-- End Level two -->
                        </ul>
                    </li>

                </ul>

                <!-- SEARCH FORM -->
                <div class="container">
                    <ul class="nav navbar-nav mx-auto">
                        <form class="form-inline ml-1 ml-md-1" action="<?= base_url('/search/course') ?>" method="get">
                            <div class="input-group">
                                <div class="inputlong">
                                    <input type="text" class="form-control" placeholder="ค้นหาคอร์สเรียนได้ที่นี่" name="Search_Course_Query">
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
                <!-- <i class="fa fa-shopping-cart"></i> -->
                <!-- SEARCH FORM -->

                <!-- Right navbar links -->

                <div class="navbar-collapse collapse w-200 order-3 dual-collapse">
                    <ul class="order-1 order-md-5 navbar-nav navbar-no-expand ml-auto">
                        <!-- Messages Dropdown Menu -->

                        <!-- Notifications Dropdown Menu -->
                        <div class="row" id="btn-navbar">

                            <div class="col-md-auto" id="col-navbar">
                                <button type="button" class="btn btn-default btn-login" data-toggle="modal" data-target="#modal-default">
                                    <b>เข้าสู่ระบบ</b>
                                </button>
                            </div>
                            <div class="col-md-auto" id="col-navbar">
                                <button type="button" class="btn btn-success btn-register" data-toggle="modal" data-target="#modal-register">
                                    <b>ลงทะเบียน</b>
                                </button>
                            </div>

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
                            <?php
                            $this->session = \Config\Services::session();
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
                <a href="<?= base_url('/category/alldevelopment?category=all'); ?>">
                    <div class="float-sm-right" style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 20px;line-height: 23px;color: #959595;">ดูทั้งหมด</div>
                </a>
                <div class="float-sm-left">
                    <h2 style="font-family: Roboto;font-style: normal;font-weight: normal;">หลักสูตรยอดนิยม</h2>
                </div>

                <div class="col-md-1 col-md-offset-2 text-center colorlib-heading animate-box">
                    <h3>
                        <svg width="38" height="2" viewBox="0 0 38 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="38" height="2" fill="black" />
                        </svg>
                    </h3>
                </div>

                <div class="row">
                    <?php
                    foreach ($Course_Info as $row) :
                        ?>

                        <div class="col-md-3 animate-box" id="card-responsive">
                            <a href="<?= base_url('/viewcourse/' . $row['course_id']); ?>">
                                <div class="card" style="width:268px;">
                                    <ul class="list-group list-group-flush">

                                        <?php
                                            if ($row['image_course']) { ?>
                                            <img class="card-img-top" src="<?php echo $row['image_course'] ?>" alt="Card image" style="width:268px;height: 179px;">
                                        <?php
                                            } else { ?>
                                            <img class="card-img-top" src="<?= base_url('assets/img/dash_course_illustration.png') ?>" alt="Card image" style="width:268px;height: 179px;">
                                        <?php
                                            }
                                            ?>


                                        <div class="profilecourse">
                                            <img src="<?php echo $row['picture'] ?>" width="61px" height="61px" class="rounded-circle img-thumbnail">
                                        </div>
                                        <br>
                                        <div class="card-body">
                                            <div class="font-titlecourse">
                                                <?php echo $row['course_name'] ?>
                                            </div>
                                            <div class="font-ownercourse"><?php echo $row['first_name'] ?></div>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <li class="list-group-item">

                                                <div class="font-coursecomment">
                                                    <i class="fa fa-users" aria-hidden="true"> </i>
                                                    <!-- <i class="fa fa-comments" aria-hidden="true"> 3</i> -->
                                                </div>

                                                <div class="font-courseprice">
                                                    <?php
                                                        if ($row['course_price'] == '0') {
                                                            echo "Free";
                                                        } else {
                                                            echo $row['course_price'] . " THB";
                                                        }

                                                        ?>
                                                </div>
                                            </li>
                                        </div>
                                    </ul>
                                </div>
                            </a>
                        </div>

                    <?php
                    endforeach;
                    ?>

                </div>
            </div>
        </div>


        <div class="image-register">
            <div class="overlay"></div>
            <div class="container"><br><br><br>
                <h1 style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 64px;color: white;text-align: center;">เป้าหมาย Workgress</h1>
                <h3 style="font-family: Roboto;font-style: normal;font-weight: 300;font-size: 26px;color: white;text-align: center;">เพิ่มประสบการณ์การเรียนรู้ที่ทันสมัย รวดเร็ว สะดวก</h3>
                <br>
                <div style="text-align:center;">
                    <button type="button" style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);" class="btn btn-success" data-toggle="modal" data-target="#modal-register">
                        <b>ลงชื่อเข้าใช้ฟรี</b>
                    </button>
                </div>
            </div>
            <!-- /.content -->

        </div>
        <!-- /.content-wrapper -->


        <!-- Main Footer -->
        <footer class="mainfooter" role="contentinfo">
            <div class="footer-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <!--Column1-->
                            <div class="footer-pad">
                                <ul class="list-unstyled">
                                    <li><a href="#">หน้าแรก</a></li>
                                    <li><a href="#">เกี่ยวกับเรา</a></li>
                                    <li><a href="#">หลักสูตรทั้งหมด</a></li>
                                    <li><a href="#">ติดต่อเรา</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <!--Column1-->
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <!--Column1-->
                        </div>

                        <div class="col-md-3 text-right" id="text-social">
                            <h4>Follow Us : </h4>
                            <ul class="social-network social-circle">
                                <li><a href="#" class="icoFacebook" title="Facebook"><i class="fab fa-facebook-square"></i></a></li>
                                <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fab fa-twitter-square"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12 copy ">

                            <div class="row">
                                <div class="col-2">
                                    <img src="<?= base_url('/dist2/img/logo_footer.png'); ?>" class="img-fluid float-left" alt="...">
                                </div>
                                <div class="col-4">
                                    <p class="text-left">&copy; ลิขสิทธิ์ © 2020 WorkGress, Inc.</p>
                                </div>
                                <div class="col-6">
                                    <p class="text-right">&copy;
                                        ข้อกำหนด นโยบายความเป็นส่วนตัวและคุกกี้</p>
                                </div>


                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </footer>
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

                                <form action="<?= site_url('/UserController/User_Login') ?>" method="post" role="form" id="quickForm">

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
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <!-- /.col -->
                                        <div class="col-4">
                                            <button type="submit" class="btn btn-primary btn-block">เข้าสู่ระบบ</button>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </form>

                                <div class="social-auth-links text-center mb-3">
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
                                    <a href="<?php echo base_url('/reset_password'); ?>">ลืมรหัสผ่านใช่หรือไม่ ?</a>
                                </p>
                                <p class="mb-0">
                                    <a href="" data-toggle="modal" data-target="#modal-register">สมัครสมาชิกใหม่</a>
                                    </button>
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


        <div class="modal fade" id="modal-register">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">สมัครสมาชิก Workgress ของคุณ</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body login-card-body">
                                <p class="login-box-msg">สมัครสมาชิกใหม่เพื่อเริ่มเรียนรู้</p>

                                <form role="form" action="<?= site_url('/UserController/User_Register') ?>" method="post" id="RegisterForm">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="Full_Name_Register">ชื่อ-นามสกุล :</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="Full_Name_Register" class="form-control" id="Full_Name_Register" placeholder="กรุณาใส่ชื่อ-นามสกุล">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-user"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">อีเมล :</label>
                                            <div class="input-group mb-3">
                                                <input type="email" name="Email_Register" class="form-control" id="Email_Register" placeholder="กรุณาใส่อีเมล">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-envelope"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <span id="email_result"></span>
                                        <div class="form-group">
                                            <label for="password">รหัสผ่าน :</label>
                                            <div class="input-group mb-3">
                                                <input type="password" name="Password_Register" class="form-control" id="password" placeholder="กรุณาใส่รหัสผ่าน">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-eye-slash" id="eye"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword2">ยืนยันรหัสผ่าน :</label>
                                            <div class="input-group mb-3">
                                                <input type="password" name="password_confirm" class="form-control" id="exampleInputPassword2" placeholder="กรุณาใส่ยืนยันรหัสผ่าน">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-eye-slash" id="eye1"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-0">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                                                <label class="custom-control-label" for="exampleCheck1">ฉัน ยินยอม <a href="#">เงื่อนไขการให้บริการ</a>.</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <button type="submit" class="btn btn-primary">ยืนยัน</button>
                                </form>
                                <!-- /.social-auth-links -->
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
        <script type="text/javascript">
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 6000);
        </script>
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