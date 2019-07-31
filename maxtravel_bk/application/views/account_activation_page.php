<?php include_once('header.php');?>

<div class="jumbotron text-xs-center">
  <div>
	<?php if ($this->session->userdata('success')) { ?>
      <h1 class="display-3">Thank You!</h1>
      <p class="alert alert-success">Your account has been successfully activated.</p>
	  <p class="lead"><strong>Please check your email</strong> for activation link to complete your account setup.</p>
	  <hr>
	  <p>
	    Having trouble? <a href="">Contact us</a>
	  </p>
	  <p class="lead">
	    <a class="btn btn-primary btn-sm" href="<?php echo base_url('login/login_after_activation');?>" role="button">Continue to Login</a>
  	  </p>
    <?php }?>
    <?php if ($this->session->userdata('error')) { ?>
       <h1 class="display-3">Error!!</h1>
       <p class="alert alert-danger alertbox-home">Your account has already been activated.</p>
	  <hr>
	  <p>
	    Having trouble? <a href="">Contact us</a>
	  </p>
	  <p class="lead">
	    <a class="btn btn-primary btn-sm" href="<?php echo base_url('login/login_after_activation');?>" role="button">Continue to Login</a>
  	  </p>
    <?php }?>
</div>
  
</div>
<?php include_once('footer.php');?>