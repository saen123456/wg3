<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Workgress</title>
    <link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo base_url('plugins/fontawesome-free/css/all.min.css'); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('dist2/css/adminlte.min.css'); ?>">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('dist2/css/photo.css'); ?>" type="text/css" media="screen">
    <link href="<?php echo base_url('dist2/css/landing-page1.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/dropdown.css'); ?>" type="text/css" media="screen">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css'>


    <link rel="stylesheet" href="<?php echo base_url('https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'); ?>">

    <!-- Animate.css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/course/css/animate.css'); ?>">

    <!-- Theme style  -->
    <link rel="stylesheet" href="<?php echo base_url('assets/course/css/style.css'); ?>">

    <!-- Modernizr JS -->
    <script src="<?php echo base_url('assets/course/js/modernizr-2.6.2.min.js'); ?>"></script>

    <link rel="preload" href="<?php echo base_url('assets/css/footer.css'); ?>" as="style" onload="this.rel='stylesheet'">

    <!-- jquery  -->

    <link rel="stylesheet" href="<?php echo base_url('assets/VideoPlayer/plyr.css'); ?>">
    <script src="<?php echo base_url('assets/VideoPlayer/plyr.js'); ?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/VideoPlayer/inputtext-comment.css'); ?>">
    <script src="<?php echo base_url('https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'); ?>"></script>

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

            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Main content -->
        <?php
        $count = 0;
        foreach ($video_link as $row) :
            $Course_id = $row['course_id'];
            $Course_Name = $row['course_name'];
            $Course_Description = $row['course_description'];
            if ($count == 0) {
                $Video_Src = $row['video_link'];
            } else {
                break;
            }
            $count++;
        endforeach;
        //echo $count_playlist;
        ?>

        <br>
        <div class="course-title">
            <h4><?php echo $Course_Name; ?></h4>
        </div>

        <figure id="video_player">
            <div class="row">
                <div class="col-sm-8">
                    <div id="myDIV">
                        <video controls width="700px" id="player" var unit_index="1">
                            <source src="<?php echo $Video_Src; ?>" type="video/mp4">
                            <source src="<?php echo $Video_Src; ?>" type="video/ogg">
                            <source src="<?php echo $Video_Src; ?>" type="video/webm">
                            <source src="<?php echo $Video_Src; ?>" type="video/x-flv">
                        </video>
                        <br>
                        <p><?php echo $Course_Description; ?></p>

                    </div>
                    <div class="container">
                        <div id="myDIV2">
                        </div>
                    </div>

                    <br>


                </div>

                <div class="col-sm-4">
                    <div class="row">
                        <?php
                        //echo 
                        if (isset($have_document)) {
                            ?>

                            <div class="col-sm ">
                                <form action="<?= base_url('/courseuser/doucment/' . $Course_id) ?>" method="get" target="_blank">
                                    <button class="btn btn-light ">แหล่งข้อมูล</button>
                                </form>
                            </div>
                            <div class="col-sm">
                            </div>
                            <br>


                        <?php
                        }
                        ?>
                        <div id="certificate" class="certificate">
                            <div class="col-sm-5">
                            </div>
                        </div>
                    </div>
                    <div class="quiz-menu">
                        <figcaption>
                            <?php
                            $count = 0;
                            foreach ($video_link as $row) :
                                $count++;
                                ?>
                                <input class="form-check-input quiz-checkbox" type="checkbox" id="user-checkbox<?php echo $count; ?>" var user_checkbox="<?php echo $count ?>" var course_id="<?php echo $Course_id ?>">
                                <a href="<?php echo $row['video_link'] ?>" var unit_index="<?php echo $count ?>">
                                    <div class="quiz-menu-li">

                                        <?php echo $row['unit_name'] ?>
                                        <?php echo "<div class='float-right'>" . $row['video_time'] . "</div>" ?>
                                    </div>
                                </a>
                                <?php
                                    if (isset($question)) {
                                        foreach ($question as $row2) :
                                            if ($row2['unit_index'] == $row['unit_index']) {
                                                $count++;
                                                ?>
                                            <div class="td_minimal">
                                                <input class="form-check-input quiz-checkbox" type="checkbox" id="user-checkbox<?php echo $count; ?>" var user_checkbox="<?php echo $count ?>" var course_id="<?php echo $Course_id ?>">
                                            </div>
                                            <a href="<?php echo $row2['quiz_question_id'] ?>" var unit_index="<?php echo $count ?>">
                                                <div class="quiz-menu-li">
                                                    <?php echo "คำถามของ " . $row['unit_name'] . "<br>";
                                                                    echo  $row2['quiz_question_name']
                                                                    ?>
                                                </div>
                                            </a>
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
                        </figcaption>
                    </div>
                </div>
            </div>

        </figure>

        <script>
            const player = new Plyr('#player');
            var video_player = document.getElementById("video_player");
            links = video_player.getElementsByTagName('a');
            for (var i = 0; i < links.length; i++) {
                links[i].onclick = handler;

            }

            function handler(e) {
                var videotarget;
                var Unit_Index;
                var x = document.getElementById("myDIV");
                var quiz = document.getElementById("myDIV2");
                e.preventDefault();
                window.videotarget = this.getAttribute("href");

                window.Unit_Index = this.getAttribute('unit_index');



                if (window.videotarget.lastIndexOf('.') > 1) {
                    quiz.style.display = "none";
                    x.style.display = "block";

                    filename = window.videotarget.substr(0, window.videotarget.lastIndexOf('.')) || window.videotarget;
                    video = document.querySelector("#video_player video");
                    video.removeAttribute("poster");
                    source = document.querySelectorAll("#video_player video source");

                    source[0].src = window.videotarget;
                    video.load();
                    video.play();
                } else {
                    var user_id = <?php echo $this->session->get("User_id") ?>;

                    quiz.style.display = "block";
                    x.style.display = "none";

                    video = document.querySelector("#video_player video");
                    video.pause();
                    console.log(window.videotarget + " " + user_id);
                    $.ajax({
                        url: "<?= site_url('/CourseUserController/Select_User_Do_Answer') ?>",
                        method: "POST",
                        data: {
                            User_id: user_id,
                            Quiz_Question_id: window.videotarget,
                        },
                        success: function(data) {
                            const obj = JSON.parse(data);

                            if (obj.length > 0) {
                                if (obj[0].answer == 1) {
                                    $("#myDIV2").html("");
                                    $("#myDIV2").append("<h2>คุณเคยทำแบบทดสอบนี้ไปแล้ว</h2><br>");
                                    $("#myDIV2").append("<h4>คุณตอบถูก <i class='fa fa-check' aria-hidden='true'></i></h4>");
                                    $("#myDIV2").append("<br><button class='btn btn-primary btn-submit-quiz'>ทำแบบทดสอบอีกครั้ง</button>");
                                    $(document).ready(function() {
                                        $(".btn-submit-quiz").click(function() {
                                            var base_url = '<?= base_url('CourseUserController/Select_Quiz_Video') ?>';
                                            $.ajax({
                                                url: base_url,
                                                method: "POST",
                                                data: {
                                                    quiz_id: window.videotarget,
                                                },
                                                success: function(data) {
                                                    const obj = JSON.parse(data);
                                                    console.log(obj);
                                                    $("#myDIV2").html("");

                                                    $("#myDIV2").append("" + obj[0].quiz_question_name + "<br>");
                                                    for (i = 0; i < obj.length; i++) {
                                                        $("#myDIV2").append("<br><div class='input-group'><span class='input-group-addon'>" +
                                                            "<input type='radio' aria-label='...' style='width:20px; height:20px' name='Check_Answer2' id='Check_Answer2' data-answer-choice='" + (i + 1) + "' value='" + (i + 1) + "'></span>&nbsp;&nbsp;&nbsp;" +
                                                            "<input type='text' class='form-control'  data-quiz-id='" + obj[i].quiz_question_id + "' aria-label='...' name='Choice_Answer2_" + (i + 1) + "' id='quiz_question_id' value='" + obj[i].quiz_answer_name + "'  readonly> " +
                                                            "</div><br>"
                                                        );
                                                    }

                                                    $("#myDIV2").append("<button type='button' class='btn btn-primary float-right user_send_answer'>ยืนยัน</button>");
                                                }
                                            });
                                        });
                                    });
                                } else {
                                    $("#myDIV2").html("");
                                    $("#myDIV2").append("<h2>คุณเคยทำแบบทดสอบนี้ไปแล้ว</h2><br>");
                                    $("#myDIV2").append("<h4>คุณตอบผิด <i class='fa fa-times' aria-hidden='true'></i></h4>");
                                    $("#myDIV2").append("<br><button class='btn btn-primary btn-submit-quiz'>ทำแบบทดสอบอีกครั้ง</button>");
                                    $(document).ready(function() {
                                        $(".btn-submit-quiz").click(function() {
                                            var base_url = '<?= base_url('CourseUserController/Select_Quiz_Video') ?>';
                                            $.ajax({
                                                url: base_url,
                                                method: "POST",
                                                data: {
                                                    quiz_id: window.videotarget,
                                                },
                                                success: function(data) {
                                                    const obj = JSON.parse(data);
                                                    console.log("question : " + obj[0].quiz_question_name);
                                                    $("#myDIV2").html("");
                                                    //alert("คำถาม : " + obj[0].quiz_question_name + "\nchoice = " + obj[0].quiz_answer_name + "\nchoice = " + obj[1].quiz_answer_name + "\nchoice = " + obj[2].quiz_answer_name + "\nchoice = " + obj[3].quiz_answer_name);
                                                    $("#myDIV2").append("" + obj[0].quiz_question_name + "<br>");
                                                    for (i = 0; i < obj.length; i++) {
                                                        $("#myDIV2").append("<br><div class='input-group'><span class='input-group-addon'>" +
                                                            "<input type='radio' aria-label='...' style='width:20px; height:20px' name='Check_Answer2' id='Check_Answer2' data-answer-choice='" + (i + 1) + "' value='" + (i + 1) + "'></span>&nbsp;&nbsp;&nbsp;" +
                                                            "<input type='text' class='form-control'  data-quiz-id='" + obj[i].quiz_question_id + "' aria-label='...' name='Choice_Answer2_" + (i + 1) + "' id='quiz_question_id' value='" + obj[i].quiz_answer_name + "'  readonly> " +
                                                            "</div><br>"
                                                        );
                                                    }
                                                    // $("#myDIV2").append("<button type='button' class='btn btn-danger float-left'>ยกเลิก</button>");
                                                    $("#myDIV2").append("<button type='button' class='btn btn-primary float-right user_send_answer'>ยืนยัน</button>");
                                                }
                                            });
                                        });
                                    });

                                }
                            } else {

                                $.ajax({

                                    url: '<?= base_url('CourseUserController/Select_Quiz_Video') ?>',
                                    method: "POST",
                                    data: {
                                        quiz_id: window.videotarget,
                                    },
                                    success: function(data) {
                                        const obj = JSON.parse(data);
                                        console.log("question : " + obj[0].quiz_question_name);
                                        $("#myDIV2").html("");
                                        //alert("คำถาม : " + obj[0].quiz_question_name + "\nchoice = " + obj[0].quiz_answer_name + "\nchoice = " + obj[1].quiz_answer_name + "\nchoice = " + obj[2].quiz_answer_name + "\nchoice = " + obj[3].quiz_answer_name);
                                        $("#myDIV2").append("" + obj[0].quiz_question_name + "<br>");
                                        for (i = 0; i < obj.length; i++) {

                                            $("#myDIV2").append("<br><div class='input-group'><span class='input-group-addon'>" +
                                                "<input type='radio' aria-label='...' style='width:20px; height:20px' name='Check_Answer2' id='Check_Answer2' data-answer-choice='" + (i + 1) + "' value='" + (i + 1) + "'></span>&nbsp;&nbsp;&nbsp;" +
                                                "<input type='text' class='form-control'  data-quiz-id='" + obj[i].quiz_question_id + "' aria-label='...' name='Choice_Answer2_" + (i + 1) + "' id='quiz_question_id' value='" + obj[i].quiz_answer_name + "'  readonly> " +
                                                "</div><br>"
                                            );
                                        }
                                        // $("#myDIV2").append("<button type='button' class='btn btn-danger float-left'>ยกเลิก</button>");
                                        $("#myDIV2").append("<button type='button' class='btn btn-primary float-right user_send_answer'>ยืนยัน</button>");
                                    }
                                });
                            }

                        }
                    });

                }
            }


            $(document).ready(function() {

                var user_id3 = <?php echo $this->session->get("User_id") ?>;
                var User_Check = <?php echo json_encode($count_playlist); ?>;

                var count_pass = 0;
                $.ajax({
                    url: "<?= site_url('/CourseUserController/Already_User_Pass_Unit') ?>",
                    method: "POST",
                    data: {
                        User_id: user_id3,
                        Course_id: window.Course_id3,
                    },
                    success: function(data) {
                        const obj = JSON.parse(data);

                        for (var i = 0; i < obj.length; i++) {
                            $('#user-checkbox' + obj[i].unit_index + '').prop('checked', true);
                            count_pass++;
                        }

                        if (User_Check == count_pass) {
                            $("#certificate").html("");
                            $("#certificate").append("<form action='<?= base_url('/courseuser/certificate/' . $Course_id) ?>' method='get' target='_blank'><div class='text-right'><button class='btn btn-success '>ใบรับรองจบ</button></div></form>");
                        }

                    },
                    error: function(data) {
                        console.log(data);
                    }
                });

            });

            var Radio_Answer_Choice;
            var Course_id3;

            var user_id = <?php echo $this->session->get("User_id") ?>;
            window.Course_id3 = <?php echo json_encode($Course_id); ?>;

            $(document).ready(function() {
                $('#myDIV2').on("click", "input", function() {
                    window.Radio_Answer_Choice = $(this).val();

                });

                $(document).on("click", ".user_send_answer", function() {
                    var User_Check = <?php echo json_encode($count_playlist); ?>;

                    var Quiz_Question_id = $("#quiz_question_id").attr('data-quiz-id');

                    var base_url = '<?= base_url('course/edit/') ?>';

                    $.ajax({
                        url: "<?= site_url('/CourseUserController/Check_User_Answer') ?>",
                        method: "POST",
                        data: {
                            Quiz_Question_id: Quiz_Question_id,
                        },
                        success: function(data) {
                            const obj = JSON.parse(data);
                            console.log(obj);
                            if (obj.length > 0) {
                                var Answer = 1;
                                for (i = 0; i < obj.length; i++) {
                                    if (obj[i].quiz_answer_correct != 1) {
                                        Answer++;
                                    } else {

                                        if (Answer == window.Radio_Answer_Choice) {

                                            $.ajax({
                                                url: "<?= site_url('/CourseUserController/Insert_User_Answer') ?>",
                                                method: "POST",
                                                data: {
                                                    User_id: user_id,
                                                    Quiz_Question_id: Quiz_Question_id,
                                                    Answer: 1,
                                                },
                                                success: function(data) {

                                                    $("#myDIV2").html("");
                                                    $("#myDIV2").append("<h4>คุณตอบถูก <i class='fa fa-check' aria-hidden='true'></i></h4>");
                                                    $("#myDIV2").append("<br><button class='btn btn-primary btn-submit-quiz'>ทำแบบทดสอบอีกครั้ง</button>");
                                                    $(document).ready(function() {
                                                        $(".btn-submit-quiz").click(function() {
                                                            var base_url = '<?= base_url('CourseUserController/Select_Quiz_Video') ?>';

                                                            $.ajax({
                                                                url: base_url,
                                                                method: "POST",
                                                                data: {
                                                                    quiz_id: window.videotarget,
                                                                },
                                                                success: function(data) {
                                                                    const obj = JSON.parse(data);
                                                                    console.log(obj);
                                                                    $("#myDIV2").html("");

                                                                    for (i = 0; i < obj.length; i++) {
                                                                        $("#myDIV2").append("<br><div class='input-group'><span class='input-group-addon'>" +
                                                                            "<input type='radio' aria-label='...' style='width:20px; height:20px' name='Check_Answer2' id='Check_Answer2' data-answer-choice='" + (i + 1) + "' value='" + (i + 1) + "'></span>&nbsp;&nbsp;&nbsp;" +
                                                                            "<input type='text' class='form-control'  data-quiz-id='" + obj[i].quiz_question_id + "' aria-label='...' name='Choice_Answer2_" + (i + 1) + "' id='quiz_question_id' value='" + obj[i].quiz_answer_name + "'  readonly> " +
                                                                            "</div><br>"
                                                                        );
                                                                    }

                                                                    $("#myDIV2").append("<button type='button' class='btn btn-primary float-right user_send_answer'>ยืนยัน</button>");
                                                                }
                                                            });
                                                        });
                                                    });
                                                }
                                            });

                                            /*
                                            //สำหรับเวลาตอบคำถามถูกจะเอาเช็คให้เอง
                                            */
                                            $.ajax({
                                                url: "<?= site_url('/CourseUserController/Check_User_Pass_Unit') ?>",
                                                method: "POST",
                                                data: {
                                                    User_id: window.User_id,
                                                    Course_id: window.Course_id3,
                                                    Unit_Index: window.Unit_Index,
                                                    Pass: 1,
                                                    Course_Unit: User_Check
                                                },
                                                success: function(data) {
                                                    /*const obj = JSON.parse(data);
                                                    console.log(data);*/
                                                    $('#user-checkbox' + window.Unit_Index + '').prop('checked', true);
                                                    $.ajax({
                                                        url: "<?= site_url('/CourseUserController/Already_User_Pass_Unit') ?>",
                                                        method: "POST",
                                                        data: {
                                                            User_id: window.User_id,
                                                            Course_id: window.Course_id3,
                                                        },
                                                        success: function(data) {
                                                            const obj = JSON.parse(data);
                                                            console.log(obj.length);
                                                            var count_pass = 0;
                                                            for (var i = 0; i < obj.length; i++) {
                                                                count_pass++;
                                                            }
                                                            //console.log(count_pass + " " + User_Check + " " + count_pass);
                                                            if (User_Check == count_pass) {
                                                                $("#certificate").html("");
                                                                $("#certificate").append("<form action='<?= base_url('/courseuser/certificate/' . $Course_id) ?>' method='get' target='_blank'><div class='text-left'><button class='btn btn-success '>ใบรับรองจบ</button></div></form>");
                                                            }

                                                        },
                                                        error: function(data) {
                                                            console.log(data);
                                                        }
                                                    });

                                                }
                                            });
                                            /*
                                            //สำหรับเวลาตอบคำถามถูกจะเอาเช็คให้เอง
                                            */


                                        } else {
                                            $.ajax({
                                                url: "<?= site_url('/CourseUserController/Insert_User_Answer') ?>",
                                                method: "POST",
                                                data: {
                                                    User_id: user_id,
                                                    Quiz_Question_id: Quiz_Question_id,
                                                    Answer: 0,
                                                },
                                                success: function(data) {

                                                    $("#myDIV2").html("");
                                                    $("#myDIV2").append("<h4>คุณตอบผิด <i class='fa fa-times' aria-hidden='true'></i></h4>");
                                                    $("#myDIV2").append("<br><button class='btn btn-primary btn-submit-quiz'>ทำแบบทดสอบอีกครั้ง</button>");

                                                    $(document).ready(function() {
                                                        $(".btn-submit-quiz").click(function() {
                                                            var base_url = '<?= base_url('CourseUserController/Select_Quiz_Video') ?>';

                                                            $.ajax({
                                                                url: base_url,
                                                                method: "POST",
                                                                data: {
                                                                    quiz_id: window.videotarget,
                                                                },
                                                                success: function(data) {
                                                                    const obj = JSON.parse(data);
                                                                    console.log(obj);
                                                                    $("#myDIV2").html("");

                                                                    for (i = 0; i < obj.length; i++) {
                                                                        $("#myDIV2").append("<br><div class='input-group'><span class='input-group-addon'>" +
                                                                            "<input type='radio' aria-label='...' style='width:20px; height:20px' name='Check_Answer2' id='Check_Answer2' data-answer-choice='" + (i + 1) + "' value='" + (i + 1) + "'></span>&nbsp;&nbsp;&nbsp;" +
                                                                            "<input type='text' class='form-control'  data-quiz-id='" + obj[i].quiz_question_id + "' aria-label='...' name='Choice_Answer2_" + (i + 1) + "' id='quiz_question_id' value='" + obj[i].quiz_answer_name + "'  readonly> " +
                                                                            "</div><br>"
                                                                        );
                                                                    }

                                                                    $("#myDIV2").append("<button type='button' class='btn btn-primary float-right user_send_answer'>ยืนยัน</button>");
                                                                }
                                                            });
                                                        });
                                                    });
                                                }
                                            });


                                            /*
                                            //สำหรับเวลาตอบคำถามผิดจะเอาที่เช็คออกให้เอง
                                            */
                                            $.ajax({
                                                url: "<?= site_url('/CourseUserController/Check_User_Pass_Unit') ?>",
                                                method: "POST",
                                                data: {
                                                    User_id: window.User_id,
                                                    Course_id: window.Course_id3,
                                                    Unit_Index: window.Unit_Index,
                                                    Pass: 0,
                                                    Course_Unit: User_Check
                                                },
                                                success: function(data) {

                                                    $('#user-checkbox' + window.Unit_Index + '').prop('checked', false);
                                                    $("#certificate").html("");
                                                }
                                            });

                                        }

                                    }

                                }
                            }

                        },
                        error: function(data) {
                            console.log("Error: " + data);
                        }
                    });
                });
            });


            /*
            //function สำหรับให้ user กด check เอง
            */
            var Course_id2;
            var User_id;
            $(document).ready(function() {
                var User_Check = <?php echo json_encode($count_playlist); ?>;
                window.User_id = <?php echo $this->session->get("User_id"); ?>;

                for (var i = 1; i <= User_Check; i++) {
                    $('#user-checkbox' + i + '').on('change', function() {


                        $("#user-checkbox" + i + "").attr("value", $(this).attr('user_checkbox'));
                        var User_Checkbox = $(this).attr('user_checkbox');

                        $("#user-checkbox" + i + "").attr("value", $(this).attr('course_id'));
                        window.Course_id2 = $(this).attr('course_id');


                        if ($(this).prop("checked") == true) {

                            $.ajax({
                                url: "<?= site_url('/CourseUserController/Check_User_Pass_Unit') ?>",
                                method: "POST",
                                data: {
                                    User_id: window.User_id,
                                    Course_id: window.Course_id2,
                                    Unit_Index: User_Checkbox,
                                    Pass: 1,
                                    Course_Unit: User_Check
                                },
                                success: function(data) {
                                    $.ajax({
                                        url: "<?= site_url('/CourseUserController/Already_User_Pass_Unit') ?>",
                                        method: "POST",
                                        data: {
                                            User_id: window.User_id,
                                            Course_id: window.Course_id2,
                                        },
                                        success: function(data) {
                                            const obj = JSON.parse(data);
                                            console.log(obj.length);
                                            var count_pass = 0;
                                            for (var i = 0; i < obj.length; i++) {
                                                count_pass++;
                                            }
                                            console.log(User_Check + " " + count_pass);
                                            if (User_Check == count_pass) {
                                                console.log("pass");
                                                $("#certificate").html("");
                                                $("#certificate").append("<form action='<?= base_url('/courseuser/certificate/' . $Course_id) ?>' method='get' target='_blank'><div class='text-left'><button class='btn btn-success '>ใบรับรองจบ</button></div></form>");
                                            }

                                        },
                                        error: function(data) {
                                            console.log(data);
                                        }
                                    });
                                }
                            });


                        } else if ($(this).prop("checked") == false) {


                            $.ajax({
                                url: "<?= site_url('/CourseUserController/Delete_User_Pass_Unit') ?>",
                                method: "POST",
                                data: {
                                    User_id: window.User_id,
                                    Course_id: window.Course_id2,
                                    Unit_Index: User_Checkbox,
                                },
                                success: function(data) {
                                    $("#certificate").html("");
                                }
                            });


                        }


                    });

                }


            });
            /*
            //end function สำหรับให้ user กด check เอง
            */

            /*
            //function auto check if video end
            */
            $(document).ready(function() {
                var User_Check = <?php echo json_encode($count_playlist); ?>;
                video = document.querySelector("#video_player video");
                Unit_Index2 = video.getAttribute('unit_index');

                video.ontimeupdate = function() {
                    CheckVideoEnd()
                };

                function CheckVideoEnd() {
                    //console.log(video.currentTime / 60);
                    if (video.ended) {
                        if (window.Unit_Index == null) {
                            console.log("end\n" + Unit_Index2);
                            $.ajax({
                                url: "<?= site_url('/CourseUserController/Check_User_Pass_Unit') ?>",
                                method: "POST",
                                data: {
                                    User_id: window.User_id,
                                    Course_id: window.Course_id3,
                                    Unit_Index: Unit_Index2,
                                    Pass: 1,
                                    Course_Unit: User_Check
                                },
                                success: function(data) {

                                    $('#user-checkbox' + Unit_Index2 + '').prop('checked', true);
                                    $.ajax({
                                        url: "<?= site_url('/CourseUserController/Already_User_Pass_Unit') ?>",
                                        method: "POST",
                                        data: {
                                            User_id: window.User_id,
                                            Course_id: window.Course_id3,
                                        },
                                        success: function(data) {
                                            const obj = JSON.parse(data);
                                            console.log(obj.length);
                                            var count_pass = 0;
                                            for (var i = 0; i < obj.length; i++) {
                                                count_pass++;
                                            }
                                            //console.log(count_pass + " " + User_Check + " " + count_pass);
                                            if (User_Check == count_pass) {
                                                $("#certificate").html("");
                                                $("#certificate").append("<form action='<?= base_url('/courseuser/certificate/' . $Course_id) ?>' method='get' target='_blank'><div class='text-left'><button class='btn btn-success '>ใบรับรองจบ</button></div></form>");
                                            }

                                        },
                                        error: function(data) {
                                            console.log(data);
                                        }
                                    });

                                }
                            });


                        } else {
                            console.log("end\n" + window.Unit_Index);
                            $.ajax({
                                url: "<?= site_url('/CourseUserController/Check_User_Pass_Unit') ?>",
                                method: "POST",
                                data: {
                                    User_id: window.User_id,
                                    Course_id: window.Course_id3,
                                    Unit_Index: Unit_Index,
                                    Pass: 1,
                                    Course_Unit: User_Check
                                },
                                success: function(data) {
                                    $('#user-checkbox' + window.Unit_Index + '').prop('checked', true);
                                    $.ajax({
                                        url: "<?= site_url('/CourseUserController/Already_User_Pass_Unit') ?>",
                                        method: "POST",
                                        data: {
                                            User_id: window.User_id,
                                            Course_id: window.Course_id3,
                                        },
                                        success: function(data) {
                                            const obj = JSON.parse(data);
                                            console.log(obj.length);
                                            var count_pass = 0;
                                            for (var i = 0; i < obj.length; i++) {
                                                count_pass++;
                                            }

                                            if (User_Check == count_pass) {
                                                $("#certificate").html("");
                                                $("#certificate").append("<form action='<?= base_url('/courseuser/certificate/' . $Course_id) ?>' method='get' target='_blank'><div class='text-left'><button class='btn btn-success '>ใบรับรองจบ</button></div></form>");
                                            }

                                        },
                                        error: function(data) {
                                            console.log(data);
                                        }
                                    });
                                }
                            });


                        }
                    }
                }
            });
            /*
            //end function auto check if video end
            */
        </script>

        <!-- /.content -->
        <!-- /.content-wrapper -->

        <!-- Main Footer -->

        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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
    </div>
    <!-- Content Wrapper. Contains page content -->
    <!-- ./wrapper -->

    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 6000);
    </script>

</html>