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
		<div id="colorlib-page" class="float-left w-100">
			<header class="home-header header-other-page w-100 float-left inner-header" style="background: url(<?php echo base_url('assets/images/calculator-bg.jpg');?>);">
				<?php include_once('main_menu.php');?>
			</div>
			</header>

			

			<section class="w-100 float-left wrap-signup pt-3 pb-5">
				<div class="container">
					<div class="row">
					<div class="col-lg-8 col-md-12 col-12 float-left blockform contact_form mb-3 p-0 mt-4">
						<form name="frmContact" method="post" action="<?php echo base_url('Contactus/savecontact');?>">
							
								<div class="col-lg-12 float-left mb-3">
								<h4>GET IN TOUCH</h4>
								</div>
								<div class="col-lg-4 col-md-4 col-12 float-left mb-3">
									<input name="txtName" type="text" class="input-contact" placeholder="Enter Your Name" required="">
								</div>
								<div class="col-lg-4 col-md-4 col-12 float-left mb-3">
									<input name="txtEmail" type="email" placeholder="Enter Email" class="input-contact" required="">
								</div>
								<div class="col-lg-4 col-md-4 col-12 float-left mb-3">
									<input name="txtPhone" type="text" placeholder="Enter Phone No" class="input-contact"  required="">
								</div>
								<div class="col-lg-12 col-md-12 col-12 float-left">
									<textarea name="txtMsg" cols="" rows="" placeholder="Enter Message" class="input-contact"></textarea>
								</div>
								<div class="col-lg-12 float-left mt-4">
										<input type="submit" value="Submit" class="register-button-form float-left">
								</div>	
							
						</form></div>

						<div class="col-lg-4 col-md-12 col-12 float-left blockform contact-info mb-4 mt-4">
							<div class="w-100 float-left addrsss-contact">
								<div class="w-100 float-left mb-2">
									<h4>Thailand Office</h4>
								</div>
								<div class="w-100 float-left mb-2">
									<span><i class="fas fa-map-marker-alt"></i></span>
									<p class="float-right">Maxxholidays Corporation Co. Ltd.<br>
										8/80 Moo 6 Naklua Banglamung<br>
										Chonburi, Pattaya - 20150</p>
								</div>
								<div class="w-100 float-left mb-2">
									<span><i class="fas fa-mobile"></i></span>
									<p><a href="tel:+66824600136">+66824600136</a></p>
								</div>
								<div class="w-100 float-left mb-2">
									<span><i class="fas fa-envelope"></i></span>
									<p><a href="mailto:info@maxxholidays.com">info@maxxholidays.com</a>
										<a href="mailto:sales@maxxholidays.com">sales@maxxholidays.com</a></p>
								</div>
							</div>

							<div class="w-100 float-left addrsss-contact mt-2">
								<div class="w-100 float-left mb-2">
									<h4>India Office</h4>
								</div>
								<div class="w-100 float-left mb-2">
									<span><i class="fas fa-map-marker-alt"></i></span>
									<p class="float-right">Maxxholidays Co. Pvt. Ltd.<br>
										2, Ganesh Chandra Avenue<br>
										1st Floor, Room no. - 10<br>
										Kolkata - 700013</p>
								</div>
								<div class="w-100 float-left mb-2">
									<span><i class="fas fa-mobile"></i></span>
									<p><a href="tel:+91 9330302200">+91 9330302200</a></p>
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
			<?php include_once('footer.php');?>