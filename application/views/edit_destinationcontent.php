<?php include_once('header.php');?>
			
<section class="w-100 float-left wrap-signup pt-3 pb-5">
	<div class="container">
		<?php
			if(isset($page_access) && $page_access=='ACTIVE'){
		?>
		<div class="row">
			<div class="col-lg-12 float-left page-title-top mt-3">
				<h1>Edit Destination Content</h1>
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
			<form name="frmContent" action="" method="POST" enctype='multipart/form-data'>
				<div class="col-lg-12 float-left">
					<div class="w-100 float-left wrap-section-sign account-sett  mb-3 mt-3">
						<div class="w-100 float-left">
							<div class="col-lg-12 mb-4">
								<h3>Content Details</h3>
							</div>
							<div class="col-12 col-md-12 col-lg-6 float-left wr-form p-0">
								<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
									<label class="float-left">Destination Name</label>
									<input type="text" name="txtdestination_name" required="" class="input-class-common float-left" value="<?php echo isset($sliderDetails[0]['slider_name']) ? $sliderDetails[0]['slider_name'] : ''?>">
								</div>

								<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
									<label class="float-left">Tag Name</label>
									<input type="text" name="txttag_name" required="" class="input-class-common float-left" value="<?php echo isset($sliderDetails[0]['tag_name']) ? $sliderDetails[0]['tag_name'] : ''?>">
								</div>

								<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
									<label class="float-left">Cost</label>
									<input type="text" name="txtcost" required="" class="input-class-common float-left" value="<?php echo isset($sliderDetails[0]['details']['cost']) ? $sliderDetails[0]['details']['cost'] : ''?>">
								</div>

								<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
									<label class="float-left">Tour Code</label>
									<input type="text" name="txtdestinationcode" required="" class="input-class-common float-left" value="<?php echo isset($sliderDetails[0]['details']['code']) ? $sliderDetails[0]['details']['code'] : ''?>">
								</div>

								<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
									<label class="float-left">Package Type</label>
									<input type="text" name="txtpackagetype" required="" class="input-class-common float-left" value="<?php echo isset($sliderDetails[0]['details']['type']) ? $sliderDetails[0]['details']['type'] : ''?>">
								</div>

								<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
									<label class="float-left">Duration</label>
									<input type="text" name="txtduration" required="" class="input-class-common float-left" value="<?php echo isset($sliderDetails[0]['details']['duration']) ? $sliderDetails[0]['details']['duration'] : ''?>">
								</div>

								<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
									<label class="float-left">Tour Date</label>
									<input type="text" name="txttourdate" required="" class="input-class-common float-left" value="<?php echo isset($sliderDetails[0]['details']['date']) ? $sliderDetails[0]['details']['date'] : ''?>">
								</div>

								<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
									<label class="float-left">Slider Image</label>
									<img src="<?php echo base_url('assets/content/'.$sliderDetails[0]['image_name'])?>" style="width:200px;max-width:220px">
								</div>
								<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main">
									<label class="float-left">Change image</label>
									<input type="radio" name="rdo" id="rdoYes" value="yes">Yes
									<input type="radio" name="rdo" id="rdoNo" checked value="no">No
								</div>
								<div class="col-lg-12 col-md-12 col-12 float-left wrap-sign-main" id="imgDiv" style="display: none;">
									<label class="float-left">Select</label>
									<input type="file" class=" float-left file-input" name="filePic">
								</div>
							</div>
						</div>
					</div>
				</div>	

				<div class="col-lg-12 float-left mt-4">
					<input type="submit" value="Update Content" class="register-button-form float-left mr-3 ">
					<a href="<?php echo base_url('content_management/view_destinations');?>" class="cancel-button-form float-left">Cancel</a>
				</div>
			</form>
		</div>
		<?php }else{ echo 'OOPS!! Something went wrong. Try again after sometime';}?>
	</div>
</section>
<?php include_once('footer.php');?>

<script type="text/javascript">
	$(document).ready(function(){
		$('#rdoYes').click(function(){
			$('#imgDiv').show('slow');
		});

		$('#rdoNo').click(function(){
			$('#imgDiv').hide('slow');
		});
	});
</script>


			