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
                              <div class="col-lg-12 mb-3">
                                    <h3>Personal Details</h3>
                              </div>

                              <div class="col-lg-4 col-md-6 col-12 float-left wrap-sign-main">
                                    <label class="float-left text-uppercase">Name</label>
                                    <h4 class="w-100 float-left">Chandan Sing</h4>
                              </div>
                              <div class="col-lg-4 col-md-6 col-12 float-left wrap-sign-main">
                                    <label class="float-left text-uppercase">Email</label>
                                    <h4 class="w-100 float-left"><?php echo isset($profiledetails[0]['email']) ? $profiledetails[0]['email'] : '';?></h4>
                              </div>
                              <div class="col-lg-4 col-md-6 col-12 float-left wrap-sign-main">
                                    <label class="float-left  text-uppercase">Designation </label>
                                    <h4 class="w-100 float-left">SUPERADMIN</h4>
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


			