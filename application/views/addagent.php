<?php include_once('header.php');?>
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
				<h1>Add Agent</h1>
			</div>
			<form name="frmRegister" method="post" action="<?php echo base_url('agents/addagent');?>" enctype="multipart/form-data" onsubmit="valid();">
						
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
											<option value="Destination Management Company">Destination Management Company</option>
	              							<option value="Tour Operator">Tour Operator</option>
	              							<option value="Tour Operator">Travel Agent</option>
	              							<option value="Tour Operator">Wholesale Travel Company</option>
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
							<input type="submit" value="Save" class="register-button-form float-left mr-3 ">
							<a href="<?php echo base_url('dashboardsa');?>" class="cancel-button-form float-left">Cancel</a>
							</div>
						</form>
		</div>
	</div>
</section>
<?php include_once('footer.php');?>
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