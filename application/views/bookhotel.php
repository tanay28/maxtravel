<?php include_once('header.php');?>
			
<section class="w-100 float-left wrap-signup pt-3 pb-5">
      <div class="container">
            <?php
                  if(isset($page_access) && $page_access=='ACTIVE'){
            ?>	
            <div class="row">

                  <div class="col-lg-12 float-left page-title-others mt-3">
                        <h1>Hotels</h1>
                  </div>

                  <div class="col-lg-12 float-left wrap-hotel-search">
                        <div class="w-100 float-left search-hotels-bg">
                              <h3 class="w-100 float-left">Search Hotel</h3>
                              <div class="col-12 col-md-12 col-lg-4 float-left hotel-sel pl-0">
                                    <label>Select Hotel</label>
                                    
                                    <div action='' autocomplete='off' class="w-100">
                                                <div class='input-group w-100 float-left'>
                                                  <input aria-describedby='button-addon2' aria-label='Country' class='form-control autocomplete w-100 float-left' id='myInput' name='myCountry' placeholder='Select Hotel Destination' type='text'>
                                                  
                                                </div>
                                          </div>
                              </div>
                              <div class="col-12 col-md-12 col-lg-3 float-left checkin-dates">
                                    <label>Select Check In </label>
                                    <input id="datepicker" /></div>


                              <div class="col-12 col-md-12 col-lg-3 float-left checkin-dates">
                                    <label>Select Check Out </label>
                                    <input id="datepicker1" />
                              </div>


                              <div class="col-12 col-md-12 col-lg-2 float-right rating-dates pr-0">
                                    <label class="w-100 float-left">Select Hotel Rating </label>
                                    <select class="selectbox w-100 float-left">
                                          <option>Select Rating</option>
                                          <option>1 Star Hotel</option>
                                          <option>2 Star Hotel</option>
                                          <option>3 Star Hotel</option>
                                          <option>4 Star Hotel</option>
                                          <option>5 Star Hotel</option>
                                    </select>
                              </div>
                              <div class="w-100 float-left mt-4">
                                    <input type="submit" value="Search Hotel"
                                          class="search-button-form float-left mr-3 ">

                              </div>
                        </div>
                  </div>


                  <div class="col-lg-12 float-left wrap-hotel-list-agent mt-4 mb-4">

                        <div class="w-100 float-left hotel-list-wrap">
                              <div class="img-hotels float-left">
                                    <img src="<?php echo base_url('assets/images/hotels.png');?>" alt="hotel-img">
                              </div>
                              <div class="hotel-name float-left">
                                    <h2 class="w-100 float-left">Hotel Taj Kolkata</h2>
                                    <div class="star-ratings float-left w-100">
                                          <div class="float-left starts-all">
                                                <i class="fas fa-star fill-star"></i>
                                                <i class="fas fa-star fill-star"></i>
                                                <i class="fas fa-star fill-star"></i>
                                                <i class="fas fa-star fill-star"></i>
                                                <i class="fas fa-star"></i>
                                          </div>
                                          <span class="float-left">4 star</span>
                                          <h3 class="room-type-hotel float-left">Dulux Room</h3>
                                    </div>
                                    <div class="w-100 float-left bottom-info-hotels">
                                          <div class="col-12 col-md-6 col-lg-6 float-left address-hotel p-0">
                                                <i class="fas fa-map-marker-alt float-left mr-2"></i>
                                                <span class="float-left address-wrap-hotel">5A/2, AV Avenue, CC Bose Street,
                                                      Kolkata 700 005, WB, India</span>
                                          </div>
                                          <div class="col-12 col-md-6 col-lg-6 float-left facilities-hotel">
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Swmming Pool">
                                                      <i class="fas fa-swimmer"></i>
                                                </div>
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Restaurants">
                                                      <i class="fas fa-utensils"></i>
                                                </div>
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Gym">
                                                      <i class="fas fa-dumbbell"></i>
                                                </div>
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Bar">
                                                      <i class="fas fa-glass-cheers"></i>
                                                </div>
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Car Parking">
                                                      <i class="fas fa-shuttle-van"></i>
                                                </div>
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Wi-Fi">
                                                      <i class="fas fa-wifi"></i>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                              <div class="hotel-price-wrap float-right position-relative">
                                    <h1 class="w-100 float-left"><i class="fas fa-rupee-sign"></i> 3000</h1>
                                    <span class="w-100 float-left">Per Night</span>
                                    <a href="#" class="btn btn-booknow">BooK Now</a>
                              </div>
                        </div>

                        <div class="w-100 float-left hotel-list-wrap">
                              <div class="img-hotels float-left">
                                    <img src="<?php echo base_url('assets/images/hotels.png');?>" alt="hotel-img">
                              </div>
                              <div class="hotel-name float-left">
                                    <h2 class="w-100 float-left">Hotel Taj Kolkata</h2>
                                    <div class="star-ratings float-left w-100">
                                          <div class="float-left starts-all">
                                                <i class="fas fa-star fill-star"></i>
                                                <i class="fas fa-star fill-star"></i>
                                                <i class="fas fa-star fill-star"></i>
                                                <i class="fas fa-star fill-star"></i>
                                                <i class="fas fa-star"></i>
                                          </div>
                                          <span class="float-left">4 star</span>
                                          <h3 class="room-type-hotel float-left">Dulux Room</h3>
                                    </div>
                                    <div class="w-100 float-left bottom-info-hotels">
                                          <div class="col-12 col-md-6 col-lg-6 float-left address-hotel p-0">
                                                <i class="fas fa-map-marker-alt float-left mr-2"></i>
                                                <span class="float-left address-wrap-hotel">5A/2, AV Avenue, CC Bose Street,
                                                      Kolkata 700 005, WB, India</span>
                                          </div>
                                          <div class="col-12 col-md-6 col-lg-6 float-left facilities-hotel">
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Swmming Pool">
                                                      <i class="fas fa-swimmer"></i>
                                                </div>
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Restaurants">
                                                      <i class="fas fa-utensils"></i>
                                                </div>
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Gym">
                                                      <i class="fas fa-dumbbell"></i>
                                                </div>
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Bar">
                                                      <i class="fas fa-glass-cheers"></i>
                                                </div>
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Car Parking">
                                                      <i class="fas fa-shuttle-van"></i>
                                                </div>
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Wi-Fi">
                                                      <i class="fas fa-wifi"></i>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                              <div class="hotel-price-wrap float-right position-relative">
                                    <h1 class="w-100 float-left"><i class="fas fa-rupee-sign"></i> 3000</h1>
                                    <span class="w-100 float-left">Per Night</span>
                                    <a href="#" class="btn btn-booknow">BooK Now</a>
                              </div>
                        </div>

                        <div class="w-100 float-left hotel-list-wrap">
                              <div class="img-hotels float-left">
                                    <img src="<?php echo base_url('assets/images/hotels.png');?>" alt="hotel-img">
                              </div>
                              <div class="hotel-name float-left">
                                    <h2 class="w-100 float-left">Hotel Taj Kolkata</h2>
                                    <div class="star-ratings float-left w-100">
                                          <div class="float-left starts-all">
                                                <i class="fas fa-star fill-star"></i>
                                                <i class="fas fa-star fill-star"></i>
                                                <i class="fas fa-star fill-star"></i>
                                                <i class="fas fa-star fill-star"></i>
                                                <i class="fas fa-star"></i>
                                          </div>
                                          <span class="float-left">4 star</span>
                                          <h3 class="room-type-hotel float-left">Dulux Room</h3>
                                    </div>
                                    <div class="w-100 float-left bottom-info-hotels">
                                          <div class="col-12 col-md-6 col-lg-6 float-left address-hotel p-0">
                                                <i class="fas fa-map-marker-alt float-left mr-2"></i>
                                                <span class="float-left address-wrap-hotel">5A/2, AV Avenue, CC Bose Street,
                                                      Kolkata 700 005, WB, India</span>
                                          </div>
                                          <div class="col-12 col-md-6 col-lg-6 float-left facilities-hotel">
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Swmming Pool">
                                                      <i class="fas fa-swimmer"></i>
                                                </div>
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Restaurants">
                                                      <i class="fas fa-utensils"></i>
                                                </div>
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Gym">
                                                      <i class="fas fa-dumbbell"></i>
                                                </div>
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Bar">
                                                      <i class="fas fa-glass-cheers"></i>
                                                </div>
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Car Parking">
                                                      <i class="fas fa-shuttle-van"></i>
                                                </div>
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Wi-Fi">
                                                      <i class="fas fa-wifi"></i>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                              <div class="hotel-price-wrap float-right position-relative">
                                    <h1 class="w-100 float-left"><i class="fas fa-rupee-sign"></i> 3000</h1>
                                    <span class="w-100 float-left">Per Night</span>
                                    <a href="#" class="btn btn-booknow">BooK Now</a>
                              </div>
                        </div>

                        <div class="w-100 float-left hotel-list-wrap">
                              <div class="img-hotels float-left">
                                    <img src="<?php echo base_url('assets/images/hotels.png');?>" alt="hotel-img">
                              </div>
                              <div class="hotel-name float-left">
                                    <h2 class="w-100 float-left">Hotel Taj Kolkata</h2>
                                    <div class="star-ratings float-left w-100">
                                          <div class="float-left starts-all">
                                                <i class="fas fa-star fill-star"></i>
                                                <i class="fas fa-star fill-star"></i>
                                                <i class="fas fa-star fill-star"></i>
                                                <i class="fas fa-star fill-star"></i>
                                                <i class="fas fa-star"></i>
                                          </div>
                                          <span class="float-left">4 star</span>
                                          <h3 class="room-type-hotel float-left">Dulux Room</h3>
                                    </div>
                                    <div class="w-100 float-left bottom-info-hotels">
                                          <div class="col-12 col-md-6 col-lg-6 float-left address-hotel p-0">
                                                <i class="fas fa-map-marker-alt float-left mr-2"></i>
                                                <span class="float-left address-wrap-hotel">5A/2, AV Avenue, CC Bose Street,
                                                      Kolkata 700 005, WB, India</span>
                                          </div>
                                          <div class="col-12 col-md-6 col-lg-6 float-left facilities-hotel">
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Swmming Pool">
                                                      <i class="fas fa-swimmer"></i>
                                                </div>
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Restaurants">
                                                      <i class="fas fa-utensils"></i>
                                                </div>
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Gym">
                                                      <i class="fas fa-dumbbell"></i>
                                                </div>
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Bar">
                                                      <i class="fas fa-glass-cheers"></i>
                                                </div>
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Car Parking">
                                                      <i class="fas fa-shuttle-van"></i>
                                                </div>
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Wi-Fi">
                                                      <i class="fas fa-wifi"></i>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                              <div class="hotel-price-wrap float-right position-relative">
                                    <h1 class="w-100 float-left"><i class="fas fa-rupee-sign"></i> 3000</h1>
                                    <span class="w-100 float-left">Per Night</span>
                                    <a href="#" class="btn btn-booknow">BooK Now</a>
                              </div>
                        </div>

                        <div class="w-100 float-left hotel-list-wrap">
                              <div class="img-hotels float-left">
                                    <img src="<?php echo base_url('assets/images/hotels.png');?>" alt="hotel-img">
                              </div>
                              <div class="hotel-name float-left">
                                    <h2 class="w-100 float-left">Hotel Taj Kolkata</h2>
                                    <div class="star-ratings float-left w-100">
                                          <div class="float-left starts-all">
                                                <i class="fas fa-star fill-star"></i>
                                                <i class="fas fa-star fill-star"></i>
                                                <i class="fas fa-star fill-star"></i>
                                                <i class="fas fa-star fill-star"></i>
                                                <i class="fas fa-star"></i>
                                          </div>
                                          <span class="float-left">4 star</span>
                                          <h3 class="room-type-hotel float-left">Dulux Room</h3>
                                    </div>
                                    <div class="w-100 float-left bottom-info-hotels">
                                          <div class="col-12 col-md-6 col-lg-6 float-left address-hotel p-0">
                                                <i class="fas fa-map-marker-alt float-left mr-2"></i>
                                                <span class="float-left address-wrap-hotel">5A/2, AV Avenue, CC Bose Street,
                                                      Kolkata 700 005, WB, India</span>
                                          </div>
                                          <div class="col-12 col-md-6 col-lg-6 float-left facilities-hotel">
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Swmming Pool">
                                                      <i class="fas fa-swimmer"></i>
                                                </div>
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Restaurants">
                                                      <i class="fas fa-utensils"></i>
                                                </div>
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Gym">
                                                      <i class="fas fa-dumbbell"></i>
                                                </div>
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Bar">
                                                      <i class="fas fa-glass-cheers"></i>
                                                </div>
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Car Parking">
                                                      <i class="fas fa-shuttle-van"></i>
                                                </div>
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Wi-Fi">
                                                      <i class="fas fa-wifi"></i>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                              <div class="hotel-price-wrap float-right position-relative">
                                    <h1 class="w-100 float-left"><i class="fas fa-rupee-sign"></i> 3000</h1>
                                    <span class="w-100 float-left">Per Night</span>
                                    <a href="#" class="btn btn-booknow">BooK Now</a>
                              </div>
                        </div>

                        <div class="w-100 float-left hotel-list-wrap">
                              <div class="img-hotels float-left">
                                    <img src="<?php echo base_url('assets/images/hotels.png');?>" alt="hotel-img">
                              </div>
                              <div class="hotel-name float-left">
                                    <h2 class="w-100 float-left">Hotel Taj Kolkata</h2>
                                    <div class="star-ratings float-left w-100">
                                          <div class="float-left starts-all">
                                                <i class="fas fa-star fill-star"></i>
                                                <i class="fas fa-star fill-star"></i>
                                                <i class="fas fa-star fill-star"></i>
                                                <i class="fas fa-star fill-star"></i>
                                                <i class="fas fa-star"></i>
                                          </div>
                                          <span class="float-left">4 star</span>
                                          <h3 class="room-type-hotel float-left">Dulux Room</h3>
                                    </div>
                                    <div class="w-100 float-left bottom-info-hotels">
                                          <div class="col-12 col-md-6 col-lg-6 float-left address-hotel p-0">
                                                <i class="fas fa-map-marker-alt float-left mr-2"></i>
                                                <span class="float-left address-wrap-hotel">5A/2, AV Avenue, CC Bose Street,
                                                      Kolkata 700 005, WB, India</span>
                                          </div>
                                          <div class="col-12 col-md-6 col-lg-6 float-left facilities-hotel">
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Swmming Pool">
                                                      <i class="fas fa-swimmer"></i>
                                                </div>
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Restaurants">
                                                      <i class="fas fa-utensils"></i>
                                                </div>
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Gym">
                                                      <i class="fas fa-dumbbell"></i>
                                                </div>
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Bar">
                                                      <i class="fas fa-glass-cheers"></i>
                                                </div>
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Car Parking">
                                                      <i class="fas fa-shuttle-van"></i>
                                                </div>
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Wi-Fi">
                                                      <i class="fas fa-wifi"></i>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                              <div class="hotel-price-wrap float-right position-relative">
                                    <h1 class="w-100 float-left"><i class="fas fa-rupee-sign"></i> 3000</h1>
                                    <span class="w-100 float-left">Per Night</span>
                                    <a href="#" class="btn btn-booknow">BooK Now</a>
                              </div>
                        </div>

                        <div class="w-100 float-left hotel-list-wrap">
                              <div class="img-hotels float-left">
                                    <img src="<?php echo base_url('assets/images/hotels.png');?>" alt="hotel-img">
                              </div>
                              <div class="hotel-name float-left">
                                    <h2 class="w-100 float-left">Hotel Taj Kolkata</h2>
                                    <div class="star-ratings float-left w-100">
                                          <div class="float-left starts-all">
                                                <i class="fas fa-star fill-star"></i>
                                                <i class="fas fa-star fill-star"></i>
                                                <i class="fas fa-star fill-star"></i>
                                                <i class="fas fa-star fill-star"></i>
                                                <i class="fas fa-star"></i>
                                          </div>
                                          <span class="float-left">4 star</span>
                                          <h3 class="room-type-hotel float-left">Dulux Room</h3>
                                    </div>
                                    <div class="w-100 float-left bottom-info-hotels">
                                          <div class="col-12 col-md-6 col-lg-6 float-left address-hotel p-0">
                                                <i class="fas fa-map-marker-alt float-left mr-2"></i>
                                                <span class="float-left address-wrap-hotel">5A/2, AV Avenue, CC Bose Street,
                                                      Kolkata 700 005, WB, India</span>
                                          </div>
                                          <div class="col-12 col-md-6 col-lg-6 float-left facilities-hotel">
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Swmming Pool">
                                                      <i class="fas fa-swimmer"></i>
                                                </div>
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Restaurants">
                                                      <i class="fas fa-utensils"></i>
                                                </div>
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Gym">
                                                      <i class="fas fa-dumbbell"></i>
                                                </div>
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Bar">
                                                      <i class="fas fa-glass-cheers"></i>
                                                </div>
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Car Parking">
                                                      <i class="fas fa-shuttle-van"></i>
                                                </div>
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Wi-Fi">
                                                      <i class="fas fa-wifi"></i>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                              <div class="hotel-price-wrap float-right position-relative">
                                    <h1 class="w-100 float-left"><i class="fas fa-rupee-sign"></i> 3000</h1>
                                    <span class="w-100 float-left">Per Night</span>
                                    <a href="#" class="btn btn-booknow">BooK Now</a>
                              </div>
                        </div>

                        

                  </div>

            </div>
            <?php }else{ echo 'OOPS!! Something went wrong. Try again after sometime';}?>
      </div>
</section>
<?php include_once('footer.php');?>


			