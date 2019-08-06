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
<link rel="stylesheet" href="<?php echo base_url('assets/css/dataTables.bootstrap4.min.css');?>">
<link rel="stylesheet" type="text/css"  href="<?php echo base_url('assets/css/gijgo.min.css');?>">
<!-- Owl Carousel -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/owl.carousel.min.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/owl.theme.default.min.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

<link rel="stylesheet" href="<?php echo base_url('assets/css/select2/dist/css/select2.min.css');?>">

<!-- Modernizr JS -->
<script src="<?php echo base_url('assets/js/modernizr-2.6.2.min.js');?>"></script>
<!-- FOR IE9 below -->
<script type="text/javascript">
  var base_url = '<?php echo base_url()?>';
  //alert(base_url);
	</script>

  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
  
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script> -->


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
		
		<div id="colorlib-page" class="float-left w-100">
			<div class="header-other-page col-lg-12 position-relative float-left">
				<?php include_once('main_menu.php');?>	
			</div>

			