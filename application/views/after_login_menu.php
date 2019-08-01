
<?php 
	$is_home = true;
	$ex = explode('/',$_SERVER["REQUEST_URI"]);
	$name = isset($ex[2]) ? $ex[2] : '';
	//$name = isset($ex[1]) ? $ex[1] : '';
	// var_dump($ex);
	if($name!='home') $is_home = false;
	if($is_home){
?>
<header class="header-home w-100 float-left position-absolute">
	<div class="logo-home float-left">
		<a href="#"><img src="<?php echo base_url('assets/images/mh-white.png');?>" alt=""></a>
	</div>
	<div class="wrap-cart-all-nav float-right position-relative">
		<div class="dropdown drop-notifications">
			<button class="cart-main btn btn-secondary dropdown-toggle position-relative" type="button" id="btnNotification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="notifications();">
				<i class="fas fa-lightbulb"></i>
				<?php if(isset($nofication_count) && $nofication_count>0){?>
					<span id="show_ct"><?php echo $nofication_count;?></span>
					<input type="hidden" name="hid" id="ct_notification" value="<?php echo $nofication_count;?>">
					<input type="hidden" name="hid" id="user_id" value="<?php echo $user_id;?>">
				<?php }?>
			</button>
			<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				<?php
					if(isset($notifications) && count($notifications)>0)
					{
						foreach ($notifications as $ikey => $ivalue)
						{
				?>
				<span class="w-100 float-left"><a href="#"><?php echo isset($ivalue['title']) ? $ivalue['title'] : '';?></a></span>	
				<?php			
						}
					}else{
				?>
				<span class="w-100 float-left">No new Notifications</span>
				<?php
					}
				?>
				<!-- <span class="w-100 float-left"><a href="#"><font class="w-100 float-left">Title</font>tempor eget dictum sit amet, laoreet vitae leo. </a></span>
			
				<span class="w-100 float-left"><a href="#"><font class="w-100 float-left">Title</font>tempor eget dictum sit amet, laoreet vitae leo. </a></span>
				<span class="w-100 float-left"><a href="#"><font class="w-100 float-left">Title</font>tempor eget dictum sit amet, laoreet vitae leo. </a></span>
				<span class="w-100 float-left"><a href="#"><font class="w-100 float-left">Title</font>tempor eget dictum sit amet, laoreet vitae leo. </span> -->
			</div>
		</div>
		<a href="#" class="cart-main position-relative"><i class="fas fa-shopping-cart"></i>
		<span>2</span></a>
	</div>
	<div class="float-right nav-menu-right" id="cssmenu">
		<div id="head-mobile"></div>
		<div class="button"></div>
		<ul>
			<li class='active'><a href='<?php echo base_url('home');?>'>HOME</a></li>
			<?php if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='AGENT'){?>
				
				<li><a href="<?php echo base_url('dashboardag');?>">Dashboard</a></li>
				<li><a href="<?php echo base_url('hotel/book');?>">Hotels</a></li>
				<li><a href="<?php echo base_url('query');?>">Add query</a></li>
				<li><a href='#'>EXCURSIONS</a>
					<ul>
						<li><a href='#'>Product</a></li>
						<li><a href='#'>Sightseeing</a></li>
						<li><a href='#'>Adventure</a></li>
						<li><a href='#'>Cruise</a></li>
						<li><a href='#'>Beach Breaks</a></li>
						<li><a href='#'>Show and Entertain</a></li>
						<li><a href='#'>Spa</a></li>
						<li><a href='#'>Snorkeling</a></li>
					</ul>
				</li>
				<li><a href='#'>PACKAGE TOURS</a></li>
				<li><a href='#'>MARRAGE EVENTS</a></li>
				<li><a href='#'>M.I.C.S.</a></li>
				<li><a href='#'>SETTINGS</a>
					<ul>
						<li><a href="<?php echo base_url('myaccountag');?>">My Account</a></li>
						<li><a href="<?php echo base_url('myaccountag');?>">Request For Point</a></li>
						<li><a href="<?php echo base_url('changepass');?>">Change Password</a></li>
						<li><a href="<?php echo base_url('login/logout');?>">Logout</a></li>	
					</ul>
				</li>
			<?php } ?>
			
			<?php if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='SUPERADMIN'){?>
				
				<li><a href="<?php echo base_url('dashboardsa');?>">Dashboard</a></li>
				<li><a href='#'>HOTELS</a>
					<ul>
						<li><a href="<?php echo base_url('hotel/add');?>">Add</a></li>
						<li><a href="<?php echo base_url('hotel/lists');?>">List</a></li>
						<li><a href="<?php echo base_url('hotel/book');?>">Book Hotels</a></li>
					</ul>
				</li>
				<li><a href='#'>AGENTS</a>
					<ul>
						<li><a href='<?php echo base_url('agents/add')?>'>Add</a></li>
						<li><a href='<?php echo base_url('agents/lists')?>'>List</a></li>
					</ul>
				</li>
				<li><a href='#'>EMPLOYEES</a>
					<ul>
						<li><a href='<?php echo base_url('employee/add')?>'>Add</a></li>
						<li><a href='<?php echo base_url('employee/lists')?>'>List</a></li>
					</ul>
				</li>
				<li><a href='#'>USERS</a>
					<ul>
						<li><a href='<?php echo base_url('users/add')?>'>Add</a></li>
						<li><a href='<?php echo base_url('users/lists')?>'>List</a></li>
					</ul>
				</li>
				<li><a href="<?php echo base_url('Contactinfo');?>">VIEW CONTACT DETAILS</a></li>
				<li><a href="<?php echo base_url('notification');?>">VIEW QUERY DETAILS</a></li>
				<li><a href='#'>SETTINGS</a>
					<ul>
						<li><a href="<?php echo base_url('myaccountsu');?>">My Account</a></li>
						<li><a href="<?php echo base_url('myaccountag');?>">Request For Point</a></li>
						<li><a href="<?php echo base_url('changepass');?>">Change Password</a></li>
						<li><a href="<?php echo base_url('login/logout');?>">Logout</a></li>
					</ul>
				</li>
			<?php } ?>

			<?php if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='ADMIN'){?>
				<li><a href="<?php echo base_url('dashboardad');?>">DASHBOARD</a></li>
				<li><a href='#'>SETTINGS</a>
					<ul>
						<li><a href="<?php echo base_url('myaccountad');?>">My Account</a></li>
						<li><a href="<?php echo base_url('changepass');?>">Change Password</a></li>
						<li><a href="<?php echo base_url('login/logout');?>">Logout</a></li>
					</ul>
				</li>
			<?php } ?>

			<?php if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='EMPLOYEE'){?>
				<li><a href="<?php echo base_url('dashboardem');?>">DASHBOARD</a></li>
				<li><a href='#'>SETTINGS</a>
					<ul>
						<li><a href="<?php echo base_url('myaccountem');?>">My Account</a></li>
						<li><a href="<?php echo base_url('changepass');?>">Change Password</a></li>
						<li><a href="<?php echo base_url('login/logout');?>">Logout</a></li>
					</ul>
				</li>
			<?php } ?>
		</ul>
	</div>
