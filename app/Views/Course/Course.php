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
        <link rel="stylesheet" href="<?php echo base_url('dist2/css/photo.css'); ?>" type="text/css" media="screen">
        <link href="<?php echo base_url('dist2/css/landing-page1.css'); ?>" type="text/css" media="screen" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/dropdown.css'); ?>" type="text/css" media="screen">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css'>


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

        <!-- Animate.css -->
        <link rel="stylesheet" href="<?php echo base_url('assets/course/css/animate.css'); ?>">

        <!-- Theme style  -->
        <link rel="stylesheet" href="<?php echo base_url('assets/course/css/style.css'); ?>">

        <!-- Modernizr JS -->
        <script src="assets/course/js/modernizr-2.6.2.min.js"></script>

        <link rel="preload" href="<?php echo base_url('assets/css/footer.css'); ?> " as="style" onload="this.rel='stylesheet'">

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
                                <a class="dropdown-item" href="<?= base_url('/my-courses/learning'); ?>">หลักสูตรของฉัน</a>
                                <?php
                                if ($this->session->get("Role_name") == 'student') {
                                    ?>
                                    <a class="dropdown-item" href="<?php echo base_url('/teacher'); ?>">สอนบน Workgress</a>
                                <?php
                                } else if ($this->session->get("Role_name") == 'admin') { ?>
                                    <a class="dropdown-item" href="<?php echo base_url('/course'); ?>">สร้างคอร์ส</a>
                                    <a class="dropdown-item" href="<?php echo base_url('/dashboard'); ?>">Dashboard</a>

                                <?php
                                } else if ($this->session->get("Role_name") == 'teacher') { ?>
                                    <a class="dropdown-item" href="<?php echo base_url('/course'); ?>">สร้างคอร์ส</a>
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
            <header class="masthead">
                <div class="overlay"></div>
                <div class="row  justify-content-center">
                    <div class="col-9">
                        <?php
                        if ($this->session->get("Has_Course") == null) {
                            ?>
                            <div class="cards">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-10">
                                            <h2><span class="far fa-calendar-plus "></span><b> ข้ามไปยังการสร้างหลักสูตร</b></h2>
                                        </div>
                                        <div class="col-2">
                                            <form action="javascript:void(0);" enctype="multipart/form-data" method="post">
                                                <button formaction="<?= base_url('/course/createcourse') ?>" type="summit" class="btn btn-block btn-success btn-lg">สร้างหลักสูตร</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="row">
                            <?php
                            if ($this->session->get("Has_Course") != null) {
                                ?>
                                <div class="col-auto mr-auto">
                                    <form class="form-inline ml-1 ml-md-1">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="ค้นหาคอร์สเรียนได้ที่นี่">
                                            <div class="input-group-append">
                                                <button class="btn btn-secondary" type="button">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-auto">
                                    <form action="javascript:void(0);" enctype="multipart/form-data" method="post">
                                        <button formaction="<?= base_url('/course/createcourse') ?>" type="summit" class="btn btn-block light-purple">สร้างหลักสูตร</button>
                                    </form>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <?php
                        foreach ($data as $row) :
                            ?>
                            <br>

                            <div class="content_course">
                                <div class="row">
                                    <div class="col-1">
                                        <?php
                                            if ($row['image_course']) { ?>
                                            <img src="<?php echo $row['image_course'] ?>" width="120px" height="120px">
                                        <?php
                                            } else { ?>
                                            <img src="<?= base_url('assets/img/dash_course_illustration.png') ?>" width="120px" height="120px"><?php
                                                                                                                                                    }
                                                                                                                                                    ?>
                                    </div>
                                    <div class="col-11">
                                        <br>
                                        <b>
                                            <p> คอร์ส : <?php echo $row['course_name'] ?></p>
                                        </b>

                                        <a href="<?= base_url('/course/edit/' . $row['course_id']); ?>">
                                            <div class="content_course-overlay"></div>
                                            <div class="content_course-details fadeIn-bottom">
                                                <h3 class="content_course-text">แก้ไข / จัดการหลักสูตร </h3>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                            </div>

                        <?php
                        endforeach;
                        ?>
                        <div class="container">
                            <div class="col-12">
                                <div class="row justify-content-center">
                                    <div class="col-10 justify-content-center text-white p-lg-5">
                                        <h4>ขึ้นอยู่กับประสบการณ์ของคุณเราคิดว่าแหล่งข้อมูลเหล่านี้จะช่วยคุณได้</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cards">
                            <div class="container">
                                <div class="row">
                                    <div class="col-4"><img src="<?php echo base_url('assets/img/dash_course_illustration.png'); ?>" width="160px" height="160px">
                                    </div>

                                    <div class="col-8">
                                        <h5>
                                            สร้างหลักสูตรที่น่าสนใจ
                                        </h5>
                                        <br>
                                        <p>ไม่ว่าคุณจะทำการสอนมาหลายปีแล้วหรือเพิ่งสอนเป็นครั้งแรก คุณก็สามารถสร้างหลักสูตรที่น่าสนใจได้ เราได้รวบรวมแหล่งข้อมูลและแบบฝึกฝนที่ดีเยี่ยมเพื่อให้คุณพัฒนาไปอีกก้าวไม่เกี่ยวว่าคุณจะเพิ่งเริ่มต้น</p>
                                        <br>
                                        <a href="#">เริ่ม</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-6">
                                <div class="cards">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-4"><img src="<?php echo base_url('assets/img/dash_video_illustration.png'); ?>" width="160px" height="160px">
                                            </div>
                                            <div class="col-8">
                                                <h5>เริ่มด้วยวิดีโอ</h5>
                                                <br>
                                                <p>วิดีโอการบรรยายที่มีคุณภาพสามารถทำให้หลักสูตรของคุณโดดเด่น ใช้แหล่งข้อมูลของเราในการเรียนรู้พื้นฐาน</p>
                                                <br>
                                                <a href="#">เริ่ม</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="cards">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-4"><img src="<?php echo base_url('assets/img/dash_publish_illustration.png'); ?>" width="160px" height="160px">
                                            </div>

                                            <div class="col-8">
                                                <h5>
                                                    สร้างกลุ่มเป้าหมายของคุณ
                                                </h5>
                                                <br>
                                                <p>สร้างหลักสูตรให้ประสบความสำเร็จด้วยการสร้างผู้ฟัง</p>
                                                <br>
                                                <br>
                                                <a href="#">เริ่ม</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="col-12">
                                <div class="row justify-content-center">
                                    <div class="col-7 text-white p-lg-5">
                                        <h4>มีคำถามหรือไม่? นี่เป็นแหล่งข้อมูลวิทยากรยอดนิยม</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="col-12">
                                <div class="row justify-content-center">
                                    <div class="col-4 text-white p-lg-5">
                                        <h4>คุณพร้อมจะเริ่มหรือยัง?</h4>
                                        <br>
                                        <form action="javascript:void(0);" enctype="multipart/form-data" method="post">
                                            <button formaction="<?= base_url('/course/createcourse') ?>" type="summit" class="btn btn-block btn-success btn-lg">สร้างหลักสูตร</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- /.content-header -->

                <!-- Main content -->

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


    </div>
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">เปลี่ยนรหัสผ่าน</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body login-card-body">
                            <form action="<?= site_url('/UserController/Change_Password') ?>" method="post" id="changepassForm">
                                <div class="form-group">
                                    <label for="password">รหัสผ่านเก่า :</label>
                                    <div class="input-group mb-3">
                                        <input type="password" name="Password_Old" class="form-control" id="password" placeholder="Password">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-eye-slash" id="eye2"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password">รหัสผ่านใหม่ :</label>
                                    <div class="input-group mb-3">
                                        <input type="password" name="Password_New" class="form-control" id="Passwordnew" placeholder="Password">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-eye-slash" id="eye"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword2">ยืนยันรหัสผ่านใหม่ :</label>
                                    <div class="input-group mb-3">
                                        <input type="password" name="Password_ac" class="form-control" id="exampleInputPassword2" placeholder="Password">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-eye-slash" id="eye1"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- /.col -->
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-primary btn-block">ยืนยัน</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>
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
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist2/js/adminlte.min.js"></script>

    <!-- Waypoints -->
    <script src="<?php echo base_url('assets/course/js/jquery.waypoints.min.js'); ?>"></script>

    <!-- Flexslider -->
    <script src="assets/course/js/jquery.flexslider-min.js"></script>

    <!-- Main -->
    <script src="assets/course/js/main.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="dist2/js/demo.js"></script>
    <script src="dist2/js/script.js"></script>
    <script src="plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="plugins/jquery-validation/additional-methods.min.js"></script>

    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 6000);
    </script>