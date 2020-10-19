<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Course</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="<?php echo base_url('assets/course/step2/fonts/material-icon/css/material-design-iconic-font.min.css'); ?>" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url('assets/course/step2/vendor2/nouislider/nouislider.min.css'); ?>" type="text/css" media="screen">

    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/course/step2/css/style.css'); ?>" type="text/css" media="screen">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="<?php echo base_url('assets/course/css/price-dropdown.css'); ?>" type="text/css" media="screen">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js" rel="preconnect"></script>
    <script src="https://cdn.tiny.cloud/1/js76qyi19edy15b7redb48ihbx9clxwbtiq6igcwwzog8lwf/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- Css for form upload -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo base_url('plugins/fontawesome-free/css/all.min.css'); ?>">
    <script src="https://oss.maxcdn.com/jquery.form/3.50/jquery.form.min.js"></script>

    <script>
        tinymce.init({
            selector: 'textarea',
            toolbar: 'bold italic | bullist  numlist ',
            menubar: false,
            height: 150,
            width: 680,
            plugins: [
                'advlist  lists image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code  wordcount'
            ],
        });
    </script>
</head>
<?php
$this->session = \Config\Services::session();
?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">การตั้งค่า</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-3">
                        <a class="btn btn-danger btn-block sent_course_id" role="button" type="button" data-toggle="modal" data-target="#modal-danger" var course_id="<?php echo $this->session->get("Course_id") ?>"><i class="fa fa-trash"></i> ลบ </a>
                    </div>
                    <div class="col-md-8 col-md-offset-1">
                        <p>เราให้สัญญากับผู้เรียนถึงการเข้าถึงได้ตลอดชีพ ดังนั้นจึงไม่สามารถลบหลักสูตรได้หลังจากที่ผู้เรียนได้ลงทะเบียนแล้ว</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-danger">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">ลบผู้ใช้</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>ยืนยันที่จะลบใช่หรือไม่ ?&hellip;</p>
                <p id="output"></p>
                <!-- <input id="user_id" name="user_id" value="" /> -->
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-warning" data-dismiss="modal">ยกเลิก</button>
                <button type="button" class="btn btn-primary" onclick="window.location.href = '<?= site_url('/CourseController/change_status') ?>';">ยืนยัน</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-delete-quiz">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">ลบคำถาม</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>ยืนยันที่จะลบใช่หรือไม่ ?&hellip;</p>
                <p id="output2"></p>
                <!-- <input id="user_id" name="user_id" value="" /> -->
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-warning" data-dismiss="modal">ยกเลิก</button>
                <button type="button" class="btn btn-primary send_delete_quiz">ยืนยัน</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-delete-unit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">ลบ Unit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>ยืนยันที่จะลบใช่หรือไม่ ?&hellip;</p>
                <p id="output3"></p>
                <!-- <input id="user_id" name="user_id" value="" /> -->
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-warning" data-dismiss="modal">ยกเลิก</button>
                <button type="button" class="btn btn-primary delete_unit">ยืนยัน</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-delete-document">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">ลบเนื้อหาหลักสูตร</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>ยืนยันที่จะลบเนื้อหาหลักสูตรใช่หรือไม่ ?&hellip;</p>
                <!-- <input id="user_id" name="user_id" value="" /> -->
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-warning" data-dismiss="modal">ยกเลิก</button>
                <button type="button" class="btn btn-primary btn_delete_document">ยืนยัน</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="quizModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    <p id="show_unit_name"></p>

                </h4>

            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-8">
                        <form id="form_quiz">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon3">ตั้งคำถามว่า : </span>
                                    <input type="text" class="form-control" name="Quiz" id="Quiz" aria-describedby="basic-addon3" required>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-primary sayyes" role="button" type="button" id="show-hide" disabled="disabled"> ตกลง </button>
                    </div>
                </div>

                <div class="row justify-content-between">
                    <div class="col-md-8">
                        <div id="content">
                            <div id="Radio_Answer">
                                <form id="form_choice">

                                    <h2>ใส่คำตอบของคุณที่นี่</h2>
                                    ข้อที่ 1
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="radio" aria-label="..." style="width:20px; height:20px" name="Check_Answer" id="Check_Answer" value="1" required>
                                            </span>
                                            <input type="text" class="form-control" aria-label="..." name="Choice_Answer_1" id="Choice_Answer_1" required>
                                        </div>
                                    </div>
                                    <br>
                                    ข้อที่ 2
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="radio" aria-label="..." style="width:20px; height:20px" name="Check_Answer" id="Check_Answer" value="2" required>
                                            </span>
                                            <input type="text" class="form-control" aria-label="..." name="Choice_Answer_2" id="Choice_Answer_2" required>
                                        </div>
                                    </div>
                                    <br>
                                    ข้อที่ 3
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="radio" aria-label="..." style="width:20px; height:20px" name="Check_Answer" id="Check_Answer" value="3" required>
                                            </span>
                                            <input type="text" class="form-control" aria-label="..." name="Choice_Answer_3" id="Choice_Answer_3" required>
                                        </div>
                                    </div>
                                    <br>
                                    ข้อที่ 4
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="radio" aria-label="..." style="width:20px; height:20px" name="Check_Answer" id="Check_Answer" value="4" required>
                                            </span>
                                            <input type="text" class="form-control" aria-label="..." name="Choice_Answer_4" id="Choice_Answer_4" required>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default quiz_sayyes" id="Quiz_Btn">ยืนยัน</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">

                </h4>

            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="input-group">
                            <div id="showquestionlist"> </div>
                            <!-- <span class="input-group-addon" id="basic-addon3">ตั้งคำถามว่า : </span>
                            <form id="form_quiz">
                                <input type="text" class="form-control" id="Quiz" aria-describedby="basic-addon3" value="test">
                            </form> -->
                        </div>
                    </div>
                    <div class="col-md-3">
                    </div>
                </div>

                <div class="row justify-content-between">
                    <div class="col-md-8">
                        <div id="Radio_Answer2">
                            <div id="showanswerlist"> </div>
                        </div>
                        <!-- <div id="Radio_Answer">
                            <h2>ใส่คำตอบของคุณที่นี่</h2>
                            ข้อที่
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="radio" aria-label="..." style="width:20px; height:20px" name="Check_Answer" id="Check_Answer" value="1">
                                </span>
                                <input type="text" class="form-control" aria-label="..." name="Choice_Answer_1" id="Choice_Answer_1" value="">
                            </div>
                            <br>
                        </div> -->

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="Edit_Quiz_Btn">ยืนยัน</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<body class="body2">

    <div class="main2">

        <div class="container2">
            <div class="header">
                <div class="row">
                    <div class="col-md-3">
                        <a class="light-purple" id='link1' href="<?php echo base_url('/course'); ?>" role="button"> <i class="fas fa-arrow-left light-purple"></i> กลับไปยังหน้าหลักสูตร</a>
                    </div>
                    <div class="col-md-1 col-md-offset-8">
                        <a class="light-purple" id='link1' role="button" data-toggle="modal" data-target="#myModal"><i class="fas fa-cogs"></i></a>
                    </div>
                </div>
            </div>
            <div id="signup-form">

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
                <h3>หลักสูตร</h3>

                <fieldset class="fieldset2">
                    <h2>แก้ไขหลักสูตร</h2>
                    <p class="desc">เริ่มต้นรวมหลักสูตรของคุณเข้าด้วยกันด้วยการสร้างส่วน การบรรยาย และแบบฝึกหัด (โจทย์ แบบฝึกหัดการเขียนโค้ด และงานที่ได้รับมอบหมาย)</p>
                    <div class="fieldset-content2">
                        <div class="form-row2">
                            <div class="form-flex">
                                <div class="form-group">

                                    <div style="text-align:center;">
                                        <div class="container">

                                            <h3>Multi form file uploader using Jquery, PHP, Ajax, and Bootstrap - HackandPhp programming blog </h3>
                                            <hr>

                                            <div class="row">
                                                <div class='col-xs-12 col-sm-6 col-md-6 col-lg-6'>
                                                    <ul class="list-inline">
                                                        <li><button class="btn btn-success addmore2" type="button"><i class="fa fa-plus"></i> </button></li>
                                                        <li> <button class="btn btn-danger delete2" type="button"><i class="fa fa-trash"></i> </button></li>

                                                    </ul>
                                                </div>
                                            </div>

                                            <table class="table table-bordered table-hover" id="table_auto">
                                                <?php

                                                //$i = $unit_index_min;
                                                foreach ($data as $row) :
                                                    $Image_Course = $row['image_course'];
                                                    $Course_Name = $row['course_name'];
                                                    $Course_Description = $row['course_description'];
                                                    $Unit_Index = $row['unit_index'];
                                                    $i = $row['unit_index'];
                                                    ?>
                                                    <tr id="row_0">
                                                        <td class="td_minimal"><input class="case" type="checkbox" /></td>
                                                        <td>



                                                            <form action="#" method="post">

                                                                <div class="col-sm-5">
                                                                    <input type="text" name="Unit_Name" id="Unit_Name" value="<?php echo $row['unit_name'] ?>">

                                                                </div>
                                                                <div class="col-sm-1">
                                                                    <!-- <input type="submit" value="แก้ไขชื่อ unit" class="btn btn-primary" style="width:120px;height:35px" /> -->
                                                                    <button type="submit" class="btn btn-info" style="width:110px;height:30px" formaction="<?= base_url('/CourseController/Edit_Unit_Name?Unit_ID=' . $row['unit_id'] . '/') ?>">แก้ไขชื่อ unit</button>
                                                                </div>
                                                            </form>

                                                            <?php
                                                                $count = 0;
                                                                foreach ($quiz_unit as $row3) :

                                                                    if ($row3['unit_index'] == $row['unit_index']) {
                                                                        $count++;
                                                                    }
                                                                endforeach;
                                                                //echo $count;
                                                                if ($count == 0) {
                                                                    ?>
                                                                <div class="col-sm-1 col-sm-offset-1">
                                                                    <button class="btn btn-danger sent_delete_unit" style="width:110px;height:30px" data-toggle="modal" data-target="#modal-delete-unit" type="button" var unit_id="<?php echo $row['unit_id'] ?>" var unit_name="<?php echo $row['unit_name'] ?>" var unit_index="<?php echo $row['unit_index'] ?>" var course_id="<?php echo $this->session->get("Course_id") ?>">ลบ unit</button>
                                                                </div>
                                                            <?php
                                                                } else {
                                                                    ?>
                                                                <div class="col-sm-5 col-sm-offset-1">
                                                                    <p class="text-danger">* หากต้องการที่จะลบ Unit นี้ออก ต้องลบคำถามให้หมดก่อน!</p>
                                                                </div>
                                                            <?php
                                                                }
                                                                ?>



                                                            <br><br><br>

                                                            <form action="#" id="uploadform">
                                                                <div class="col-sm-3">
                                                                    <input type="text" name="Unit_Name" id="Unit_Name" value="<?php echo "วิดีโอของคุณ : " . $row['video_name'] ?>" style="width:500px" readonly>
                                                                </div>
                                                                <br><br><br>
                                                                <div class="col-sm-3">
                                                                    <input id="avatar" class="form-control file-loading" type="file" name="Unit_Video_File" accept="video/mp4,video/x-m4v,video/*">
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="progress progress-striped active">
                                                                        <div class="progress-bar" style="width:0%"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <button class="btn btn-sm btn-info upload" type="submit" var unit_index="<?php echo $row['unit_index'] ?>"><i class="fa fa-upload"></i> อัพโหลดวิดีโอ</button>
                                                                    <!-- <button class="btn btn-success sent_unit_name" type="button" data-toggle="modal" data-target="#quizModal" var unit_name="<?= $row['unit_name'] ?>"><i class="fa fa-plus"></i> เพื่ม คำถาม</button> -->
                                                                    <a class="btn btn-success sent_unit_name" role="button" type="button" data-toggle="modal" data-target="#quizModal" var unit_name="<?php echo $row['unit_name'] ?>" var unit_index="<?php echo $row['unit_index'] ?>" var course_id="<?php echo $this->session->get("Course_id") ?>"><i class="fa fa-plus"></i> เพื่ม คำถาม </a>
                                                                </div>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                        //echo $row['unit_index'] . "<br>";

                                                        foreach ($Quiz as $row2) :

                                                            if ($row2['unit_index'] == $i) {
                                                                //echo $row2['unit_index'] . " " . $i . "<br>";

                                                                ?>
                                                            <tr>
                                                                <td class="td_left" colspan="2">
                                                                    <div class="col-md-6">
                                                                        <p class="text-size">คำถาม : <?php echo $row2['quiz_question_name'] ?></p>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <button class="btn btn-block sent_edit_quiz" data-toggle="modal" data-target="#editModal" type="button" var course_id="<?php echo $this->session->get("Course_id") ?>" var quiz_id="<?php echo $row2['quiz_question_id'] ?>"><i class="fas fa-cogs"></i> แก้ไข คำถาม</button>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <button class="btn btn-danger sent_delete_quiz" data-toggle="modal" data-target="#modal-delete-quiz" type="button" var course_id="<?php echo $this->session->get("Course_id") ?>" var unit_index="<?php echo $row2['unit_index'] ?>" var quiz_id="<?php echo $row2['quiz_question_id'] ?>"><i class="fa fa-times"></i> ลบ คำถาม</button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                    <?php
                                                            }
                                                        endforeach;
                                                        ?>
                                                <?php

                                                endforeach;
                                                ?>
                                            </table>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </fieldset>


                <h3>เนื้อหาของหลักสูตร</h3>

                <fieldset class="fieldset2">
                    <h2>สร้างส่วน การบรรยายในหลักสูตร</h2>
                    <p class="desc">เริ่มต้นรวมหลักสูตรของคุณเข้าด้วยกันด้วยการสร้างส่วน การบรรยาย ต่างๆในหลักสูตรที่คุณจะสอน</p>
                    <div class="fieldset-content2">
                        <?php
                        //echo $document;
                        if (isset($have_document)) {
                            foreach ($document as $row) :
                                $Document_link = $row['document_name'];
                            endforeach;
                            ?>

                            <form action="<?= site_url('/CourseController/Edit_Document') ?>" enctype="multipart/form-data" method="post" id="uploadmaterial" onsubmit="return Validate(this);">
                                <div class="input-group">
                                    <input type="text" class="form-control image-preview-filename" disabled="disabled" value="<?php echo $Document_link; ?>"> <!-- don't give a name === doesn't send on POST/GET -->
                                    <span class="input-group-btn">
                                        <div class="btn btn-default image-preview-input">
                                            <span class="glyphicon glyphicon-folder-open"> ไฟล์</span>
                                            <input type="file" accept=".pptx,.pdf,.doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" name="Document2" onchange="loadFile(event)" /> <!-- rename it -->
                                        </div>
                                        <button class="btn btn-default sent_delete_document" data-toggle="modal" data-target="#modal-delete-document" type="button" var course_id="<?php echo $this->session->get("Course_id") ?>"><i class="fa fa-trash"></i> </button>
                                    </span>

                                </div>

                                <br>
                                <div class="col-xs-4">
                                    <input type="submit" id="uploadSubmit" value="อัพโหลดเนื้อหา" class="btn btn-info" />
                                </div>
                                <br><br><br>
                            </form>

                        <?php
                        } else { ?>

                            <form action="<?= site_url('/CourseController/Upload_Document') ?>" enctype="multipart/form-data" method="post" id="uploadmaterial" onsubmit="return Validate(this);">
                                <div class="input-group">
                                    <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->

                                    <span class="input-group-btn">
                                        <div class="btn btn-default image-preview-input">
                                            <span class="glyphicon glyphicon-folder-open"> ไฟล์</span>
                                            <input type="file" accept=".pptx,.pdf,.doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" name="Document1" onchange="loadFile(event)" /> <!-- rename it -->
                                        </div>
                                    </span>
                                </div>
                                <br>
                                <div class="col-xs-4">
                                    <input type="submit" id="uploadSubmit" value="อัพโหลดเนื้อหา" class="btn btn-info" />
                                </div>
                                <br><br><br>
                            </form>
                        <?php
                        }
                        ?>

                    </div>
                </fieldset>


                <h3>หน้าเริ่มต้นของหลักสูตร</h3>

                <fieldset class="fieldset2">
                    <h2>แก้ไขชื่อหลักสูตร</h2>
                    <div class="form-find">

                    </div>
                    <div class="fieldset-content2">
                        <form action="<?= site_url('/CourseController/Edit_Course_Name') ?>" method="post">
                            <div class="form-group">
                                <label for="find_bank" class="form-label2">ชื่อหลักสูตร</label>
                                <input type="text" name="course_name" id="find_bank" placeholder="ใส่ชื่อหลักสูตรของคุณ" maxlength="60" value="<?php echo $Course_Name ?>" /><br>
                                <input type="submit" value="ยืนยันการแก้ไขชื่อหลักสูตร" class="btn btn-info" style="width:200px;height:35px" />
                            </div>
                        </form>
                        <form action="<?= site_url('/CourseController/Edit_Course_Description') ?>" method="post">
                            <div class="form-group">
                                <label for="find_bank" class="form-label2">คำอธิบายหลักสูตร</label>
                                <textarea type="text" placeholder="ใส่คำอธิบายของหลักสูตรคุณ" name="course_description" class="form-control">
                                <?php echo $Course_Description ?>
                                </textarea>
                                <br>
                                <input type="submit" value="ยืนยันการแก้ไขคำอธิบายหลักสูตร" class="btn btn-info" style="width:230px;height:35px" />
                            </div>
                        </form>



                        <div class="form-group-image">
                            <label for="image" class="form-label2">แก้ไขภาพหลักสูตร</label>
                            <div class="row">
                                <div class="main-image">
                                    <!-- <div class="input-group image-preview">
                                    </div> -->
                                    <?php
                                    if ($Image_Course != null) { ?>
                                        <img data-purpose="image-preview" alt="ภาพหลักสูตร" width="491" height="276" src="<?php echo $Image_Course ?>" id="output">
                                    <?php
                                    } else { ?>
                                        <img data-purpose="image-preview" alt="ภาพหลักสูตร" width="491" height="276" src="<?php echo base_url('assets/img/pre-image.png'); ?>" id="output">
                                    <?php
                                    }
                                    ?>
                                    <br>
                                </div>
                                <div class="main-text">
                                    <p>อัพโหลดรูปภาพหลักสูตรของคุณที่นี่ ภาพจะต้องตรงกับ มาตรฐานคุณภาพรูปภาพของเรา จึงจะใช้ได้ แนวทางสำคัญ: <b> 750x422 </b> พิกเซล ในรูปแบบ .jpg, .jpeg,. gif หรือ .png.
                                        โดยไม่มีข้อความบนรูปภาพ</p>

                                    <form action="<?= site_url('/CourseController/Edit_Picture_Course') ?>" enctype="multipart/form-data" method="post" id="uploadImage" onsubmit="return Validate_image(this);">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div id="targetLayer" style="display:none;"></div>

                                        <div class="input-group">
                                            <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->

                                            <span class="input-group-btn">
                                                <div class="btn btn-default image-preview-input">
                                                    <span class="glyphicon glyphicon-folder-open"> ไฟล์</span>
                                                    <input type="file" accept="image/png, image/jpeg, image/gif" name="photo" id="uploadFile" onchange="loadFile(event)" /> <!-- rename it -->
                                                </div>
                                            </span>
                                        </div>

                                        <br>
                                        <div class="col-xs-4">
                                            <input type="submit" id="uploadSubmit" value="อัพโหลดรูปภาพ" class="btn btn-info" />
                                        </div>
                                        <br><br><br>

                                    </form>

                                </div>

                            </div>
                        </div>

                    </div>

                </fieldset>


                <h3>การกำหนดราคาคอร์สของคุณ</h3>
                <fieldset class="fieldset2">
                    <div class="row">
                        <div class="col">
                            <form action="<?= site_url('/CourseController/Edit_Price') ?>">
                                <h2>การกำหนดราคาคอร์สของคุณ</h2>
                                <p class="desc">การกำหนดราคาคอร์สของคุณ</p>
                                <div class="box">
                                    <select name="Course_Price">
                                        <option value="0">ฟรี </option>
                                        <option value="499">499 บาท (ระดับ 1)</option>
                                        <option value="699">699 บาท (ระดับ 2)</option>
                                        <option value="899">899 บาท (ระดับ 3)</option>
                                        <option value="1099">1099 บาท (ระดับ 4)</option>
                                    </select>
                                </div>
                                <div style="position: absolute;right: 200px;bottom: 65px;">
                                    <input type="submit" value="ยืนยันการสร้างคอร์ส" style="width: 160px;height: 50px;color: #fff;background: #4966b1;text-align: center;">
                                </div>
                            </form>
                        </div>
                    </div>
                </fieldset>


            </div>

        </div>

        <script type="text/javascript">
            $(document).ready(function() {
                var i = $('#table_auto tr').length; // Get the no.of rows in the table
                var j = 2;
                var Unit_Count = 1;
                $(".addmore").on('click', function() {
                    html = '<tr id="row_' + i + '">';
                    html += '<td><input class="case" type="checkbox"/></td>';
                    html += '<td>';
                    html += '<form action="#" id="uploadform">';
                    html += '<input type="text" name="Unit_Name" id="Unit_Name" placeholder="กรอกชื่อ unit ของคุณ เช่น บทนำ" />';
                    html += '<br>';
                    html += '<div class="col-sm-3"><input id="avatar" class="form-control file-loading" type="file" name="Unit_Video_File" accept="video/mp4,video/x-m4v,video/*">';
                    html += '</div><div class="col-sm-5"><div class="progress progress-striped active"><div class="progress-bar" style="width:0%"></div></div></div><div class="col-sm-4">';
                    html += '<button class="btn btn-sm btn-info upload" type="submit"><i class="fa fa-upload"></i> Upload Unit</button></div>';
                    html += '</form>';
                    html += '</td>';
                    html += '</tr>';
                    $('#table_auto').append(html); //Append the new row to the table
                    i++;
                    j++
                });
                //to check all checkboxes
                $(document).on('change', '#check_all', function() {
                    $('input[class=case]:checkbox').prop("checked", $(this).is(':checked'));
                });

                //deletes the selected table rows
                $(".delete").on('click', function() {
                    var checkedVals = $('.case:checkbox:checked').map(function() {
                        return $(this).closest('tr').find('td:nth-child(3)').text();
                    }).get(); //Get the File name from the third column of the td.
                    var fileList = checkedVals.join(","); // join all file name by using the seperator ','.
                    var co = confirm("Are your sure Delete the file " + fileList + " ?");
                    if (co) {
                        $.post("delete.php", {
                            'file': fileList //pass data 
                        }, function(data) {}, "json");

                        $('.case:checkbox:checked').parents("tr").remove(); //Renove the table row which is checked for deleted.
                        $('#check_all').prop("checked", false);
                    }
                });

                $('.upload-all').click(function() {
                    //submit all form
                    $('form#uploadform').submit();
                });
                $('.cancel-all').click(function() {
                    //submit all form
                    $('form#uploadform .cancel').click();
                });

                $(document).on('submit', 'form#uploadform', function(e) {
                    e.preventDefault();
                    $form = $(this);
                    uploadImage($form);
                });

                var Unit_Index;

                $(".btn-info").click(function() {
                    $("#Unit_Index").attr("value", $(this).attr('Unit_Index'));
                    window.Unit_Index = $(this).attr('Unit_Index');
                    console.log(window.Unit_Index);
                });

                function uploadImage($form) {

                    $form.find('.progress-bar').removeClass('progress-bar-success')
                        .removeClass('progress-bar-danger');

                    var xhr = new window.XMLHttpRequest();

                    $.ajax({
                        url: "https://workgress.online/CourseController/Upload_Edit_Unit?Unit_Index=" + window.Unit_Index,
                        type: "POST",
                        data: new FormData($form[0]),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            $form.closest('tr').find('td:nth-child(3)').text(data.image);
                            $form.closest('tr').find('td:nth-child(4)').html(data.destination);
                            //$form[0].reset();
                        },
                        error: function() {},
                        xhr: function() {
                            //Upload progress
                            xhr.upload.addEventListener("progress", function(e) {
                                if (e.lengthComputable) {
                                    var percentComplete = (e.loaded || e.position) * 100 / e.total;
                                    //Do something with upload progress
                                    console.log(percentComplete);

                                    $form.find('.progress-bar').width(percentComplete + '%').html(percentComplete + '%');
                                }
                            }, false);
                            xhr.addEventListener('load', function(e) {
                                $form.find('.progress-bar').addClass('progress-bar-success').html('upload completed....');
                                /*setTimeout(function() {
                                    $(".progress-bar").hide();
                                }, 5000);*/
                                $(".progress-bar").show();
                            });
                            return xhr;
                        }
                    });
                    $form.on('click', '.cancel', function() {
                        xhr.abort();
                        $form.find('.progress-bar')
                            .addClass('progress-bar-danger')
                            .removeClass('progress-bar-success')
                            .html('upload aborted...');
                    });

                }
            });
        </script>


        <script type="text/javascript">
            window.Unit_Index2 = <?php echo json_encode($Unit_Index); ?>;
            $(document).ready(function() {
                var i = $('#table_auto tr').length; // Get the no.of rows in the table
                var j = 2;
                var Unit_Count = 1;
                $(".addmore2").on('click', function() {
                    html = '<tr id="row_' + i + '">';
                    html += '<td><input class="case" type="checkbox"/></td>';
                    html += '<td>';
                    html += '<form action="#" id="uploadform2">';
                    html += '<input type="text" name="Unit_Name" id="Unit_Name" placeholder="กรอกชื่อ unit ของคุณ" />';
                    html += '<br>';
                    html += '<div class="col-sm-3"><input id="avatar" class="form-control file-loading" type="file" name="Unit_Video_File" accept="video/mp4,video/x-m4v,video/*">';
                    html += '</div><div class="col-sm-5"><div class="progress progress-striped active"><div class="progress-bar" style="width:0%"></div></div></div><div class="col-sm-4">';
                    html += '<button class="btn btn-sm btn-info upload" type="submit"><i class="fa fa-upload"></i> Upload Unit</button></div>';
                    html += '</form>';
                    html += '</td>';
                    html += '</tr>';
                    $('#table_auto').append(html); //Append the new row to the table
                    i++;
                    j++
                });
                //to check all checkboxes
                $(document).on('change', '#check_all', function() {
                    $('input[class=case]:checkbox').prop("checked", $(this).is(':checked'));
                });

                //deletes the selected table rows
                $(".delete2").on('click', function() {
                    var checkedVals = $('.case:checkbox:checked').map(function() {
                        return $(this).closest('tr').find('td:nth-child(3)').text();
                    }).get(); //Get the File name from the third column of the td.
                    var fileList = checkedVals.join(","); // join all file name by using the seperator ','.
                    var co = confirm("Are your sure Delete the file " + fileList + " ?");
                    if (co) {
                        $.post("delete.php", {
                            'file': fileList //pass data 
                        }, function(data) {}, "json");

                        $('.case:checkbox:checked').parents("tr").remove(); //Renove the table row which is checked for deleted.
                        $('#check_all').prop("checked", false);
                    }
                });

                $('.upload-all').click(function() {
                    //submit all form
                    $('form#uploadform2').submit();
                });
                $('.cancel-all').click(function() {
                    //submit all form
                    $('form#uploadform2 .cancel').click();
                });
                $(document).on('submit', 'form#uploadform2', function(e) {
                    e.preventDefault();
                    $form = $(this);
                    uploadImage($form);


                });

                function uploadImage($form) {

                    $form.find('.progress-bar').removeClass('progress-bar-success')
                        .removeClass('progress-bar-danger');

                    var xhr = new window.XMLHttpRequest();
                    var Unit_Index;

                    var Unit_Index = ++window.Unit_Index2;
                    console.log(Unit_Index);
                    $.ajax({
                        url: "https://workgress.online/CourseController/Upload_Unit?Unit_Index=" + Unit_Index,
                        type: "POST",
                        data: new FormData($form[0]),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            $form.closest('tr').find('td:nth-child(3)').text(data.image);
                            $form.closest('tr').find('td:nth-child(4)').html(data.destination);
                            //$form[0].reset();
                        },
                        error: function() {},
                        xhr: function() {
                            //Upload progress
                            xhr.upload.addEventListener("progress", function(e) {
                                if (e.lengthComputable) {
                                    var percentComplete = (e.loaded || e.position) * 100 / e.total;
                                    //Do something with upload progress
                                    console.log(percentComplete);

                                    $form.find('.progress-bar').width(percentComplete + '%').html(percentComplete + '%');
                                }
                            }, false);
                            xhr.addEventListener('load', function(e) {
                                $form.find('.progress-bar').addClass('progress-bar-success').html('upload completed....');
                                /*setTimeout(function() {
                                    $(".progress-bar").hide();
                                }, 5000);*/
                                $(".progress-bar").show();
                            });
                            return xhr;
                        }

                    });
                    $form.on('click', '.cancel', function() {
                        xhr.abort();
                        $form.find('.progress-bar')
                            .addClass('progress-bar-danger')
                            .removeClass('progress-bar-success')
                            .html('upload aborted...');
                    });

                }
            });
        </script>


        <script>
            var _validFileExtensions_meteries = [".doc", ".pdf", ".docx", ".pptx", ".ppt"];
            var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];

            function Validate(oForm) {
                var arrInputs = oForm.getElementsByTagName("input");
                for (var i = 0; i < arrInputs.length; i++) {
                    var oInput = arrInputs[i];
                    if (oInput.type == "file") {
                        var sFileName = oInput.value;
                        if (sFileName.length > 0) {
                            var blnValid = false;
                            for (var j = 0; j < _validFileExtensions_meteries.length; j++) {
                                var sCurExtension = _validFileExtensions_meteries[j];
                                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                                    blnValid = true;
                                    break;
                                }
                            }

                            if (!blnValid) {
                                alert("ขอโทษ, " + sFileName + " ไม่ถูกค้อง, อนุญาติเฉพาะไฟล์ : " + _validFileExtensions_meteries.join(", "));
                                return false;
                            }
                        }
                    }
                }

                return true;
            }

            function Validate_image(oForm) {
                var arrInputs = oForm.getElementsByTagName("input");
                for (var i = 0; i < arrInputs.length; i++) {
                    var oInput = arrInputs[i];
                    if (oInput.type == "file") {
                        var sFileName = oInput.value;
                        if (sFileName.length > 0) {
                            var blnValid = false;
                            for (var j = 0; j < _validFileExtensions.length; j++) {
                                var sCurExtension = _validFileExtensions[j];
                                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                                    blnValid = true;
                                    break;
                                }
                            }
                            if (!blnValid) {
                                alert("ขอโทษ, " + sFileName + " ไม่ถูกค้อง, อนุญาติเฉพาะไฟล์ : " + _validFileExtensions.join(", "));
                                return false;
                            }
                        }
                    }
                }

                return true;
            }
            $(document).on('click', '#close-preview', function() {
                $('.image-preview').popover('hide');
                // Hover befor close the preview
                $('.image-preview').hover(
                    function() {
                        $('.image-preview').popover('show');
                    },
                    function() {
                        $('.image-preview').popover('hide');
                    }
                );
            });

            $(document).ready(function() {
                // Create the close button
                var closebtn = $('<button />', {
                    type: "button",
                    text: 'x',
                    id: 'close-preview',
                    style: 'font-size: initial;',
                });
                closebtn.attr("class", "close pull-right");
                // Set the popover default content
                $('.image-preview').popover({
                    trigger: 'manual',
                    html: true,
                    title: "<strong>Preview</strong>" + $(closebtn)[0].outerHTML,
                    content: "There's no image",
                    placement: 'bottom'
                });
                // Clear event
                $('.image-preview-clear').click(function() {
                    $('.image-preview').attr("data-content", "").popover('hide');
                    $('.image-preview-filename').val("");
                    $('.image-preview-clear').hide();
                    $('.image-preview-input input:file').val("");
                    $(".image-preview-input-title").text("Browse");
                });
                // Create the preview image
                $(".image-preview-input input:file").change(function() {
                    //console.log("image");
                    var img = $('<img />', {
                        id: 'dynamic',
                        width: 250,
                        height: 200
                    });
                    var file = this.files[0];
                    var reader = new FileReader();
                    // Set preview image into the popover data-content
                    reader.onload = function(e) {
                        $(".image-preview-input-title").text("Change");
                        $(".image-preview-clear").show();
                        $(".image-preview-filename").val(file.name);
                        img.attr('src', e.target.result);
                        $(".image-preview").attr("data-content", $(img)[0].outerHTML).popover("show");
                    }
                    reader.readAsDataURL(file);
                });
            });
        </script>
        <script>
            var loadFile = function(event) {
                var output = document.getElementById('output');
                output.src = URL.createObjectURL(event.target.files[0]);
                output.onload = function() {
                    URL.revokeObjectURL(output.src) // free memory
                }
            };
        </script>
        <script>
            $(document).ready(function() {
                $('#uploadImage').submit(function(event) {
                    //console.log("test");
                    if ($('#uploadFile').val()) {
                        event.preventDefault();
                        $('#loader-icon').show();
                        $('#targetLayer').hide();
                        $(this).ajaxSubmit({
                            target: '#targetLayer',
                            beforeSubmit: function() {
                                $('.progress-bar').width('50%');
                            },
                            uploadProgress: function(event, position, total, percentageComplete) {
                                $('.progress-bar').animate({
                                    width: percentageComplete + '%'
                                }, {
                                    duration: 1000
                                });
                            },
                            success: function() {
                                $('#loader-icon').hide();
                                $('#targetLayer').show();
                            },
                            resetForm: true
                        });
                    }
                    return false;
                });
            });

            $(".sent_course_id").click(function() {
                $("#course_id").attr("value", $(this).attr('course_id'));
                var course_id = $(this).attr('course_id');
                //console.log(course_id);
                document.getElementById('output').innerHTML = "รหัสคอร์ส " + course_id;
            });
        </script>
