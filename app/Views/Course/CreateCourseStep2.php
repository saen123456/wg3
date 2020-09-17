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
    <?php
    $this->session = \Config\Services::session();
    ?>
</head>


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
                        <a class="btn btn-danger btn-block sent" role="button" type="button" data-toggle="modal" data-target="#modal-danger" var course_id="<?php echo $this->session->get("Course_id") ?>"><i class="fa fa-trash"></i> ลบ </a>
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
                                                    <td><input class="td_minimal" type="checkbox" /></td>
                                                    <td>
                                                        <form action="#" id="uploadform">
                                                            <input type="text" name="Unit_Name" id="Unit_Name" placeholder="กรอกชื่อ unit ของคุณ เช่น บทนำ " />
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
                                                            </div>
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

                        <div class="form-group-image">
                            <label for="image" class="form-label2">ภาพหลักสูตร</label>
                            <div class="row">
                                <div class="main-image">
                                    <!-- <div class="input-group image-preview">
                                    </div> -->
                                    <img data-purpose="image-preview" alt="ภาพหลักสูตร" width="491" height="276" src="<?php echo base_url('assets/img/pre-image.png'); ?>" id="output">
                                    <br>
                                </div>
                                <div class=" main-text">
                                    <p>อัพโหลดรูปภาพหลักสูตรของคุณที่นี่ ภาพจะต้องตรงกับ มาตรฐานคุณภาพรูปภาพของเรา จึงจะใช้ได้ แนวทางสำคัญ: <b> 750x422 </b> พิกเซล ในรูปแบบ .jpg, .jpeg,. gif หรือ .png.
                                        โดยไม่มีข้อความบนรูปภาพ</p>
                                    <form action="<?= site_url('/CourseController/Upload_Picture_Course') ?>" enctype="multipart/form-data" method="post" id="uploadUnit">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div id="targetLayer" style="display:none;"></div>

                                        <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                                        <span class="input-group-btn">
                                            <!-- image-preview-clear button -->
                                            <!-- <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                <span class="glyphicon glyphicon-remove"></span> Clear
                                            </button> -->
                                            <!-- image-preview-input -->
                                            <div class="btn btn-default image-preview-input">
                                                <span class="glyphicon glyphicon-folder-open"></span>
                                                <span class="image-preview-input-title">Browse</span>
                                                <input type="file" accept="image/png, image/jpeg, image/gif" name="photo" id="uploadFile" onchange="loadFile(event)" /> <!-- rename it -->
                                            </div>
                                        </span>

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
                    <form action="<?= site_url('/CourseController/Update_Price') ?>">
                        <h2>การกำหนดราคาคอร์สของคุณ</h2>
                        <p class="desc">การกำหนดราคาคอร์สของคุณ</p>
                        <div class="box">
                            <select name="Course_Price">
                                <option value="0">ฟรี </option>
                                <option value="499">499 บาท (ระดับ 1)</option>
                                <option value="699">699 บาท (ระดับ 2)</option>
                                <option value="899">899 บาท (ระดับ 3)</option>
                                <option value="1099">1099 (ระดับ 4)</option>
                            </select>
                        </div>
                        <div style="position: absolute;right: 200px;bottom: 65px;">
                            <input type="submit" value="ยืนยันการสร้างคอร์ส" style="width: 160px;height: 50px;color: #fff;background: #4966b1;text-align: center;">
                        </div>
                    </form>
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
                    html += '<div class="col-sm-3"><input id="avatar" class="file-loading" type="file" name="Unit_Video_File" >';
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
                    uploadUnit($form);

                });

                function uploadUnit($form) {

                    $form.find('.progress-bar').removeClass('progress-bar-success')
                        .removeClass('progress-bar-danger');

                    var xhr = new window.XMLHttpRequest();
                    console.log(Unit_Count);
                    $.ajax({
                        url: "https://workgress.online/CourseController/Upload_Unit?Unit_Index=" + Unit_Count++,

                        //url: "http://localhost:8080/projectwg/CourseController/Upload_Unit?Unit_Index=" + Unit_Count++,
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

            $(function() {
                // Create the close button
                var closebtn = $('<button/>', {
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
                    var img = $('<img/>', {
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
                $('#uploadUnit').submit(function(event) {
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

            $(".sent").click(function() {
                $("#course_id").attr("value", $(this).attr('course_id'));
                var course_id = $(this).attr('course_id');
                //$($(this).attr('href')).modal('show');
                //console.log(course_id);
                document.getElementById('output').innerHTML = "รหัสคอร์ส " + course_id;
                //document.cookie = "course_id = " + course_id;
            });
        </script>
        <script>
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 6000);
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>


</html>