</header>
<?php
	}
	else{
?>
<header class="header-home w-100 float-left position-relative">
	<div class="logo-home float-left">
		<a href="#"><img src="<?php echo base_url('assets/images/mh-white.png');?>" alt=""></a>
	</div>
	<div class="wrap-cart-all-nav float-right position-relative">
		<div class="dropdown drop-notifications">
			<button class="cart-main btn btn-secondary dropdown-toggle position-relative" type="button" id="btnNotification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="notifications();">
				<i class="fas fa-lightbulb"></i>
				<?php if(isset($nofication_count) && $nofication_count>0){?>
					<span id="show_ct"><?php echo $nofication_count;?></span>
					<input type="hidden" name="hid" id="ct_notification" value="<?php echo $nofication_count;?>">
					<input type="hidden" name="hid" id="user_id" value="<?php echo $user_id;?>">
				<?php }?>
			</button>
			<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				<?php
					if(isset($notifications) && count($notifications)>0)
					{
						foreach ($notifications as $ikey => $ivalue)
						{
				?>
				<span class="w-100 float-left"><a href="#"><?php echo isset($ivalue['title']) ? $ivalue['title'] : '';?></a></span>	
				<?php			
						}
					}else{
				?>
				<span class="w-100 float-left">No new Notifications</span>
				<?php
					}
				?>
				<!-- <span class="w-100 float-left"><a href="#"><font class="w-100 float-left">Title</font>tempor eget dictum sit amet, laoreet vitae leo. </a></span>
			
				<span class="w-100 float-left"><a href="#"><font class="w-100 float-left">Title</font>tempor eget dictum sit amet, laoreet vitae leo. </a></span>
				<span class="w-100 float-left"><a href="#"><font class="w-100 float-left">Title</font>tempor eget dictum sit amet, laoreet vitae leo. </a></span>
				<span class="w-100 float-left"><a href="#"><font class="w-100 float-left">Title</font>tempor eget dictum sit amet, laoreet vitae leo. </span> -->
			</div>
		</div>
		<a href="#" class="cart-main position-relative"><i class="fas fa-shopping-cart"></i>
		<span>2</span></a>
	</div>
	<div class="float-right nav-menu-right" id="cssmenu">
		<div id="head-mobile"></div>
		<div class="button"></div>
		<ul>
			<li class='active'><a href='<?php echo base_url('home');?>'>HOME</a></li>
			<?php if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='AGENT'){?>

				<li><a href="<?php echo base_url('dashboardag');?>">Dashboard</a></li>
				<li><a href="<?php echo base_url('hotel/book');?>">Hotels</a></li>
				<li><a href="<?php echo base_url('query');?>">Add query</a></li>
				<li><a href='#'>EXCURSIONS</a>
					<ul>
						<li><a href='#'>Product</a></li>
						<li><a href='#'>Sightseeing</a></li>
						<li><a href='#'>Adventure</a></li>
						<li><a href='#'>Cruise</a></li>
						<li><a href='#'>Beach Breaks</a></li>
						<li><a href='#'>Show and Entertain</a></li>
						<li><a href='#'>Spa</a></li>
						<li><a href='#'>Snorkeling</a></li>
					</ul>
				</li>
				<li><a href='#'>PACKAGE TOURS</a></li>
				<li><a href='#'>MARRAGE EVENTS</a></li>
				<li><a href='#'>M.I.C.S.</a></li>
				<li><a href='#'>Settings</a>
					<ul>
						<li><a href="<?php echo base_url('myaccountag');?>">My Account</a></li>
						<li><a href="<?php echo base_url('myaccountag');?>">Request For Point</a></li>
						<li><a href="<?php echo base_url('changepass');?>">Change Password</a></li>
						<li><a href="<?php echo base_url('login/logout');?>">Logout</a></li>	
					</ul>
				</li>
			<?php } ?>
			
			<?php if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='SUPERADMIN'){?>
				<li><a href="<?php echo base_url('dashboardsa');?>">Dashboard</a></li>
				<li><a href='#'>HOTELS</a>
					<ul>
						<li><a href="<?php echo base_url('hotel/add');?>">Add</a></li>
						<li><a href="<?php echo base_url('hotel/lists');?>">List</a></li>
						<li><a href="<?php echo base_url('hotel/book');?>">Book Hotels</a></li>
					</ul>
				</li>
				<li><a href='#'>AGENTS</a>
					<ul>
						<li><a href='<?php echo base_url('agents/add')?>'>Add</a></li>
						<li><a href='<?php echo base_url('agents/lists')?>'>List</a></li>
					</ul>
				</li>
				<li><a href='#'>EMPLOYEES</a>
					<ul>
						<li><a href='<?php echo base_url('employee/add')?>'>Add</a></li>
						<li><a href='<?php echo base_url('employee/lists')?>'>List</a></li>
					</ul>
				</li>
				<li><a href='#'>USERS</a>
					<ul>
						<li><a href='<?php echo base_url('users/add')?>'>Add</a></li>
						<li><a href='<?php echo base_url('users/lists')?>'>List</a></li>
					</ul>
				</li>
				<li><a href="<?php echo base_url('Contactinfo');?>">VIEW CONTACT DETAILS</a></li>
				<li><a href="<?php echo base_url('notification');?>">VIEW QUERY DETAILS</a></li>
				<li><a href='#'>SETTINGS</a>
					<ul>
						<li><a href="<?php echo base_url('myaccountsu');?>">My Account</a></li>
						<li><a href="<?php echo base_url('myaccountag');?>">Request For Point</a></li>
						<li><a href="<?php echo base_url('changepass');?>">Change Password</a></li>
						<li><a href="<?php echo base_url('login/logout');?>">Logout</a></li>
					</ul>
				</li>
			<?php } ?>

			<?php if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='ADMIN'){?>
				<li><a href="<?php echo base_url('dashboardad');?>">DASHBOARD</a></li>
				<li><a href='#'>SETTINGS</a>
					<ul>
						<li><a href="<?php echo base_url('myaccountad');?>">My Account</a></li>
						<li><a href="<?php echo base_url('changepass');?>">Change Password</a></li>
						<li><a href="<?php echo base_url('login/logout');?>">Logout</a></li>
					</ul>
				</li>
			<?php } ?>

			<?php if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='EMPLOYEE'){?>
				<li><a href="<?php echo base_url('dashboardem');?>">DASHBOARD</a></li>
				<li><a href='#'>SETTINGS</a>
					<ul>
						<li><a href="<?php echo base_url('myaccountem');?>">My Account</a></li>
						<li><a href="<?php echo base_url('changepass');?>">Change Password</a></li>
						<li><a href="<?php echo base_url('login/logout');?>">Logout</a></li>
					</ul>
				</li>
			<?php } ?>
		</ul>
	</div>
</header>
<?php		
	}
	
?>

