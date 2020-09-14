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


        <figure id="video_player">
            <div class="row">
                <div class="col-sm-8">
                    <div id="myDIV">
                        <video controls width="700px" id="player">
                            <source src="https://storage.googleapis.com/workgress/200415_Selenium_tool_Pipat55.mp4" type="video/mp4">
                        </video>
                    </div>
                    <div id="myDIV2">
                    </div>
                    <br>
                    <?php
                    foreach ($video_link as $row) :
                        $Course_Name = $row['course_name'];
                    endforeach;
                    ?>
                    <!-- <div class="d-flex justify-content-center">
                        <img src="<?php echo base_url('assets/img/course-profile.png'); ?>" class="img-profile" alt="Responsive image">
                        <img src="<?php echo base_url('assets/img/course-name.png'); ?>" class="img-fluid" alt="Responsive image">
                        <div class="course-name"><?php echo $Course_Name; ?></div>
                    </div> -->



                </div>
                <!-- <div class="comment">
                    ความคิดเห็น
                </div>
                <div class="comment_profile">
                    <img src="<?php echo base_url('assets/img/course-profile.png'); ?>" style="width: 65px;height: 65px;">
                </div>
                <div class="form__group field">
                    <form action="#" method="post">
                        <input type="input" class="form__field" placeholder="แสดงความคิดเห็นของคุณ" name="user_comment" id='user_comment' required />
                        <label for="name" class="form__label">แสดงความคิดเห็นของคุณ</label>
                    </form>
                </div>

                <table id="table_comment" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td class="tdwidth"> <img src="<?php echo base_url('assets/img/course-profile.png'); ?>" style="width: 65px;height: 65px;"></td>
                        <td>
                            <div style="font-weight: bold;">Boat</div>เนื้อหาชัดเจนมากครับ เป็นประโยชน์มากครับ
                        </td>
                    </tr>
                    <tr>
                        <td> <img src="<?php echo base_url('assets/img/course-profile.png'); ?>" style="width: 65px;height: 65px;"></td>
                        <td>
                            <div style="font-weight: bold;">Game</div>เนื้อหาชัดเจนมากครับ เป็นประโยชน์มากครับ
                        </td>
                    </tr>
                    <tr>
                        <td> <img src="<?php echo base_url('assets/img/course-profile.png'); ?>" style="width: 65px;height: 65px;"></td>
                        <td>
                            <div style="font-weight: bold;">Kitti</div>เนื้อหาชัดเจนมากครับ เป็นประโยชน์มากครับ
                        </td>
                    </tr>
                    <tr>
                        <td> <img src="<?php echo base_url('assets/img/course-profile.png'); ?>" style="width: 65px;height: 65px;"></td>
                        <td>
                            <div style="font-weight: bold;">Kitti</div>เนื้อหาชัดเจนมากครับ เป็นประโยชน์มากครับ
                        </td>
                    </tr>
                    <tr>
                        <td> <img src="<?php echo base_url('assets/img/course-profile.png'); ?>" style="width: 65px;height: 65px;"></td>
                        <td>
                            <div style="font-weight: bold;">Kitti</div>เนื้อหาชัดเจนมากครับ เป็นประโยชน์มากครับ
                        </td>
                    </tr>
                    <tr>
                        <td> <img src="<?php echo base_url('assets/img/course-profile.png'); ?>" style="width: 65px;height: 65px;"></td>
                        <td>
                            <div style="font-weight: bold;">Kitti</div>เนื้อหาชัดเจนมากครับ เป็นประโยชน์มากครับ
                        </td>
                    </tr>
                    <tr>
                        <td> <img src="<?php echo base_url('assets/img/course-profile.png'); ?>" style="width: 65px;height: 65px;"></td>
                        <td>
                            <div style="font-weight: bold;">Kitti</div>เนื้อหาชัดเจนมากครับ เป็นประโยชน์มากครับ
                        </td>
                    </tr>
                    <tr>
                        <td> <img src="<?php echo base_url('assets/img/course-profile.png'); ?>" style="width: 65px;height: 65px;"></td>
                        <td>
                            <div style="font-weight: bold;">Game</div>เนื้อหาชัดเจนมากครับ เป็นประโยชน์มากครับ
                        </td>
                    </tr>
                    <tr>
                        <td> <img src="<?php echo base_url('assets/img/course-profile.png'); ?>" style="width: 65px;height: 65px;"></td>
                        <td>
                            <div style="font-weight: bold;">Game</div>เนื้อหาชัดเจนมากครับ เป็นประโยชน์มากครับ
                        </td>
                    </tr>
                    <tr>
                        <td> <img src="<?php echo base_url('assets/img/course-profile.png'); ?>" style="width: 65px;height: 65px;"></td>
                        <td>
                            <div style="font-weight: bold;">Game</div>เนื้อหาชัดเจนมากครับ เป็นประโยชน์มากครับ
                        </td>
                    </tr>
                    <tr>
                        <td class="tdwidth"> <img src="<?php echo base_url('assets/img/course-profile.png'); ?>" style="width: 65px;height: 65px;"></td>
                        <td>
                            <div style="font-weight: bold;">Boat</div>เนื้อหาชัดเจนมากครับ เป็นประโยชน์มากครับ
                        </td>
                    </tr>
                    <tr>
                        <td class="tdwidth"> <img src="<?php echo base_url('assets/img/course-profile.png'); ?>" style="width: 65px;height: 65px;"></td>
                        <td>
                            <div style="font-weight: bold;">Boat</div>เนื้อหาชัดเจนมากครับ เป็นประโยชน์มากครับ
                        </td>
                    </tr>
                    <tr>
                        <td class="tdwidth"> <img src="<?php echo base_url('assets/img/course-profile.png'); ?>" style="width: 65px;height: 65px;"></td>
                        <td>
                            <div style="font-weight: bold;">Boat</div>เนื้อหาชัดเจนมากครับ เป็นประโยชน์มากครับ
                        </td>
                    </tr>
                </table> -->

                <div class="col-sm-3">
                    <div class="quiz-menu">
                        <figcaption>
                            <?php
                            foreach ($video_link as $row) :
                                ?>

                                <input class="form-check-input quiz-checkbox" type="checkbox">

                                <a href="<?php echo $row['video_link'] ?>">
                                    <div class="quiz-menu-li">

                                        <?php echo $row['unit_name'] ?>
                                        <?php echo "<div class='float-right'>" . $row['video_time'] . "</div>" ?>
                                    </div>
                                </a>

                                <?php
                                    foreach ($question as $row2) :
                                        if ($row2['unit_index'] == $row['unit_index']) { ?>
                                        <div class="td_minimal">
                                            <input class="form-check-input quiz-checkbox" type="checkbox">
                                        </div>
                                        <a href="<?php echo $row2['quiz_question_id'] ?>">
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
                var x = document.getElementById("myDIV");
                var quiz = document.getElementById("myDIV2");
                e.preventDefault();
                videotarget = this.getAttribute("href");
                //console.log(videotarget.lastIndexOf('.'));
                if (videotarget.lastIndexOf('.') > 1) {
                    quiz.style.display = "none";
                    x.style.display = "block";
                    //console.log(videotarget);
                    filename = videotarget.substr(0, videotarget.lastIndexOf('.')) || videotarget;
                    video = document.querySelector("#video_player video");
                    video.removeAttribute("poster");
                    source = document.querySelectorAll("#video_player video source");
                    source[0].src = filename + ".mp4";
                    video.load();
                    video.play();
                } else {
                    // console.log("test");
                    quiz.style.display = "block";
                    x.style.display = "none";
                    var base_url = '<?= base_url('CourseUserController/Select_Quiz_Video') ?>';
                    video = document.querySelector("#video_player video");
                    video.pause();
                    console.log(videotarget);
                    $.ajax({
                        url: base_url,
                        method: "POST",
                        data: {
                            quiz_id: videotarget,
                        },
                        success: function(data) {

                            const obj = JSON.parse(data);
                            console.log(obj);
                            $("#myDIV2").html("");
                            //alert("คำถาม : " + obj[0].quiz_question_name + "\nchoice = " + obj[0].quiz_answer_name + "\nchoice = " + obj[1].quiz_answer_name + "\nchoice = " + obj[2].quiz_answer_name + "\nchoice = " + obj[3].quiz_answer_name);
                            for (i = 0; i < obj.length; i++) {
                                $("#myDIV2").append("<br><div class='input-group'><span class='input-group-addon'>" +
                                    "<input type='radio' aria-label='...' style='width:20px; height:20px' name='Check_Answer2' id='Check_Answer2' value='" + (i + 1) + "'></span>&nbsp;&nbsp;&nbsp;" +
                                    "<input type='text' class='form-control' data-answer-id='" + obj[i].quiz_answer_id + "' aria-label='...' name='Choice_Answer2_" + (i + 1) + "' id='Choice_Answer2_" + (i + 1) + "' value='" + obj[i].quiz_answer_name + "'> " +
                                    "</div><br>"
                                );
                            }
                            $("#myDIV2").append("<button type='button' class='btn btn-danger float-left'>ยกเลิก</button>");
                            $("#myDIV2").append("<button type='button' class='btn btn-primary float-right user_send_answer'>ยืนยัน</button>");
                        }
                    });
                }
            }

            $(document).ready(function() {
                $(document).on("click", ".user_send_answer", function() {
                    console.log('clicked');
                });
            });
        </script>

        <!-- /.content -->
        <!-- /.content-wrapper -->

        <!-- Main Footer -->

        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <div class="footernew2" <a href="<?php echo base_url('/home'); ?>">
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
    </div>
    <!-- Content Wrapper. Contains page content -->
    <!-- ./wrapper -->

    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

</html>