<?php include_once('header.php');?>
			
<section class="w-100 float-left wrap-signup pt-3 pb-5">
	<div class="container">
		<?php
			if(isset($page_access) && $page_access=='ACTIVE'){
		?>
		<div class="row">
			<div class="col-lg-12 float-left page-title-top mt-3">
				<h1>Book Hotel For Agent</h1>
			</div>
			<div class="col-lg-12 float-left">
				<?php if ($this->session->userdata('success')) { ?>
				<div class="alert alert-success w-100 float-left">
				    <?php echo $this->session->userdata('success');?>
				</div>
				<?php }?>
				<?php if ($this->session->userdata('error')) { ?>
				<div class="alert alert-danger">
				    <?php echo $this->session->userdata('error');?>
				</div>
				<?php }?>	
			</div>
			<form name="frmBookHotel" action="" method="POST" enctype='multipart/form-data'>
				<div class="col-lg-12 float-left">
					<div class="w-100 float-left wrap-section-sign account-sett  mb-3 mt-3">
						<div class="w-100 float-left">
							<div class="col-lg-12 mb-4">
								<h3>Hotel Details</h3>
							</div>
							<div class="col-12 col-md-12 col-lg-6 float-left wr-form p-0">
								
								<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
									<label class="float-left">Select Agent *
									</label>
									<select class="input-class-common float-left select-box selectbox" name="usersid" id="cmbAgent" required="">
										<option value="">Select Agent</option>
							             <?php
							              if(isset($agent_list) && count($agent_list)>0)
							              {
							                foreach ($agent_list as $akey => $avalue)
							                {
							            ?>
							             <option value="<?php echo $avalue['user_id'];?>"><?php echo $avalue['agency_name'];?></option> 
							            <?php
							                }
							              }
							             ?>
									</select>
								</div>

								<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
									<label class="float-left">Select Hotel *
									</label>
									<select class="input-class-common float-left select-box selectbox" name="hotel_id" id="cmbHotel" required="">
										<option value="">Select Hotel</option>
							             <?php
							              if(isset($hotel_list) && count($hotel_list)>0)
							              {
							                foreach ($hotel_list as $hkey => $hvalue)
							                {
							            ?>
							             <option value="<?php echo $hvalue['id'];?>"><?php echo $hvalue['hotel_name'].' #'.$hvalue['city_name'].' #'.$hvalue['country_name'];?></option> 
							            <?php
							                }
							              }
							             ?>
									</select>
								</div>
								

								<div class="col-12 col-md-12 col-lg-12 float-left checkin-dates wrap-sign-main">
					                  <label>Select Check In </label>
					                  <input type="text" name="modelcartcheckin" id="cartcheckin" value="" class='form-control autocomplete w-50 float-left' />
					                  <!-- <input id="datepicker3" /></div> -->
					            </div>


					            <div class="col-12 col-md-12 col-lg-12 float-left checkin-dates  wrap-sign-main">
					                  <label>Select Check Out </label>
					                  <input type="text" name="modelcartcheckout" id="cartcheckout" value="" />
					            </div>

					            <div class="col-12 col-md-12 col-lg-12 float-left wrap-sign-main">
					                  <label>No. of Rooms</label>
					                  <input type="text" name="modelcartroom" value="1" />
					            </div>
					            <div class="col-12 col-md-12 col-lg-12 float-left wrap-sign-main">
					                  <label>No. of Adults</label>
					                  <input type="text" name="modelcartadults" value="1" />
					            </div>
					            <div class="col-12 col-md-12 col-lg-12 float-left wrap-sign-main">
					                  <label>No. of Child</label>
					                  <input type="text" name="modelcartchild" value="1" />
					            </div>

							</div>
						</div>
						
						
						
						
						
						

					</div>
				</div>	

				<div class="col-lg-12 float-left mt-4">
					<input type="submit" value="Book Hotel" class="register-button-form float-left mr-3 " name="bookhotelforagent">
					<a href="<?php echo base_url('hotel/lists');?>" class="cancel-button-form float-left">Cancel</a>
				</div>
			</form>
		</div>
		<?php }else{ echo 'OOPS!! Something went wrong. Try again after sometime';}?>
	</div>
</section>
<?php include_once('footer.php');?>
<script>
	$('#cartcheckin').datepicker({
            showOtherMonths: true,
            
	});
	$('#cartcheckout').datepicker({
		showOtherMonths: true
	});
</script>