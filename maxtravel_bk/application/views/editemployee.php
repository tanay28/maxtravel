<?php include_once('header.php');?>
			
<section class="w-100 float-left wrap-signup pt-3 pb-5">
	<div class="container">
		<?php
			if(isset($page_access) && $page_access=='ACTIVE'){
		?>
		<div class="row">
			<div class="col-lg-12 float-left page-title-top mt-3">
				<h1>Edit Employee</h1>
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
			<form name="frmEditemployee" action="" method="POST" enctype='multipart/form-data'>
				<div class="col-lg-12 float-left">
					<div class="w-100 float-left wrap-section-sign account-sett  mb-3 mt-3">
						<div class="w-100 float-left">
							<div class="col-lg-12 mb-4">
								<h3>Employee Details</h3>
							</div>
							<div class="col-12 col-md-12 col-lg-6 float-left wr-form p-0">
								<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
									<label class="float-left">Name 
									</label>
									<input type="text" name="name" required="" class="input-class-common float-left" value="<?php echo isset($employeeDetails[0]['name']) ? $employeeDetails[0]['name'] : ''?>">
								</div>
								<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
									<label class="float-left">Email 
									</label>
									<input type="text" name="email" required="" class="input-class-common float-left" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}" value="<?php echo isset($employeeDetails[0]['email']) ? $employeeDetails[0]['email'] : ''?>" readonly="">
								</div>
								<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
									<label class="float-left">Password 
									</label>
									<input type="password" name="password" class="input-class-common float-left">
									If you want reset the password then enter the new password.
								</div>
								<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
									<label class="float-left">Phone No. 
									</label>
									<input type="text" name="phoneno" required="" class="input-class-common float-left" pattern="[1-9]{1}[0-9]{9}" title="Enter 10 digit mobile number" value="<?php echo isset($employeeDetails[0]['phoneno']) ? $employeeDetails[0]['phoneno'] : ''?>">
								</div>
								<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
									<label class="float-left">Address 
									</label>
									<textarea name="address" class="input-class-common float-left text-area"><?php echo isset($employeeDetails[0]['address']) ? $employeeDetails[0]['address'] : ''?></textarea>
								</div>
								<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
									<label class="float-left">Designation 
									</label>
									<select class="input-class-common float-left" name="designation" required="">	
									<option value="">Select</option>
									<option value="ACCOUNTANT" <?php echo (isset($employeeDetails[0]['designation']) && $employeeDetails[0]['designation']=='ACCOUNTANT') ? 'selected' : '';?>>ACCOUNTANT</option>
									<option value="SUPERVISOR" <?php echo (isset($employeeDetails[0]['designation']) && $employeeDetails[0]['designation']=='SUPERVISOR') ? 'selected' : '';?>>SUPERVISOR</option>
								</select>
								</div>
							</div>
						</div>
					</div>
				</div>	

				<div class="col-lg-12 float-left mt-4">
					<input type="submit" value="Update Employee" class="register-button-form float-left mr-3 ">
					<a href="<?php echo base_url('employee/lists');?>" class="cancel-button-form float-left">Cancel</a>
				</div>
			</form>
		</div>
		<?php }else{ echo 'OOPS!! Something went wrong. Try again after sometime';}?>
	</div>
</section>
<?php include_once('footer.php');?>


			