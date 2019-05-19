<?php include_once('header.php');?>
<section class="w-100 float-left wrap-signup pt-3 pb-5">
	<div class="container">
		<div>
			<?php if ($this->session->userdata('success')) { ?>
          	<div class="alert alert-success">
              <?php echo $this->session->userdata('success');?>
          	</div>
            <?php }?>
            <?php if ($this->session->userdata('error')) { ?>
              <div class="alert alert-danger">
                  <?php echo $this->session->userdata('error');?>
              </div>
            <?php }?>
             <div class="alert alert-danger" id="ajaxmsg" style="display: none">
             </div>
		</div>
		<div class="row">
			<div class="col-lg-12 float-left page-title-top mt-3">
				<h1>Chagne Password</h1>
			</div>
			<form name="frmChange" method="post" action="<?php echo base_url('dashboard/changepassword');?>" class="col-lg-6 col-md-12 col-12 float-left">
				<div class="w-100 float-left wrap-section-sign account-sett mb-3 mt-3">
					
					<div class="col-lg-12 float-left wrap-sign-main">
						<label class="float-left  w-100">New Password<font class="mandetory-star">*</font>
						</label>
						<input type="password" class="input-class-common  w-100 float-left" name="txtNew" id="txtNew" required="">
					</div>
					<div class="col-lg-12 float-left wrap-sign-main">
						<label class="float-left  w-100">Confirm Password<font class="mandetory-star">*</font>
						</label>
						<input type="password" class="input-class-common  w-100 float-left" name="txtConfirm" id="txtConfirm" required="">
					</div>
				</div>
				<div class="w-100 float-left mt-4">
				<input type="submit" value="Change Now" class="register-button-form float-left mr-3" id="btnChange">
				<a href="<?php echo base_url('dashboard');?>" class="cancel-button-form float-left">Cancel</a>
				</div>
			</form>
		</div>
	</div>
</section>
<?php include_once('footer.php');?>
<script>
		
$(document).ready(function(){
	  $('#btnChange').on('click',function(){
  	if($('#txtNew').val() != $('#txtConfirm').val())
    {
    	$('#ajaxmsg').show('slow');
    	var msg = 'Mismatch Password..!!';
    	$('#ajaxmsg').html(msg);
        return false;
    }
});
});
</script>