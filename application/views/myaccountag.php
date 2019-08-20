<?php include_once('header.php');?>
                  
<section class="w-100 float-left wrap-signup pt-3 pb-5">
      <div class="container">
            <?php
                  if(isset($page_access) && $page_access=='ACTIVE'){
            ?>    
            <div class="row">

                  <div class="col-lg-12 float-left page-title-top mt-3">
                        <h1>My Account</h1>
                  </div>


                  <div class="col-lg-12 float-left">
                        <div class="w-100 float-left wrap-section-sign account-sett my-account-details mb-3 mt-3">

                              <div class="w-100 float-left mt-3">
                                    <div class="col-lg-12 m1-3  float-left">
                                          <h3>My Wallet</h3>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-12 float-left wrap-sign-main">
                                          <label class="float-left  text-uppercase">Available Point</label>
                                          <h4 class="w-100 float-left">500</h4>
                                    </div>

                              </div>

                              <div class="col-lg-12 mb-3">
                                    <h3>Personal Details</h3>
                              </div>

                              <div class="col-lg-4 col-md-6 col-12 float-left wrap-sign-main">
                                    <label class="float-left text-uppercase">Agency Name</label>
                                    <h4 class="w-100 float-left"><?php echo isset($profiledetails[0]['agency_name']) ? $profiledetails[0]['agency_name'] : '';?></h4>
                              </div>
                              <div class="col-lg-4 col-md-6 col-12 float-left wrap-sign-main">
                                    <label class="float-left text-uppercase">Name</label>
                                    <h4 class="w-100 float-left"><?php echo (isset($profiledetails[0]['first_name']) && isset($profiledetails[0]['last_name'])) ? $profiledetails[0]['first_name'].' '.$profiledetails[0]['last_name'] : '';?></h4>
                              </div>
                              <div class="col-lg-4 col-md-6 col-12 float-left wrap-sign-main">
                                    <label class="float-left  text-uppercase">Designation </label>
                                    <h4 class="w-100 float-left"><?php echo isset($profiledetails[0]['designation']) ? $profiledetails[0]['designation'] : '';?></h4>
                              </div>

                              <div class="col-lg-4 col-md-6 col-12 float-left wrap-sign-main">
                                    <label class="float-left  text-uppercase">IATA Status </label>
                                    <h4 class="w-100 float-left"><?php echo isset($profiledetails[0]['iata_status']) ? $profiledetails[0]['iata_status'] : '';?></h4>
                              </div>

                              <div class="col-lg-4 col-md-6 col-12 float-left wrap-sign-main">
                                    <label class="float-left  text-uppercase">Nature of Business</label>
                                    <h4 class="w-100 float-left"><?php echo isset($profiledetails[0]['nature_of_business']) ? $profiledetails[0]['nature_of_business'] : '';?></h4>
                              </div>

                              <div class="col-lg-4 col-md-6 col-12 float-left wrap-sign-main">
                                    <label class="float-left  text-uppercase">Business Type </label>
                                    <h4 class="w-100 float-left"><?php echo isset($profiledetails[0]['business_type']) ? $profiledetails[0]['business_type'] : '';?></h4>
                              </div>

                              <div class="col-lg-4 col-md-6 col-12 float-left wrap-sign-main">
                                    <label class="float-left  text-uppercase">How did you hear about us</label>
                                    <h4 class="w-100 float-left"><?php echo isset($profiledetails[0]['know_from']) ? $profiledetails[0]['know_from'] : '';?></h4>
                              </div>

                              <div class="col-lg-4 col-md-6 col-12 float-left wrap-sign-main">
                                    <label class="float-left  text-uppercase">Preferred Currency</label>
                                    <h4 class="w-100 float-left"><?php echo isset($profiledetails[0]['preffered_currency']) ? $profiledetails[0]['preffered_currency'] : '';?></h4>
                              </div>

                              <div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main full-wrap-div">
                                    <label class="float-left  text-uppercase">Address </label>
                                    <h4 class="w-100 float-left"><?php echo isset($profiledetails[0]['address']) ? $profiledetails[0]['address'] : '';?></h4>
                              </div>

                              <div class="col-lg-4 col-md-6 col-12 float-left wrap-sign-main">
                                    <label class="float-left  text-uppercase">Pincode/Zipcode/Postcode </label>
                                    <h4 class="w-100 float-left"><?php echo isset($profiledetails[0]['pin']) ? $profiledetails[0]['pin'] : '';?></h4>
                              </div>

                              <div class="col-lg-4 col-md-6 col-12 float-left wrap-sign-main">
                                    <label class="float-left  text-uppercase">Telephone </label>
                                    <h4 class="w-100 float-left"><?php echo isset($profiledetails[0]['phone']) ? $profiledetails[0]['phone'] : '';?></h4>
                              </div>

                              <div class="col-lg-4 col-md-6 col-12 float-left wrap-sign-main">
                                    <label class="float-left  text-uppercase">Mobile Number</label>
                                    <h4 class="w-100 float-left"><?php echo isset($profiledetails[0]['mobile']) ? $profiledetails[0]['mobile'] : '';?></h4>
                              </div>

                              <div class="col-lg-4 col-md-6 col-12 float-left wrap-sign-main">
                                    <label class="float-left  text-uppercase">Fax</label>
                                    <h4 class="w-100 float-left"><?php echo isset($profiledetails[0]['fax']) ? $profiledetails[0]['fax'] : '';?></h4>
                              </div>
                              <?php
                                    $country = array();
                                    if(isset($profiledetails[0]['country'])){

                                          $sqlcountry = "SELECT * FROM country WHERE id = '".$profiledetails[0]['country']."'";
                                          $country = $this->db->query($sqlcountry)->result_array();      
                                    }
                                      

                              ?>
                              <div class="col-lg-4 col-md-6 col-12 float-left wrap-sign-main">
                                    <label class="float-left  text-uppercase">Country </label>
                                    <h4 class="w-100 float-left"><?php echo isset($country[0]['country_name']) ? $country[0]['country_name'] : '';?></h4>
                              </div>

                              <div class="col-lg-4 col-md-6 col-12 float-left wrap-sign-main">
                                    <label class="float-left  text-uppercase">City</label>
                                    <h4 class="w-100 float-left"><?php echo isset($profiledetails[0]['city']) ? $profiledetails[0]['city'] : '';?></h4>
                              </div>

                              <div class="col-lg-4 col-md-6 col-12 float-left wrap-sign-main">
                                    <label class="float-left  text-uppercase">GST </label>
                                    <h4 class="w-100 float-left"><?php echo isset($profiledetails[0]['gstin_no']) ? $profiledetails[0]['gstin_no'] : '';?></h4>
                              </div>

                              <div class="col-lg-4 col-md-6 col-12 float-left wrap-sign-main">
                                    <label class="float-left  text-uppercase">Time Zone</label>
                                    <h4 class="w-100 float-left"><?php echo isset($profiledetails[0]['time_zone']) ? $profiledetails[0]['time_zone'] : '';?></h4>
                              </div>

                              <div class="col-lg-4 col-md-6 col-12 float-left wrap-sign-main">
                                    <label class="float-left  text-uppercase">Website</label>
                                    <h4 class="w-100 float-left"><?php echo isset($profiledetails[0]['website']) ? $profiledetails[0]['website'] : '';?></h4>
                              </div>

                              <div class="w-100 float-left mt-3 mb-3">
                                    <div class="col-lg-12 m1-3  float-left">
                                          <h3>Account Details</h3>
                                    </div>
                                    <?php
                                          $usersdetails = array();
                                          if(isset($profiledetails[0]['user_id'])){

                                                $sqlusersdetails = "SELECT * FROM users WHERE id = '".$profiledetails[0]['user_id']."'";
                                                $usersdetails = $this->db->query($sqlusersdetails)->result_array();       
                                          }
                                           

                                    ?>
                                    <div class="col-lg-4 col-md-6 col-12 float-left wrap-sign-main">
                                          <label class="float-left  text-uppercase">Email</label>
                                          <h4 class="w-100 float-left"><?php echo isset($usersdetails[0]['email']) ? $usersdetails[0]['email'] : '';?></h4>
                                    </div>
                              </div>

                              <div class="w-100 float-left mt-3">
                                    <div class="col-lg-12 m1-3  float-left">
                                          <h3>Contact Details</h3>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-12 float-left wrap-sign-main">
                                          <label class="float-left  text-uppercase">Accounts Name</label>
                                          <h4 class="w-100 float-left"><?php echo isset($profiledetails[0]['account_name']) ? $profiledetails[0]['account_name'] : '';?></h4>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-12 float-left wrap-sign-main">
                                          <label class="float-left  text-uppercase">Accounts Email</label>
                                          <h4 class="w-100 float-left"><?php echo isset($profiledetails[0]['account_email']) ? $profiledetails[0]['account_email'] : '';?></h4>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-12 float-left wrap-sign-main">
                                          <label class="float-left  text-uppercase">Accounts Number</label>
                                          <h4 class="w-100 float-left"><?php echo isset($profiledetails[0]['account_no']) ? $profiledetails[0]['account_no'] : '';?></h4>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-12 float-left wrap-sign-main">
                                          <label class="float-left  text-uppercase">Reservation/Operation Name</label>
                                          <h4 class="w-100 float-left"><?php echo isset($profiledetails[0]['operation_name']) ? $profiledetails[0]['operation_name'] : '';?></h4>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-12 float-left wrap-sign-main">
                                          <label class="float-left  text-uppercase">Reservation/Operation Email</label>
                                          <h4 class="w-100 float-left"><?php echo isset($profiledetails[0]['operation_email']) ? $profiledetails[0]['operation_email'] : '';?></h4>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-12 float-left wrap-sign-main">
                                          <label class="float-left  text-uppercase">Reservation/Operation Number</label>
                                          <h4 class="w-100 float-left"><?php echo isset($profiledetails[0]['operation_no']) ? $profiledetails[0]['operation_no'] : '';?></h4>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-12 float-left wrap-sign-main">
                                          <label class="float-left  text-uppercase">Management Name</label>
                                          <h4 class="w-100 float-left"><?php echo isset($profiledetails[0]['management_name']) ? $profiledetails[0]['management_name'] : '';?></h4>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-12 float-left wrap-sign-main">
                                          <label class="float-left  text-uppercase">Management Email</label>
                                          <h4 class="w-100 float-left"><?php echo isset($profiledetails[0]['management_email']) ? $profiledetails[0]['management_email'] : '';?></h4>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-12 float-left wrap-sign-main">
                                          <label class="float-left  text-uppercase">Management Number</label>
                                          <h4 class="w-100 float-left"><?php echo isset($profiledetails[0]['management_no']) ? $profiledetails[0]['management_no'] : '';?></h4>
                                    </div>

                              </div>

                        </div>
                  </div>



                  <!-- <div class="col-lg-12 float-left mt-4">
                        <input type="submit" value="Edit Profile" class="register-button-form float-left mr-3 ">

                  </div> -->
            </div>
            <?php }else{ echo 'OOPS!! Something went wrong. Try again after sometime';}?>
      </div>
</section>
<?php include_once('footer.php');?>


                  