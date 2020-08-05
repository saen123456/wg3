<!DOCTYPE html>
<html>

<head>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="x-ua-compatible" content="ie=edge">

		<title>Workgress</title>

		<!-- Font Awesome Icons -->
		<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="dist2/css/adminlte.min.css">
		<!-- Google Font: Source Sans Pro -->
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo base_url('dist2/css/photo.css'); ?>" type="text/css" media="screen">
		<link href="dist2/css/landing-page1.css" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/dropdown.css'); ?>" type="text/css" media="screen">
		<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css'>


		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

		<link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
		<link rel="stylesheet" href="plugins/toastr/toastr.min.css">
		<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
		<script src="plugins/toastr/toastr.min.js"></script>

		<!-- Animate.css -->
		<link rel="stylesheet" href="assets/course/css/animate.css">

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

		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<header class="masthead">
				<div class="overlay"></div>
				<div class="container">
					<section class="content">
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-3">

									<!-- Profile Image -->
									<div class="card card-primary card-outline">
										<div class="card-body box-profile">
											<div class="text-center">
												<?php
												if ($this->session->get("Picture")) { ?>
													<img class="profile-user-img img-fluid img-circle" src="<?php echo $this->session->get("Picture"); ?>" alt="User profile picture"><?php
																																													} else { ?>
													<img class="profile-user-img img-fluid img-circle" src="<?php echo base_url('assets/img/profile.jpg'); ?>" alt="User profile picture"><?php
																																														}
																																															?>

											</div>

											<h4 class="profile-username text-center"><?php echo $this->session->get("Full_name"); ?></h4>
											<h5 class="profile-username text-center"><?php echo 'ตำแหน่ง : ' . $role ?></h5>


										</div>
										<!-- /.card-body -->
									</div>
									<!-- /.card -->
									<div class="card card-primary">
										<div class="card-header">
											<h3 class="card-title">คอร์สที่กำลังเรียนอยู่</h3>
										</div>
										<!-- /.card-header -->
										<div class="card-body">
											<strong><i class="fas fa-book mr-1"></i> Education</strong>

											<p class="text-muted">
												B.S. in Computer Science from the University of Tennessee at Knoxville
											</p>

											<hr>

											<strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

											<p class="text-muted">Malibu, California</p>

											<hr>

											<strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

											<p class="text-muted">
												<span class="tag tag-danger">UI Design</span>
												<span class="tag tag-success">Coding</span>
												<span class="tag tag-info">Javascript</span>
												<span class="tag tag-warning">PHP</span>
												<span class="tag tag-primary">Node.js</span>
											</p>

											<hr>

											<strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

											<p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
										</div>
										<!-- /.card-body -->
									</div>

								</div>
								<!-- /.col -->
								<div class="col-md-9">
									<div class="card">
										<div class="card-header p-2">
											<ul class="nav nav-pills">
												<li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">แก้ไข</a></li>
												<li class="nav-item"><a class="nav-link" href="#photo" data-toggle="tab">ภาพถ่าย</a></li>
												<li class="nav-item"><a class="nav-link" href="#accout" data-toggle="tab">บัญชี</a></li>
											</ul>
										</div><!-- /.card-header -->
										<div class="card-body">
											<div class="tab-content">

												<!-- /.tab-pane -->
												<div class="active tab-pane" id="settings">
													<form class="form-horizontal" action="<?= site_url('/UserController/Update_Profile') ?>" method="post">
														<?php
														if ($this->session->get("Type") == 'normal') {
														?>
															<div class="form-group row">
																<label for="inputName" class="col-sm-2 col-form-label">ชื่อ-นามสกุล</label>
																<div class="col-sm-10">
																	<input type="text" class="form-control" name="Full_Name" id="Full_Name" value="<?php echo $this->session->get("Full_name"); ?>" placeholder="ชื่อ-นามสกุล" required>
																</div>
															</div>
														<?php
														} else { ?>
															<div class="form-group row">
																<label for="inputName" class="col-sm-2 col-form-label">ชื่อ-นามสกุล</label>
																<div class="col-sm-10">
																	<input type="text" class="form-control" name="Full_Name" id="Full_Name" value="<?php echo $this->session->get("Full_name"); ?>" placeholder="ชื่อ-นามสกุล" readonly>
																</div>
															</div><?php
																}
																	?>
														<div class="form-group row">
															<div class="offset-sm-2 col-sm-10">
																<button type="submit" class="btn btn-danger">ยืนยัน</button>

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
																	<?php
																	if ($this->session->get("Picture")) { ?>
																		<img class="img-object" src="<?php echo $this->session->get("Picture"); ?>"><?php
																																				} else { ?>
																		<img class="img-object" src="<?php echo base_url('assets/img/profile.jpg'); ?>"><?php
																																					}
																																						?>
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

												<!-- ส่วนของ TAB บัญชี -->
												<div class="tab-pane" id="accout">
													<form class="form-horizontal" action="#" method="post">
														<div class="form-group row">
															<label for="inputName" class="col-sm-2 col-form-label">อีเมล :</label>
															<div class="col-sm-10">
																<div class="input-group mb-3">
																	<input type="text" class="form-control" name="email" id="email" value="<?php echo $this->session->get("Email"); ?>" readonly>
																	<div class="input-group-append">
																		<div class="input-group-text">
																			<span class="fas fa-envelope"></span>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="form-group row">
															<label for="inputName" class="col-sm-2 col-form-label">รหัส</label>
															<div class="col-sm-10">
																<div class="changepass">
																	<div class="input-group mb-3">
																		<input type="text" class="form-control" name="pass" id="pass" value="*******" placeholder="ชื่อ-นามสกุล" readonly>
																		<span class="input-group-append">
																		<button  type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-default" ><span class="fas fa-pen"></span></button>
																	</span>
																	</div>
																</div>
															</div>
														</div>
													</form>
												</div>
												<!-- จบส่วนของ TAB บัญชี -->

												<!-- /.tab-pane -->
											</div>
											<!-- /.tab-content -->
										</div><!-- /.card-body -->
									</div>
									<!-- /.nav-tabs-custom -->
								</div>
								<!-- /.col -->
							</div>
							<!-- /.row -->
						</div><!-- /.container-fluid -->
					</section>
				</div>
			</header>


			<!-- /.content-header -->

			<!-- Main content -->


			<div class="colorlib-loader"></div>
			<div class="colorlib-classes">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-md-3 col-md-offset-2 text-center colorlib-heading animate-box"><br>
							<h2 style="font-family: Roboto;font-style: normal;font-weight: normal;">หลักสูตรยอดนิยม</h2>
							<h3>
								<svg width="38" height="2" viewBox="0 0 38 2" fill="none" xmlns="http://www.w3.org/2000/svg">
									<rect width="38" height="2" fill="black" />
								</svg>
							</h3>
						</div>
					</div>

					<div class="row">
						<div class="col-md-3 animate-box">
							<div class="classes">
								<div class="classes-img" style="background-image: url(assets/course/images/classes-1.jpg);">
									<span class="price text-center"><small>$450</small></span>
								</div>
								<div class="desc">
									<h3><a href="#">Developing Mobile Apps</a></h3>
									<p>Pointing has no control about the blind texts it is an almost unorthographic life</p>
									<p><a href="#" class="btn-learn">Learn More <i class="icon-arrow-right3"></i></a></p>
								</div>
							</div>
						</div>

						<div class="col-md-3 animate-box">
							<div class="classes">
								<div class="classes-img" style="background-image: url(assets/course/images/classes-2.jpg);">
									<span class="price text-center"><small>$450</small></span>
								</div>
								<div class="desc">
									<h3><a href="#">Convert PSD to HTML</a></h3>
									<p>Pointing has no control about the blind texts it is an almost unorthographic life</p>
									<p><a href="#" class="btn-learn">Learn More <i class="icon-arrow-right3"></i></a></p>
								</div>
							</div>
						</div>

						<div class="col-md-3 animate-box">
							<div class="classes">
								<div class="classes-img" style="background-image: url(assets/course/images/classes-3.jpg);">
									<span class="price text-center"><small>$450</small></span>
								</div>
								<div class="desc">
									<h3><a href="#">Convert HTML to WordPress</a></h3>
									<p>Pointing has no control about the blind texts it is an almost unorthographic life</p>
									<p><a href="#" class="btn-learn">Learn More <i class="icon-arrow-right3"></i></a></p>
								</div>
							</div>
						</div>

						<div class="col-md-3 animate-box">
							<div class="classes">
								<div class="classes-img" style="background-image: url(assets/course/images/classes-4.jpg);">
									<span class="price text-center"><small>$450</small></span>
								</div>
								<div class="desc">
									<h3><a href="#">Developing Mobile Apps</a></h3>
									<p>Pointing has no control about the blind texts it is an almost unorthographic life</p>
									<p><a href="#" class="btn-learn">Learn More <i class="icon-arrow-right3"></i></a></p>
								</div>
							</div>
						</div>

						<div class="col-md-3 animate-box">
							<div class="classes">
								<div class="classes-img" style="background-image: url(assets/course/images/classes-5.jpg);">
									<span class="price text-center"><small>$450</small></span>
								</div>
								<div class="desc">
									<h3><a href="#">Learned Smoke Effects</a></h3>
									<p>Pointing has no control about the blind texts it is an almost unorthographic life</p>
									<p><a href="#" class="btn-learn">Learn More <i class="icon-arrow-right3"></i></a></p>
								</div>
							</div>
						</div>

						<div class="col-md-3 animate-box">
							<div class="classes">
								<div class="classes-img" style="background-image: url(assets/course/images/classes-6.jpg);">
									<span class="price text-center"><small>$450</small></span>
								</div>
								<div class="desc">
									<h3><a href="#">Convert HTML to WordPress</a></h3>
									<p>Pointing has no control about the blind texts it is an almost unorthographic life</p>
									<p><a href="#" class="btn-learn">Learn More <i class="icon-arrow-right3"></i></a></p>
								</div>
							</div>
						</div>

						<div class="col-md-3 animate-box">
							<div class="classes">
								<div class="classes-img" style="background-image: url(assets/course/images/classes-6.jpg);">
									<span class="price text-center"><small>$450</small></span>
								</div>
								<div class="desc">
									<h3><a href="#">Convert HTML to WordPress</a></h3>
									<p>Pointing has no control about the blind texts it is an almost unorthographic life</p>
									<p><a href="#" class="btn-learn">Learn More <i class="icon-arrow-right3"></i></a></p>
								</div>
							</div>
						</div>

						<div class="col-md-3 animate-box">
							<div class="classes">
								<div class="classes-img" style="background-image: url(assets/course/images/classes-6.jpg);">
									<span class="price text-center"><small>$450</small></span>
								</div>
								<div class="desc">
									<h3><a href="#">Convert HTML to WordPress</a></h3>
									<p>Pointing has no control about the blind texts it is an almost unorthographic life</p>
									<p><a href="#" class="btn-learn">Learn More <i class="icon-arrow-right3"></i></a></p>
								</div>
							</div>
						</div>

					</div>
				</div>

			</div>

			<div style="background-image: url(assets/img/bg3.png); background-size: 100%; height:501px;">
				<div class="overlay"></div>
				<div class="container"><br><br><br>
					<h1 style="font-family: Roboto;font-style: normal;font-weight: bold;font-size: 64px;color: white;text-align: center;">เป้าหมาย Workgress</h1>
					<h3 style="font-family: Roboto;font-style: normal;font-weight: 300;font-size: 26px;color: white;text-align: center;">เพิ่มประสบการณ์การเรียนรู้ที่ทันสมัย รวดเร็ว สะดวก</h3>
					<br>
					<div style="text-align:center;">

					</div>
				</div>
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
	<div class="modal fade" id="modal-default">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">เปลี่ยนรหัสผ่าน</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="card">
						<div class="card-body login-card-body">
							<form action="<?= site_url('/UserController/Change_Password') ?>" method="post" id="changepassForm">
								<div class="form-group">
									<label for="password">รหัสผ่านเก่า :</label>
									<div class="input-group mb-3">
										<input type="password" name="Password_Old" class="form-control" id="password" placeholder="Password">
										<div class="input-group-append">
											<div class="input-group-text">
												<span class="fas fa-eye-slash" id="eye2"></span>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="password">รหัสผ่านใหม่ :</label>
									<div class="input-group mb-3">
										<input type="password" name="Password_New" class="form-control" id="Passwordnew" placeholder="Password">
										<div class="input-group-append">
											<div class="input-group-text">
												<span class="fas fa-eye-slash" id="eye"></span>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword2">ยืนยันรหัสผ่านใหม่ :</label>
									<div class="input-group mb-3">
										<input type="password" name="Password_ac" class="form-control" id="exampleInputPassword2" placeholder="Password">
										<div class="input-group-append">
											<div class="input-group-text">
												<span class="fas fa-eye-slash" id="eye1"></span>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<!-- /.col -->
									<div class="col-4">
										<button type="submit" class="btn btn-primary btn-block">ยืนยัน</button>
									</div>
									<!-- /.col -->
								</div>
							</form>
						</div>
						<!-- /.login-card-body -->
					</div>

				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>

	<!-- Content Wrapper. Contains page content -->
	<!-- ./wrapper -->

	<!-- REQUIRED SCRIPTS -->

	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="dist2/js/adminlte.min.js"></script>

	<!-- Waypoints -->
	<script src="<?php echo base_url('assets/course/js/jquery.waypoints.min.js'); ?>"></script>

	<!-- Flexslider -->
	<script src="assets/course/js/jquery.flexslider-min.js"></script>

	<!-- Main -->
	<script src="assets/course/js/main.js"></script>

	<!-- AdminLTE for demo purposes -->
	<script src="dist2/js/demo.js"></script>
	<script src="dist2/js/script.js"></script>
	<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
	<script src="plugins/jquery-validation/additional-methods.min.js"></script>

	<script type="text/javascript">
		window.setTimeout(function() {
			$(".alert").fadeTo(500, 0).slideUp(500, function() {
				$(this).remove();
			});
		}, 60000);
		$(function() {

			$('#eye2').click(function() {

				if ($(this).hasClass('fa-eye-slash')) {

					$(this).removeClass('fa-eye-slash');

					$(this).addClass('fa-eye');

					$('#password').attr('type', 'text');

				} else {

					$(this).removeClass('fa-eye');

					$(this).addClass('fa-eye-slash');

					$('#password').attr('type', 'password');
				}
			});
			$('#eye').click(function() {

				if ($(this).hasClass('fa-eye-slash')) {

					$(this).removeClass('fa-eye-slash');

					$(this).addClass('fa-eye');

					$('#Passwordnew').attr('type', 'text');

				} else {

					$(this).removeClass('fa-eye');

					$(this).addClass('fa-eye-slash');

					$('#Passwordnew').attr('type', 'password');
				}
			});
			$('#eye1').click(function() {

				if ($(this).hasClass('fa-eye-slash')) {

					$(this).removeClass('fa-eye-slash');

					$(this).addClass('fa-eye');

					$('#exampleInputPassword2').attr('type', 'text');

				} else {

					$(this).removeClass('fa-eye');

					$(this).addClass('fa-eye-slash');

					$('#exampleInputPassword2').attr('type', 'password');
				}
			});
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function() {

			var value = $("#Passwordnew").val();
			$.validator.addMethod("checklower", function(value) {
				return /[a-z]/.test(value);
			});
			$.validator.addMethod("checkupper", function(value) {
				return /[A-Z]/.test(value);
			});
			$.validator.addMethod("checkdigit", function(value) {
				return /[0-9]/.test(value);
			});

			$('#changepassForm').validate({
				rules: {
					Password_New: {
						minlength: 5,
						required: true,
						checklower: true,
						checkupper: true,
						checkdigit: true
					},
					Password_ac: {
						required: true,
						minlength: 5,
						equalTo: "#Passwordnew"
					},
				},
				messages: {
					Password_New: {
						minlength: "ต้องมากกว่า 5 ตัวขึ้นไป",
						checklower: "ต้องมี ตัวอักษรขนาดเล็กอย่างน้อย 1 ตัว",
						checkupper: "ต้องมี ตัวอักษรขนาดใหญ่อย่างน้อย 1 ตัว",
						checkdigit: "ต้องมี ตัวเลขอย่างน้อย 1 ตัว",
						required: "กรุณาใส่รหัสผ่านใหม่"
					},

					Password_ac: "รหัสผ่านไม่เหมือนกัน กรุณากรองใหม่อีกครั้ง"
				},
				errorElement: 'span',
				errorPlacement: function(error, element) {
					error.addClass('invalid-feedback');
					element.closest('.form-group').append(error);
				},
				highlight: function(element, errorClass, validClass) {
					$(element).addClass('is-invalid');
				},
				unhighlight: function(element, errorClass, validClass) {
					$(element).removeClass('is-invalid');
				}
			});
		});
	</script>
</body>

</html>