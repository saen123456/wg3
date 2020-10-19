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
        <script src="<?php echo base_url('assets/course/js/modernizr-2.6.2.min.js'); ?>"></script>

        <link rel="preload" href="<?php echo base_url('assets/css/footer.css'); ?> " as="style" onload="this.rel='stylesheet'">


        <!-- CSS Card Course -->
        <link rel="preload" href="<?php echo base_url('assets/css/categorycourse.css'); ?>" as="style" onload="this.rel='stylesheet'">
        <link rel="preload" href="<?php echo base_url('assets/css/coursename.css'); ?>" as="style" onload="this.rel='stylesheet'">

        <!-- CSS Step by Step progress -->
        <link rel="preload" href="<?php echo base_url('assets/course/css/stepbystep.css'); ?>" as="style" onload="this.rel='stylesheet'">
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
    <?php
    foreach ($check_status as $row) :
        $check_status = $row['status'];
    endforeach;
    if ($check_status == 'non_active' && $this->session->get("User_JoinCourse") == false) {
        ?>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h5 class="modal-title" id="exampleModalLabel">แจ้งเตือน !!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <center>
                            <h3>คอร์สนี้ได้ทำการปิดลงไปแล้ว</h3>
                            <h1><i class="fas fa-exclamation-circle fa-3x "></i></h1>
                        </center>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } else { }
    ?>
    <div class="modal fade" id="modal-cancel-course">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">ยกเลิกการสมัครหลักสูตร</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>ยืนยันที่จะยกเลิกใช่หรือไม่ ?&hellip;</p>
                    <p id="output3"></p>
                    <!-- <input id="user_id" name="user_id" value="" /> -->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">ยกเลิก</button>
                    <button type="button" class="btn btn-primary btn-cancel-course">ยืนยัน</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

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
                <?php
                if ($this->session->get("User_id")) {
                    ?>
                    <div class="navbar-collapse collapse w-200 order-3 dual-collapse upper" id="navbarSupportedContent">
                        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                            <!-- Messages Dropdown Menu -->
                            <div class="input-group input-group-sm">
                                <!-- Notifications Dropdown Menu -->
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php
                                        if ($this->session->get("Picture")) { ?>
                                        <img src="<?php echo base_url('' . $this->session->get("Picture") . ''); ?>" width="35" height="35" class="rounded-circle"><?php
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
                <?php
                } else { ?>
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
                <?php
                }
                ?>
            </div>
        </nav>
        <!-- /.navbar -->
        <br><br>
        <?php
        foreach ($Courseinfo as $row) :
            $Course_image = $row['image_course'];
            $Course_id = $row['course_id'];
        endforeach;

        ?>
        <?php
        if ($this->session->get("User_JoinCourse") == true) {
            ?>
            <div class="stepbystep">
                <ul>
                    <?php
                        $count = 0;
                        foreach ($video_link as $row) :
                            //echo $row['video_time'];
                            $count++;
                            ?>
                        <li>
                            <!-- <img src="<?php echo $Course_image; ?>"><br> -->
                            <!-- <i class="fas fa-walking" style="font-size: 2.5em;"></i><br> -->

                            <?php
                                    //echo $count;
                                    foreach ($User_Pass_Unit as $row3) :
                                        if ($row3['unit_index'] == $count) {
                                            $Array_Unit_index[$row3['unit_index']] = $row3;
                                            //echo $row['unit_index'];
                                            ?>
                            <?php
                                        }
                                    endforeach;
                                    if (isset($Array_Unit_index)) {
                                        foreach ($Array_Unit_index as $row5) :
                                        //echo $row5['unit_index'];

                                        endforeach;

                                        if ($row5['unit_index'] == $count && $count != $count_playlist) {
                                            echo " <i class='fas fa-award' style='font-size: 2.5em;'></i><br>";
                                            echo "<i class='fa fa-check' style='background: #148e14;'></i>";
                                        } else if ($row5['unit_index'] == $count && $count == $count_playlist) {
                                            echo " <i class='fas fa-graduation-cap' style='font-size: 2.5em;'></i><br>";
                                            echo "<i class='fa fa-check' style='background: #148e14;'></i>";
                                        } else {
                                            echo " <i class='fas fa-chalkboard-teacher' style='font-size: 2.5em;'></i><br>";
                                            echo "<i class='fa fa-times' style='background: #ccc;'></i>";
                                        }
                                    } else {
                                        echo " <i class='fas fa-chalkboard-teacher' style='font-size: 2.5em;'></i><br>";
                                        echo "<i class='fa fa-times' style='background: #ccc;'></i>";
                                    }

                                    ?>

                            <p><?php echo $row['unit_name'] ?></p>
                        </li>
                        <?php
                                if (isset($question)) {
                                    foreach ($question as $row2) :

                                        if ($row2['unit_index'] == $row['unit_index']) {
                                            $count++;
                                            ?>
                                    <li>
                                        <!-- <img src="<?php echo $Course_image; ?>"><br> -->
                                        <!-- <i class="fas fa-walking" style="font-size: 2.5em;"></i><br> -->
                                        <?php
                                                            foreach ($User_Pass_Unit as $row4) :
                                                                if ($row4['unit_index'] == $count) {
                                                                    $Array_Unit_index2[$row4['unit_index']] = $row4;
                                                                }
                                                            endforeach;
                                                            //echo $count;
                                                            if (isset($Array_Unit_index2)) {
                                                                //echo $count;
                                                                foreach ($Array_Unit_index2 as $row6) :
                                                                //echo $row5['unit_index'];
                                                                endforeach;
                                                                //echo $row6['unit_index'];


                                                                if ($row6['unit_index'] == $count && $count != $count_playlist) {
                                                                    echo " <i class='fas fa-award' style='font-size: 2.5em;'></i><br>";
                                                                    echo "<i class='fa fa-check' style='background: #148e14;'></i>";
                                                                } else if ($row6['unit_index'] == $count && $count == $count_playlist) {
                                                                    echo " <i class='fas fa-graduation-cap' style='font-size: 2.5em;'></i><br>";
                                                                    echo "<i class='fa fa-check' style='background: #148e14;'></i>";
                                                                } else {
                                                                    echo " <i class='fas fa-chalkboard-teacher' style='font-size: 2.5em;'></i><br>";
                                                                    echo "<i class='fa fa-times' style='background: #ccc;'></i>";
                                                                }
                                                            } else {
                                                                echo " <i class='fas fa-chalkboard-teacher' style='font-size: 2.5em;'></i><br>";
                                                                echo "<i class='fa fa-times' style='background: #ccc;'></i>";
                                                            }
                                                            //echo $row['unit_index'];
                                                            ?>
                                        <p><?php echo "คำถามของเนื้อหาที่" . $row['unit_index'] ?></p>

                                    </li>
                                <?php
                                                }
                                                ?>
                        <?php
                                    endforeach;
                                }
                                ?>
                    <?php
                        endforeach;

                        ?>

                </ul>
            </div>
        <?php
        }
        ?>
        <?php

        $count_video_time = 0.00;
        $count_video_time2 = 0.00;
        foreach ($video_link as $row7) :
            $count_video_time += str_replace(':', '.', $row7['video_time']);
        endforeach;
        if ($count_video_time > 60.00) {
            $format = '%02d:%02d';
            $hours = floor($count_video_time / 60);
            $minutes = ($count_video_time % 60);
            $count_video_time2 = sprintf($format, $hours, $minutes);
        } else {
            $count_video_time2 = $count_video_time;
        }


        $unit_count = 0;
        foreach ($unit as $row) :
            $unit_count++;
        endforeach
        ?>

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="row">
                <?php
                foreach ($Courseinfo as $row) :
                    $Course_id =  $row['course_id'];
                    $Course_image = $row['image_course'];
                    ?>
                    <div class="col-6 padding-0">
                        <?php
                            if ($row['image_course']) { ?>
                            <img src="<?php echo $row['image_course'] ?>" class="image-responsive">
                        <?php
                            } else { ?>
                            <img src="<?= base_url('assets/img/dash_course_illustration.png') ?>" class="image-responsive">

                        <?php
                            }
                            ?>

                    </div>
                    <div class="col-6 padding-0">
                        <div class="title-card">
                            <div class="row">
                                <div class="col-12">
                                    <div class="title">
                                        <p id="header"><?php echo $row['course_name'] ?></p>

                                        <!-- <p id="text-info"><span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span> &nbsp; (100) &nbsp; -->
                                        จำนวนผู้เรียน <?php echo $count_student; ?> คน</p>
                                        <p id="text-info">สร้างโดย <?php echo $row['full_name'] ?> &nbsp;&nbsp; อัพเดทล่าสุด <?php echo substr($row['update_date'], 0, strrpos($row['update_date'], ' ')); ?> </p>
                                        <p id="text-info">ระยะเวลาหลักสูตร
                                            <?php
                                                if ($count_video_time > 60) {
                                                    echo $count_video_time2 . " ชั่วโมง";
                                                } else {
                                                    echo $count_video_time2 . " นาที";
                                                }

                                                ?> &nbsp; TH </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="container body" id="container-padding">
                <!-- <div class="row">
                    <div class="col-6">
                        <p>สิ่งที่จะได้เรียนรู้</p>
                        <p class="line-body"></p>
                        <div class="block"></div>
                        <div class="card-ready">
                            <div class="row">

                                <div class="col-6">
                                    <div class="body-ready">
                                        <p><span class="fa fa-check-circle check"></span>ทักษะความเป็นผู้นำ</p>
                                        <p><span class="fa fa-check-circle check"></span>ทักษะความเป็นผู้นำ</p>
                                        <p><span class="fa fa-check-circle check"></span>ทักษะความเป็นผู้นำ</p>
                                        <p><span class="fa fa-check-circle check"></span>ทักษะความเป็นผู้นำ</p>
                                        <p><span class="fa fa-check-circle check"></span>ทักษะความเป็นผู้นำ</p>
                                        <p><span class="fa fa-check-circle check"></span>ทักษะความเป็นผู้นำ</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="body-ready2">
                                        <p><span class="fa fa-check-circle check"></span>ทักษะความเป็นผู้นำ</p>
                                        <p><span class="fa fa-check-circle check"></span>ทักษะความเป็นผู้นำ</p>
                                        <p><span class="fa fa-check-circle check"></span>ทักษะความเป็นผู้นำ</p>
                                        <p><span class="fa fa-check-circle check"></span>ทักษะความเป็นผู้นำ</p>
                                        <p><span class="fa fa-check-circle check"></span>ทักษะความเป็นผู้นำ</p>
                                        <p><span class="fa fa-check-circle check"></span>ทักษะความเป็นผู้นำ</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                </div> -->
                <div class="row justify-content-center">
                    <div class="col-6">
                        <div class="block"></div>
                        <div class="block-sell">
                            <div class="body-block">
                                <div class="row ">
                                    <div class="col-6">
                                        <p class="decoration">THB 0 BATH </p>
                                        <p class="w-b"> <?php
                                                            if ($row['course_price'] == '0') {
                                                                echo "Free";
                                                            } else {
                                                                //echo $row['course_price'] . " THB";
                                                                echo "0 THB";
                                                            }
                                                            ?> </p>
                                    </div>
                                    <div class="col-6">
                                        <div class="block"></div>
                                        <div class="block"></div>
                                        <?php
                                            if ($this->session->get("User_JoinCourse") == false) {
                                                ?>
                                            <a href="<?= base_url('/subscribe/course/' . $row['course_id']); ?>" class="btn-center"> <button class="btn btn-default btn-buy">
                                                    <p class="text-register">ลงทะเบียนตอนนี้</p>
                                                </button> </a>

                                        <?php
                                            } else {

                                                ?>
                                            <a href="<?= base_url('/courseuser/learn/' . $row['course_id']); ?>" class="btn-center"> <button class="btn btn-default btn-buy">
                                                    <p class="text-register">ไปยังหลักสูตร</p>
                                                </button> </a>
                                            <a data-toggle="modal" data-target="#modal-cancel-course" class="btn-center sent_cancel_course" var course_id="<?php echo $row['course_id'] ?>"> <button class="btn btn-default btn-cancel">
                                                    <p class="text-cancel">ยกเลิกหลักสูตร</p>
                                                </button> </a>
                                        <?php
                                            }
                                            ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block"></div>
                        <div class="block-detail">
                            <div class="body-block2">
                                <p id="text-info2">ข้อมูลคอสเรียน</p>
                                <div class="block-detail-body">
                                    <p id="text-info2"><span class="fa fa-file"></span>&nbsp;&nbsp;&nbsp;<?php echo $unit_count; ?> บทเรียน</p>
                                    <p id="text-info2"><span class="fa fa-certificate"></span>&nbsp;&nbsp;มีใบรับรองจบ</p>
                                    <p id="text-info2"><span class="fa fa-graduation-cap"></span>&nbsp;เข้าใช้งานได้ตลอดชีพ</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    endforeach;
    ?>
    <div class="block"></div>

    <div class="row justify-content-center">

        <div class="col-10">
            <div class="row">
                <div class="col-6">
                    <p class="p-header">เนื้อหาหลักสูตร</p>
                </div>
                <div class="col-3 ">
                    <p class="p-detail">จำนวนคลิป <?php echo $unit_count; ?> </p>
                </div>
                <div class="col-3">
                    <p class="p-detail">เวลาทั้งหมด <?php
                                                    if ($count_video_time > 60) {
                                                        echo $count_video_time2 . " ชั่วโมง";
                                                    } else {
                                                        echo $count_video_time2 . " นาที";
                                                    }

                                                    ?> </p>

                </div>
            </div>

            <p class="line-body"></p>
            <?php
            foreach ($unit as $row) :
                ?>
                <div class="block-mini"></div>
                <!-- /.for วน -->
                <a href="<?= base_url('/courseuser/learn/' . $Course_id); ?>">
                    <div class="video-detail">
                        <div class="row">

                            <div class="col-auto mr-auto">
                                <div class="margin-detail">
                                    <p><span class="fa fa-play"></span>&nbsp;&nbsp; <?php echo $row['unit_name'] ?></p>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="margin-detail">
                                    <?php
                                        foreach ($video_link as $row7) :
                                            if ($row['video_id'] == $row7['video_id']) {
                                                echo "<p>" . $row7['video_time'] . "<p>";
                                            }
                                        endforeach;
                                        ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </a>
            <?php
            endforeach;
            ?>
            <!--video-->
        </div>


    </div>
    <div class="block">

    </div>

    </header>
    <!-- /.content-header -->

    <!-- Main content -->
    <br>
    <div class="container">
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
                                <li><a href="<?= base_url('/home'); ?>">หน้าแรก</a></li>
                                <li><a href="#">เกี่ยวกับเรา</a></li>
                                <li><a href="<?= base_url('/category/alldevelopment?category=all'); ?>">หลักสูตรทั้งหมด</a></li>
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
                                            <label class="custom-control-label" for="exampleCheck1">ฉัน ยินยอม <a href="<?php echo base_url('/termofservice'); ?>" target="_blank">เงื่อนไขการให้บริการ</a>.</label>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myModal').modal('show');
            $("#myModal").on('hidden.bs.modal', function() {
                history.back();
            });
        });
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 6000);
        var course_id3;
        var user_id3;
        $(document).ready(function() {
            $(".sent_cancel_course").click(function() {
                $("#course_id").attr("value", $(this).attr('course_id'));
                window.course_id3 = $(this).attr('course_id');
                window.user_id3 = <?php echo json_encode($this->session->get("User_id")) ?>;
                //console.log(window.course_id3 + " " + window.user_id3);
            });
        });
        var base_url = '<?= base_url('home') ?>';
        $(".btn-cancel-course").click(function() {
            $.ajax({
                url: '<?= site_url('/CourseUserController/Cancel_Course') ?>',
                method: "POST",
                data: {
                    user_id: window.user_id3,
                    course_id: window.course_id3,
                },
                success: function(data) {
                    window.location.href = '<?= base_url('home') ?>';
                }
            });
        });
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