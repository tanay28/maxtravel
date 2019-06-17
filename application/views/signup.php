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
					<!-- <div class="nav-afterlogin float-right">
						<div class="dropdown">
							<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-user"></i>
							</button>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a class="dropdown-item" href="#">My Account</a>
								<a class="dropdown-item" href="#">Logout</a>
							</div>
						</div>
					</div> -->
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
							<h1>Agent Registration</h1>
						</div>
						<form name="frmRegister" method="post" action="<?php echo base_url('signup/add');?>" enctype="multipart/form-data" onsubmit ="return valid();">
						
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
											<label class="mr-3 float-left mt-1 mb-0"><input type="radio" name="Rdoiatastatus" value="Not Approved" checked=""> Not
												Approved</label>
											<label class="float-left mt-1 mb-0"><input type="radio" name="Rdoiatastatus" value="Approved"> Approved</label>
										</div>
									</div>
									<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
										<label class="float-left">Nature of Business <font class="mandetory-star">*</font>
										</label>
										<select class="input-class-common float-left select-box" name="cmbNatureofbusiness" required="">
											<option value="none">Select</option>
											<option value="destination_management_company">Destination Management Company</option>
	              							<option value="Tour Operato">Tour Operator</option>
	              							<option value="Travel Agent">Travel Agent</option>
	              							<option value="Wholesale Travel Company">Wholesale Travel Company</option>
	              							<option value="Corporate">Corporate</option>
										</select>
									</div>
									<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
										<label class="float-left">Business Type <font class="mandetory-star">*</font>
										</label>
										<select class="input-class-common float-left select-box" name="cmbBusinesstype" required="">
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
										<select class="input-class-common float-left select-box" name="cmbKnowfrom">
										  	<option value="none">Select</option>
	              							<option value="Email Marketing">Email Marketing</option>
							              	<option value="Trade Show">Trade Show</option>
							              	<option value="Search Engine">Search Engine</option>
							              	<option value="Advertisement">Advertisement</option>
							              	<option value="Business Associate Refferal">Business Associate Refferal</option>
							              	<option value="Sales Person">Sales Person</option>
										</select>
									</div>
									<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
										<label class="float-left">Preferred Currency <font class="mandetory-star">*</font>
										</label>
										<select class="input-class-common float-left select-box" name="cmbPrefferedcurrency" required="">
											<option value="none">Select</option>
							              	 <?php
								              if(isset($currency) && count($currency)>0)
								              {
								                foreach ($currency as $ikey => $ivalue)
								                {
								            ?>
								             <option value="<?php echo $ivalue['currency_id'];?>"><?php echo $ivalue['currency_name'];?></option> 
								            <?php
								                }
								              }
								             ?>
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
										<select class="input-class-common float-left select-box" name="cmbCountry" id="cmbCountry" required="">
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
										<input type="file" class=" float-left file-input" name="fileGSTDoc">
									</div>
									<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
										<label class="float-left">Time Zone <font class="mandetory-star">*</font></label>
										<select class="input-class-common float-left select-box" name="cmbTimezone" id="cmbTimezone" required="">
											<option value="none">Select</option>
								             <?php
								              if(isset($timezone) && count($timezone)>0)
								              {
								                foreach ($timezone as $ikey => $ivalue)
								                {
								            ?>
								             <option value="<?php echo $ivalue['id'];?>"><?php echo $ivalue['timezone'];?></option> 
								            <?php
								                }
								              }
								             ?>
										</select>
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
									<label class="float-left w-100">Accounts Name
									</label>
									<input type="text" class="input-class-common  w-100 float-left" name="txtAccountName">
								</div>
								<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main">
									<label class="float-left  w-100">Accounts Email
									</label>
									<input type="text" class="input-class-common  w-100 float-left" name="txtAccountEmail">
								</div>
								<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main">
									<label class="float-left  w-100">Accounts Number
									</label>
									<input type="text" class="input-class-common  w-100 float-left" name="txtAccountNo">
								</div>

								<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main">
										<label class="float-left w-100">Reservation/Operation Name
										</label>
										<input type="text" class="input-class-common  w-100 float-left" name="txtOperationName">
									</div>
									<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main">
										<label class="float-left  w-100">Reservation/Operation Email
										</label>
										<input type="text" class="input-class-common  w-100 float-left" name="txtOperationEmail">
									</div>
									<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main">
										<label class="float-left  w-100">Reservation/Operation Number 
										</label>
										<input type="text" class="input-class-common  w-100 float-left" name="txtOperationNo">
									</div>

									<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main">
											<label class="float-left w-100">Management Name
											</label>
											<input type="text" class="input-class-common  w-100 float-left" name="txtManagementName">
										</div>
										<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main">
											<label class="float-left  w-100">Management Email
											</label>
											<input type="text" class="input-class-common  w-100 float-left" name="txtManagementEmail">
										</div>
										<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main">
											<label class="float-left  w-100">Management Number
											</label>
											<input type="text" class="input-class-common  w-100 float-left" name="txtManagementNo">
										</div>


							</div>
							<div class="col-lg-12 float-left mt-4">
							<input type="submit" value="Register Now" class="register-button-form float-left mr-3"  onclick="valid();">
							<a href="<?php echo base_url('login');?>" class="cancel-button-form float-left">Cancel</a>
							</div>
						</form>
					</div>
				</div>
			</section>


			<?php include_once('footer_box.php');?>

		</div>
	</div>
	<!-- jQuery -->
	<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
	<script>
		function valid()
		{
			if($('#txtPassword').val() != $('#txtConfirmPassword').val())
		    {
		      	$('#ajaxmsg').show('slow');
		      	var msg = 'Mismatch Password..!!';
		        $('#ajaxmsg').html(msg);
		        return false;
		    }
		}
		$(window).load(function () {
			jQuery('#page').fadeIn(500);
			jQuery('#loading').hide();
		});
		$(document).ready(function(){
      	  $('#gstDetails').hide();
      	  $('#gstDoc').hide();
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
	          url  : "<?php echo base_url('signup/ajax_fetch_city');?>",
	          type : "post",
	          data : {"key":con}, 
	          success: function(result){ 
	          //$("#cmbCity").html(result);
	          $('#cmbCity').append('<option value="none">Select</option>');
	          var opts = $.parseJSON(result);
	          $.each(opts, function(i, d){
	              $('#cmbCity').append('<option value="' + d.id + '">' + d.city_name + '</option>');
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