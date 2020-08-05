<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Workgress</title>

	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css'); ?>" type="text/css" media="screen"/>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/validate.css'); ?>" type="text/css" media="screen"/>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/form.css'); ?>" type="text/css" media="screen"/>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/navbar.css'); ?>" type="text/css" media="screen"/>
</head>
<body>

	<?php
	$this->session = \Config\Services::session();
    ?>
		<header>
		<a href="<?php echo base_url('/home');?>"><div class="logo"><img src="<?php echo base_url('assets/img/logo.png');?>"></div></a>
					<form action="/action_page.php">
					<div class="wrap">
						<div class="search">
							<input type="text" class="searchTerm" placeholder="ค้นหาได้ที่นี่">
							<button type="submit" class="searchButton">
								<i class="fa fa-search"></i>
							</button>
						</div>
						</div>
						
					</form>
					
				<?php
				
					 if($this->session->get("Role_name") == 'student'){
						$role = 'นักเรียน';
					 }else if($this->session->get("Role_name") == 'teacher'){
						$role = 'คุณครู';
					 }else if($this->session->get("Role_name") == 'admin'){
                        $role = 'ผู้ดูแล';
                     }
				
				?>

				<div class="navbar">
				
				<div class="dropdown">
					<button class="dropbtn">
						<?php 
							echo $role.' '.$this->session->get("Full_name"); 	
						?>
					<i class="fa fa-caret-down"></i>
					</button>
					<div class="dropdown-content">
					<a href="<?php echo base_url('/profile');?>">Profile</a>
					<?php
					if($this->session->get("Role_name") == 'student'){?>
						<a href="<?= site_url('/UserController/updatetoteacherpage')?>">สอนบน Workgress</a><?php
					}
					?>
					<a href="#">Course</a>
					<a href="<?= site_url('/UserController/User_Logout')?>">Logout</a>
					</div>
				</div>
				</div>
				
                    
	</header>
					
</body>
</html>
 