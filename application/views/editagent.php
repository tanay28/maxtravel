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
										<label class="float-left">Agency Email <font class="mandetory-star">*</font>
										</label>
										<input type="text" class="input-class-common float-left" name="txtAgencyname" required="" value="<?php echo isset($agents[0]['email']) ? $agents[0]['email'] : '';?>" readonly>
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
							              	 <?php
								              if(isset($currency) && count($currency)>0)
								              {
								                foreach ($currency as $ikey => $ivalue)
								                {
								            ?>
								             <option value="<?php echo $ivalue['currency_id'];?>" <?php echo (isset($agents[0]['preffered_currency']) && $agents[0]['preffered_currency'] == $ivalue['currency_id']) ? 'selected' : ''?>><?php echo $ivalue['currency_name'];?></option> 
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
										<input type="text" class="input-class-common float-left" name="txtGSTNO"  id="txtGSTNO" value="<?php echo isset($agents[0]['gstin_no']) ? $agents[0]['gstin_no'] : '';?>">
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
									<label class="float-left w-100">Accounts Name
									</label>
									<input type="text" class="input-class-common  w-100 float-left" name="txtAccountName" value="<?php echo isset($agents[0]['account_name']) ? $agents[0]['account_name'] : '';?>">
								</div>
								<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main">
									<label class="float-left  w-100">Accounts Email
									</label>
									<input type="text" class="input-class-common  w-100 float-left" name="txtAccountEmail" value="<?php echo isset($agents[0]['account_email']) ? $agents[0]['account_email'] : '';?>">
								</div>
								<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main">
									<label class="float-left  w-100">Accounts Number
									</label>
									<input type="text" class="input-class-common  w-100 float-left" name="txtAccountNo" value="<?php echo isset($agents[0]['account_no']) ? $agents[0]['account_no'] : '';?>">
								</div>

								<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main">
										<label class="float-left w-100">Reservation/Operation Name
										</label>
										<input type="text" class="input-class-common  w-100 float-left" name="txtOperationName" value="<?php echo isset($agents[0]['operation_name']) ? $agents[0]['operation_name'] : '';?>">
									</div>
									<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main">
										<label class="float-left  w-100">Reservation/Operation Email
										</label>
										<input type="text" class="input-class-common  w-100 float-left" name="txtOperationEmail"  value="<?php echo isset($agents[0]['operation_email']) ? $agents[0]['operation_email'] : '';?>">
									</div>
									<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main">
										<label class="float-left  w-100">Reservation/Operation Number 
										</label>
										<input type="text" class="input-class-common  w-100 float-left" name="txtOperationNo"  value="<?php echo isset($agents[0]['operation_no']) ? $agents[0]['operation_no'] : '';?>">
									</div>

									<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main">
											<label class="float-left w-100">Management Name
											</label>
											<input type="text" class="input-class-common  w-100 float-left" name="txtManagementName" value="<?php echo isset($agents[0]['management_name']) ? $agents[0]['management_name'] : '';?>">
										</div>
										<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main">
											<label class="float-left  w-100">Management Email
											</label>
											<input type="text" class="input-class-common  w-100 float-left" name="txtManagementEmail" value="<?php echo isset($agents[0]['management_email']) ? $agents[0]['management_email'] : '';?>">
										</div>
										<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main">
											<label class="float-left  w-100">Management Number
											</label>
											<input type="text" class="input-class-common  w-100 float-left" name="txtManagementNo" value="<?php echo isset($agents[0]['management_no']) ? $agents[0]['management_no'] : '';?>">
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
<?php include_once('footer.php');?>
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
	          $('#txtGSTNO').val('');
	        }
      });
    });
	</script>