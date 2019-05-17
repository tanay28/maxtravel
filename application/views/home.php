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
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css')?>">
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
			<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle buttonnavs active"><i></i></a>
			<div class="colorlib-table">
				<div class="colorlib-table-cell">
					<div class="row">
						<div class="col-md-12 logonav mb-4 text-left">
							<img src="<?php echo base_url('assets/images/logo-full.png');?>" alt="">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<ul>
								<li class="active"><a href="#">Home</a></li>
								<li><a href="#">About Us</a></li>
								<li><a href="#">Maxx Team</a></li>
								<li><a href="#">Career</a></li>
								<li><a href="#">Join Us</a></li>
								<li><a href="#">Contact Us</a></li>
								<?php
									//$checkuservars = $this->session->userdata;
									//if(isset($checkuservars['userid'])){
								?>
								<!-- <li><a href="#">Change Password</a></li>
								<li><a href="<?php //echo base_url('Login/logout');?>">Logout</a></li> -->
							<?php //}?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>

		<div id="colorlib-page">
			<header class="home-header position-absolute w-100">
				<div class="col-lg-12">
					<div class="w-100 logo-home text-center">
						<a href="#"><img src="<?php echo base_url('assets/images/logo-mh.png');?>" alt=""></a>
					</div>
					<?php
						//$checkuservars = $this->session->userdata;
						//if(!isset($checkuservars['userid'])){
					?>
					<div class="w-100 text-center agent-login">
						<div class="d-inline-block inter-form">
							<input type="email" class="input-class" placeholder="Email" name="txtEmail" id="txtEmail" required="">
							<input type="password" class="input-class noborder" placeholder="Password" name="txtPassword" id="txtPassword" required="">
							<button class="text-uppercase button-login" id="btnLogin">Login</button>
						</div>
						<div class="w-100 text-center register-area mt-3">
							<p class="text-uppercase">Not a Agent? Register here <a href="<?php echo base_url('signup')?>">Register</a><a href="<?php echo base_url('login/viewforgetpassword');?>" class="forgot">Forgot password?</a></p>
						</div>
					</div>
					<?php //}?>
				</div>
			</header>
			<div>
				<?php if ($this->session->userdata('success')) { ?>
	              <div class="alert alert-success">
	                  <?php echo $this->session->userdata('success');?>
	              </div>
	            <?php }?>
	            <?php if ($this->session->userdata('error')) { ?>
	              <div class="alert alert-danger">
	                  <?php echo $this->session->userdata('error');?>
	              </div>
	            <?php }?>
			</div>
			<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
			<section id="colorlib-about">
				<div class="owl-carousel">
					<div class="item">
						<a href="#" class="w-100 img-top-slider position-relative"
							style="background:url(<?php echo base_url('assets/images/ban-01.jpg');?>);">
							<div class="inner-slider-wrap w-100 text-center">
								<div class="container">
									<div class="row">
										<div class="col-12 col-md-8 col-lg-8 float-left left-title-slider">
											<h1 class="text-uppercase">thailand</h1>
											<h4 class="text-uppercase">Build your Next Holiday Trip with Us</h4>
										</div>
										<div class="col-12 col-md-4 col-lg-4 float-left right-cost-slider text-left">
											<div class="w-100 cost-bg">
												<h5 class="text-uppercase w-100">6 days 5 nights</h5>
												<h2 class="text-uppercase w-100">$625</h2>
												<h6 class="text-uppercase w-100">per person</h6>
											</div>
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="item">
						<a href="#" class="w-100 img-top-slider position-relative"
							style="background:url(<?php echo base_url('assets/images/ban-02.jpg');?>);">
							<div class="inner-slider-wrap w-100 text-center inner-slider-wrap2">
								<div class="container">
									<div class="row">
										<div class="col-12 col-md-8 col-lg-8 float-left left-title-slider">
											<h1 class="text-uppercase">bangkok</h1>
											<h4 class="text-uppercase">bangkok Trip with MaxxHolidays</h4>
										</div>
										<div class="col-12 col-md-4 col-lg-4 float-left right-cost-slider text-left">
											<div class="w-100 cost-bg">
												<h5 class="text-uppercase w-100">9 days 8 nights</h5>
												<h2 class="text-uppercase w-100">$784</h2>
												<h6 class="text-uppercase w-100">per person</h6>
											</div>
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>

					<div class="item">
						<a href="#" class="w-100 img-top-slider position-relative"
							style="background:url(<?php echo base_url('assets/images/ban-3.jpg');?>);">
							<div class="inner-slider-wrap w-100 text-center inner-slider-wrap3">
								<div class="container">
									<div class="row">
										<div class="col-12 col-md-8 col-lg-8 float-left left-title-slider">
											<h1 class="text-uppercase">phuket</h1>
											<h4 class="text-uppercase">MaxxHolidays phuket trip.</h4>
										</div>
										<div class="col-12 col-md-4 col-lg-4 float-left right-cost-slider text-left">
											<div class="w-100 cost-bg">
												<h5 class="text-uppercase w-100">5 days 4 nights</h5>
												<h2 class="text-uppercase w-100">$425</h2>
												<h6 class="text-uppercase w-100">per person</h6>
											</div>
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>

				</div>
			</section>

			<section class="tours-packs">
				<div class="container">
					<div class="row">
						<div class="w-100 float-left pt-5 pb-5 inner-wrap-packs">
							<div class="col-12 col-md-4 col-lg-4 float-left packs-wrap animate-box">
								<div class="inner-pack-main w-100 float-left position-relative">
									<img src="<?php echo base_url('assets/images/promotion-01.jpg');?>" alt="">
									<div class="overlay-content position-absolute text-center">
										<h2 class="text-uppercase">Happy Holidays</h2>
										<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac
											turpis egestas. In hac habitasse platea dictumst. Nullam neque erat, tempor
											eget
											dictum sit amet, laoreet vitae leo.</p>
										<div class="w-100 float-left text-center">
											<a href="#" class="btn button-01">More</a>
										</div>
									</div>
								</div>
							</div>

							<div class="col-12 col-md-4 col-lg-4 float-left packs-wrap animate-box">
								<div class="inner-pack-main w-100 float-left position-relative">
									<img src="<?php echo base_url('assets/images/promotion-02.jpg');?>" alt="">
									<div class="overlay-content position-absolute text-center">
										<h2 class="text-uppercase">Group Tour</h2>
										<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac
											turpis egestas. In hac habitasse platea dictumst. Nullam neque erat, tempor
											eget
											dictum sit amet, laoreet vitae leo.</p>
										<div class="w-100 float-left text-center">
											<a href="#" class="btn button-01">More</a>
										</div>
									</div>
								</div>
							</div>

							<div class="col-12 col-md-4 col-lg-4 float-left packs-wrap animate-box">
								<div class="inner-pack-main w-100 float-left position-relative marrage-div">
									<img src="<?php echo base_url('assets/images/promotion-03.jpg')?>" alt="">
									<img src="images/bridal.png" alt="" class="bottom-bridal">
									<div class="overlay-content position-absolute text-center marraig-eve">
										<h2 class="text-uppercase">marriage Events</h2>
										<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac
											turpis egestas. In hac habitasse platea dictumst. Nullam neque erat, tempor
											eget
											dictum sit amet, laoreet vitae leo.</p>
										<div class="w-100 float-left text-center">
											<a href="#" class="btn button-01">More</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			

			<section class="currency-convert-wrap">
				<div class="conver-inner w-100 float-left" style="background:url(<?php echo base_url('assets/images/calculator-bg.jpg');?>);">
					<div class="inter-wrap-converter w-100 float-left text-center">
						<div class="container">
							<div class="row">
								<div class="col-12 col-md-8 col-lg-8 float-left curr-wrap">
									<h1 class="title-section-white w-100 text-left">Convert currency</h1>
									<div class="w-100 float-left text-left">
										<div class="d-inline-block fields-converter text-left">
											<label class="w-100 float-left">Amount</label>
											<input type="text" class="input-class" placeholder="0">
										</div>
										<div class="d-inline-block fields-converter text-left autoselect-select">
											<label class="w-100 float-left">From</label>

											<select class="input-class wide">
												<option>Select Currency</option>
												<option>Dollar</option>
												<option>Thai</option>
											</select>
										</div>
										<div class="d-inline-block fields-converter text-left autoselect-select">
											<label class="w-100 float-left">To</label>
											<select class="input-class wide">
												<option>Select Currency</option>
												<option>Dollar</option>
												<option>Thai</option>
											</select>
										</div>
									</div>
									<div class="w-100 float-left text-center mt-2 mb-3 total-coverted-amount">
										<span class="float-left">1.7611</span>
									</div>
									<div class="w-100 float-left note-converter pl-0 pr-0 text-left">
										<p class="mb-0">Note: The Currency Converter on the website is offered purely as
											a
											convenience, and for reference purposes only. The exchange rates of the
											currencies
											are based on the previous day's close, and do not reflect real-time
											fluctuations
											in
											the rate. We are in no way responsible for the decisions taken on the basis
											of
											the
											use of the application</p>
									</div>
								</div>
								<div class="col-12 col-md-4 col-lg-4 float-left curr-wrap">
									<h1 class="title-section-white w-100 text-left">Time Zone</h1>
									<div class="w-100 float-left text-left">
										<div class="time-zone-icon float-left mb-3">
											<span><img src="<?php echo base_url('assets/images/wat-phra-kaew.png')?>" alt=""></span>
										</div>
										<div class="timezone-right float-left">
											<h4>Thailand</h4>
											<h3>10:30am</h3>
										</div>
									</div>

									<div class="w-100 float-left text-left mb-3">
										<div class="time-zone-icon float-left">
											<span><img src="<?php echo base_url('assets/images/merlion.png');?>" alt=""></span>
										</div>
										<div class="timezone-right float-left">
											<h4>singapore</h4>
											<h3>8:15am</h3>
										</div>
									</div>

									<div class="w-100 float-left text-left">
										<div class="time-zone-icon float-left">
											<span><img src="<?php echo base_url('assets/images/petronas.png');?>" alt=""></span>
										</div>
										<div class="timezone-right float-left">
											<h4>malaysia</h4>
											<h3>7:30am</h3>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

