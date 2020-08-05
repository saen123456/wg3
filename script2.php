<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Workgress</title>

	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css'); ?>" type="text/css" media="screen"/>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/validate.css'); ?>" type="text/css" media="screen"/>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/form.css'); ?>" type="text/css" media="screen"/>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/navbar.css'); ?>" type="text/css" media="screen"/>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/dropdown.css'); ?>" type="text/css" media="screen">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  


</head>
<body></body>

	<?php
    $this->session = \Config\Services::session();
    if($this->session->get("Role_name") == 'student'){
		$role = 'นักเรียน';
	 }else if($this->session->get("Role_name") == 'teacher'){
		$role = 'คุณครู';
	 }else if($this->session->get("Role_name") == 'admin'){
		$role = 'ผู้ดูแล';
	 }
    ?>
<header>
	
	<?php
	 	if (session('msg')) : 
        	echo "<script type='text/javascript'>alert('อัพโหลดเรียบร้อย');</script>";
	 	endif 
	 ?>
	
		<a href="<?php echo base_url('/home');?>"><div class="logo"><img src="<?php echo base_url('assets/img/logo.png');?>"></div></a>
					<form action="/action_page.php">

						<div class="search">
						<div class="row" >
						<input type="text" name="fancy-text" id="fancy-text"/>
						</div>
							<button type="submit" class="searchButton">
								<i class="fa fa-search"></i>
							</button>
						</div>
						
					</form>
					
					<div class="navbar">
	  <label for="profile2" class="profile-dropdown">
      <input type="checkbox" id="profile2">
      <?php
	  if($this->session->get("Picture")){?>
      <img src="<?php echo $this->session->get("Picture");?>"><?php
	  }
	  else{?>
		<img src="<?php echo base_url('assets/img/profile.jpg');?>"><?php
	  }
	  ?>
      <span><?php 
				echo $role.' '.$this->session->get("Full_name"); 	
			?></span>
      <label for="profile2"><i class="mdi mdi-menu"></i></label>
      <ul>
		<li><a href="<?php echo base_url('/profile');?>"><i class="mdi mdi-account"></i>Profile</a></li>
		<?php
					if($this->session->get("Role_name") == 'student' )
					{
					?>
		<li><a href="<?= site_url('/UserController/updatetoteacherpage')?>"><i class="mdi mdi-settings"></i>สอนบน Workgress</a></li>
		<?php
					}else if($this->session->get("Role_name") == 'admin'){
			?>
		<li><a href="<?php echo base_url('/showuser');?>"><i class="mdi mdi-logout"></i>จัดการ USER</a></li>
		<?php
					}
					?>
		<li><a href="#"><i class="mdi mdi-logout"></i>Course</a></li>
		<li><a href="<?= site_url('/UserController/User_Logout')?>"><i class="mdi mdi-logout"></i>Logout</a></li>
      </ul>
    </label>
	</div>
				
                    
	</header>
	
	<section class="hero">
		<div class="background-image" style="background-image: url(<?= base_url('assets/img/bg.png');?>);"></div>
		<div class="templete-profile">
		<div class="main">
		
				<form action="javascript:void(0);" enctype="multipart/form-data" method="post">	
					<div class="photo">
						<div class="media-container">
							<span class="media-overlay">
							
								<input type="file" id="media-input" name="photo" >
								<i class="glyphicon glyphicon-edit media-icon"></i>
								
							</span>
							<figure class="media-object">
							<?php
								if($this->session->get("Picture")){?>
								<img class="img-object" src="<?php echo $this->session->get("Picture");?>"><?php
								}
								else{?>
								  <img class="img-object" src="<?php echo base_url('assets/img/profile.jpg');?>"><?php
								}
							?>
							</figure>
						</div>
						<h4><?php 
							echo $role.' '.$this->session->get("Full_name"); 	
					?></h4>
		
						<?php 
							if($this->session->get("Type") == 'normal'){
						?>
			
						<div class="media-control">	
								<button class="edit-profile" >แก้ไขรูปภาพ</button>
								<button class="save-profile"  formaction="<?= site_url('/UserController/Upload_Picture')?>">บันทึกรูปภาพ</button>
						</div>
						<?php
							}
						?>
					</div>
				</form>	

				

					<div class="add-on">

					<form action="<?php echo base_url('/accounts');?>" >
					<button>บัญชี</button>
					</form>

					<button class="btn-delete"><i class="fa fa-trash"></i> ปิดบัญชี </button>		

					</div>
					<form action="<?= site_url('/UserController/Update_Profile')?>" method="post" id="form-profile">
					<div class="header">
						<h4>โปรไฟล์สาธารณะ</h4>
						<h3>เพิ่มข้อมูลเกี่ยวกับตัวคุณ</h3>
					</div>
					<div class="input-form">
					<?php 
							if($this->session->get("Type") == 'normal'){
					?>
					<div class="report-row">
						<p>*สามารถแก้ไข หรือ
						ปรับเปลี่ยนได้ เฉพาะ ชื่อ</p>
					</div>
					<?php
							}
					?>
						<p>ข้อมูลทั่วไป:</p>
						<div class="row">
						<?php 
							if($this->session->get("Type") == 'normal'){
						?>
							<input type="text" name="Full_Name" id="fancy-text" value="<?php 
							echo $this->session->get("Full_name");?>" required/>
							<label for="fancy-text">ชื่อ-นามสกุล</label>
						<?php
							}else{?>
							<input type="text" name="Full_Name" id="fancy-text" value="<?php 
							echo $this->session->get("Full_name");?>" readonly/>
							<label for="fancy-text">ชื่อ-นามสกุล</label><?php
							}
						?>
						</div>
						<div class="row">
							<input type="text" name="#" id="fancy-text" value="<?php 
							echo $role	?>" readonly/>
							<label for="fancy-text">ตำแหน่ง</label>
						</div>
						<?php 
							if($this->session->get("Type") == 'normal'){
						?>
						<div class="are-submit">
						<input type="submit" tabindex="0" form="form-profile">
						</div>
						<?php
							}
						?>
					</div>
						</form>	
		</div>				
	</section>

	<footer>
		<ul>
			<li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
			<li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
			<li><a href="#"><i class="fa fa-snapchat-square"></i></a></li>
			<li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
			<li><a href="#"><i class="fa fa-github-square"></i></a></li>
		</ul>
		<p>Made by <a href="http://tutorialzine.com/" target="_blank">tutorialzine</a>. images courtesy to <a href="http://unsplash.com/" target="_blank">unsplash</a>.</p>
		<p>No attribution required. you can remove this footer.</p>
	</footer>

<script>
    $('.btn-delete').on('click', function() { 
		if(confirm("คุณต้องการลบบัญชีนี้ใช่หรือไม่ ?")) {
			if(confirm("คุณยืนยันที่จะลบบัญชีนี้ใช่หรือไม่ ?")){
				var url = "<?= site_url('/UserController/User_Delete')?>"; 
        		window.location.href = url;
			}
    }
    });
	
</script>
 

<?php include 'script_Profile.php';?>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/3.0.3/handlebars.min.js'></script>
</body>
</html>
 