</body>
<!-- JS -->

<script src="<?php echo base_url('assets/course/step2/vendor2/jquery-validation/dist/jquery.validate.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/course/step2/vendor2/jquery-validation/dist/additional-methods.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/course/step2/vendor2/jquery-steps/jquery.steps.js'); ?>"></script>
<script src="<?php echo base_url('assets/course/step2/vendor2/minimalist-picker/dobpicker.js'); ?>"></script>
<script src="<?php echo base_url('assets/course/step2/vendor2/nouislider/nouislider.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/course/step2/vendor2/wnumb/wNumb.js'); ?>"></script>
<script src="<?php echo base_url('assets/course/step2/js/main.js'); ?>"></script>
<script>
    $(document).ready(function() {
        $("#show-hide").click(function() {
            var btn = $(this);
            $("#content").toggle(function() {
                btn.text($(this).css("display") === 'block' ? "ตกลง" : "ตกลง");
            });
        });
    });
    var unit_index;
    var course_id;
    $(document).ready(function() {
        $(".sent_unit_name").click(function() {
            //console.log("test");
            $("#unit_name").attr("value", $(this).attr('unit_name'));
            var unit_name = $(this).attr('unit_name');

            $("#unit_index").attr("value", $(this).attr('unit_index'));
            unit_index = $(this).attr('unit_index');

            $("#course_id").attr("value", $(this).attr('course_id'));
            course_id = $(this).attr('course_id');
            console.log(unit_index);
            document.getElementById('show_unit_name').innerHTML = "ตั้งคำถาม ในส่วนของ " + unit_name;
        });
    });

    var quiz_id;
    var course_id;
    $(document).ready(function() {
        $(".sent_edit_quiz").click(function() {
            var base_url = '<?= base_url('CourseController/Select_Quiz_Modal') ?>';
            $("#quiz_id").attr("value", $(this).attr('quiz_id'));
            quiz_id = $(this).attr('quiz_id');
            $("#course_id").attr("value", $(this).attr('course_id'));
            course_id = $(this).attr('course_id');

            $.ajax({
                url: base_url,
                method: "POST",
                data: {
                    quiz_id: window.quiz_id,
                    course_id: window.course_id
                },
                success: function(data) {
                    const obj = JSON.parse(data);

                    $("#showanswerlist").html("");
                    $("#showquestionlist").html("");

                    if (obj.length > 0) {
                        $("#showquestionlist").append("<div class='input-group'><span class='input-group-addon' id='basic-addon3'>ตั้งคำถามว่า : </span><form id='form_quiz'><input type='text' class='form-control' data-question-id='" + obj[0].quiz_question_id + "' id='Update_Quiz' aria-describedby='basic-addon3' value='" + obj[0].quiz_question_name + "'></form></div><br>");
                        for (i = 0; i < obj.length; i++) {
                            $("#showanswerlist").append("<div class='input-group'><span class='input-group-addon'><input type='radio' aria-label='...' style='width:20px; height:20px' name='Check_Answer2' id='Check_Answer2' value='" + (i + 1) + "'></span><input type='text' class='form-control' data-answer-id='" + obj[i].quiz_answer_id + "' aria-label='...' name='Choice_Answer2_" + (i + 1) + "' id='Choice_Answer2_" + (i + 1) + "' value='" + obj[i].quiz_answer_name + "'> </div><br>");
                        }

                    }
                }

            });

        });
    });

    $('#Quiz').on('input', function() {
        var input = $(this);
        var is_name = input.val();
        if (is_name) {
            input.removeClass("invalid").addClass("valid");
        } else {
            input.removeClass("valid").addClass("invalid");
        }
    });

    var Radio_Answer;
    var Radio_Answer2;
    $(document).ready(function() {
        $('#Radio_Answer').on("click", "input", function() {
            Radio_Answer = $(this).val();
            console.log(Radio_Answer);
            //console.log(typeof Radio_Answer);
        });
        $("#Quiz_Btn").click(function() {
            //console.log(i++);
            var Quiz = $("#Quiz").val();
            var Choice_Answer_1 = $("#Choice_Answer_1").val();
            var Choice_Answer_2 = $("#Choice_Answer_2").val();
            var Choice_Answer_3 = $("#Choice_Answer_3").val();
            var Choice_Answer_4 = $("#Choice_Answer_4").val();

            // alert("คอร์ส id " + window.course_id + "\n" + "คำถาม " + Quiz + "\n" + Choice_Answer_1 + " " + Choice_Answer_2 + " " + Choice_Answer_3 + " " + Choice_Answer_4 + "\n" +
            //     " คำตอบคือข้อที่ " + window.Radio_Answer + "\n" + " unit_index " + window.unit_index);
            //alert(typeof(window.Radio_Answer));
            var base_url = '<?= base_url('course/edit/') ?>';
            $.ajax({
                url: "<?= site_url('/CourseController/Create_Quiz') ?>",
                method: "POST",
                data: {
                    Course_id: window.course_id,
                    Quiz: Quiz,
                    Choice_Answer_1: Choice_Answer_1,
                    Choice_Answer_2: Choice_Answer_2,
                    Choice_Answer_3: Choice_Answer_3,
                    Choice_Answer_4: Choice_Answer_4,
                    Radio_Answer: window.Radio_Answer,
                    Unit_Index: window.unit_index
                },
                success: function(data) {
                    window.location.href = base_url + "/" + window.course_id;
                },
                error: function(data) {
                    alert("Error: " + data);
                }
            });
        });


    });
    $(document).ready(function() {
        $('#Radio_Answer2').on("click", "input", function() {
            Radio_Answer2 = $(this).val();
            console.log(Radio_Answer2);
            //console.log(typeof Radio_Answer);
        });
        $("#Edit_Quiz_Btn").click(function() {
            //console.log(i++);
            var Quiz_Question_id = $("#Update_Quiz").attr('data-question-id');
            var Quiz = $("#Update_Quiz").val();
            //console.log(Quiz_Question_id);

            var Quiz_Answer_id1 = $("#Choice_Answer2_1").attr('data-answer-id');
            //console.log(Quiz_Answer_id1);
            var Quiz_Answer_id2 = $("#Choice_Answer2_2").attr('data-answer-id');
            //console.log(Quiz_Answer_id2);
            var Quiz_Answer_id3 = $("#Choice_Answer2_3").attr('data-answer-id');
            //console.log(Quiz_Answer_id3);
            var Quiz_Answer_id4 = $("#Choice_Answer2_4").attr('data-answer-id');
            //console.log(Quiz_Answer_id4);


            var Choice_Answer_1 = $("#Choice_Answer2_1").val();
            var Choice_Answer_2 = $("#Choice_Answer2_2").val();
            var Choice_Answer_3 = $("#Choice_Answer2_3").val();
            var Choice_Answer_4 = $("#Choice_Answer2_4").val();

            /*alert("คอร์ส id " + window.course_id + "\n" + "คำถาม " + Quiz + "\n" + Choice_Answer_1 + " " + Choice_Answer_2 + " " + Choice_Answer_3 + " " + Choice_Answer_4 + "\n" +
                " คำตอบคือข้อที่ " + window.Radio_Answer2 + "\n");*/
            //alert(typeof(window.Radio_Answer));


            var base_url = '<?= base_url('course/edit/') ?>';
            $.ajax({
                url: "<?= site_url('/CourseController/Update_Quiz') ?>",
                method: "POST",
                data: {
                    Quiz_Question_id: Quiz_Question_id,
                    Quiz: Quiz,
                    Quiz_Answer_id1: Quiz_Answer_id1,
                    Choice_Answer_1: Choice_Answer_1,
                    Quiz_Answer_id2: Quiz_Answer_id2,
                    Choice_Answer_2: Choice_Answer_2,
                    Quiz_Answer_id3: Quiz_Answer_id3,
                    Choice_Answer_3: Choice_Answer_3,
                    Quiz_Answer_id4: Quiz_Answer_id4,
                    Choice_Answer_4: Choice_Answer_4,
                    Radio_Answer2: window.Radio_Answer2,
                },
                success: function(data) {
                    window.location.href = base_url + "/" + window.course_id;
                    //alert("success: " + data);
                },
                error: function(data) {
                    alert("Error: " + data);
                }
            });

        });
    });
    $(document).ready(function() {

        $("#form_quiz").validate({
            errorPlacement: function(error, element) {
                return true;
            },
            rules: {
                Quiz: {
                    required: true,
                    minlength: 5
                },

            },
            highlight: function(element) {
                $(element).closest('.form-group, .has-feedback').removeClass('has-success').addClass('has-error');
            },

            unhighlight: function(element) {
                $(element).closest('.form-group, .has-feedback').removeClass('has-error').addClass('has-success');
            },
        });
        $('#form_quiz input').on('keyup blur', function() {
            if ($('#form_quiz').valid()) {
                $('button.sayyes').prop('disabled', false);
                $("#show-hide").click(function() {
                    $('#content').css('display', 'block');
                    $("#content").fadeIn("slow");
                });
            } else {
                $('button.sayyes').prop('disabled', 'disabled');
                $('#content').css('display', 'none');
                $("#content").fadeOut("slow");

            }
        });
        $("#form_choice").validate({
            errorPlacement: function(error, element) {
                return true;
            },
            rules: {
                Check_Answer: {
                    required: true,
                },
                Choice_Answer_1: {
                    required: true,
                    minlength: 1
                },
                Choice_Answer_2: {
                    required: true,
                    minlength: 1
                },
                Choice_Answer_3: {
                    required: true,
                    minlength: 1
                },
                Choice_Answer_4: {
                    required: true,
                    minlength: 1
                },
            },
        });
        $('button.quiz_sayyes').prop('disabled', 'disabled');
        $('#form_choice input').on('keyup blur', function() {
            if ($('#form_choice').valid()) {
                $('button.quiz_sayyes').prop('disabled', false);
            } else {
                $('button.quiz_sayyes').prop('disabled', 'disabled');
            }
        });
    });
