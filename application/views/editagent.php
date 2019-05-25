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
					<div class="row">
						<div class="col-md-12">
							<?php include_once('before_login_menu.php');?>
						</div>
					</div>
				</div>
			</div>
		</nav>

		<div id="colorlib-page" class="float-left w-100">
			<header class="home-header header-other-page w-100 float-left">
				<div class="container position-relative">
					<div class="float-left logo-others text-left">
						<a href="<?php echo base_url();?>"><img src="<?php echo base_url('assets/images/logo-mh.png');?>" alt=""></a>
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
			            <div class="alert alert-danger" id="ajaxmsg" style="display: none"></div>
					</div>
					<div class="row">
						<div class="col-lg-12 float-left page-title-top mt-3">
							<h1>Edit Agent</h1>
						</div>
						<?php if(isset($agents) && count($agents)>0){?>
						<form name="frmRegister" method="post" action="<?php echo base_url('agents/editagent');?>" enctype="multipart/form-data">
						
							<div class="w-100 float-left wrap-section-sign mb-3 mt-3">
								<div class="col-lg-12 mb-4">
									<h3>Personal Details</h3>
								</div>
								<div class="col-12 col-md-6 col-lg-6 float-left wr-form p-0">
									<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
										<label class="float-left">Agency Name <font class="mandetory-star">*</font>
										</label>
										<input type="text" class="input-class-common float-left" name="txtAgencyname" required="" value="<?php echo isset($agents[0]['agency_name']) ? $agents[0]['agency_name'] : '';?>">
									</div>
									<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
										<label class="float-left">First Name <font class="mandetory-star">*</font></label>
										<input type="text" class="input-class-common float-left" name="txtFirstname" required="" value="<?php echo isset($agents[0]['first_name']) ? $agents[0]['first_name'] : '';?>">
									</div>
									<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
										<label class="float-left">Last Name <font class="mandetory-star">*</font>
										</label>
										<input type="text" class="input-class-common float-left" name="txtLastname" required="" value="<?php echo isset($agents[0]['last_name']) ? $agents[0]['last_name'] : '';?>">
									</div>
									<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
										<label class="float-left">Designation <font class="mandetory-star">*</font>
										</label>
										<input type="text" class="input-class-common float-left" name="txtDesignation" required="" value="<?php echo isset($agents[0]['designation']) ? $agents[0]['designation'] : '';?>">
									</div>
									<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
										<label class="float-left">IATA Status</label>
										<div class="label-class-select float-left">
											<label class="mr-3 float-left mt-1 mb-0">
												<input type="radio" name="Rdoiatastatus" value="Not Approved" <?php echo (isset($agents[0]['iata_status']) && $agents[0]['iata_status'] == 'Not Approved') ? 'checked' : ''?> > Not
												Approved
											</label>
											<label class="float-left mt-1 mb-0">
												<input type="radio" name="Rdoiatastatus" value="Approved" <?php echo (isset($agents[0]['iata_status']) && $agents[0]['iata_status'] == 'Approved') ? 'checked' : ''?>> Approved
											</label>
										</div>
									</div>
									<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
										<label class="float-left">Nature of Business <font class="mandetory-star">*</font>
										</label>
										<select class="input-class-common float-left select-box" name="cmbNatureofbusiness" required="">
											<option value="none">Select</option>
											
											<option value="destination_management_company"  <?php echo (isset($agents[0]['nature_of_business']) && $agents[0]['nature_of_business'] == 'destination_management_company') ? 'selected' : ''?>>Destination Management Company</option>
	              							
	              							<option value="tour_operator" <?php echo (isset($agents[0]['nature_of_business']) && $agents[0]['nature_of_business'] == 'tour_operator') ? 'selected' : ''?>>Tour Operator</option>
	              							
	              							<option value="travel_agent" <?php echo (isset($agents[0]['nature_of_business']) && $agents[0]['nature_of_business'] == 'travel_agent') ? 'selected' : ''?>>Travel Agent</option>
	              							
	              							<option value="wholesale_travel_company" <?php echo (isset($agents[0]['nature_of_business']) && $agents[0]['nature_of_business'] == 'wholesale_travel_company') ? 'selected' : ''?>>Wholesale Travel Company</option>
	              							
	              							<option value="corporate" <?php echo (isset($agents[0]['nature_of_business']) && $agents[0]['nature_of_business'] == 'corporate') ? 'selected' : ''?>>Corporate</option>
										</select>
									</div>
									<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
										<label class="float-left">Business Type<font class="mandetory-star">*</font>
										</label>
										<select class="input-class-common float-left select-box" name="cmbBusinesstype" required="">
										  	<option value="none">Select</option>
							              	
							              	<option value="B2B" <?php echo (isset($agents[0]['business_type']) && $agents[0]['business_type'] == 'B2B') ? 'selected' : ''?>>B2B</option>

							              	<option value="B2C" <?php echo (isset($agents[0]['business_type']) && $agents[0]['business_type'] == 'B2C') ? 'selected' : ''?>>B2C</option>

							              	<option value="BOTH" <?php echo (isset($agents[0]['business_type']) && $agents[0]['business_type'] == 'BOTH') ? 'selected' : ''?>>Both</option>

							              	<option value="OTHERS" <?php echo (isset($agents[0]['business_type']) && $agents[0]['business_type'] == 'OTHERS') ? 'selected' : ''?>>Others</option>
										</select>
									</div>
									<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
										<label class="float-left">How did you hear about us
										</label>
										<select class="input-class-common float-left select-box" name="cmbKnowfrom">
										  	<option value="none">Select</option>

	              							<option value="email_marketing" <?php echo (isset($agents[0]['know_from']) && $agents[0]['know_from'] == 'email_marketing') ? 'selected' : ''?>>Email Marketing</option>

							              	<option value="trade_show" <?php echo (isset($agents[0]['know_from']) && $agents[0]['know_from'] == 'trade_show') ? 'selected' : ''?>>Trade Show</option>

							              	<option value="search_engine" <?php echo (isset($agents[0]['know_from']) && $agents[0]['know_from'] == 'search_engine') ? 'selected' : ''?>>Search Engine</option>

							              	<option value="advertisement" <?php echo (isset($agents[0]['know_from']) && $agents[0]['know_from'] == 'advertisement') ? 'selected' : ''?>>Advertisement</option>

							              	<option value="business_associate_refferal" <?php echo (isset($agents[0]['know_from']) && $agents[0]['know_from'] == 'business_associate_refferal') ? 'selected' : ''?>>Business Associate Refferal</option>

							              	<option value="sales_person"  <?php echo (isset($agents[0]['know_from']) && $agents[0]['know_from'] == 'sales_person') ? 'selected' : ''?>>Sales Person</option>
										</select>
									</div>
									<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
										<label class="float-left">Preferred Currency <font class="mandetory-star">*</font>
										</label>
										<select class="input-class-common float-left select-box" name="cmbPrefferedcurrency" required="">
											<option value="none">Select</option>

							              	<option value="USD" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'USD') ? 'selected' : ''?>>United States Dollars</option>

							              	<option value="EUR" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'EUR') ? 'selected' : ''?>>Euro</option>

							              	<option value="GBP" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'GBP') ? 'selected' : ''?>>United Kingdom Pounds</option>

							              	<option value="DZD" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'DZD') ? 'selected' : ''?>>Algeria Dinars</option>

							              	<option value="ARP" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'ARP') ? 'selected' : ''?>>Argentina Pesos</option>

							              	<option value="AUD" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'AUD') ? 'selected' : ''?>>Australia Dollars</option>

							              	<option value="ATS" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'ATS') ? 'selected' : ''?>>Austria Schillings</option>

							              	<option value="BSD" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'BSD') ? 'selected' : ''?>>Bahamas Dollars</option>

							              	<option value="BBD" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'BBD') ? 'selected' : ''?>>Barbados Dollars</option>

							              	<option value="BEF" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'BEF') ? 'selected' : ''?>>Belgium Francs</option>

							              	<option value="BMD" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'BMD') ? 'selected' : ''?>>Bermuda Dollars</option>

							              	<option value="BRR" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'BRR') ? 'selected' : ''?>>Brazil Real</option>

							              	<option value="BGL" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'BGL') ? 'selected' : ''?>>Bulgaria Lev</option>

							              	<option value="CAD" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'CAD') ? 'selected' : ''?>>Canada Dollars</option>

							              	<option value="CLP" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'CLP') ? 'selected' : ''?>>Chile Pesos</option>

							              	<option value="CNY" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'CNY') ? 'selected' : ''?>>China Yuan Renmimbi</option>

							              	<option value="CYP" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'CYP') ? 'selected' : ''?>>Cyprus Pounds</option>

							              	<option value="CSK" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'CSK') ? 'selected' : ''?>>Czech Republic Koruna</option>

							              	<option value="DKK" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'DKK') ? 'selected' : ''?>>Denmark Kroner</option>

							              	<option value="NLG" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'NLG') ? 'selected' : ''?>>Dutch Guilders</option>

							              	<option value="XCD" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'XCD') ? 'selected' : ''?>>Eastern Caribbean Dollars</option>

							              	<option value="EGP" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'EGP') ? 'selected' : ''?>>Egypt Pounds</option>

							              	<option value="FJD" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'FJD') ? 'selected' : ''?>>Fiji Dollars</option>

							              	<option value="FIM" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'FIM') ? 'selected' : ''?>>Finland Markka</option>

							              	<option value="FRF" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'FRF') ? 'selected' : ''?>>France Francs</option>

							              	<option value="DEM" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'DEM') ? 'selected' : ''?>>Germany Deutsche Marks</option>

							              	<option value="XAU" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'XAU') ? 'selected' : ''?>>Gold Ounces</option>

							              	<option value="GRD" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'GRD') ? 'selected' : ''?>>Greece Drachmas</option>

							              	<option value="HKD" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'HKD') ? 'selected' : ''?>>Hong Kong Dollars</option>

							              	<option value="HUF" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'HUF') ? 'selected' : ''?>>Hungary Forint</option>

							              	<option value="ISK" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'ISK') ? 'selected' : ''?>>Iceland Krona</option>

							              	<option value="INR" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'INR') ? 'selected' : ''?>>India Rupees</option>

							              	<option value="IDR" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'IDR') ? 'selected' : ''?>>Indonesia Rupiah</option>

							              	<option value="IEP" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'IEP') ? 'selected' : ''?>>Ireland Punt</option>

							              	<option value="ILS" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'ILS') ? 'selected' : ''?>>Israel New Shekels</option>

							              	<option value="ITL" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'ITL') ? 'selected' : ''?>>Italy Lira</option>

							              	<option value="JMD" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'JMD') ? 'selected' : ''?>>Jamaica Dollars</option>

							              	<option value="JPY" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'JPY') ? 'selected' : ''?>>Japan Yen</option>

							              	<option value="JOD" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'JPY') ? 'selected' : ''?>>Jordan Dinar</option>

							              	<option value="KRW" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'KRW') ? 'selected' : ''?>>Korea (South) Won</option>

							              	<option value="LBP" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'LBP') ? 'selected' : ''?>>Lebanon Pounds</option>

							              	<option value="LUF" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'LUF') ? 'selected' : ''?>>Luxembourg Francs</option>

							              	<option value="MYR" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'MYR') ? 'selected' : ''?>>Malaysia Ringgit</option>

							              	<option value="MXP" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'MXP') ? 'selected' : ''?>>Mexico Pesos</option>

							              	<option value="NLG" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'NLG') ? 'selected' : ''?>>Netherlands Guilders</option>

							              	<option value="NZD" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'NZD') ? 'selected' : ''?>>New Zealand Dollars</option>

							              	<option value="NOK" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'NOK') ? 'selected' : ''?>>Norway Kroner</option>

							              	<option value="PKR" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'PKR') ? 'selected' : ''?>>Pakistan Rupees</option>

							              	<option value="XPD" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'XPD') ? 'selected' : ''?>>Palladium Ounces</option>

							              	<option value="PHP" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'PHP') ? 'selected' : ''?>>Philippines Pesos</option>

							              	<option value="XPT" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'XPT') ? 'selected' : ''?>>Platinum Ounces</option>

							              	<option value="PLZ" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'PLZ') ? 'selected' : ''?>>Poland Zloty</option>

							             	<option value="PTE" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'PTE') ? 'selected' : ''?>>Portugal Escudo</option>

							              	<option value="ROL" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'ROL') ? 'selected' : ''?>>Romania Leu</option>

							              	<option value="RUR" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'RUR') ? 'selected' : ''?>>Russia Rubles</option>

							              	<option value="SAR" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'SAR') ? 'selected' : ''?>>Saudi Arabia Riyal</option>

							              	<option value="XAG" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'XAG') ? 'selected' : ''?>>Silver Ounces</option>

							              	<option value="SGD" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'SGD') ? 'selected' : ''?>>Singapore Dollars</option>

							              	<option value="SKK" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'SKK') ? 'selected' : ''?>>Slovakia Koruna</option>

							              	<option value="ZAR" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'ZAR') ? 'selected' : ''?>>South Africa Rand</option>

							              	<option value="KRW" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'KRW') ? 'selected' : ''?>>South Korea Won</option>

							              	<option value="ESP" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'ESP') ? 'selected' : ''?>>Spain Pesetas</option>

							              	<option value="XDR" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'XDR') ? 'selected' : ''?>>Special Drawing Right (IMF)</option>

							              	<option value="SDD" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'SDD') ? 'selected' : ''?>>Sudan Dinar</option>

							              	<option value="SEK" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'SEK') ? 'selected' : ''?>>Sweden Krona</option>

							              	<option value="CHF" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'CHF') ? 'selected' : ''?>>Switzerland Francs</option>

							              	<option value="TWD" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'TWD') ? 'selected' : ''?>>Taiwan Dollars</option>

							              	<option value="THB" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'THB') ? 'selected' : ''?>>Thailand Baht</option>

							              	<option value="TTD" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'TTD') ? 'selected' : ''?>>Trinidad and Tobago Dollars</option>

							              	<option value="TRL" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'TRL') ? 'selected' : ''?>>Turkey Lira</option>

							              	<option value="VEB" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'VEB') ? 'selected' : ''?>>Venezuela Bolivar</option>

							              	<option value="ZMK" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'ZMK') ? 'selected' : ''?>>Zambia Kwacha</option>

							              	<option value="EUR" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'EUR') ? 'selected' : ''?>>Euro</option>

							              	<option value="XCD" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'XCD') ? 'selected' : ''?>>Eastern Caribbean Dollars</option>

							              	<option value="XDR" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'XDR') ? 'selected' : ''?>>Special Drawing Right (IMF)</option>

							              	<option value="XAG" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'XAG') ? 'selected' : ''?>>Silver Ounces</option>

							              	<option value="XAU" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'XAU') ? 'selected' : ''?>>Gold Ounces</option>

							              	<option value="XPD" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'XPD') ? 'selected' : ''?>>Palladium Ounces</option>

							              	<option value="XPT" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == 'XPT') ? 'selected' : ''?>>Platinum Ounces</option>

										</select>
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-6 float-left wr-form right-area-form p-0">
									<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
										<label class="float-left">Address <font class="mandetory-star">*</font>
										</label>
										<textarea class="input-class-common float-left text-area" name="txtAddress" required=""><?php echo isset($agents[0]['address']) ? $agents[0]['address'] : '';?></textarea>
									</div>
									<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
										<label class="float-left">Pincode/Zipcode/Postcode <font class="mandetory-star">*
											</font></label>
										<input type="text" class="input-class-common float-left" name="txtPin" required="" value="<?php echo isset($agents[0]['pin']) ? $agents[0]['pin'] : '';?>">
									</div>
									<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
										<label class="float-left">Telephone <font class="mandetory-star">*</font></label>
										<input type="text" class="input-class-common float-left" name="txtPhone" required="" value="<?php echo isset($agents[0]['phone']) ? $agents[0]['phone'] : '';?>">
									</div>
									<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
										<label class="float-left">Mobile Number<font class="mandetory-star">*</font></label>
										<input type="text" class="input-class-common float-left" name="txtMobile" required="" value="<?php echo isset($agents[0]['mobile']) ? $agents[0]['mobile'] : '';?>">
									</div>
									<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
										<label class="float-left">Fax</label>
										<input type="text" class="input-class-common float-left" name="txtFax" value="<?php echo isset($agents[0]['fax']) ? $agents[0]['fax'] : '';?>">
									</div>
									<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
										<label class="float-left">Country<font class="mandetory-star">*</font></label>
										<select class="input-class-common float-left select-box" name="cmbCountry" id="cmbCountry" required="">
											<option value="none">Select</option>
								             <?php
								              if(isset($country) && count($country)>0)
								              {
								                foreach ($country as $ikey => $ivalue)
								                {
								            ?>
								             <option value="<?php echo $ivalue['id'];?>" <?php echo (isset($agents[0]['country']) && $agents[0]['country'] == $ivalue['id']) ? 'selected' : ''?> ><?php echo $ivalue['country_name'];?></option> 
								            <?php
								                }
								              }
								             ?>
										</select>
									</div>
									<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
										<label class="float-left">City<font class="mandetory-star">*</font></label>
										<select class="input-class-common float-left" name="cmbCity" id="cmbCity" required="">
											<option><?php echo isset($agents[0]['city']) ? $agents[0]['city'] : '';?></option>
										</select>
									</div>
									<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main" id="gstDetails" style="display:none">
										<label class="float-left">GST Number</label>
										<input type="text" class="input-class-common float-left" name="txtGSTNO"  value="<?php echo isset($agents[0]['gstin_no']) ? $agents[0]['gstin_no'] : '';?>">
									</div>
									<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main" id="gstDoc" style="display:none">
										<label class="float-left">Upload Document</label>
										<input type="file" class=" float-left file-input" name="fileGSTDoc">
										<span><?php echo isset($agents[0]['gst_file_name']) ? $agents[0]['gst_file_name'] : 'No file found';?></span>
										<input type="hidden" name="gst_file_name" value="<?php echo isset($agents[0]['gst_file_name']) ? $agents[0]['gst_file_name'] : '';?>">
									</div>
									<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
										<label class="float-left">Time Zone <font class="mandetory-star">*</font></label>
										<input type="text" class="input-class-common float-left" name="txtTimeZone" required="" value="<?php echo isset($agents[0]['time_zone']) ? $agents[0]['time_zone'] : '';?>">
									</div>
									<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
										<label class="float-left">Website</label>
										<input type="text" class="input-class-common float-left" name="txtWebsite" value="<?php echo isset($agents[0]['website']) ? $agents[0]['website'] : '';?>">
									</div>

								</div>
							</div>
							<div class="w-100 float-left wrap-section-sign contact-details-form mb-3 mt-3">
								<div class="col-lg-12 mb-3">
									<h3>Contact Details</h3>
								</div>

								<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main">
									<label class="float-left w-100">Accounts Name<font class="mandetory-star">*</font>
									</label>
									<input type="text" class="input-class-common  w-100 float-left" name="txtAccountName" required="" value="<?php echo isset($agents[0]['account_name']) ? $agents[0]['account_name'] : '';?>">
								</div>
								<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main">
									<label class="float-left  w-100">Accounts Email<font class="mandetory-star">*</font>
									</label>
									<input type="text" class="input-class-common  w-100 float-left" name="txtAccountEmail" required="" value="<?php echo isset($agents[0]['account_email']) ? $agents[0]['account_email'] : '';?>">
								</div>
								<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main">
									<label class="float-left  w-100">Accounts Number <font class="mandetory-star">*</font>
									</label>
									<input type="text" class="input-class-common  w-100 float-left" name="txtAccountNo" required="" value="<?php echo isset($agents[0]['account_no']) ? $agents[0]['account_no'] : '';?>">
								</div>

								<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main">
										<label class="float-left w-100">Reservation/Operation Name
										</label>
										<input type="text" class="input-class-common  w-100 float-left" name="txtOperationName" required="" value="<?php echo isset($agents[0]['operation_name']) ? $agents[0]['operation_name'] : '';?>">
									</div>
									<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main">
										<label class="float-left  w-100">Reservation/Operation Email
										</label>
										<input type="text" class="input-class-common  w-100 float-left" name="txtOperationEmail" required="" value="<?php echo isset($agents[0]['operation_email']) ? $agents[0]['operation_email'] : '';?>">
									</div>
									<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main">
										<label class="float-left  w-100">Reservation/Operation Number 
										</label>
										<input type="text" class="input-class-common  w-100 float-left" name="txtOperationNo" required="" value="<?php echo isset($agents[0]['operation_no']) ? $agents[0]['operation_no'] : '';?>">
									</div>

									<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main">
											<label class="float-left w-100">Management Name
											</label>
											<input type="text" class="input-class-common  w-100 float-left" name="txtManagementName" required="" value="<?php echo isset($agents[0]['management_name']) ? $agents[0]['management_name'] : '';?>">
										</div>
										<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main">
											<label class="float-left  w-100">Management Email
											</label>
											<input type="text" class="input-class-common  w-100 float-left" name="txtManagementEmail" required="" value="<?php echo isset($agents[0]['management_email']) ? $agents[0]['management_email'] : '';?>">
										</div>
										<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main">
											<label class="float-left  w-100">Management Number
											</label>
											<input type="text" class="input-class-common  w-100 float-left" name="txtManagementNo" required="" value="<?php echo isset($agents[0]['management_no']) ? $agents[0]['management_no'] : '';?>">
										</div>
										<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main" style="display: none">
											<label class="float-left  w-100">Agent Id
											</label>
											<input type="text" class="input-class-common  w-100 float-left" name="txtID" value="<?php echo isset($agents[0]['id']) ? $agents[0]['id'] : '';?>">
										</div>


							</div>
							<div class="col-lg-12 float-left mt-4">
							<input type="submit" value="Save" class="register-button-form float-left mr-3 ">
							<a href="<?php echo base_url('agents');?>" class="cancel-button-form float-left">Cancel</a>
							</div>
						</form>
						<?php }else{?>
							<p>Please try again later</p>
						<?php }?>
					</div>
				</div>
			</section>


			<?php include_once('footer_box.php');?>

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
      	  var con_name = $('#cmbCountry option:selected').text();
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
	      if($('#txtPassword').val() != $('#txtConfirmPassword').val())
	      {
	      	$('#ajaxmsg').show('slow');
	      	var msg = 'Mismatch Password..!!';
	        $('#ajaxmsg').html(msg);
	        return false;
	      }
      	  $('#cmbCountry').on('change',function(){
          	$('#cmbCity').empty();
        	var con = $(this).val();
        	var con_name = $('#cmbCountry option:selected').text();
        	//alert(con_name);
	        $.ajax({
	          url  : "<?php echo base_url('agents/ajax_fetch_city');?>",
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
	<script src="<?php echo base_url('assets/js/popper.min.js');?>"></script>
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
			$('.select-box:not(.ignore)').niceSelect();
			FastClick.attach(document.body);
		});    
	</script>
</body>

</html>