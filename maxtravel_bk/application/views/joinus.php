<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>MaxxHolidays.com</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
	<!-- Animate.css -->
	<!-- <link rel="stylesheet" href="css/animate.css"> -->
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css');?>">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/owl.carousel.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/owl.theme.default.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
	<!-- Modernizr JS -->
	<script src="<?php echo base_url('assets/js/modernizr-2.6.2.min.js');?>"></script>
	<!-- FOR IE9 below -->
	<style>
		#page {
			position: relative;
			z-index: 9;
		}

		#loading {
			display: block;
			position: fixed;
			top: 0;
			left: 0;
			z-index: 99999999999;
			width: 100%;
			height: 100%;
			background: #2d024f;
		}
	</style>
</head>

<body>
	<div id="loading">
		<div class="page-loader"></div>
	</div>
	<div id="page">
		<nav id="colorlib-main-nav" role="navigation">
			<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle buttonnavs active "><i></i></a>
			<div class="colorlib-table">
				<div class="colorlib-table-cell">
					
					<div class="row">
						<div class="col-md-12">

							<?php
								/*$checkuservars = $this->session->userdata; 
								if(isset($checkuservars['is_logged_in']) && $checkuservars['is_logged_in'] != 1){
									include_once('before_login_menu.php');
								  }else{
								  	include_once('after_login_menu.php');
								  }*/
								  include_once('before_login_menu.php');
							?>
						</div>
					</div>
				</div>
			</div>
		</nav>

		<div id="colorlib-page" class="float-left w-100">
			<header class="home-header header-other-page w-100 float-left inner-header" style="background: url(<?php echo base_url('assets/images/calculator-bg.jpg');?>);">
				<div class="w-100 float-left inner-header-bg-two">
				<div class="container position-relative">
					<div class="w-100 logo-others text-center mt-2">
						<a href="<?php echo base_url('home');?>"><img src="<?php echo base_url('assets/images/logo-mh.png');?>" alt=""></a>
					</div>
					<div class="w-100 float-left text-center page-title-inner-pages mt-5">
						<h2>Join Us</h2>
					</div>
					<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle colorlib-nav-toggle-other-pages"><i></i></a>
				</div>
			</div>
			</header>

			

			<section class="w-100 float-left wrap-signup pt-3  wrap-join">
				<div class="container">
					<div class="row">
<div class="w-100 text-center float-left">
						<div class="col-lg-7 col-md-7 col-10 d-inline-block join-wrap mt-5">
							<h3 class="text-uppercase mb-4">Why You Join MaxxHolidays?</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus felis id dolor dignissim vel vulputate eros feugiat. Mauris accumsan aliquam ultrices. Vivamus sit amet pulvinar mi. Nam at placerat urna. Sed rutrum, ante eget fermentum sodales, est eros condimentum velit.<br><br>
								
								Nec consectetur lorem augue ac sapien. Morbi et arcu sit amet lacus ornare malesuada. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec blandit sem purus.<br><br>Pellentesque quis magna odio, non mattis mi. In et dui mauris, sit amet ullamcorper nisl. </p>

								<div class="w-100 float-left img-join-wrap mt-4">
									<img src="<?php echo base_url('assets/images/thai-join.jpg');?>" alt="img-thai" class="img-fluid">
								</div>

								<div class="join-us-offers w-100 float-left mt-5 mb-5 text-left">
									<h4>We offers</h4>
									<ul>
										<li>Nec consectetur lorem augue ac sapien. Morbi et arcu sit amet lacus ornare malesuada.</li>
										<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
										<li>Morbi et arcu sit amet lacus ornare malesuada. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</li>
										<li>Nam at placerat urna. Sed rutrum, ante eget fermentum sodales, est eros condimentum velit.</li>
									</ul>
									<div class="w-100 float-left text-center mt-4">
										<a href="<?php echo base_url('signup');?>" class="register-button-form d-inline-block">Join With Us Now!</a>
									</div>
								</div>
						</div>
					</div>
					</div>
				</div>
			</section>


			<!-- <footer class="w-100 float-left">
				<div class="container">
					<div class="w-100 float-left">
						<div class="float-left left-foot-logo"><a href="#"><img src="<?php echo base_url('assets/images/logo-full.png');?>" alt=""></a>
						</div>
						<div class="float-right right-footer">
							<div class="foot-nav float-right">
								<ul>
									<li><a href="#">Home</a></li>
									<li><a href="#">About Us</a></li>
									<li><a href="#">maxx Team </a></li>
									<li><a href="#">Careers </a></li>
									<li><a href="#">Join Us</a></li>
									<li><a href="#">Contact Us</a></li>
								</ul>
							</div>
							<div class="social float-right w-100">
								<a href="#"><i class="fab fa-whatsapp whapp"></i></a>
								<a href="#"><i class="fab fa-twitter tw"></i></a>
								<a href="#"><i class="fab fa-facebook-f face"></i></a>
							</div>
						</div>
						<div class="w-100 float-left copy mt-3">
							<p>© 2019 maxxholidays.com All rights reserved </p>
						</div>
					</div>
				</div>
			</footer> -->
			<?php include_once('footer.php')?>