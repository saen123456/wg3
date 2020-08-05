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


	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

	<!-- Animate.css -->
	<link rel="stylesheet" href="<?php echo base_url('assets/course/css/animate.css'); ?>">

	<!-- Theme style  -->
	<link rel="stylesheet" href="<?php echo base_url('assets/course/css/style.css'); ?>">

	<!-- Modernizr JS -->
	<script src="<?php echo base_url('assets/course/js/modernizr-2.6.2.min.js'); ?>"></script>

	<link rel="preload" href="<?php echo base_url('assets/css/footer.css'); ?>" as="style" onload="this.rel='stylesheet'">

	<!-- Css player video -->
	<!-- <script src="https://cdn.plyr.io/3.6.2/plyr.js"></script> -->
	<!-- <link rel="stylesheet" href="https://cdn.plyr.io/3.6.2/plyr.css"> -->
	<script src="<?php echo base_url('assets/VideoPlayer/plyr.js'); ?>"></script>
	<link rel="preload" href="<?php echo base_url('assets/VideoPlayer/plyr.css'); ?>" as="style" onload="this.rel='stylesheet'">

	<!-- progress bar  -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://oss.maxcdn.com/jquery.form/3.50/jquery.form.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

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
					<li class="nav-item dropdown">
						<a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">หมวดหมู่ <i class="fas fa-th-large"></i></a>
						<ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
							<!-- <li><a href="#" class="dropdown-item">Some action </a></li>
                <li><a href="#" class="dropdown-item">Some other action</a></li> -->

							<li class="dropdown-divider"></li>

							<!-- Level two dropdown-->
							<li class="dropdown-submenu dropdown-hover">
								<a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">IT</a>
								<ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
									<li>
										<a tabindex="-1" href="#" class="dropdown-item">PostgreSql</a>
									</li>

									<!-- Level three dropdown-->
									<li class="dropdown-submenu">
										<a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">PHP</a>
										<ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
											<li><a href="#" class="dropdown-item">Codeigniter 4</a></li>
											<li><a href="#" class="dropdown-item">Laravel</a></li>
										</ul>
									</li>
									<!-- End Level three -->

									<li><a href="#" class="dropdown-item">Selenium</a></li>
									<li><a href="#" class="dropdown-item">AdoDB</a></li>
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

				<div class="navbar-collapse collapse w-200 order-3 dual-collapse" id="navbarSupportedContent">
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
									<a class="dropdown-item" href="<?php echo base_url('/createcourse'); ?>">เพิ่ม Course</a>
								<?php
								} else if ($this->session->get("Role_name") == 'teacher') { ?>
									<a class="dropdown-item" href="<?php echo base_url('/createcourse'); ?>">เพิ่ม Course</a>
								<?php
								}
								?>
								<a class="dropdown-item" href="<?php echo base_url('/profile'); ?>">My Course</a>
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
			<header class="masthead">
				<div class="overlay"></div>
				<div class="container">

				</div>
			</header>


			<!-- /.content-header -->
			<!-- Main content -->
			<div class="overlay"></div>
			<div class="container"><br><br><br><br>
				<div style="text-align:center;">
					<div class="container">

						<h3>Multi form file uploader using Jquery, PHP, Ajax, and Bootstrap - HackandPhp programming blog </h3>
						<hr>

						<div class="row">
							<div class='col-xs-12 col-sm-6 col-md-6 col-lg-6'>
								<ul class="list-inline">
									<li><button class="btn btn-success addmore" type="button"><i class="fa fa-plus"></i> Add More</button></li>
									<li> <button class="btn btn-danger delete" type="button"><i class="fa fa-trash"></i> Delete</button></li>
									<li><button class="btn btn-sm btn-primary upload-all"><i class="fa fa-upload"></i> Upload All</button></li>
									<li><button class="btn btn-sm btn-danger cancel-all"><i class="fa fa-ban"></i> Cancel All</button></li>
								</ul>
							</div>
						</div>

						<table class="table table-bordered table-hover" id="table_auto">
							<tr id="row_0">
								<td><input class="case" type="checkbox" /></td>
								<td>
									<form action="#">
										<div class="col-sm-3">
											<input id="avatar" class="file-loading" type="file" name="uploadFile">
										</div>
										<div class="col-sm-5">
											<div class="progress progress-striped active">
												<div class="progress-bar" style="width:0%"></div>
											</div>
										</div>
										<div class="col-sm-4">
											<button class="btn btn-sm btn-info upload" type="submit"><i class="fa fa-upload"></i> Upload</button>
											<button type="button" class="btn btn-sm btn-danger cancel"><i class="fa fa-ban"></i> Cancel</button></div>
									</form>
								</td>

							</tr>
						</table>

						<hr>

					</div>
					<script type="text/javascript">
						$(document).ready(function() {
							var i = $('#table_auto tr').length; // Get the no.of rows in the table
							$(".addmore").on('click', function() {
								html = '<tr id="row_' + i + '">';
								html += '<td><input class="case" type="checkbox"/></td>';
								html += '<td>';
								html += '<form action="#">';
								html += '<div class="col-sm-3"><input id="avatar" class="file-loading" type="file" name="uploadFile" >';
								html += '</div><div class="col-sm-5"><div class="progress progress-striped active"><div class="progress-bar" style="width:0%"></div></div></div><div class="col-sm-4">';
								html += '<button class="btn btn-sm btn-info upload" type="submit"><i class="fa fa-upload"></i> Upload</button><button type="button" class="btn btn-sm btn-danger cancel"><i class="fa fa-ban"></i> Cancel</button></div>';
								html += '</form>';
								html += '</td>';
								html += '</tr>';
								$('#table_auto').append(html); //Append the new row to the table
								i++;
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
								$.ajax({
									url: "<?= site_url('/CourseController/Upload_Test') ?>",
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

					<?php
					$count = 0;
					foreach ($data as $row) :
						$count++;
						echo $row['video_id'] . " " . $row['video_name'] . " " . $row['video_link'];
						echo "<br>";
						echo "<video id='player$count' playsinline controls data-poster=''>
						<source src='" . $row['video_link'] . "' type='video/webm'>
						</video>"
						?>
						<script>
							const player<?php echo $count ?> = new Plyr('#player<?php echo $count ?>');
						</script>
					<?php
					endforeach;
					?>
				</div>
				<?php

				?>

			</div>





			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
			<div class="p-3">
				<h5>Profile</h5>
				<p>Sidebar content</p>
			</div>
		</aside>
		<!-- /.control-sidebar -->

		<!-- Main Footer -->
		<footer class="main-footer">
			<div class="footernew">
			</div>
		</footer>
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