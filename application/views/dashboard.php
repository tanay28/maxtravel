<!DOCTYPE html>
<html>
	<head>
		<title>Dashboard</title>
	</head>
	<body>
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
	    </div>
		<p>Hello Dashboard..!!!</p>
		<p><a href="<?php echo base_url('dashboard/changepassword');?>">Change Password</a></p>
		<p><a href="<?php echo base_url('login/logout');?>">Logout</a></p>
	</body>
</html>