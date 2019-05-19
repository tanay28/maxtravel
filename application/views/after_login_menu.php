<div class="col-md-12">
	<ul>
		<?php
			if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='AGENT'){
		?>
			<li class="active"><a href="<?php echo base_url('dashboardag');?>">Dashboard</a></li>
		<?php
			}
		?>
		<?php
			if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='SUPERADMIN'){
		?>
			<li class="active"><a href="<?php echo base_url('dashboardsa');?>">Dashboard</a></li>
			<li><a href="<?php echo base_url('hotel/add');?>">Add Hotel</a></li>
			<li><a href="<?php echo base_url('hotel/lists');?>">Hotel List</a></li>
		<?php
			}
		?>
		<?php
			if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='ADMIN'){
		?>
			<li class="active"><a href="<?php echo base_url('dashboardad');?>">Dashboard</a></li>
		<?php
			}
		?>
		<?php
			if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='EMPLOYEE'){
		?>
			<li class="active"><a href="<?php echo base_url('dashboardem');?>">Dashboard</a></li>
		<?php
			}
		?>
	</ul>
</div>