<section class="currency-convert-wrap">
				<div class="conver-inner w-100 float-left" style="background:url(<?php echo base_url('assets/images/video-bg.jpg');?>);">
					<div class="inter-wrap-video w-100 float-left text-center">
						<div class="container">
							<div class="row">
								<h1 class="title-section-white w-100 text-center">What our client's says</h1>

								<div class="w-100 text-center video-gallery">

									<div class="owl-carousel1">
										<div class="item">
											<div class="col-md-12">
												<iframe width="650" height="400"
													src="https://www.youtube.com/embed/Y-M9Z2RJIUE" frameborder="0"
													allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
													allowfullscreen></iframe>
											</div>
										</div>
										<div class="item">
											<div class="col-md-12">
												<iframe width="650" height="400"
													src="https://www.youtube.com/embed/gmpHIXcWlDE" frameborder="0"
													allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
													allowfullscreen></iframe>
											</div>
										</div>
									</div>

								</div>

							</div>
						</div>
					</div>
				</div>
			</section>

			<footer class="w-100 float-left">
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
			</footer>

		</div>
	</div>
	<!-- jQuery -->
	<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
	<script>
		$(window).load(function () {
			jQuery('#page').fadeIn(500);
			jQuery('#loading').hide();
		});
		$('document').ready(function(){
			$('#btnLogin').on('click',function(){
				var email = $('#txtEmail').val();
				var password = $('#txtPassword').val();

				$.ajax({

					url     : "<?php echo base_url('Login/index')?>",
					type    : "post",
					data    : {"txtEmail":email,"txtPassword":password},
					success : function(result){
								//alert(result);
								if(result == 'AGENT')
								{
									window.location.href = "<?php echo base_url('Dashboard');?>";	
								}
								else if(result == '')
								{
									alert('Enter Valid Email And Password!!');
								}
								
				}});
			});
		});
	</script>
	<!-- jQuery Easing -->
	<script src="<?php echo base_url('assets/js/jquery.easing.1.3.js');?>"></script>
	<!-- Bootstrap -->
	<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
	<!-- Owl Carousel -->
	<!-- Waypoints -->
	<script src="<?php echo base_url('assets/js/jquery.waypoints.min.js');?>"></script>

	<script src="<?php echo base_url('assets/js/owl.carousel.min.js');?>"></script>
	<!-- Main JS (Do not remove) -->
	<script src="<?php echo base_url('assets/js/main.js');?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.nice-select.min.js');?>"></script>
	<script>
		$(document).ready(function () {
			$('select:not(.ignore)').niceSelect();
			FastClick.attach(document.body);
		});    
	</script>
</body>

</html>