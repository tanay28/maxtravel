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
					</div>
					<div class="row">
						<div class="col-lg-12 float-left page-title-top mt-3">
							<h1>Agent Registration</h1>
						</div>
						<form name="frmRegister" method="post" action="<?php echo base_url('signup/add');?>" enctype="multipart/form-data">
						
							<div class="w-100 float-left wrap-section-sign mb-3 mt-3">
								<div class="col-lg-12 mb-4">
									<h3>Personal Details</h3>
								</div>
								<div class="col-12 col-md-6 col-lg-6 float-left wr-form p-0">
									<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
										<label class="float-left">Agency Name <font class="mandetory-star">*</font>
										</label>
										<input type="text" class="input-class-common float-left" name="txtAgencyname" required="">
									</div>
									<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
										<label class="float-left">First Name <font class="mandetory-star">*</font></label>
										<input type="text" class="input-class-common float-left" name="txtFirstname" required="">
									</div>
									<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
										<label class="float-left">Last Name <font class="mandetory-star">*</font>
										</label>
										<input type="text" class="input-class-common float-left" name="txtLastname" required="">
									</div>
									<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
										<label class="float-left">Designation <font class="mandetory-star">*</font>
										</label>
										<input type="text" class="input-class-common float-left" name="txtDesignation" required="">
									</div>
									<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
										<label class="float-left">IATA Status</label>
										<div class="label-class-select float-left">
											<label class="mr-3 float-left mt-1 mb-0"><input type="radio" name="Rdoiatastatus" value="not_approved" checked=""> Not
												Approved</label>
											<label class="float-left mt-1 mb-0"><input type="radio" name="Rdoiatastatus" value="approved"> Approved</label>
										</div>
									</div>
									<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
										<label class="float-left">Nature of Business <font class="mandetory-star">*</font>
										</label>
										<select class="input-class-common float-left" name="cmbNatureofbusiness" required="">
											<option value="none">Select</option>
											<option value="destination_management_company">Destination Management Company</option>
	              							<option value="tour_operator">Tour Operator</option>
	              							<option value="travel_agent">Travel Agent</option>
	              							<option value="wholesale_travel_company">Wholesale Travel Company</option>
	              							<option value="corporate">Corporate</option>
										</select>
									</div>
									<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
										<label class="float-left">Business Type <font class="mandetory-star">*</font>
										</label>
										<select class="input-class-common float-left" name="cmbBusinesstype" required="">
										  	<option value="none">Select</option>
							              	<option value="B2B">B2B</option>
							              	<option value="B2C">B2C</option>
							              	<option value="BOTH">Both</option>
							              	<option value="OTHERS">Others</option>
										</select>
									</div>
									<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
										<label class="float-left">How did you hear about us
										</label>
										<select class="input-class-common float-left" name="cmbKnowfrom">
										  	<option value="none">Select</option>
	              							<option value="email_marketing">Email Marketing</option>
							              	<option value="trade_show">Trade Show</option>
							              	<option value="search_engine">Search Engine</option>
							              	<option value="advertisement">Advertisement</option>
							              	<option value="business_associate_refferal">Business Associate Refferal</option>
							              	<option value="sales_person">Sales Person</option>
										</select>
									</div>
									<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
										<label class="float-left">Preferred Currency <font class="mandetory-star">*</font>
										</label>
										<select class="input-class-common float-left" name="cmbPrefferedcurrency" required="">
											<option value="none">Select</option>
							              	<option value="USD">United States Dollars</option>
							              	<option value="EUR">Euro</option>
							              	<option value="GBP">United Kingdom Pounds</option>
							              	<option value="DZD">Algeria Dinars</option>
							              	<option value="ARP">Argentina Pesos</option>
							              	<option value="AUD">Australia Dollars</option>
							              	<option value="ATS">Austria Schillings</option>
							              	<option value="BSD">Bahamas Dollars</option>
							              	<option value="BBD">Barbados Dollars</option>
							              	<option value="BEF">Belgium Francs</option>
							              	<option value="BMD">Bermuda Dollars</option>
							              	<option value="BRR">Brazil Real</option>
							              	<option value="BGL">Bulgaria Lev</option>
							              	<option value="CAD">Canada Dollars</option>
							              	<option value="CLP">Chile Pesos</option>
							              	<option value="CNY">China Yuan Renmimbi</option>
							              	<option value="CYP">Cyprus Pounds</option>
							              	<option value="CSK">Czech Republic Koruna</option>
							              	<option value="DKK">Denmark Kroner</option>
							              	<option value="NLG">Dutch Guilders</option>
							              	<option value="XCD">Eastern Caribbean Dollars</option>
							              	<option value="EGP">Egypt Pounds</option>
							              	<option value="FJD">Fiji Dollars</option>
							              	<option value="FIM">Finland Markka</option>
							              	<option value="FRF">France Francs</option>
							              	<option value="DEM">Germany Deutsche Marks</option>
							              	<option value="XAU">Gold Ounces</option>
							              	<option value="GRD">Greece Drachmas</option>
							              	<option value="HKD">Hong Kong Dollars</option>
							              	<option value="HUF">Hungary Forint</option>
							              	<option value="ISK">Iceland Krona</option>
							              	<option value="INR">India Rupees</option>
							              	<option value="IDR">Indonesia Rupiah</option>
							              	<option value="IEP">Ireland Punt</option>
							              	<option value="ILS">Israel New Shekels</option>
							              	<option value="ITL">Italy Lira</option>
							              	<option value="JMD">Jamaica Dollars</option>
							              	<option value="JPY">Japan Yen</option>
							              	<option value="JOD">Jordan Dinar</option>
							              	<option value="KRW">Korea (South) Won</option>
							              	<option value="LBP">Lebanon Pounds</option>
							              	<option value="LUF">Luxembourg Francs</option>
							              	<option value="MYR">Malaysia Ringgit</option>
							              	<option value="MXP">Mexico Pesos</option>
							              	<option value="NLG">Netherlands Guilders</option>
							              	<option value="NZD">New Zealand Dollars</option>
							              	<option value="NOK">Norway Kroner</option>
							              	<option value="PKR">Pakistan Rupees</option>
							              	<option value="XPD">Palladium Ounces</option>
							              	<option value="PHP">Philippines Pesos</option>
							              	<option value="XPT">Platinum Ounces</option>
							              	<option value="PLZ">Poland Zloty</option>
							             	<option value="PTE">Portugal Escudo</option>
							              	<option value="ROL">Romania Leu</option>
							              	<option value="RUR">Russia Rubles</option>
							              	<option value="SAR">Saudi Arabia Riyal</option>
							              	<option value="XAG">Silver Ounces</option>
							              	<option value="SGD">Singapore Dollars</option>
							              	<option value="SKK">Slovakia Koruna</option>
							              	<option value="ZAR">South Africa Rand</option>
							              	<option value="KRW">South Korea Won</option>
							              	<option value="ESP">Spain Pesetas</option>
							              	<option value="XDR">Special Drawing Right (IMF)</option>
							              	<option value="SDD">Sudan Dinar</option>
							              	<option value="SEK">Sweden Krona</option>
							              	<option value="CHF">Switzerland Francs</option>
							              	<option value="TWD">Taiwan Dollars</option>
							              	<option value="THB">Thailand Baht</option>
							              	<option value="TTD">Trinidad and Tobago Dollars</option>
							              	<option value="TRL">Turkey Lira</option>
							              	<option value="VEB">Venezuela Bolivar</option>
							              	<option value="ZMK">Zambia Kwacha</option>
							              	<option value="EUR">Euro</option>
							              	<option value="XCD">Eastern Caribbean Dollars</option>
							              	<option value="XDR">Special Drawing Right (IMF)</option>
							              	<option value="XAG">Silver Ounces</option>
							              	<option value="XAU">Gold Ounces</option>
							              	<option value="XPD">Palladium Ounces</option>
							              	<option value="XPT">Platinum Ounces</option>
										</select>
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-6 float-left wr-form right-area-form p-0">
									<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
										<label class="float-left">Address <font class="mandetory-star">*</font>
										</label>
										<textarea class="input-class-common float-left text-area" name="txtAddress" required=""></textarea>
									</div>
									<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
										<label class="float-left">Pincode/Zipcode/Postcode <font class="mandetory-star">*
											</font></label>
										<input type="text" class="input-class-common float-left" name="txtPin" required="">
									</div>
									<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
										<label class="float-left">Telephone <font class="mandetory-star">*</font></label>
										<input type="text" class="input-class-common float-left" name="txtPhone" required="">
									</div>
									<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
										<label class="float-left">Mobile Number<font class="mandetory-star">*</font></label>
										<input type="text" class="input-class-common float-left" name="txtMobile" required="">
									</div>
									<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
										<label class="float-left">Fax</label>
										<input type="text" class="input-class-common float-left" name="txtFax">
									</div>
									<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
										<label class="float-left">Country<font class="mandetory-star">*</font></label>
										<select class="input-class-common float-left" name="cmbCountry" id="cmbCountry" required="">
											<option value="none">Select</option>
								             <?php
								              if(isset($country) && count($country)>0)
								              {
								                foreach ($country as $ikey => $ivalue)
								                {
								            ?>
								             <option value="<?php echo $ivalue['id'];?>"><?php echo $ivalue['country_name'];?></option> 
								            <?php
								                }
								              }
								             ?>
										</select>
									</div>
									<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
										<label class="float-left">City<font class="mandetory-star">*</font></label>
										<select class="input-class-common float-left" name="cmbCity" id="cmbCity" required=""></select>
									</div>
									<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main" id="gstDetails" style="display:none">
										<label class="float-left">GST Number</label>
										<input type="text" class="input-class-common float-left" name="txtGSTNO">
									</div>
									<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main" id="gstDoc" style="display:none">
										<label class="float-left">Upload Document</label>
										<input type="file" class=" float-left" name="fileGSTDoc">
									</div>
									<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
										<label class="float-left">Time Zone <font class="mandetory-star">*</font></label>
										<input type="text" class="input-class-common float-left" name="txtTimeZone" required="">
									</div>
									<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
										<label class="float-left">Website</label>
										<input type="text" class="input-class-common float-left" name="txtWebsite">
									</div>

								</div>
							</div>
							<div class="w-100 float-left wrap-section-sign account-sett mb-3 mt-3">
								<div class="col-lg-12 mb-3">
									<h3>Access Details</h3>
								</div>

								<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main">
									<label class="float-left w-100">Email<font class="mandetory-star">*</font>
									</label>
									<input type="text" class="input-class-common  w-100 float-left" name="txtAgencyemail" required="">
								</div>
								<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main">
									<label class="float-left  w-100">Password<font class="mandetory-star">*</font>
									</label>
									<input type="password" class="input-class-common  w-100 float-left" name="txtPassword" id="txtPassword" required="">
								</div>
								<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main">
									<label class="float-left  w-100">Confirm Password<font class="mandetory-star">*</font>
									</label>
									<input type="password" class="input-class-common  w-100 float-left" name="txtConfirmPassword" id="txtConfirmPassword" required="">
								</div>


							</div>
							<div class="w-100 float-left wrap-section-sign contact-details-form mb-3 mt-3">
								<div class="col-lg-12 mb-3">
									<h3>Contact Details</h3>
								</div>

								<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main">
									<label class="float-left w-100">Accounts Name<font class="mandetory-star">*</font>
									</label>
									<input type="text" class="input-class-common  w-100 float-left" name="txtAccountName" required="">
								</div>
								<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main">
									<label class="float-left  w-100">Accounts Email<font class="mandetory-star">*</font>
									</label>
									<input type="text" class="input-class-common  w-100 float-left" name="txtAccountEmail" required="">
								</div>
								<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main">
									<label class="float-left  w-100">Accounts Number <font class="mandetory-star">*</font>
									</label>
									<input type="text" class="input-class-common  w-100 float-left" name="txtAccountNo" required="">
								</div>

								<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main">
										<label class="float-left w-100">Reservation/Operation Name
										</label>
										<input type="text" class="input-class-common  w-100 float-left" name="txtOperationName" required="">
									</div>
									<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main">
										<label class="float-left  w-100">Reservation/Operation Email
										</label>
										<input type="text" class="input-class-common  w-100 float-left" name="txtOperationEmail" required="">
									</div>
									<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main">
										<label class="float-left  w-100">Reservation/Operation Number 
										</label>
										<input type="text" class="input-class-common  w-100 float-left" name="txtOperationNo" required="">
									</div>

									<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main">
											<label class="float-left w-100">Management Name
											</label>
											<input type="text" class="input-class-common  w-100 float-left" name="txtManagementName" required="">
										</div>
										<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main">
											<label class="float-left  w-100">Management Email
											</label>
											<input type="text" class="input-class-common  w-100 float-left" name="txtManagementEmail" required="">
										</div>
										<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main">
											<label class="float-left  w-100">Management Number
											</label>
											<input type="text" class="input-class-common  w-100 float-left" name="txtManagementNo" required="">
										</div>


							</div>
							<div class="col-lg-12 float-left mt-4">
							<input type="submit" value="Register Now" class="register-button-form float-left mr-3 ">
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
      	  $('#gstDetails').hide();
      	  $('#gstDoc').hide();
	      if($('#txtPassword').val() != $('#txtConfirmPassword').val())
	      {
	        alert('Mismatch Password..!!');
	        return false;
	      }
      	  $('#cmbCountry').on('change',function(){
          	$('#cmbCity').empty();
        	var con = $(this).val();
        	var con_name = $('#cmbCountry option:selected').text();
        	//alert(con_name);
	        $.ajax({
	          url  : "<?php echo base_url('signup/ajax_fetch_city');?>",
	          type : "post",
	          data : {"key":con}, 
	          success: function(result){ 
	          //$("#cmbCity").html(result);
	          $('#cmbCity').append('<option value="none">Select</option>');
	          var opts = $.parseJSON(result);
	          $.each(opts, function(i, d){
	              $('#cmbCity').append('<option value="' + d.city_name + '">' + d.city_name + '</option>');
	          });
	        }});
	        if(con_name == 'India')
	        {
	          $('#gstDetails').show('slow');
	          $('#gstDoc').show('slow');
	        }
	        else
	        {
	          $('#gstDetails').hide('slow');
	          $('#gstDoc').hide('slow'); 
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