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
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>

		<div id="colorlib-page" class="float-left w-100">
			<header class="home-header header-other-page w-100">
				<div class="container position-relative">
					<div class="w-100 logo-others text-left">
						<a href="#"><img src="<?php echo base_url('assets/images/logo-mh.png');?>" alt=""></a>
					</div>
					<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle colorlib-nav-toggle-other-pages"><i></i></a>
				</div>
			</header>
			<section class="w-100 float-left wrap-signup pt-3 pb-5">
				<div class="container">
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
			             <div class="alert alert-danger" id="ajaxmsg" style="display: none">
			             </div>
					</div>
					<div class="row">
						<div class="col-lg-12 float-left page-title-top mt-3">
							<h1>Chagne Password</h1>
						</div>
						<form name="frmChange" method="post" action="<?php echo base_url('dashboard/changepassword');?>">
							<div class="w-100 float-left wrap-section-sign account-sett mb-3 mt-3">
								<div class="col-lg-12 mb-3">
									<h3>Access Details</h3>
								</div>
								<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main">
									<label class="float-left  w-100">Password<font class="mandetory-star">*</font>
									</label>
									<input type="password" class="input-class-common  w-100 float-left" name="txtNew" id="txtNew" required="">
								</div>
								<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main">
									<label class="float-left  w-100">Confirm Password<font class="mandetory-star">*</font>
									</label>
									<input type="password" class="input-class-common  w-100 float-left" name="txtConfirm" id="txtConfirm" required="">
								</div>
							</div>
							<div class="col-lg-12 float-left mt-4">
							<input type="submit" value="Change Now" class="register-button-form float-left mr-3" id="btnChange">
							<a href="<?php echo base_url('home');?>" class="cancel-button-form float-left">Cancel</a>
							</div>
						</form>
					</div>
				</div>
			</section>


			<footer class="w-100 float-left">
				<div class="container">
					<div class="w-100 float-left">
						<div class="float-left left-foot-logo"><a href="#"><img src="<?php echo base_url('assets/images/logo-full.png')?>" alt=""></a>
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
		$(document).ready(function(){
      	  $('#btnChange').on('click',function(){
          	if($('#txtNew').val() != $('#txtConfirm').val())
		    {
		    	$('#ajaxmsg').show('slow');
		    	var msg = 'Mismatch Password..!!';
		    	$('#ajaxmsg').html(msg);
		        return false;
		    }
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
	<!-- <script src="<?php echo base_url('assets/js/jquery.nice-select.min.js');?>"></script> -->
	<script>
		$(document).ready(function () {
			$('select:not(.ignore)').niceSelect();
			FastClick.attach(document.body);
		});    
	</script>
</body>

</html>