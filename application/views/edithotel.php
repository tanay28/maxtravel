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
						<!-- <div class="w-100 float-left mt-2">
							<div class="col-lg-12 mb-1">
								<h3>Sub Category</h3>
								<?php
									if(isset($hotel_details[0]['subcategories']))
									{
										$arr = json_decode($hotel_details[0]['subcategories'],true);
										if(isset($arr) && count($arr)>0)
										{
											foreach ($arr as $ikey => $ivalue)
											{
								?>
										<div class="col-12 col-md-3 col-lg-3 float-left manual_category mb-3"><input type="text"  value="<?php echo $ivalue;?>" class="input-class-common w-100 float-left" name="txtOldsubCat[]"></div>
								<?php
											}
										} 
									}
								?>
								<label class="float-left w-100">Enter No of new sub categories</label>
								<input type="text" name="txtscatNo" class="input-class-common w-30 float-left" id="txtscatNo">
							</div>
							<div class="w-100 float-left mb-1" style="display: none" id="dy_div">
								
							</div>
						</div> -->
						<div class="w-100 float-left mt-2">
							<div class="col-lg-12 mb-1">
								<h3>Sub Category</h3>	
								

								<?php 
									$arr = array();
									if(isset($hotel_details[0]['subcategories']) && $hotel_details[0]['subcategories']!=''){
										$arr = json_decode($hotel_details[0]['subcategories'],true);
										/*echo "<pre>";
										var_dump($arr);*/
									}
									if(isset($arr) && count($arr)>0){
								?>
								<input type="hidden" name="subcategorycount" id="subcategorycountid" value="<?php echo count($arr);?>">
								<div id="subcategorydivid">
								<?php
										foreach ($arr as $ckey => $cvalue) {
											$ckeyid = $ckey + 1;
										
								?>

								
								
								
								<div id="innersubcategoryid_<?php echo $ckeyid;?>">	
									<div class="w-100 wrp-su-cate float-left">				
									<input type="text" name="txtsubCat[<?php echo $ckeyid;?>][name]" class="input-class-common float-left" placeholder="Enter Category Name" value="<?php echo $cvalue['name'];?>">
									</div>
									
									<div class="wrp-su-cate float-left">
									<div class="w-100 float-left">
									<input type="radio" name="txtsubCat[<?php echo $ckeyid;?>][refundable]" value="refund" class="float-left" <?php echo ($cvalue['refundable']=='refund') ? 'checked' : '';?>> Refundable
									</div>
									<div class="w-100 float-left">
									<input type="radio" name="txtsubCat[<?php echo $ckeyid;?>][refundable]" value="nonrefund" class="float-left" <?php echo ($cvalue['refundable']=='nonrefund') ? 'checked' : '';?>> Non Refundable
									</div>
									</div>

									<div class="wrp-su-cate float-left">
									<div class="w-100 float-left">
									<input type="radio" name="txtsubCat[<?php echo $ckeyid;?>][breakfast]" value="include" class="float-left" <?php echo ($cvalue['breakfast']=='include') ? 'checked' : '';?>> Include Breakfast
									</div>
									<div class="w-100 float-left">
									<input type="radio" name="txtsubCat[<?php echo $ckeyid;?>][breakfast]" value="exclude" class="float-left" <?php echo ($cvalue['breakfast']=='exclude') ? 'checked' : '';?>> Exclude Breakfast
									</div>
									</div>

									<div class="wrp-su-cate float-left">
									<input type="text" name="txtsubCat[<?php echo $ckeyid;?>][roomrate]" class="input-class-common  float-left" placeholder="Per Night Room Rate" value="<?php echo $cvalue['roomrate'];?>">
									</div>
									<div class="wrp-su-cate float-left">
									<label class="float-left pt-2"><a href="javascript:void(0);" onclick="addsubcategory(<?php echo $ckeyid;?>);">+ Add</a></label>
									<?php 
										if($ckeyid>1){
									?>
									<label class="float-left pt-2"><a href="javascript:void(0);" onclick="delsubcategory(<?php echo $ckeyid;?>);">- Remove</a></label>
									<?php }?>
									</div>
									
								</div>
								
								<?php }?>
								</div>
								<?php}else{?>
								<?php 
									if(isset($ckeyid) && $ckeyid>1){
								?>

								<?php }else{?>
								<input type="hidden" name="subcategorycount" id="subcategorycountid" value="1">
								<div id="subcategorydivid">
									<div id="innersubcategoryid_1">	
									<div class="w-100 wrp-su-cate float-left">				
										<input type="text" name="txtsubCat[1][name]" class="input-class-common float-left" placeholder="Enter Category Name">
										</div>
										
										<div class="wrp-su-cate float-left">
										<div class="w-100 float-left">
										<input type="radio" name="txtsubCat[1][refundable]" value="refund" class="float-left"> Refundable
										</div>
										<div class="w-100 float-left">
										<input type="radio" name="txtsubCat[1][refundable]" value="nonrefund" class="float-left"> Non Refundable
										</div>
										</div>

										<div class="wrp-su-cate float-left">
										<div class="w-100 float-left">
										<input type="radio" name="txtsubCat[1][breakfast]" value="include" class="float-left"> Include Breakfast
										</div>
										<div class="w-100 float-left">
										<input type="radio" name="txtsubCat[1][breakfast]" value="exclude" class="float-left"> Exclude Breakfast
										</div>
										</div>

										<div class="wrp-su-cate float-left">
										<input type="text" name="txtsubCat[1][roomrate]" class="input-class-common  float-left" placeholder="Per Night Room Rate">
										</div>
										<div class="wrp-su-cate float-left">
										<label class="float-left pt-2"><a href="javascript:void(0);" onclick="addsubcategory(1);">+ Add</a></label>
										</div>
										
									</div>
								</div>
								<?php }}?>
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
					
							</div>

							<div class="w-100 float-left wrap-sign-main">
							<div class="col-lg-12 mb-1">
								<h3>Breakfast</h3>
							</div>
							
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

		$('#txtscatNo').on('blur',function(){
			var no_of_cat = $(this).val();
			if(no_of_cat>0)
			{
				$('#dy_div').empty();
				$('#dy_div').append('<label class="float-left col-lg-12 mt-3">Enter sub categories below</label><br>');
				for(var i=0;i<no_of_cat;i++)
				{
					$('#dy_div').append('<div class="col-12 col-md-3 col-lg-3 float-left manual_category mb-3"><input type="text" value="" placeholder="Sub-Category '+(i+1)+'" class="input-class-common w-100 float-left" name="txtsubCat[]"></div>');
				}
				$('#dy_div').show('slow');
			}
			else{
				$('#dy_div').hide('slow');	
			}
		});
	});

