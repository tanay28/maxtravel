<?php include_once('header.php');?>
			
<section class="w-100 float-left wrap-signup pt-3 pb-5">
	<div class="container">
		<?php
			if(isset($page_access) && $page_access=='ACTIVE'){
		?>
		<div class="row">
			<div class="col-lg-12 float-left">
				<?php if ($this->session->flashdata('success')) { ?>
				<div class="alert alert-success w-100 float-left">
				    <?php echo $this->session->flashdata('success');?>
				</div>
				<?php }?>
				<?php if ($this->session->flashdata('error')) { ?>
				<div class="alert alert-danger">
				    <?php echo $this->session->flashdata('error');?>
				</div>
				<?php }?>	
			</div>
			<form name="frmQuery" action="<?php echo base_url('query/add_query');?>" method="POST" enctype="multipart/form-data">
				<div class="col-lg-12 float-left">
					<div class="w-100 float-left wrap-section-sign account-sett  mb-3 mt-3">
						<div class="w-100 float-left">
							<div class="col-lg-12 mb-4">
								<h3>Enter query details</h3>
							</div>
							<div class="col-12 col-md-12 col-lg-6 float-left wr-form p-0">
								<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
									<label class="float-left">Designation 
									</label>
									<select class="input-class-common float-left" name="cmbSuperadmin" required="">
										<option value="none">Select</option>
										<?php 
											if(isset($superadmins) && count($superadmins)>0)
											{
												foreach ($superadmins as $ikey => $ivalue)
												{
										?>
										<option value="<?php echo isset($ivalue['id']) ? $ivalue['id'] : '';?>"><?php echo isset($ivalue['email']) ? $ivalue['email'] : '';?></option>
										<?php
												}
											}
										?>
									</select>
								</div>
								<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
									<label class="float-left">Query details 
									</label>
									<textarea name="txtQuery" class="input-class-common float-left text-area"></textarea>
								</div>
							</div>
						</div>
					</div>
				</div>	

				<div class="col-lg-12 float-left mt-4">
					<input type="submit" value="Submit Query" class="register-button-form float-left mr-3 ">
					<a href="<?php echo base_url('Home');?>" class="cancel-button-form float-left">Cancel</a>
				</div>
			</form>
		</div>
		<?php }else{ echo 'OOPS!! Something went wrong. Try again after sometime';}?>
	</div>
</section>
<?php include_once('footer.php');?>


			