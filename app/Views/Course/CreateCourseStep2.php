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



<body class="body2">

    <div class="main2">

        <div class="container2">
            <div id="signup-form">

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
                <h3>หลักสูตร</h3>
                <fieldset class="fieldset2">
                    <h2>หลักสูตร</h2>
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
                                                        <li><button class="btn btn-success addmore" type="button"><i class="fa fa-plus"></i> เพิ่ม Unit</button></li>
                                                        <li> <button class="btn btn-danger delete" type="button"><i class="fa fa-trash"></i> ลบ Unit</button></li>

                                                    </ul>
                                                </div>
                                            </div>

                                            <table class="table table-bordered table-hover" id="table_auto">
                                                <tr id="row_0">
                                                    <td><input class="case" type="checkbox" /></td>
                                                    <td>
                                                        <form action="#" id="uploadform">
                                                            <input type="text" name="Unit_Name" id="Unit_Name" placeholder="กรอกชื่อ unit ของคุณ เช่น ส่วนที่ 1 บทนำ " />
                                                            <br>
                                                            <div class="col-sm-3">
                                                                <input id="avatar" class="file-loading" type="file" name="Unit_Video_File">
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="progress progress-striped active">
                                                                    <div class="progress-bar" style="width:0%"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <button class="btn btn-sm btn-info upload" type="submit"><i class="fa fa-upload"></i> Upload Unit</button>
                                                        </form>
                                                    </td>

                                                </tr>
                                            </table>

                                            <hr>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                </fieldset>


                <h3>หน้าเริ่มต้นของหลักสูตร</h3>
                <fieldset class="fieldset2">
                    <h2>หน้าเริ่มต้นของหลักสูตร</h2>
                    <div class="form-find">
                        <p class="desc">Please enter your infomation and proceed to next step so we can build your
                            account</p>
                    </div>
                    <div class="fieldset-content2">
                        <div class="form-group">
                            <label for="find_bank" class="form-label2">ชื่อหลักสูตร</label>
                            <input type="text" name="find_bank" id="find_bank" placeholder="ใส่ชื่อหลักสูตรของคุณ" maxlength="60" />
                        </div>
                        <div class="form-group">
                            <label for="find_bank" class="form-label2">คำอธิบายหลักสูตร</label>
                            <textarea placeholder="ใส่คำอธิบายของหลักสูตรคุณ">
                                    </textarea>
                        </div>

                        <div class="form-group-image">
                            <label for="image" class="form-label2">ภาพหลักสูตร</label>
                            <form action="javascript:void(0);" enctype="multipart/form-data" method="post">
                                <div class="row">
                                    <div class="tab-pane" id="photo">
                                        <div class="main-image">
                                            <div class="media-container">
                                                <span class="media-overlay">
                                                    <input type="file" id="media-input" name="photo">
                                                    <i class="fa fa-file-image-o"></i>
                                                </span>
                                                <figure class="media-object">
                                                    <img class="img-object" src="<?php echo base_url('assets/img/pre-image.png'); ?>" width="491" height="276" data-purpose="image-preview">
                                                </figure>
                                            </div>
                                        </div>
                                        <div class="media-control">
                                            <button class="edit-profile">กดปุ่มนี้เพื่อแก้ไขรูปภาพ</button>
                                            <button class="save-profile" formaction="<?= site_url('/UserController/Upload_Picture') ?>">กดปุ่มนี้เพื่อบันทึกรูปภาพ</button>
                                        </div>
                                        <div class="main-text">
                                            <p>อัพโหลดรูปภาพหลักสูตรของคุณที่นี่ ภาพจะต้องตรงกับ มาตรฐานคุณภาพรูปภาพของเรา จึงจะใช้ได้ แนวทางสำคัญ: <b> 750x422 </b> พิกเซล ในรูปแบบ .jpg, .jpeg,. gif หรือ .png.
                                                โดยไม่มีข้อความบนรูปภาพ</p>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane" id="photo">
                            <form action="javascript:void(0);" enctype="multipart/form-data" method="post">
                                <div class="offset-sm-2 col-sm-12">
                                    <div class="media-container">
                                        <span class="media-overlay">
                                            <input type="file" id="media-input" name="photo">
                                            <i class="fa fa-file-image-o"></i>

                                        </span>
                                        <figure class="media-object">
                                            <img class="img-object" src="<?php echo base_url('assets/img/pre-image.png'); ?>">
                                        </figure>
                                    </div>
                                    <?php
                                    if ($this->session->get("Type") == 'normal') {
                                        ?>

                                        <div class="media-control">
                                            <button class="edit-profile">กดปุ่มนี้เพื่อแก้ไขรูปภาพ</button>
                                            <button class="save-profile" formaction="<?= site_url('/UserController/Upload_Picture') ?>">กดปุ่มนี้เพื่อบันทึกรูปภาพ</button>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>

                            </form>
                        </div>


                        <div class="form-group-image">
                            <label for="image" class="form-label2">วิดีโอโปรโมชั่น</label>
                            <div class="row">
                                <div class="main-image">
                                    <img data-purpose="image-preview" alt="ภาพหลักสูตร" width="491" height="276" src="<?php echo base_url('assets/img/pre-image.png'); ?>">
                                </div>
                                <div class="main-text">
                                    <p>ผู้เรียนที่ได้ชมวิดีโอส่งเสริมการขายที่ผลิตอย่างดี มีแนวโน้มที่จะลงทะเบียนเพิ่มขึ้น 5 เท่า ในหลักสูตรของคุณ เราเห็นสถิติเพิ่มขึ้นถึง 10 เท่า สำหรับวิดีโอที่ทำได้อย่างดีเยี่ยม! </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </fieldset>

                <h3>การกำหนดราคา</h3>
                <fieldset class="fieldset2">
                    <h2>Set Financial Goals</h2>
                    <p class="desc">Set up your money limit to reach the future plan</p>
                    <div class="fieldset-content2">
                        <div class="donate-us">
                            <div class="price_slider ui-slider ui-slider-horizontal">
                                <div id="slider-margin"></div>
                                <p class="your-money">
                                    Your money you can spend per month :
                                    <span class="money" id="value-lower"></span>
                                    <span class="money" id="value-upper"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                var i = $('#table_auto tr').length; // Get the no.of rows in the table
                var j = 2;
                var Unit_Index = 1;
                $(".addmore").on('click', function() {
                    html = '<tr id="row_' + i + '">';
                    html += '<td><input class="case" type="checkbox"/></td>';
                    html += '<td>';
                    html += '<form action="#">';
                    html += '<input type="text" name="Unit_Name" id="Unit_Name" placeholder="กรอกชื่อ unit ของคุณ เช่น ส่วนที่' + j + '" />';
                    html += '<br>';
                    html += '<div class="col-sm-3"><input id="avatar" class="file-loading" type="file" name="Unit_Video_File" >';
                    html += '</div><div class="col-sm-5"><div class="progress progress-striped active"><div class="progress-bar" style="width:0%"></div></div></div><div class="col-sm-4">';
                    html += '<button class="btn btn-sm btn-info upload" type="submit"><i class="fa fa-upload"></i> Upload Unit</button></div>';
                    html += '</form>';
                    html += '</td>';
                    html += '</tr>';
                    $('#table_auto').append(html); //Append the new row to the table
                    i++;
                    j++;
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
                    $('form').submit();
                });
                $('.cancel-all').click(function() {
                    //submit all form
                    $('form .cancel').click();
                });

                $(document).on('submit', 'form', function(e) {
                    e.preventDefault();
                    $form = $(this);
                    uploadImage($form);

                });

                function uploadImage($form) {

                    $form.find('.progress-bar').removeClass('progress-bar-success')
                        .removeClass('progress-bar-danger');

                    var xhr = new window.XMLHttpRequest();
                    //console.log(Unit_Index);
                    $.ajax({
                        url: "https://workgress.online/CourseController/Upload_Unit?Unit_Index=" + Unit_Index++,

                        // url: "<?php
                                    //         echo site_url('/CourseController/Upload_Unit?unit=' . $count . '');
                                    //         // echo site_url('/CourseController/Upload_Test');
                                    //         
                                    ?>",
                        type: "POST",
                        data: new FormData($form[0]),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            $form.closest('tr').find('td:nth-child(3)').text(data.image);
                            $form.closest('tr').find('td:nth-child(4)').html(data.destination);
                            $form[0].reset();


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
                                setTimeout(function() {
                                    $(".progress-bar").hide();
                                }, 5000);
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
</body>
<!-- JS -->

<script src="<?php echo base_url('assets/course/step2/vendor2/jquery-validation/dist/jquery.validate.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/course/step2/vendor2/jquery-validation/dist/additional-methods.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/course/step2/vendor2/jquery-steps/jquery.steps.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/course/step2/vendor2/minimalist-picker/dobpicker.js'); ?>"></script>
<script src="<?php echo base_url('assets/course/step2/vendor2/nouislider/nouislider.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/course/step2/vendor2/wnumb/wNumb.js'); ?>"></script>
<script src="<?php echo base_url('assets/course/step2/js/main.js'); ?>"></script>

</html>