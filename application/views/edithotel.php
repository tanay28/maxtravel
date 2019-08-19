<?php include_once('header.php');?>
			
<section class="w-100 float-left wrap-signup pt-3 pb-5">
	<div class="container">
		<?php
			if(isset($page_access) && $page_access=='ACTIVE'){
		?>
		<div class="row">
			<div class="col-lg-12 float-left page-title-top mt-3">
				<h1>Edit Hotel</h1>
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
			<form name="frmEdithotel" action="" method="POST" enctype='multipart/form-data'>
				<div class="col-lg-12 float-left">
					<div class="w-100 float-left wrap-section-sign account-sett  mb-3 mt-3">
						<div class="w-100 float-left">
							<div class="col-lg-12 mb-4">
								<h3>Hotel Details</h3>
							</div>
							<div class="col-12 col-md-12 col-lg-6 float-left wr-form p-0">
								<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
									<label class="float-left">Hotel Name 
									</label>
									<input type="text" name="hotel_name" required="" class="input-class-common float-left" value="<?php echo isset($hotel_details[0]['hotel_name']) ? $hotel_details[0]['hotel_name'] : '';?>">
								</div>
								<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
									<label class="float-left">Hotel Address 
									</label>
									<textarea name="hotel_address" class="input-class-common float-left text-area"><?php echo isset($hotel_details[0]['hotel_address']) ? $hotel_details[0]['hotel_address'] : '';?></textarea>
								</div>
								<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
									<label class="float-left">Country *
									</label>
									<select class="input-class-common float-left select-box selectbox" name="country_id" id="cmbCountry" required="">
										<option value="none">Select</option>
							             <?php
							              if(isset($country) && count($country)>0)
							              {
							                foreach ($country as $ikey => $ivalue)
							                {
							            ?>
							             <option value="<?php echo $ivalue['id'];?>" <?php echo (isset($hotel_details[0]['country_id']) && $hotel_details[0]['country_id']==$ivalue['id']) ? 'selected' : '';?>><?php echo $ivalue['country_name'];?></option> 
							            <?php
							                }
							              }
							             ?>
									</select>
								</div>
								<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
									<label class="float-left">City *
									</label>
									<select class="input-class-common float-left selectbox" name="city_id" id="cmbCity" required=""></select>
								</div>
							</div>
						</div>
						<div class="w-100 float-left mt-4">
							<div class="col-lg-12 mb-3">
								<h3>Facilities</h3>
								<span class="small">Select facilities from the facility list</span>
							</div>

							<div class="w-100 float-left facilities-wrap">
								<?php
									$facilitiesArr = array();
									if(isset($hotel_details[0]['facilities']) && $hotel_details[0]['facilities']!=''){
										$facilitiesArr = explode(',', $hotel_details[0]['facilities']);
									}
								?>
								<ul class="ks-cboxtags">
									<li><input type="checkbox" id="checkboxOne" name="facilities[]" value="Swimming Pool" <?php echo (isset($facilitiesArr) && in_array('Swimming Pool',$facilitiesArr)) ? 'checked' : '';?>><label for="checkboxOne">Swimming Pool</label></li>

									<li><input type="checkbox" id="checkboxTwo" name="facilities[]" value="Restaurants" <?php echo (isset($facilitiesArr) && in_array('Restaurants',$facilitiesArr)) ? 'checked' : '';?>><label for="checkboxTwo">Restaurants</label></li>

									<li><input type="checkbox" id="checkboxThree" name="facilities[]" value="Gym" <?php echo (isset($facilitiesArr) && in_array('Gym',$facilitiesArr)) ? 'checked' : '';?>><label for="checkboxThree">Gym</label></li>

									<li><input type="checkbox" id="checkboxFour" name="facilities[]" value="Bar" <?php echo (isset($facilitiesArr) && in_array('Bar',$facilitiesArr)) ? 'checked' : '';?>><label for="checkboxFour">Bar</label></li>

									<li><input type="checkbox" id="checkboxFive" name="facilities[]" value="Car Parking" <?php echo (isset($facilitiesArr) && in_array('Car Parking',$facilitiesArr)) ? 'checked' : '';?>><label for="checkboxFive">Car Parking</label></li>

									<li><input type="checkbox" id="checkboxSix" name="facilities[]" value="Wi-Fi" <?php echo (isset($facilitiesArr) && in_array('Wi-Fi',$facilitiesArr)) ? 'checked' : '';?>><label for="checkboxSix">Wi-Fi</label></li>
							</div>
						</div>
						<div class="w-100 float-left mt-5">
							<div class="col-lg-12 mb-3">
								<h3>Category</h3>
							</div>

							<div class="form-group float-left radio-star">
								<input class="custom-radio" type="radio" id="radio_1" name="hotel_category[]" value="1" <?php echo (isset($hotel_details[0]['hotel_category']) && $hotel_details[0]['hotel_category']==1) ? 'checked' : '';?>>
								<label for="radio_1">
									<span></span> 1 Star
									<div class="w-100 float-left star-pad">
											<i class="fas fa-star"></i>
									</div>
						  		</label>
						  	</div>
						  	<div class="form-group float-left radio-star">
								<input class="custom-radio" type="radio" id="radio_2" name="hotel_category[]" value="2" <?php echo (isset($hotel_details[0]['hotel_category']) && $hotel_details[0]['hotel_category']==2) ? 'checked' : '';?>>
								<label for="radio_2">
									<span></span> 2 Star
									<div class="w-100 float-left star-pad">
											<i class="fas fa-star"></i> <i class="fas fa-star"></i>
									</div>
							  	</label>
							</div>
						  	<div class="form-group float-left radio-star">
								<input class="custom-radio" type="radio" id="radio_3" name="hotel_category[]" value="3" <?php echo (isset($hotel_details[0]['hotel_category']) && $hotel_details[0]['hotel_category']==3) ? 'checked' : '';?>>
								<label for="radio_3">
									<span></span> 3 Star
									<div class="w-100 float-left star-pad">
										<i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i>
									</div>
						  		</label>
						  	</div>
						  	<div class="form-group float-left radio-star">
								<input class="custom-radio" type="radio" id="radio_4" name="hotel_category[]" value="4" <?php echo (isset($hotel_details[0]['hotel_category']) && $hotel_details[0]['hotel_category']==4) ? 'checked' : '';?>>
								<label for="radio_4">
									<span></span> 4 Star
									<div class="w-100 float-left star-pad">
											<i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i>
									</div>
							  	</label>
							</div>
							<div class="form-group float-left radio-star">
								<input class="custom-radio" type="radio" id="radio_5" name="hotel_category[]" value="5" <?php echo (isset($hotel_details[0]['hotel_category']) && $hotel_details[0]['hotel_category']==5) ? 'checked' : '';?>>
								<label for="radio_5">
									<span></span> 5 Star
									<div class="w-100 float-left star-pad">
											<i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i>
									</div>
								</label>
							</div>
						</div>
						<div class="w-100 float-left mt-2">
							<div class="col-lg-12 mb-1">
								<h3>Room Type</h3>
							</div>
							<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main">
								<label class="float-left w-100">Select Type</label>
								<select class="input-class-common w-100 float-left selectbox" name="room_type">
									<option value="">Select</option>
									<option value="Delux" <?php echo (isset($hotel_details[0]['room_type']) && $hotel_details[0]['room_type']=='Delux') ? 'selected' : '';?>>Delux</option>
									<option value="Super Delux" <?php echo (isset($hotel_details[0]['room_type']) && $hotel_details[0]['room_type']=='Super Delux') ? 'selected' : '';?>>Super Delux</option>
								</select>
							</div>
							<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main">
								<label class="w-100 float-left">Room Rate</label>
								<input type="text" name="pernight_room_rate" class="input-class-common w-100 float-left" value="<?php echo isset($hotel_details[0]['pernight_room_rate']) ? $hotel_details[0]['pernight_room_rate'] : '';?>">
								<!-- <span class="font-included">Included Breakfast</span> -->
							</div>
					
						<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main">
								<label class="w-100 float-left">Breakfast</label>
								

								<div class="form-group float-left radio-star">
									<input class="custom-radio" type="radio" id="breakfast_include" name="breakfast" value="include" <?php echo (isset($hotel_details[0]['breakfast']) && $hotel_details[0]['breakfast']=='include') ? 'checked' : '';?>>
									<label for="breakfast_include">
										<span></span> Included Breakfast
										<!-- <div class="w-100 float-left star-pad">
												<i class="fas fa-star"></i>
										</div> -->
							  		</label>
							  	</div>
							  	<div class="form-group float-left radio-star">
									<input class="custom-radio" type="radio" id="breakfast_exclude" name="breakfast" value="exclude" <?php echo (isset($hotel_details[0]['breakfast']) && $hotel_details[0]['breakfast']=='exclude') ? 'checked' : '';?>>
									<label for="breakfast_exclude">
										<span></span> Exclude Breakfast
										<!-- <div class="w-100 float-left star-pad">
												<i class="fas fa-star"></i> <i class="fas fa-star"></i>
										</div> -->
								  	</label>
								</div>


							</div>
							</div>
						<div class="w-100 float-left mt-2">
							
							<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main position-relative no-perso">
								<label class="w-100 float-left">No. of Adults</label>
								<!-- <i class="far fa-plus-square"></i> -->
								<input type="text" name="no_of_adult" class="input-class-common w-100 float-left" value="<?php echo isset($hotel_details[0]['no_of_adult']) ? $hotel_details[0]['no_of_adult'] : 0;?>">
							</div>
							<div class="col-lg-4 col-md-4 col-12 float-left wrap-sign-main position-relative no-perso">
								<label class="w-100 float-left">No. of Child</label>
								<!-- <i class="far fa-plus-square"></i> -->
								<input type="text" name="no_of_child" class="input-class-common w-100 float-left" value="<?php echo isset($hotel_details[0]['no_of_child']) ? $hotel_details[0]['no_of_child'] : 0;?>">
							</div>
						</div>
					
					</div>
				</div>	

				<div class="col-lg-12 float-left mt-4">
					<input type="submit" value="Update Hotel" class="register-button-form float-left mr-3 ">
					<a href="<?php echo base_url('hotel/lists');?>" class="cancel-button-form float-left">Cancel</a>
				</div>
			</form>
		</div>
		<?php }else{ echo 'OOPS!! Something went wrong. Try again after sometime';}?>
	</div>
</section>
<?php include_once('footer.php');?>
<script type="text/javascript">
	$(document).ready(function(){
		$('#cmbCountry').on('change',function(){
          	$('#cmbCity').empty();
        	var con = $(this).val();
        	var con_name = $('#cmbCountry option:selected').text();
        	//alert(con_name);
	        $.ajax({
	          url  : "<?php echo base_url('hotel/ajax_fetch_city');?>",
	          type : "post",
	          data : {"key":con}, 
	          success: function(result){ 
	          //console.log(result);
	          //$("#cmbCity").html(result);
	          $('#cmbCity').append('<option value="none">Select</option>');
	          var opts = $.parseJSON(result);
	          $.each(opts, function(i, d){
	              $('#cmbCity').append('<option value="' + d.id + '">' + d.city_name + '</option>');
	          });
	        }});
      });
	});

</script>
<script>
/*$(document).ready(function () {
      $('.selectbox:not(.ignore)').niceSelect();
      FastClick.attach(document.body);
}); */ 

</script>


			