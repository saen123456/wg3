<!DOCTYPE html>
<html>

<head>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="x-ua-compatible" content="ie=edge">

		<title>Workgress</title>

		<!-- Font Awesome Icons -->
		<link rel="stylesheet" href="<?php echo base_url('plugins/select2/css/select2.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('plugins/fontawesome-free/css/all.min.css'); ?>">
		<!-- Theme style -->
		<link rel="stylesheet" href="<?php echo base_url('dist2/css/adminlte.min.css'); ?> ">
		<!-- Google Font: Source Sans Pro -->
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo base_url('dist2/css/photo.css'); ?>" type="text/css" media="screen">
		<link href="dist2/css/landing-page1.css" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/dropdown.css'); ?>" type="text/css" media="screen">
		<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css'>


		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

		<link rel="stylesheet" href="<?php echo base_url('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css'); ?>">
		<link rel="stylesheet" href="plugins/toastr/toastr.min.css">
		<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
		<script src="plugins/toastr/toastr.min.js"></script>
		<!-- Font Icon -->
		<link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
		<!-- Main css -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/step.css'); ?>" type="text/css" media="screen">

		<link rel="stylesheet" href="<?php echo base_url('assets/css/select.css'); ?>" type="text/css" media="screen">
		<link rel="stylesheet" href="<?php echo base_url('plugins/summernote/summernote-bs4.css'); ?> ">
		<!-- Animate.css -->
		<link rel="stylesheet" href="<?php echo base_url('assets/course/css/animate.css'); ?>" type="text/css" media="screen">

		<!-- Theme style  -->
		<link rel="stylesheet" href="assets/course/css/style.css">

		<!-- Modernizr JS -->
		<script src="assets/course/js/modernizr-2.6.2.min.js"></script>

		<link rel="preload" href="assets/css/footer.css " as="style" onload="this.rel='stylesheet'">

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

<body>
	<div class="main">
		<div class="signup-content">
			<div class="signup-desc">
				<div class="signup-desc-content">
					<h2><span><img src="<?php echo base_url('assets/img/logo1.png'); ?>"></span>Workgress</h2>
					<p class="title">สร้างคอร์ส ของคุณสำหรับให้คนมาศึกษาสิ่งใหม่ๆ ที่ Workgress</p>
					<p class="desc">
						MIT licensed illustrations for every project you can imagine and create
					</p>
					<img src="assets/img/signup-img.jpg" alt="" class="signup-img">
				</div>
			</div>
			<div class="signup-form-conent">
				<form method="post" action="<?= site_url('/CourseController/Create_Course') ?>" id="signup-form" class="signup-form" enctype="multipart/form-data">
					<h3></h3>
					<fieldset>
						<span class="step-current">Step 1 / 4</span>
						<div class="form-group">
							<input type="text" name="course_name" id="Title_name" required />
							<label for="Title_name">ชื่อคอร์สที่คุณจะสอน</label>
						</div>
					</fieldset>

					<h3></h3>
					<fieldset>
						<span class="step-current">Step 2 / 4</span>
						<div class="form-group">
							<label>
								<h4>เลือกประเภทของคอร์สที่คุณจะสอน</h4>
							</label>
							<select class="form-control select2 select2-purple" name="category_course_id" data-dropdown-css-class="select2-purple" style="width: 100%;" required>
								<option value="" disabled selected>เลือกประเภทของคอร์สที่คุณจะสอน</option>
								<option value="1">Web Development</option>
								<option value="2">Programming Languages</option>
								<option value="3">Mobile Apps</option>
								<option value="4">Database</option>
								<option value="5">Others</option>
							</select>
						</div>
					</fieldset>

					<h3></h3>
					<fieldset>
						<span class="step-current">Step 3 / 4</span>
						<div class="form-group">
							<label>
								<h4>รายละเอียดเกี่ยวกับคอร์สที่จะสอน</h4>
							</label>
							<textarea class="form-control" name="course_description" rows="3" placeholder="Enter ..." style="margin-top: 0px; margin-bottom: 0px; height: 200px;" required></textarea>
						</div>
					</fieldset>
					<h3></h3>
					<fieldset>
						<span class="step-current">Step 4 / 4</span>
						<div class="form-group">
							<h1>ทำการสร้างคอร์สเบื้องต้นเสร็จเรียบร้อยแล้ว</h1>
							<p>ขั้นตอนทันไป เป็นการกำหนดค่าต่างๆ</p>
						</div>
					</fieldset>

				</form>
			</div>
		</div>


	</div>

	<!-- JS -->
	<script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/vendor/jquery-validation/dist/jquery.validate.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/vendor/jquery-validation/dist/additional-methods.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/vendor/jquery-steps/jquery.steps.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/step.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/script2.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url('plugins/select2/js/select2.full.min.js'); ?>"></script>
	<script src="<?php echo base_url('dist2/js/adminlte.min.js'); ?>"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?php echo base_url('dist2/js/demo.js'); ?>"></script>
	<script src="<?php echo base_url('plugins/summernote/summernote-bs4.min.js'); ?>"></script>
	<script>
		$(function() {
			$('.select2').select2()
		})
	</script>


</html>