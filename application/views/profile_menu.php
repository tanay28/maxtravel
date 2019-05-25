<div class="dropdown">
	<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	<i class="fas fa-user"></i>
	</button>
	<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
		<?php
			if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='AGENT'){
		?>
		<a class="dropdown-item" href="<?php echo base_url('myaccountag');?>">My Account</a>
		<?php
			}
		?>
		<?php
			if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='SUPERADMIN'){
		?>
		<a class="dropdown-item" href="<?php echo base_url('myaccountsu');?>">My Account</a>
		<?php
			}
		?>
		<?php
			if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='ADMIN'){
		?>
		<a class="dropdown-item" href="<?php echo base_url('myaccountad');?>">My Account</a>
		<?php
			}
		?>
		<?php
			if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='EMPLOYEE'){
		?>
		<a class="dropdown-item" href="<?php echo base_url('myaccountem');?>">My Account</a>
		<?php
			}
		?>
		<a class="dropdown-item" href="<?php echo base_url('changepass');?>">Change Password</a>
		<a class="dropdown-item" href="<?php echo base_url('login/logout');?>">Logout</a>
	</div>
</div>