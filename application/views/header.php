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
	<script type="text/javascript">
      var base_url = '<?php echo base_url()?>';
      //alert(base_url);
  	</script>
	<script src="<?php echo base_url('assets/js/common.js');?>"></script>
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
					<!-- <div class="row">
						<div class="col-md-12 logonav mb-4 text-left">
							<img src="<?php echo base_url('assets/images/logo-full.png');?>" alt="">
						</div>
					</div> -->
					<div class="row">
						<div class="col-md-12">
							<ul>
								<?php
									if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='AGENT'){
								?>
									<li class="active"><a href="<?php echo base_url('dashboardag');?>">Dashboard</a></li>
								<?php
									}
								?>
								<?php
									if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='SUPERADMIN'){
								?>
									<li class="active"><a href="<?php echo base_url('dashboardsa');?>">Dashboard</a></li>
									<li><a href="<?php echo base_url('hotel/add');?>">Add Hotel</a></li>
									<li><a href="<?php echo base_url('hotel/lists');?>">Hotel List</a></li>
								<?php
									}
								?>
								<?php
									if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='ADMIN'){
								?>
									<li class="active"><a href="<?php echo base_url('dashboardad');?>">Dashboard</a></li>
								<?php
									}
								?>
								<?php
									if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='EMPLOYEE'){
								?>
									<li class="active"><a href="<?php echo base_url('dashboardem');?>">Dashboard</a></li>
								<?php
									}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>

		<div id="colorlib-page" class="float-left w-100">
			<header class="home-header header-other-page w-100 float-left">
				<div class="container position-relative">
					<div class="float-left logo-others text-left">
						<a href="<?php echo base_url('home');?>"><img src="<?php echo base_url('assets/images/logo-mh.png');?>" alt=""></a>
					</div>
					<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle colorlib-nav-toggle-other-pages"><i></i></a>
					<div class="nav-afterlogin float-right">
					<div class="dropdown">
						<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-user"></i>
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" href="#">My Account</a>
							<a class="dropdown-item" href="<?php echo base_url('changepass');?>">Change Password</a>
							<a class="dropdown-item" href="<?php echo base_url('login/logout');?>">Logout</a>
						</div>
					</div>
					</div>
				</div>
			</header>