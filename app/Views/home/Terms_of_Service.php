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
    <link rel="preload" href="<?php echo base_url('plugins/fontawesome-free/css/all.min.css'); ?>" as="style" onload="this.rel='stylesheet'">
    <!-- Theme style -->
    <link rel="preload" href="<?php echo base_url('dist2/css/adminlte.min.css'); ?>" as="style" onload="this.rel='stylesheet'">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="preconnect" onload="this.rel='stylesheet'">
    <link rel="preload" href="<?php echo base_url('dist2/css/landing-page1.css'); ?>" as="style" onload="this.rel='stylesheet'">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js" rel="preconnect"></script>

    <link rel="preload" href="<?php echo base_url('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css'); ?>" as="style" onload="this.rel='stylesheet'">
    <link rel="preload" href="<?php echo base_url('plugins/toastr/toastr.min.css'); ?>" as="style" onload="this.rel='stylesheet'">

    <script src="<?php echo base_url('plugins/sweetalert2/sweetalert2.min.js'); ?>" rel="preload"></script>
    <script src="<?php echo base_url('plugins/toastr/toastr.min.js'); ?>" rel="preload"></script>

    <!-- Animate.css -->
    <link rel="preload" href="<?php echo base_url('assets/course/css/animate.css'); ?>" as="style" onload="this.rel='stylesheet'">

    <!-- Theme style  -->
    <link rel="preload" href="<?php echo base_url('assets/course/css/style.css'); ?>" as="style" onload="this.rel='stylesheet'">

    <!-- Modernizr JS -->
    <script src="<?php echo base_url('assets/course/js/modernizr-2.6.2.min.js'); ?>" rel="preload"></script>

    <link rel="preload" href="<?php echo base_url('assets/css/footer.css'); ?>" as="style" onload="this.rel='stylesheet'">

    <!-- CSS Card Course -->
    <link rel="preload" href="<?php echo base_url('assets/css/card.css'); ?>" as="style" onload="this.rel='stylesheet'">