</script>
<script>
/*$(document).ready(function () {
      $('.selectbox:not(.ignore)').niceSelect();
      FastClick.attach(document.body);
}); */ 

</script>
<script type="text/javascript">
	function addsubcategory(divid){

		var count = eval($('#subcategorycountid').val());
		count = count+1;
		$('#subcategorydivid').append('<div id="innersubcategoryid_'+count+'"><div class="w-100 wrp-su-cate float-left"><input type="text" name="txtsubCat['+count+'][name]" class="input-class-common float-left" placeholder="Enter Category Name"></div><div class="wrp-su-cate float-left"><div class="w-100 float-left"><input type="radio" name="txtsubCat['+count+'][refundable]" value="refund" class="float-left"> Refundable</div><div class="w-100 float-left"><input type="radio" name="txtsubCat['+count+'][refundable]" value="nonrefund" class="float-left"> Non Refundable</div></div><div class="wrp-su-cate float-left"><div class="w-100 float-left"><input type="radio" name="txtsubCat['+count+'][breakfast]" value="include" class="float-left"> Include Breakfast</div><div class="w-100 float-left"><input type="radio" name="txtsubCat['+count+'][breakfast]" value="exclude" class="float-left"> Exclude Breakfast</div></div><div class="wrp-su-cate float-left"><input type="text" name="txtsubCat['+count+'][roomrate]" class="input-class-common  float-left" placeholder="Per Night Room Rate"></div><div class="wrp-su-cate float-left"><label class="float-left pt-2"><a href="javascript:void(0);" onclick="addsubcategory('+count+');">+ Add</a></label><label class="float-left pt-2"><a href="javascript:void(0);" onclick="delsubcategory('+count+');">- Remove</a></label></div></div></div>');
		$('#subcategorycountid').val(count);
	}

	function delsubcategory(divid){

		var count = eval($('#subcategorycountid').val());
		count = count-1;
		$('#innersubcategoryid_'+divid).remove();
		$('#subcategorycountid').val(count);
	}
</script>


			