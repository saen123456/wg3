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
    <script src="<?php echo base_url('https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'); ?>"></script>

    <!-- Videojs -->
    <link rel="stylesheet" href="<?php echo base_url('https://cdn.jsdelivr.net/npm/video.js@7.6.6/dist/video-js.css'); ?>">
    <!-- Playlist Ui -->
    <link href="<?php echo base_url('assets/VideoPlayer/videojs-playlist-ui.vertical.css'); ?>" rel="stylesheet">
    <!-- Quality-selector -->
    <link href="<?php echo base_url('https://cdn.jsdelivr.net/npm/silvermine-videojs-quality-selector@1.1.2/dist/css/quality-selector.css'); ?>" rel="stylesheet">
    <!-- ChromeCast CSS -->
    <link href="<?php echo base_url('https://cdn.jsdelivr.net/npm/@silvermine/videojs-chromecast@1.2.0/dist/silvermine-videojs-chromecast.css'); ?>" rel="stylesheet">

    <!-- ***SCRiPTS*** -->
    <!-- videojs -->
    <script src="https://cdn.jsdelivr.net/npm/video.js@7.6.6/dist/video.js"></script>
    <!-- Videojs-playlist -->
    <script src="https://cdn.jsdelivr.net/npm/videojs-playlist@4.3.0/dist/videojs-playlist.js"></script>
    <!-- Playlist Ui -->
    <!--Description mod row 199 for better playlist effect-->
    <script src="assets/VideoPlayer/playlist.js"></script>
    <!-- Quality-selector -->
    <script src="https://cdn.jsdelivr.net/npm/silvermine-videojs-quality-selector@1.1.2/dist/js/silvermine-videojs-quality-selector.min.js"></script>
    <!-- YouTube -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-youtube/2.6.0/Youtube.min.js"></script>
    <!-- ChromeCast -->
    <script src="https://cdn.jsdelivr.net/npm/@silvermine/videojs-chromecast@1.2.0/dist/silvermine-videojs-chromecast.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/cv/js/sender/v1/cast_sender.js?loadCastFramework=1"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/VideoPlayer/player.css'); ?>">


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


        <!-- Main content -->
        <div class="overlay"></div>
        <div class="container">

            <div class="player-container">
                <div class="main-preview-player">
                    <video id="pd-video" class="video-js vjs-fluid-pd" height="360" width="640" controls>
                    </video>
                    <div class="playlist-container preview-player-dimensions">
                        <div class="vjs-playlist">
                        </div>
                    </div>
                    <!-- <?php
                            foreach ($data as $row) :
                                echo $row['unit_index'] . " " . $row['course_name'] . "<br>";
                            endforeach;
                            ?> -->
                </div>
            </div>


            <script>
                $(document).ready(function() {
                    $('#pd-video').bind('   ', function() {
                        return false;
                    });
                });
            </script>
            <script>
                var player = videojs('pd-video');
                player.playlist([
                    <?php
                    foreach ($data as $row) :
                        ?> {
                            name: '<?php echo $row['unit_name'] ?>',
                            // description: '<?php echo $row['unit_name'] ?>',
                            duration: 2905,
                            poster: '<?php echo $row['image_course'] ?>',
                            sources: [{
                                src: '<?php echo $row['video_link'] ?>',
                                type: 'video/mp4'
                            }, ],
                            thumbnail: [{
                                    srcset: '<?php echo $row['image_course'] ?>',
                                    type: 'image/jpeg',
                                    media: '(min-width: 400px;)'
                                },
                                {
                                    src: '<?php echo $row['image_course'];
                                                ?>'
                                }
                            ]

                        },
                    <?php
                    endforeach;
                    ?>

                ]);
                player.playlistUi();
                player.playlist.autoadvance(0);
                player.playlist.repeat(true);
                player.controlBar.addChild('QualitySelector');
                player.chromecast();
            </script>
            <div class="content2">

            </div>
        </div>


        <!-- /.content -->
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <div class="content2">
            <img src="<?php echo base_url('assets/img/course-name.png'); ?>" class="img-coursename">
            <div class="centered">
                <!-- <i class="fa fa-user course-profile" aria-hidden="true"></i> -->
                <img src="<?php echo base_url('assets/img/course-profile.png'); ?>" style="width: 65px;height: 65px;">&nbsp&nbsp&nbsp
                <?php
                foreach ($data as $row) :
                    $Course_Name = $row['course_name'];
                endforeach;
                ?>
                <?php echo $Course_Name; ?>
            </div>
            <div class="comment">
                ความคิดเห็น
            </div>
        </div>



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

</body>

</html>