</script>
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 6000);
</script>
<script type="text/javascript">
    var quiz_id2;
    var course_id;
    var unit_index;
    var base_url = '<?= base_url('course/edit/') ?>';
    $(document).ready(function() {
        $(".sent_delete_quiz").click(function() {
            $("#course_id").attr("value", $(this).attr('course_id'));
            window.course_id = $(this).attr('course_id');
            $("#quiz_id").attr("value", $(this).attr('quiz_id'));
            window.quiz_id2 = $(this).attr('quiz_id');
            $("#unit_index").attr("value", $(this).attr('unit_index'));
            window.unit_index = $(this).attr('unit_index');
            console.log(window.quiz_id2);
            console.log("unit_index : " + window.unit_index);
            document.getElementById('output2').innerHTML = "รหัสคำถาม " + window.quiz_id2;

        });
        $(".send_delete_quiz").click(function() {

            $.ajax({
                url: '<?= site_url('/CourseController/delete_quiz') ?>',
                method: "POST",
                data: {
                    course_id: window.course_id,
                    quiz_id: window.quiz_id2
                },
                success: function(data) {
                    window.location.href = base_url + "/" + window.course_id;
                }

            });
        });
    });
</script>
<script type="text/javascript">
    var unit_id;
    var course_id;
    var unit_index;
    var unit_name;
    var base_url = '<?= base_url('course/edit/') ?>';
    $(document).ready(function() {
        $(".sent_delete_unit").click(function() {
            $("#course_id").attr("value", $(this).attr('course_id'));
            window.course_id = $(this).attr('course_id');
            $("#unit_id").attr("value", $(this).attr('unit_id'));
            window.unit_id = $(this).attr('unit_id');
            $("#unit_index").attr("value", $(this).attr('unit_index'));
            window.unit_index = $(this).attr('unit_index');
            $("#unit_name").attr("value", $(this).attr('unit_name'));
            window.unit_name = $(this).attr('unit_name');

            document.getElementById('output3').innerHTML = "ชื่อ unit : " + window.unit_name;

        });
        $(".delete_unit").click(function() {
            $.ajax({
                url: '<?= site_url('/CourseController/delete_unit') ?>',
                method: "POST",
                data: {
                    course_id: window.course_id,
                },
                success: function(data) {
                    window.location.href = base_url + "/" + window.course_id;
                }
            });
        });
    });
</script>
<script type="text/javascript">
    var course_id;
    var base_url = '<?= base_url('course/edit/') ?>';
    $(document).ready(function() {
        $(".sent_delete_document").click(function() {
            $("#course_id").attr("value", $(this).attr('course_id'));
            window.course_id = $(this).attr('course_id');
            console.log("doc : " + window.course_id);
            document.getElementById('output3').innerHTML = "รหัสคำถาม " + window.quiz_id2;

        });
        $(".btn_delete_document").click(function() {

            $.ajax({
                url: '<?= site_url('/CourseController/delete_document') ?>',
                method: "POST",
                data: {
                    course_id: window.course_id,
                    quiz_id: window.quiz_id2
                },
                success: function(data) {
                    window.location.href = base_url + "/" + window.course_id;
                }

            });
        });
    });
</script>

</html>