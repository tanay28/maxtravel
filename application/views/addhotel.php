<?php include_once('header.php');?>
			
<section class="w-100 float-left wrap-signup pt-3 pb-5">
	<div class="container">
		
		<div class="row">
			<div class="col-lg-12 float-left page-title-top mt-3">
				<h1>Add Hotel</h1>
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
								<input type="text" class="input-class-common float-left">
							</div>
							<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
								<label class="float-left">Hotel Address 
								</label>
								<textarea class="input-class-common float-left text-area"></textarea>
							</div>
						</div>
					</div>
					<div class="w-100 float-left mt-4">
						<div class="col-lg-12 mb-3">
							<h3>Facilities</h3>
							<span class="small">Select facilities from the facility list</span>
						</div>

						<div class="w-100 float-left facilities-wrap">
							<ul class="ks-cboxtags">
								<li><input type="checkbox" id="checkboxOne" value="Rainbow Dash"><label for="checkboxOne">Swimming Pool</label></li>
								<li><input type="checkbox" id="checkboxTwo" value="Cotton Candy" checked><label for="checkboxTwo">Restaurants</label></li>
								<li><input type="checkbox" id="checkboxThree" value="Rarity" checked><label for="checkboxThree">Gym</label></li>
								<li><input type="checkbox" id="checkboxFour" value="Moondancer"><label for="checkboxFour">Bar</label></li>
								<li><input type="checkbox" id="checkboxFive" value="Surprise"><label for="checkboxFive">Car Parking</label></li>
								<li><input type="checkbox" id="checkboxSix" value="Twilight Sparkle" checked><label for="checkboxSix">Wi-Fi</label></li>
						</div>
					</div>
					<div class="w-100 float-left mt-5">
						<div class="col-lg-12 mb-3">
							<h3>Category</h3>
						</div>

						<div class="form-group float-left radio-star">
							<input class="custom-radio" type="radio" id="radio_1" name="my-radio" value="1" checked>
							<label for="radio_1">
								<span></span> 1 Star
								<div class="w-100 float-left star-pad">
										<i class="fas fa-star"></i>
								</div>
					  		</label>
					  	</div>
					  	<div class="form-group float-left radio-star">
							<input class="custom-radio" type="radio" id="radio_2" name="my-radio" value="1">
							<label for="radio_2">
								<span></span> 2 Star
								<div class="w-100 float-left star-pad">
										<i class="fas fa-star"></i> <i class="fas fa-star"></i>
								</div>
						  	</label>
						</div>
					  	<div class="form-group float-left radio-star">
							<input class="custom-radio" type="radio" id="radio_3" name="my-radio" value="1">
							<label for="radio_3">
								<span></span> 3 Star
								<div class="w-100 float-left star-pad">
									<i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i>
								</div>
					  		</label>
					  	</div>
					  	<div class="form-group float-left radio-star">
							<input class="custom-radio" type="radio" id="radio_4" name="my-radio" value="1">
							<label for="radio_4">
								<span></span> 4 Star
								<div class="w-100 float-left star-pad">
										<i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i>
								</div>
						  	</label>
						</div>
						<div class="form-group float-left radio-star">
							<input class="custom-radio" type="radio" id="radio_5" name="my-radio" value="1">
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
						<div class="col-lg-5 col-md-6 col-12 float-left wrap-sign-main">
							<label class="float-left w-100">Select Type</label>
							<select class="input-class-common w-100 float-left">
								<option>Select</option>
							</select>
						</div>
						<div class="col-lg-5 col-md-6 col-12 float-left wrap-sign-main">
								<label class="w-100 float-left">Room Rate</label>
								<input type="text" class="input-class-common w-100 float-left">
								<span class="font-included">Included Breakfast</span>
						</div>
					</div>
				</div>
			</div>	

			<div class="col-lg-12 float-left mt-4">
				<input type="submit" value="Add Hotel" class="register-button-form float-left mr-3 ">
				<a href="#" class="cancel-button-form float-left">Cancel</a>
			</div>
		</div>
	</div>
</section>
<?php include_once('footer.php');?>


			