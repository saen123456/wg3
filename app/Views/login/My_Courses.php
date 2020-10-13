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
        <link href="<?php echo base_url('dist2/css/landing-page1.css'); ?>" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/dropdown.css'); ?>" type="text/css" media="screen">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css'>



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('plugins/toastr/toastr.min.css'); ?>">
        <script src="<?php echo base_url('plugins/sweetalert2/sweetalert2.min.js'); ?>"></script>
        <script src="<?php echo base_url('plugins/toastr/toastr.min.js'); ?>"></script>

        <!-- Animate.css -->
        <link rel="stylesheet" href="<?php echo base_url('assets/course/css/animate.css'); ?>">

        <!-- Theme style  -->
        <link rel="stylesheet" href="<?php echo base_url('assets/course/css/style.css'); ?>">

        <!-- Modernizr JS -->
        <script src="<?php echo base_url('assets/course/js/modernizr-2.6.2.min.js'); ?>"></script>

        <link rel="preload" href="<?php echo base_url('assets/css/footer.css'); ?>" as="style" onload="this.rel='stylesheet'">

        <!-- CSS Card Course -->
        <link rel="preload" href="<?php echo base_url('assets/css/card.css'); ?>" as="style" onload="this.rel='stylesheet'">

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
                                <a class="dropdown-item" href="<?= base_url('/my-courses/learning'); ?>">หลักสูตรของฉัน</a>
                                <?php
                                if ($this->session->get("Role_name") == 'student') {
                                    ?>
                                    <a class="dropdown-item" href="<?php echo base_url('/teacher'); ?>">สอนบน Workgress</a>
                                <?php
                                } else if ($this->session->get("Role_name") == 'admin') { ?>
                                    <a class="dropdown-item" href="<?php echo base_url('/dashboard'); ?>">Dashboard</a>
                                    <a class="dropdown-item" href="<?php echo base_url('/course'); ?>">สร้างคอร์ส</a>
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



            <!-- /.content-header -->

            <!-- Main content -->
            <!-- คอร์สของฉัน          -->
            <div class="colorlib-classes">
                <div class="container">
                    <br>

                    <div class="float-sm-left">
                        <div style="font-family: Roboto;font-style: normal;font-weight: normal;font-size: 28px;display: flex;align-items: center;color: #4650E5;">ยินดีต้อนรับ <?php echo $this->session->get("Full_name") ?></div>
                        <h2 style="font-family: Roboto;font-style: normal;font-weight: normal;">หลักสูตรของฉัน</h2>
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
                        foreach ($My_Course as $row) :
                            ?>
                            <div class="col-md-3 animate-box" id="card-responsive">
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
                                                        Free
                                                    </div>
                                                </li>
                                            </div>

                                        </ul>
                                        <?php
                                            $count_unit_index = 0;
                                            //$course_unit;
                                            foreach ($Percent_Pass_Unit as $row2) :

                                                if ($row2['course_id'] == $row['course_id']) {
                                                    $count_unit_index++;
                                                    //echo count($row2['course_unit']);
                                                    $course_unit = $row2['course_unit'];
                                                    $Array_Course_id[$row2['course_id']] = $row2;
                                                }

                                            endforeach;
                                            //echo $count_unit_index;
                                            if (isset($Array_Course_id)) {
                                                foreach ($Array_Course_id as $row3) :
                                                    if ($row3['course_id'] == $row['course_id']) {
                                                        //echo $course_unit;
                                                        $percentage = ($count_unit_index / $course_unit) * 100;

                                                        echo "<div class='progress'>";
                                                        echo "<div class='progress-bar progress-bar-success' style='width:" . $percentage . "%'>" . number_format($percentage, 2) . "%</div>";
                                                        echo "</div>";
                                                    }
                                                endforeach;
                                                if ($row3['course_id'] != $row['course_id']) {
                                                    echo "<div class='progress'>";
                                                    echo "<div class='progress-bar progress-bar-success' style='width:10%'>0%</div>";
                                                    echo "</div>";
                                                }
                                            }


                                            ?>
                                    </div>

                                </a>

                            </div>
                        <?php
                        endforeach;
                        ?>
                    </div>
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
            }, 6000);
        </script>
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