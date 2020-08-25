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

                    <li class="nav-item dropdown">
                        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">หมวดหมู่ <i class="fas fa-th-large" style="background: #7C5CE9;"></i></a>
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
                <i class="fa fa-shopping-cart"></i>
                <!-- SEARCH FORM -->

                <!-- Right navbar links -->

                <div class="navbar-collapse collapse w-200 order-3 dual-collapse">
                    <ul class="order-1 order-md-5 navbar-nav navbar-no-expand ml-auto">
                        <!-- Messages Dropdown Menu -->
                        <div class="input-group input-group-sm">
                            <!-- Notifications Dropdown Menu -->
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                                <b>เข้าสู่ระบบ</b>
                            </button>
                            <div class="magin-ll">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-register">
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
                            <h2><strong>เปลี่ยนรหัสผ่าน</strong></h2>
                            <div class="row">
                                <div class="col-md-12 mx-0">
                                    <form action="<?= site_url('/UserController/Reset_Password') ?>" method="post" id="msform">
                                        <!-- fieldsets -->
                                        <fieldset>
                                            <div class="form-card">
                                                <label for="exampleInputEmail1">รหัสผ่านใหม่ :</label>
                                                <div class="input-group mb-3">
                                                    <input type="password" name="Password" id="password" class="form-control" placeholder="กรอกรหัสผ่านใหม่ที่คุณต้องการเปลี่ยน">
                                                    <span class="fas fa-eye-slash" id="eye"></span>
                                                </div>

                                                <label for="exampleInputEmail1">ยืนยันรหัสผ่านใหม่ :</label>
                                                <div class="input-group mb-3">
                                                    <input type="password" name="Password_Confirm" id="Password_Confirm" class="form-control" placeholder="กรอกรหัสผ่านใหม่ให้เหมือนกัน">
                                                    <span class="fas fa-eye-slash" id="eye1"></span>
                                                </div>
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
                <a href="#">
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

                        <div class="col-md-3 animate-box">
                            <a href="<?= base_url('/viewcourse/' . $row['course_id']); ?>">
                                <div class="card" style="width:268px;">
                                    <ul class="list-group list-group-flush">
                                        <img class="card-img-top" src="<?php echo $row['image_course'] ?>" alt="Card image" style="width:268px;height: 179px;">
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
                                                    <i class="fa fa-users" aria-hidden="true"> 1273</i>
                                                    <i class="fa fa-comments" aria-hidden="true"> 3</i>
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
    <script src="plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="plugins/jquery-validation/additional-methods.min.js"></script>
    <script type="text/javascript">
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 60000);
        $(function() {

            $('#eye').click(function() {

                if ($(this).hasClass('fa-eye-slash')) {

                    $(this).removeClass('fa-eye-slash');

                    $(this).addClass('fa-eye');

                    $('#Password').attr('type', 'text');

                } else {

                    $(this).removeClass('fa-eye');

                    $(this).addClass('fa-eye-slash');

                    $('#Password').attr('type', 'password');
                }
            });
            $('#eye1').click(function() {

                if ($(this).hasClass('fa-eye-slash')) {

                    $(this).removeClass('fa-eye-slash');

                    $(this).addClass('fa-eye');

                    $('#Password_Confirm').attr('type', 'text');

                } else {

                    $(this).removeClass('fa-eye');

                    $(this).addClass('fa-eye-slash');

                    $('#Password_Confirm').attr('type', 'password');
                }
            });
        });
    </script>
    <script type="text/javascript">
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

            $('#msform').validate({
                rules: {
                    Full_Name_Register: {
                        required: true,
                        minlength: 8,
                    },
                    Email_Register: {
                        required: true,
                        email: true,
                    },
                    Password: {
                        minlength: 5,
                        required: true,
                        checklower: true,
                        checkupper: true,
                        checkdigit: true
                    },
                    terms: {
                        required: true
                    },
                    Password_Confirm: {
                        required: true,
                        minlength: 5,
                        equalTo: "#password"
                    },
                },
                messages: {

                    Password: {
                        minlength: "ต้องมากกว่า 5 ตัวขึ้นไป",
                        checklower: "ต้องมี ตัวอักษรขนาดเล็กอย่างน้อย 1 ตัว",
                        checkupper: "ต้องมี ตัวอักษรขนาดใหญ่อย่างน้อย 1 ตัว",
                        checkdigit: "ต้องมี ตัวเลขอย่างน้อย 1 ตัว"
                    },
                    Password_Confirm: "รหัสผ่านไม่เหมือนกัน กรุณากรองใหม่อีกครั้ง"
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
</body>

</html>

</html>