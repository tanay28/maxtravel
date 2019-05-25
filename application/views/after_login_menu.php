<div class="col-md-12">
	<ul>

		<li class='sub-menu'><a href="#">Submenu<div class='fa fa-caret-down right float-right right-caret'></div></a>
			<ul>
				<li><a href='#settings'>Account</a></li>
				<li><a href='#settings'>Profile</a></li>
				<li><a href='#settings'>Secruity &amp; Privacy</a></li>
				<li><a href='#settings'>Password</a></li>
				<li><a href='#settings'>Notification</a></li>
			</ul>
		</li>
		<?php
			if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='SUPERADMIN'){
		?>
		<li class='sub-menu'><a href="#">Agents<div class='fa fa-caret-down right float-right right-caret'></div></a>
			<ul>
				<li><a href='<?php echo base_url('agents/add')?>'>Add</a></li>
				<li><a href='<?php echo base_url('agents/lists')?>'>View List</a></li>
			</ul>
		</li>

		<?php
			}
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