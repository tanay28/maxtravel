<?php include_once('header.php');?>

<div class="jumbotron text-xs-center">
  <div>
  	  <?php
  	    $first_name = '';
  	  	if($this->session->has_userdata('first_name')) $first_name = $this->session->userdata('first_name'); 
  	    //if(isset($name)) $first_name = $name;
  	  ?>
    <h3 class="display-3">Greeting..! Mr/Ms. <?php  echo $first_name;?></h3>
	  <p class="lead">We have sent you an Email with a password reset link.<strong>Please check your email</strong> for password reset. The link will be expired in 2 hrs. Hurry Up!!!</p>
	  <hr>
	  <p>
	    Having trouble? <a href="">Contact us</a>
	  </p>
	  <p class="lead">
	    <a class="btn btn-primary btn-sm" href="<?php echo base_url('login/login_after_activation');?>" role="button">Continue to Login</a>
  	  </p>
</div>
  
</div>
<?php include_once('footer.php');?>