<?php include_once('header.php');?>
			
<section class="w-100 float-left wrap-signup pt-3 pb-5">
	<div class="container">
		<?php
			if(isset($page_access) && $page_access=='ACTIVE'){
		?>
		<div class="row">
			<div class="col-lg-12 float-left page-title-top mt-3">
				<h1>Add Destination Content</h1>
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
			<form name="frmAdd" action="<?php echo base_url('content_management/destinations');?>" method="POST" enctype='multipart/form-data'>
				<div class="col-lg-12 float-left">
					<div class="w-100 float-left wrap-section-sign account-sett  mb-3 mt-3">
						<div class="w-100 float-left">
							<div class="col-lg-12 mb-4">
								<h3>Content Details</h3>
							</div>
							<div class="col-12 col-md-12 col-lg-6 float-left wr-form p-0">
								<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
									<label class="float-left">Destination name</label>
									<textarea name="txtdestination_name" required="" class="input-class-common float-left"></textarea>
								</div>

								<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
									<label class="float-left">Cost</label>
									<input type="text" name="txtcost" required="" class="input-class-common float-left">
								</div>

								<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
									<label class="float-left">Destination code</label>
									<input type="text" name="txtdestinationcode" required="" class="input-class-common float-left">
								</div>

								<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
									<label class="float-left">Package Type</label>
									<input type="text" name="txtpackagetype" required="" class="input-class-common float-left">
								</div>

								<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
									<label class="float-left">Duration</label>
									<input type="text" name="txtduration" required="" class="input-class-common float-left">
								</div>

								<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
									<label class="float-left">Date of Tour</label>
									<input id="datepicker" name="txttourdate" required="" class="input-class-common float-left">
								</div>

								<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
									<?php 
										echo $this->ckeditor->editor("txtCk",$html);
									?>
								</div>

								
								<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
									<label class="float-left">Image</label>
									<input type="file" class=" float-left file-input" name="filePic" required>
								</div>

								<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
									<label class="float-left">Insert Map</label>
									<input type="text" name="txtMap" required="" class="input-class-common float-left">
								</div>

								<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
									<label class="float-left">Image Gallery</label>
									<input type="file" class=" float-left file-input" name="filePicGall[]" required multiple>
								</div>
							</div>
						</div>
					</div>
				</div>	

				<div class="col-lg-12 float-left mt-4">
					<input type="submit" value="Add Content" class="register-button-form float-left mr-3">
					<a href="<?php echo base_url('content_management/view_destinations');?>" class="register-button-form float-left mr-3">View Content</a>
					<a href="#" class="cancel-button-form float-left">Cancel</a>
				</div>
			</form>
		</div>
		<?php }else{ echo 'OOPS!! Something went wrong. Try again after sometime';}?>
	</div>
</section>
<?php include_once('footer.php');?>


			