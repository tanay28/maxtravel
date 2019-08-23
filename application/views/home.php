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
	<script type="text/javascript">
      var base_url = '<?php echo base_url()?>';
      //alert(base_url);
  	</script>
	<script src="<?php echo base_url('assets/js/common.js');?>"></script>
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
		<?php include_once('main_menu.php');?>
		<div id="colorlib-page">
			<div class="home-header position-absolute w-100 loginsec-home">
				<div class="col-lg-12">
					<?php if(isset($checkuservars['is_logged_in']) && $checkuservars['is_logged_in'] == 1){?>
					<?php }else{?>
					<div class="w-100 text-center agent-login">
						<div class="d-inline-block inter-form">
							<input type="email" class="input-class" placeholder="Email" name="txtEmail" id="txtEmail" required="">
							<input type="password" class="input-class noborder" placeholder="Password" name="txtPassword" id="txtPassword" required="">
							<button class="text-uppercase button-login" id="btnLogin" onclick="login();">Login</button>
							<div class="alert alert-danger alertbox-home" style="display: none" id="ajaxmsg"></div>
						</div>
						<div class="w-100 text-center register-area mt-3">
							<p class="text-uppercase">Not a Agent? Register here <a href="<?php echo base_url('signup')?>">Register</a><a href="<?php echo base_url('Forgotpassword');?>" class="forgot">Forgot password?</a></p>
						</div>
					</div>
					<?php }?>
				</div>
			</div>
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
			<section id="colorlib-about">
				<div class="owl-carousel">
					<?php

						if(isset($header_content) && count($header_content)>0)
						{
							foreach ($header_content as $ikey => $ivalue)
							{
					?>
					<div class="item">
						<a href="#" class="w-100 img-top-slider position-relative"
							style="background:url(<?php echo base_url('assets/content/'.$ivalue['image_name'])?>);">
							<div class="inner-slider-wrap w-100 text-center inner-slider-wrap2">
								<div class="container">
									<div class="row">
										<div class="col-12 col-md-8 col-lg-8 float-left left-title-slider">
											<h1 class="text-uppercase"><?php echo isset($ivalue['slider_name']) ? $ivalue['slider_name'] : '';?></h1>
											<h4 class="text-uppercase"><?php echo isset($ivalue['tag_name']) ? $ivalue['tag_name'] : '';?></h4>
										</div>
										<div class="col-12 col-md-4 col-lg-4 float-left right-cost-slider text-left">
											<div class="w-100 cost-bg">
												<h5 class="text-uppercase w-100">
													<?php
														//var_dump($ivalue['slider_details']);
														if(isset($ivalue['slider_details'])){
															$arr = array();
															$arr = json_decode($ivalue['slider_details'],true);
															if(isset($arr['duration'])) echo $arr['duration']; 
														}
													?>
												</h5>
												<h2 class="text-uppercase w-100">$
													<?php
														if(isset($ivalue['slider_details'])){
															$arr = array();
															$arr = json_decode($ivalue['slider_details'],true);
															if(isset($arr['cost'])) echo $arr['cost']; 
														}
													?>
												</h2>
												<h6 class="text-uppercase w-100">per person</h6>
											</div>
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>
					<?php			
							}
						}
					?>
				</div>
			</section>

			<section class="tours-packs">
				<div class="container">
					<div class="row">
						<div class="w-100 float-left pt-5 pb-5 inner-wrap-packs destination-slider">
							<?php

								if(isset($event_content) && count($event_content)>0)
								{
									foreach ($event_content as $ikey => $ivalue)
									{
							?>
							<div class="item">
								<div class="w-100 float-left packs-wrap animate-box">
									<div class="inner-pack-main w-100 float-left position-relative">
										<img src="<?php echo base_url('assets/content/'.$ivalue['image_name']);?>" alt="<?php echo isset($ivalue['image_name']) ? $ivalue['image_name'] : '';?>">
										<div class="overlay-content position-absolute text-center">
											<h2 class="text-uppercase"><?php echo isset($ivalue['slider_name']) ? $ivalue['slider_name'] : '';?></h2>
											<p><?php echo isset($ivalue['tag_name']) ? $ivalue['tag_name'] : '';?></p>
											<div class="w-100 float-left text-center">
												<?php 
													$arr = array();
													if(isset($ivalue['slider_details'])) $arr = json_decode($ivalue['slider_details'],true);
												?>
												<a href="<?php echo base_url('assets/content/'.$arr['pdf_name']);?>" class="btn button-01" target="_blank">More</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php			
									}
								}
							?>
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
											<input type="text" class="input-class" placeholder="0" name="txtAmount" id="txtAmount">
										</div>
										<div class="d-inline-block fields-converter text-left autoselect-select">
											<label class="w-100 float-left">From</label>

											<select class="input-class wide" name="cmbFromCurrency" id="cmbFromCurrency" onchange="currency_converter();">
												<option value="none">Select Currency</option>
												<option value="USD">Dollar</option>
												<option value="THB">Thai</option>
												<option value="EUR">Euro</option>
												<option value="INR">Indian Rupees</option>
											</select>
										</div>
										<div class="d-inline-block fields-converter text-left autoselect-select">
											<label class="w-100 float-left">To</label>
											<select class="input-class wide" name="cmbToCurrency" id="cmbToCurrency" onchange="currency_converter();">
												<option value="none">Select Currency</option>
												<option value="USD">Dollar</option>
												<option value="THB">Thai</option>
												<option value="EUR">Euro</option>
												<option value="INR">Indian Rupees</option>
											</select>
										</div>
									</div>
									<div class="w-100 float-left text-center mt-2 mb-3 total-coverted-amount">
										<span class="float-left" id="covertedval">0</span>
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
											<h3><?php echo isset($thailand) ? $thailand : ''; ?></h3>
										</div>
									</div>

									<div class="w-100 float-left text-left mb-3">
										<div class="time-zone-icon float-left">
											<span><img src="<?php echo base_url('assets/images/merlion.png');?>" alt=""></span>
										</div>
										<div class="timezone-right float-left">
											<h4>singapore</h4>
											<h3><?php echo isset($singapore) ? $singapore : ''; ?></h3>
										</div>
									</div>

									<div class="w-100 float-left text-left">
										<div class="time-zone-icon float-left">
											<span><img src="<?php echo base_url('assets/images/petronas.png');?>" alt=""></span>
										</div>
										<div class="timezone-right float-left">
											<h4>malaysia</h4>
											<h3><?php echo isset($malaysia) ? $malaysia : ''; ?></h3>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="w-100 float-left top-destination-wwrap">
				<div class="w-100 float-left inner-rap-des position-relative pt-5 pb-5">
					<div class="container">
						<div class="w-100 float-left wraper-slider-des">
							<h2><i class="fas fa-map-marker-alt"></i> Popular Destinations</h2>
							<div class="destination-slider w-100 float-left mt-4">
								<?php
								if(isset($destination_content) && count($destination_content)>0)
								{
									foreach ($destination_content as $ikey => $ivalue)
									{
								?>
									<div class="item">
										<div class="w-100 float-left block-destination-indi position-relative mb-3">
											<a href="<?php echo base_url('itinerary/show_itinerary/'.base64_encode($ivalue['id']));?>" class="w-100 float-left">
												<div class="w-100 float-left img-destination">
													<img src="<?php echo base_url('assets/content/'.$ivalue['image_name']);?>" alt="<?php echo isset($ivalue['image_name']) ? $ivalue['image_name'] : 'NA';?>">
												</div>
												<div class="content-destination w-100 float-left">
													<h4><?php echo isset($ivalue['slider_name']) ? $ivalue['slider_name'] : '';?>
													</h4>
													<h3>$ 
														<?php
															$arr = array();
															if(isset($ivalue['slider_details'])) $arr = json_decode($ivalue['slider_details'],true);
															echo isset($arr['cost']) ? $arr['cost'] : ''; 
														?>
													</h3>
												</div>
												<div class="w-100 float-left tour-shot-des"><i class="fas fa-qrcode"></i>
													Tour Code : <?php echo isset($arr['code']) ? $arr['code'] : '';?></div>
												<div class="w-100 float-left tour-shot-des"><i class="fas fa-umbrella"></i>
													Package Type : <?php echo isset($arr['type']) ? $arr['type'] : '';?></div>
												<div class="w-100 float-left tour-shot-des"><i class="far fa-clock"></i>
													<?php echo isset($arr['duration']) ? $arr['duration'] : '';?></div>
												<div class="w-100 float-left tour-shot-des"><i
														class="fas fa-calendar-alt"></i> Now - <?php echo isset($arr['date']) ? $arr['date'] : '';?>
												</div>
											</a>
										</div>
									</div>
								<?php			
									}
								}
							?>
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
									<?php
										if(isset($feedback_content) && count($feedback_content)>0)
										{
											foreach ($feedback_content as $ikey => $ivalue)
											{
										?>
											<div class="item">
												<div class="col-md-12">
													<!-- <iframe width="650" height="400"
														src="<?php echo isset($ivalue['image_name']) ? $ivalue['image_name'] : '';?>" frameborder="0"
														allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
														allowfullscreen>
													</iframe> -->
												</div>
											</div>
										<?php			
											}
										}
									?>	
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</section>

		<?php include_once('footer.php');?>