</head>

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


        </nav>
        <!-- /.navbar -->
        <br>
    </div>
    <div class="container">
        <h4>เงื่อนไขการให้บริการ</h4>
        Workgress กำหนดข้อตกลงการใช้งานสำหรับ "หลักสูตรอิเล็กทรอนิกส์"นี้ตามที่ปรากฏด้านล่าง<br>
        1. ข้อมูลทั่วไป<br>
        บุคคลใดๆ ที่ใช้ "หลักสูตรอิเล็กทรอนิกส์" นี้ต้องยอมรับเงื่อนไขต่อไปนี้<br>
        บริษัทสามารถเปลี่ยนแปลงข้อตกลงการใช้งานได้โดยไม่ต้องแจ้งให้ทราบ<br>
        โปรดทราบว่าข้อตกลงการใช้งานใหม่จะมีผลบังคับใช้ในกรณีดังกล่าว<br><br>

        2. คำจำกัดความ<br>
        ในข้อตกลงนี้ คำศัพท์ต่างๆ จะมีการใช้ตามความหมายต่อไปนี้<br>
        1) "บริษัท" หมายถึง "Business Alive Co, ltd"<br>
        2) "หลักสูตรอิเล็กทรอนิกส์" หมายถึง "Wrokgress E-Learning"<br>
        3) "ผู้ใช้" หมายถึง บุคคลหรือกลุ่มบุคคลที่ใช้หรือต้องการใช้ "หลักสูตรอิเล็กทรอนิกส์"<br><br>

        3. ขอบเขตของข้อตกลงนี้และการเปลี่ยนแปลง<br>
        1) ข้อตกลงนี้จะมีผลบังคับใช้ระหว่างผู้ใช้ที่ใช้ "หลักสูตรอิเล็กทรอนิกส์" กับบริษัท<br>
        2) บริษัทมีสิทธิ์ในการเปลี่ยนแปลง แก้ไข ปรับปรุงใหม่ และลบข้อตกลงทั้งหมดหรือบางส่วนได้โดยไม่ต้องได้รับความยินยอมจากผู้ใช้<br><br>

        4. ความรับผิดชอบของบริษัท<br>
        บริษัทจะให้ความใส่ใจอย่างเต็มที่ในการตรวจสอบฟังก์ชันการทำงานและข้อมูลของ "หลักสูตรอิเล็กทรอนิกส์"<br>
        อย่างไรก็ตาม บริษัทจะไม่ขอรับผิดชอบหรือรับผิดใดๆ ดังต่อไปนี้<br>
        1) ฟังก์ชันการทำงานและข้อมูลทั้งหมดของ "หลักสูตรอิเล็กทรอนิกส์" มีความถูกต้อง ปลอดภัย และเป็นประโยชน์<br>
        2) ฟังก์ชันการทำงานและข้อมูลของ "หลักสูตรอิเล็กทรอนิกส์" เป็นข้อมูลใหม่ล่าสุดเสมอ<br>
        3) ความเสียหายใดๆ อันเกิดจากการใช้ "หลักสูตรอิเล็กทรอนิกส"<br>
        4) การเปลี่ยนแปลงข้อมูลจำเพาะของ “หลักสูตรอิเล็กทรอนิกส์” และการยกเลิกการจัดหา "หลักสูตรอิเล็กทรอนิกส์" โดยไม่ต้องแจ้งให้ทราบ<br>
        ความเสียหายใดๆ ต่อผู้ใช้หรือบุคคลที่สามอันเนื่องมาจากเหตุผลข้างต้น<br><br>

        5. การคุ้มครองสิทธิในทรัพย์สินทางปัญญา<br>
        ฟังก์ชันการทำงาน ข้อมูลทางเทคนิค ภาพและรูปภาพที่แสดงต่อผู้ใช้ใน "หลักสูตรอิเล็กทรอนิกส์" เป็นทรัพย์สินทางปัญญาของบริษัท และได้รับการคุ้มครองตามกฎหมายทรัพย์สินทางอุตสาหกรรม กฎหมายลิขสิทธิ์ และกฎหมายที่เกี่ยวข้องกับสิทธิในทรัพย์สินทางปัญญาอื่นๆ<br>
        การใช้ "หลักสูตรอิเล็กทรอนิกส์" จะจำกัดเฉพาะการใช้งานเพื่อการศึกษาด้วยตนเองเท่านั้น<br>
        สำหรับการใช้งานเพื่อวัตถุประสงค์อื่นๆ (เช่น การทำซ้ำ การเผยแพร่ การแจกจ่าย และการดัดแปลง) ต้องได้รับการอนุญาตอย่างชัดแจ้งจากบริษัท<br>
        ชื่อของบริษัท เครื่องหมายการค้า และเครื่องหมายต่างๆ ที่ใช้ใน "หลักสูตรอิเล็กทรอนิกส์" ได้รับการคุ้มครองตามกฎหมายเครื่องหมายการค้า กฎหมายป้องกันการแข่งขันที่ไม่เป็นธรรม และกฎหมายอื่นๆ<br>
        ห้ามการใช้เครื่องหมายต่างๆ หากไม่ได้รับการอนุญาตอย่างชัดแจ้งจากบริษัท<br><br>

        6. มาตรการป้องกันการละเมิดและการดำเนินการต่างๆ ที่ไม่อนุญาต<br>
        1) ผู้ใช้ต้องเคารพในสิทธิ์ของบุคคลที่สามและบริษัท<br>
        เมื่อใช้งาน "หลักสูตรอิเล็กทรอนิกส์" ผู้ใช้ต้องไม่ดำเนินการใดๆ ต่อไปนี้<br>
        - การกระทำที่เป็นการแสวงหาผลกำไรในเชิงพาณิชย์ หรือการดำเนินการเพื่อสร้างผลกำไรอื่นๆ โดยใช้ "หลักสูตรอิเล็กทรอนิกส์"<br>
        - การกระทำที่ละเมิดสิทธิในทรัพย์สินทางอุตสาหกรรม ลิขสิทธิ์ และสิทธิในทรัพย์สินอื่นๆ ของบุคคลที่สามหรือบริษัท<br>
        - การกระทำที่ทำให้เกิดหรือคุกคามเพื่อทำให้เกิดผลเสียหรือความเสียหายกับบุคคลที่สามหรือบริษัท<br>
        - การกระทำที่เป็นการทำลายชื่อเสียงหรือความน่าเชื่อถือของบริษัท<br>
        - การกระทำที่เป็นการละเมิดหรือคุกคามเพื่อให้ละเมิดกฎหมาย (รวมถึงกฎหมายที่เกี่ยวข้องกับการส่งออก)<br>
        - การกระทำที่เป็นการละเมิดข้อตกลงและขัดขวางหรือคุกคามเพื่อขัดขวางธุรกิจของบริษัทหรือบุคคลที่สาม นอกเหนือจากที่กล่าวไว้ข้างต้น<br><br>

        2) หากบริษัทพิจารณาว่าผู้ใช้ละเมิดข้อตกลง บริษัทมีสิทธิ์ในการระงับและห้ามผู้ใช้ดังกล่าวใช้ "หลักสูตรอิเล็กทรอนิกส์" และดำเนินการอื่นๆ ที่จำเป็น<br>
        บริษัทสามารถดำเนินการเหล่านี้ได้โดยไม่ต้องแจ้งให้ทราบ<br><br>

        3) หากผู้ใช้ทำให้เกิดความเสียหายกับบริษัทโดยการกระทำที่ละเมิดข้อตกลงนี้ การกระทำที่ไม่ถูกต้อง หรือการกระทำที่ผิดกฎหมาย บริษัทมีสิทธิ์ในการเรียกร้องให้มีการชดใช้ค่าเสียหายอย่างเหมาะสมจากผู้ใช้ดังกล่าว<br><br>

        7. การจัดการกับเปลี่ยนแปลงและการทำซ้ำเนื้อหา<br>
        1) ห้ามมิให้เปลี่ยนแปลงหรือทำซ้ำเนื้อหาส่วนหนึ่งส่วนใดหรือทั้งหมดของ "หลักสูตรอิเล็กทรอนิกส์" หากไม่ได้รับการอนุญาตอย่างชัดแจ้งจากบริษัท<br>
        2) บริษัทจะไม่ขอรับผิดชอบหรือรับผิดใดๆ ต่อการเปลี่ยนแปลงและการทำซ้ำเนื้อหาใน "หลักสูตรอิเล็กทรอนิกส์" โดยผู้ใช้<br><br>

        8. กฎหมายที่กำกับดูแลและเขตอำนาจศาล<br>
        ข้อตกลงนี้อยู่ภายใต้กฎหมายของประเทศญี่ปุ่น<br>
        ในกรณีเกิดความขัดแย้งที่เกี่ยวกับข้อตกลงนี้ ศาลเมืองโตเกียวจะเป็นศาลเพียงแห่งเดียวที่มีอำนาจในการตัดสินคดี<br>
    </div>


    <!-- Footer -->
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
    <!-- Footer -->






    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist2/js/adminlte.min.js"></script>
    <!-- Bootstrap 4 -->
    <!-- jquery-validation -->
    <script src="plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="plugins/jquery-validation/additional-methods.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist2/js/demo.js"></script>
</body>

</html>

<?php include 'Register_Validate_Script.php'; ?>

<!-- Waypoints -->
<script src="assets/course/js/jquery.waypoints.min.js" rel="preload"></script>

<!-- Flexslider -->
<script src="assets/course/js/jquery.flexslider-min.js" rel="preload"></script>

<!-- Main -->
<script src="assets/course/js/main.js" rel="preload"></script>

</body>

</html>