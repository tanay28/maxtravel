<?php include_once('header.php');?>
			
<section class="w-100 float-left wrap-signup pt-3 pb-5">
	<div class="container">
		<?php
			if(isset($page_access) && $page_access=='ACTIVE'){
		?>
		<div class="row">
			<div class="col-lg-12 float-left page-title-top mt-3">
				<h1>Add Feedback Content</h1>
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
			<form name="frmAdd" action="<?php echo base_url('content_management/feedback');?>" method="POST" enctype='multipart/form-data'>
				<div class="col-lg-12 float-left">
					<div class="w-100 float-left wrap-section-sign account-sett  mb-3 mt-3">
						<div class="w-100 float-left">
							<div class="col-lg-12 mb-4">
								<h3>Content Details</h3>
							</div>
							<div class="col-12 col-md-12 col-lg-6 float-left wr-form p-0">
								<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
									<label class="float-left">Content Name</label>
									<input type="text" name="txtfeedback_name" required="" class="input-class-common float-left">
								</div>
								<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
									<label class="float-left">Enter video Link</label>
                                    <textarea class="input-class-common float-left" name="txtlink" required=""></textarea>
								</div>
                                <div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
									<label class="float-left">Feedback given by</label>
									<input type="text" name="txtfeedback_given_by" required="" class="input-class-common float-left">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-12 float-left mt-4">
					<input type="submit" value="Add Content" class="register-button-form float-left mr-3">
					<a href="<?php echo base_url('content_management/view_feedbacks');?>" class="register-button-form float-left mr-3">View Content</a>
					<a href="#" class="cancel-button-form float-left">Cancel</a>
				</div>
			</form>
		</div>
		<?php }else{ echo 'OOPS!! Something went wrong. Try again after sometime';}?>
	</div>
</section>
<?php include_once('footer.php');?>


			