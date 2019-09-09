<?php
	$is_home = true;
	$ex = explode('/',$_SERVER["REQUEST_URI"]);
	//var_dump($ex);
	$name = isset($ex[2]) ? $ex[2] : ''; // For Local
	//$name = isset($ex[1]) ? $ex[1] : ''; // For Server
	//var_dump($name);
	if($name!='home'){
		$is_home = false;
	}
	
	//var_dump($is_home);
	if($is_home || $name == 'itinerary' || $name == ''){ //|| $name == '/?i=1'
?>
<header class="header-home w-100 float-left position-absolute">
	<div class="logo-home float-left">
		<a href="<?php echo base_url();?>"><img src="<?php echo base_url('assets/images/mh-white.png');?>" alt=""></a>
	</div>
	<?php
		$checkuservars = $this->session->userdata;
		if(isset($checkuservars['is_logged_in']) && $checkuservars['is_logged_in'] == 1){
	?>
			<div class="wrap-cart-all-nav float-right position-relative">
				<div class="dropdown drop-notifications">
					<!-- <button class="cart-main btn btn-secondary dropdown-toggle position-relative" type="button" id="btnNotification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="notifications();"> -->
					<a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="notifications();">
						<i class="fas fa-lightbulb"></i>
						<?php if(isset($nofication_count) && $nofication_count>0){?>
							<span id="show_ct"><?php echo $nofication_count;?></span>
							<input type="hidden" name="hid" id="ct_notification" value="<?php echo $nofication_count;?>">
							<input type="hidden" name="hid" id="user_id" value="<?php echo $user_id;?>">
						<?php }?>
					<!-- </button> -->
					</a>
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
					</div>
				</div>
				<a href="<?php echo base_url('cart');?>" class="cart-main position-relative"><i class="fas fa-shopping-cart"></i>
				<span>3</span></a>
			</div>
	<?php
		}
	?>

	<div class="float-right nav-menu-right" id="cssmenu">
		<div id="head-mobile"></div>
		<div class="button"></div>
		<ul>
			<!--Common Menu-->
			<!-- <li class='active'><a href='<?php echo base_url('home');?>'>HOME</a></li> -->
			<!-- <li><a href='javascript:void()'>EXCURSIONS</a>
				<ul>
					<li><a href='javascript:void()'>Product</a></li>
					<li><a href='javascript:void()'>Sightseeing</a></li>
					<li><a href='javascript:void()'>Adventure</a></li>
					<li><a href='javascript:void()'>Cruise</a></li>
					<li><a href='javascript:void()'>Beach Breaks</a></li>
					<li><a href='javascript:void()'>Show and Entertain</a></li>
					<li><a href='javascript:void()'>Spa</a></li>
					<li><a href='javascript:void()'>Snorkeling</a></li>
				</ul>
			</li>
			<li><a href='javascript:void()'>PACKAGE TOURS</a></li> -->
			
			<li><a href="<?php echo base_url('aboutus');?>">About Us</a></li>
			<li><a href="<?php echo base_url('hotel/book');?>">Hotels</a></li>
			<?php
				$checkuservars = $this->session->userdata;

				if(!isset($checkuservars['is_logged_in']) || $checkuservars['is_logged_in'] != 1){
			?>
			<li><a href="<?php echo base_url('joinus');?>">Join Us</a></li>
			
			<?php }?>
			<li><a href="<?php echo base_url('contactus');?>">Contact Us</a></li>
			<!-- <li><a href='javascript:void()'>MARRAGE EVENTS</a></li> -->
			<!-- <li><a href='javascript:void()'>M.I.C.S.</a></li> -->
			<!-- END -->
			<?php
				$checkuservars = $this->session->userdata;
				if(isset($checkuservars['is_logged_in']) && $checkuservars['is_logged_in'] == 1){
			?>

				<!-- Agent -->
				<?php if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='AGENT'){?>				
					<li><a href='#'>SETTINGS</a>
						<ul>
							<li><a href="<?php echo base_url('dashboardag');?>">Dashboard</a></li>
							<li><a href="<?php echo base_url('myaccountag');?>">My Account</a></li>
							<li><a href="<?php echo base_url('agentledger');?>">Ledger</a></li>
							<li><a href="<?php echo base_url('changepass');?>">Change Password</a></li>
							<li><a href="<?php echo base_url('point/requestpoint');?>">Request For Point</a></li>
							<li><a href="<?php echo base_url('package_management/view_packages');?>">Package List</a></li>
							<li><a href="<?php echo base_url('query');?>">Queries</a></li>
							<li><a href="<?php echo base_url('login/logout');?>">Logout</a></li>	
						</ul>
					</li>
				<?php } ?>
				<!-- END -->

				<!-- Superadmin -->
				<?php if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='SUPERADMIN'){?>
					<!-- <li><a href='javascript:void()'>Admin</a>
						<ul>
							<li><a href="<?php echo base_url('dashboardsa');?>">Dashboard</a></li>
							<li><a href='javascript:void()'>HOTELS</a>
								<ul class="s-menu">
									<li><a href="<?php echo base_url('hotel/add');?>">Add</a></li>
									<li><a href="<?php echo base_url('hotel/lists');?>">List</a></li>
									<li><a href="<?php echo base_url('hotel/book');?>">Book Hotels</a></li>
								</ul>
							</li>
							<li><a href='#'>AGENTS</a>
								<ul class="s-menu">
									<li><a href='<?php echo base_url('agents/add')?>'>Add</a></li>
									<li><a href='<?php echo base_url('agents/lists')?>'>List</a></li>
								</ul>
							</li>
							<li><a href='#'>EMPLOYEES</a>
								<ul class="s-menu">
									<li><a href='<?php echo base_url('employee/add')?>'>Add</a></li>
									<li><a href='<?php echo base_url('employee/lists')?>'>List</a></li>
								</ul>
							</li>
							<li><a href='#'>USERS</a>
								<ul class="s-menu">
									<li><a href='<?php echo base_url('users/add')?>'>Add</a></li>
									<li><a href='<?php echo base_url('users/lists')?>'>List</a></li>
								</ul>
							</li>
							<li><a href='#'>PAGE CONTENT</a>
								<ul class="s-menu">
									<li><a href='<?php echo base_url('content_management/header')?>'>Home Page Slider</a></li>
									<li><a href='<?php echo base_url('content_management/events')?>'>Home Page Event</a></li>
									<li><a href='<?php echo base_url('content_management/destinations')?>'>Home Page Popular Destination</a></li>
									<li><a href='<?php echo base_url('content_management/feedback')?>'>Feedback content</a></li>
								</ul>
							</li>
							<li><a href="<?php echo base_url('Contactinfo');?>">VIEW CONTACT DETAILS</a></li>
							<li><a href="<?php echo base_url('notification');?>">VIEW QUERY DETAILS</a></li>
						</ul>
					</li> -->
					<li><a href='#'>SETTINGS</a>
						<ul>
							<li><a href="<?php echo base_url('dashboardsa');?>">Dashboard</a></li>
							<li><a href="<?php echo base_url('myaccountsu');?>">My Account</a></li>
							<li><a href="<?php echo base_url('adminledger');?>">Ledger</a></li>
							<li><a href="<?php echo base_url('changepass');?>">Change Password</a></li>
							<li><a href="<?php echo base_url('point/requestlist');?>">Point Management</a></li>
							<li>
								<li><a href='javascript:void()'>Hotel Management</a>
									<ul class="s-menu">
										<li><a href="<?php echo base_url('hotel/add');?>">Add</a></li>
										<li><a href="<?php echo base_url('hotel/lists');?>">List</a></li>
									</ul>
								</li>
							</li>
							<li>
								<li><a href='#'>Agent Management</a>
									<ul class="s-menu">
										<li><a href='<?php echo base_url('agents/add')?>'>Add</a></li>
										<li><a href='<?php echo base_url('agents/lists')?>'>List</a></li>
									</ul>
								</li>
							</li>
							<li>
								<li><a href='#'>Employee Management</a>
									<ul class="s-menu">
										<li><a href='<?php echo base_url('employee/add')?>'>Add</a></li>
										<li><a href='<?php echo base_url('employee/lists')?>'>List</a></li>
									</ul>
								</li>
							</li>
							<li>
								<li><a href='#'>User Management</a>
									<ul class="s-menu">
										<li><a href='<?php echo base_url('users/add')?>'>Add</a></li>
										<li><a href='<?php echo base_url('users/lists')?>'>List</a></li>
									</ul>
								</li>
							</li>
							<li>
								<li><a href='#'>Package Management</a>
									<ul class="s-menu">
										<li><a href='<?php echo base_url('package_management/packages')?>'>Add</a></li>
										<li><a href='<?php echo base_url('package_management/view_packages')?>'>List</a></li>
									</ul>
								</li>
							</li>
							<li>
								<li><a href='#'>Page Content</a>
									<ul class="s-menu">
										<li><a href='<?php echo base_url('content_management/header')?>'>Home Page Slider</a></li>
										<li><a href='<?php echo base_url('content_management/events')?>'>Home Page Event</a></li>
										<li><a href='<?php echo base_url('content_management/destinations')?>'>Home Page Popular Destination</a></li>
										<li><a href='<?php echo base_url('content_management/feedback')?>'>Feedback content</a></li>
									</ul>
								</li>
							</li>
							<li><a href="<?php echo base_url('Contactinfo');?>">Contacts</a></li>
							<li><a href="<?php echo base_url('notification');?>">Queries</a></li>
							<li><a href="<?php echo base_url('login/logout');?>">Logout</a></li>


						</ul>
					</li>
				<?php } ?>
				<!-- END -->

				<!-- Admin -->
				<?php if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='ADMIN'){?>
					<li><a href="<?php echo base_url('dashboardad');?>">DASHBOARD</a></li>
					<li><a href='javascript:void()'>SETTINGS</a>
						<ul>
							<li><a href="<?php echo base_url('myaccountad');?>">My Account</a></li>
							<li><a href="<?php echo base_url('changepass');?>">Change Password</a></li>
							<li><a href="<?php echo base_url('login/logout');?>">Logout</a></li>
						</ul>
					</li>
				<?php } ?>
				<!-- END -->

				<!-- Employee -->
				<?php if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='EMPLOYEE'){?>
					<li><a href="<?php echo base_url('dashboardem');?>">DASHBOARD</a></li>
					<li><a href='javascript:void()'>SETTINGS</a>
						<ul>
							<li><a href="<?php echo base_url('myaccountem');?>">My Account</a></li>
							<li><a href="<?php echo base_url('changepass');?>">Change Password</a></li>
							<li><a href="<?php echo base_url('login/logout');?>">Logout</a></li>
						</ul>
					</li>
				<?php } ?>
				<!-- END -->
			<?php }?>
			
		</ul>
	</div>
</header>
<?php
	}
	else{
?>
<header class="header-home w-100 float-left position-relative">
	<div class="logo-home float-left">
		<a href="<?php echo base_url();?>"><img src="<?php echo base_url('assets/images/mh-white.png');?>" alt=""></a>
	</div>
	<?php
		$checkuservars = $this->session->userdata;
		if(isset($checkuservars['is_logged_in']) && $checkuservars['is_logged_in'] == 1){
	?>
			<div class="wrap-cart-all-nav float-right position-relative">
				<div class="dropdown drop-notifications">
					<!-- <button type="button" id="btnNotification" class="cart-main btn btn-secondary dropdown-toggle position-relative"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="notifications();"> -->
					<a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="notifications();">
						<i class="fas fa-lightbulb"></i>
						<?php if(isset($nofication_count) && $nofication_count>0){?>
							<span id="show_ct"><?php echo $nofication_count;?></span>
							<input type="hidden" name="hid" id="ct_notification" value="<?php echo $nofication_count;?>">
							<input type="hidden" name="hid" id="user_id" value="<?php echo $user_id;?>">
						<?php }?>
					<!-- </button> -->
					</a>
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
					</div>
				</div>
				<a href="<?php echo base_url('cart');?>" class="cart-main position-relative"><i class="fas fa-shopping-cart"></i>
				<span>3</span></a>
			</div>
	<?php
		}
	?>
	
	<div class="float-right nav-menu-right" id="cssmenu">
		<div id="head-mobile"></div>
		<div class="button"></div>
		<ul>
			<!-- Common Menu -->
			<!-- <li class='active'><a href='<?php echo base_url('home');?>'>HOME</a></li> -->
			<!-- <li><a href='javascript:void()'>EXCURSIONS</a>
				<ul>
					<li><a href='javascript:void()'>Product</a></li>
					<li><a href='javascript:void()'>Sightseeing</a></li>
					<li><a href='javascript:void()'>Adventure</a></li>
					<li><a href='javascript:void()'>Cruise</a></li>
					<li><a href='javascript:void()'>Beach Breaks</a></li>
					<li><a href='javascript:void()'>Show and Entertain</a></li>
					<li><a href='javascript:void()'>Spa</a></li>
					<li><a href='javascript:void()'>Snorkeling</a></li>

				</ul>
			</li>
			<li><a href='javascript:void()'>PACKAGE TOURS</a></li> -->
			<li><a href="<?php echo base_url('aboutus');?>">About Us</a></li>
			<li><a href="<?php echo base_url('hotel/book');?>">Hotels</a></li>
			<?php
				$checkuservars = $this->session->userdata;
				if(!isset($checkuservars['is_logged_in']) || $checkuservars['is_logged_in'] != 1){
			?>
			<li><a href="<?php echo base_url('joinus');?>">Join Us</a></li>
		<?php }?>
			<li><a href="<?php echo base_url('contactus');?>">Contact Us</a></li>
			<!-- <li><a href='javascript:void()'>MARRAGE EVENTS</a></li> -->
			<!-- <li><a href='javascript:void()'>M.I.C.S.</a></li> -->
			<!-- END -->
			<?php
				$checkuservars = $this->session->userdata;
				if(isset($checkuservars['is_logged_in']) && $checkuservars['is_logged_in'] == 1){
			?>
				<!-- Agent -->
				<?php if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='AGENT'){?>

					<li><a href='#'>Settings</a>
						<ul>
							<li><a href="<?php echo base_url('dashboardag');?>">Dashboard</a></li>
							<li><a href="<?php echo base_url('myaccountag');?>">My Account</a></li>
							<li><a href="<?php echo base_url('agentledger');?>">Ledger</a></li>
							<li><a href="<?php echo base_url('changepass');?>">Change Password</a></li>
							<li><a href="<?php echo base_url('point/requestpoint');?>">Request For Point</a></li>
							<li><a href="<?php echo base_url('package_management/view_packages');?>">Package List</a></li>
							<li><a href="<?php echo base_url('query');?>">Queries</a></li>
							<li><a href="<?php echo base_url('login/logout');?>">Logout</a></li>	
						</ul>
					</li>
				<?php } ?>
				<!-- END -->

				<!-- Superadmin -->
				<?php if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='SUPERADMIN'){?>
					<!-- <li><a href='javascript:void()'>Admin</a>
						<ul>
							<li><a href="<?php echo base_url('dashboardsa');?>">Dashboard</a></li>
							<li><a href='javascript:void()'>HOTELS</a>
								<ul class="s-menu">
									<li><a href="<?php echo base_url('hotel/add');?>">Add</a></li>
									<li><a href="<?php echo base_url('hotel/lists');?>">List</a></li>
									<li><a href="<?php echo base_url('hotel/book');?>">Book Hotels</a></li>
								</ul>
							</li>
							<li><a href='javascript:void()'>AGENTS</a>
								<ul class="s-menu">
									<li><a href='<?php echo base_url('agents/add')?>'>Add</a></li>
									<li><a href='<?php echo base_url('agents/lists')?>'>List</a></li>
								</ul>
							</li>
							<li><a href='javascript:void()'>EMPLOYEES</a>
								<ul class="s-menu">
									<li><a href='<?php echo base_url('employee/add')?>'>Add</a></li>
									<li><a href='<?php echo base_url('employee/lists')?>'>List</a></li>
								</ul>
							</li>
							<li><a href='javascript:void()'>USERS</a>
								<ul class="s-menu">
									<li><a href='<?php echo base_url('users/add')?>'>Add</a></li>
									<li><a href='<?php echo base_url('users/lists')?>'>List</a></li>
								</ul>
							</li>
							<li><a href='javascript:void()'>PAGE CONTENT</a>
								<ul class="s-menu">
									<li><a href='<?php echo base_url('content_management/header')?>'>Home Page Slider</a></li>
									<li><a href='<?php echo base_url('content_management/events')?>'>Home Page Event</a></li>
									<li><a href='<?php echo base_url('content_management/destinations')?>'>Home Page Popular Destination</a></li>
									<li><a href='<?php echo base_url('content_management/feedback')?>'>Feedback content</a></li>
								</ul>
							</li>
							<li><a href="<?php echo base_url('Contactinfo');?>">CONTACT DETAILS</a></li>
							<li><a href="<?php echo base_url('notification');?>">QUERY DETAILS</a></li>
						</ul>
					</li> -->
					<li><a href='javascript:void()'>SETTINGS</a>
						<ul>
							<li><a href="<?php echo base_url('dashboardsa');?>">Dashboard</a></li>
							<li><a href="<?php echo base_url('myaccountsu');?>">My Account</a></li>
							<li><a href="<?php echo base_url('adminledger');?>">Ledger</a></li>
							<li><a href="<?php echo base_url('changepass');?>">Change Password</a></li>
							<li><a href="<?php echo base_url('point/requestlist');?>">Point Management</a></li>
							<li>
								<li><a href='javascript:void()'>Hotel Management</a>
									<ul class="s-menu">
										<li><a href="<?php echo base_url('hotel/add');?>">Add</a></li>
										<li><a href="<?php echo base_url('hotel/lists');?>">List</a></li>
									</ul>
								</li>
							</li>
							<li>
								<li><a href='#'>Agent Management</a>
									<ul class="s-menu">
										<li><a href='<?php echo base_url('agents/add')?>'>Add</a></li>
										<li><a href='<?php echo base_url('agents/lists')?>'>List</a></li>
									</ul>
								</li>
							</li>
							<li>
								<li><a href='#'>Employee Management</a>
									<ul class="s-menu">
										<li><a href='<?php echo base_url('employee/add')?>'>Add</a></li>
										<li><a href='<?php echo base_url('employee/lists')?>'>List</a></li>
									</ul>
								</li>
							</li>
							<li>
								<li><a href='#'>User Management</a>
									<ul class="s-menu">
										<li><a href='<?php echo base_url('users/add')?>'>Add</a></li>
										<li><a href='<?php echo base_url('users/lists')?>'>List</a></li>
									</ul>
								</li>
							</li>
							<li>
								<li><a href='#'>Package Management</a>
									<ul class="s-menu">
										<li><a href='<?php echo base_url('package_management/packages')?>'>Add</a></li>
										<li><a href='<?php echo base_url('package_management/view_packages')?>'>List</a></li>
									</ul>
								</li>
							</li>
							<li>
								<li><a href='#'>Page Content</a>
									<ul class="s-menu">
										<li><a href='<?php echo base_url('content_management/header')?>'>Home Page Slider</a></li>
										<li><a href='<?php echo base_url('content_management/events')?>'>Home Page Event</a></li>
										<li><a href='<?php echo base_url('content_management/destinations')?>'>Home Page Popular Destination</a></li>
										<li><a href='<?php echo base_url('content_management/feedback')?>'>Feedback content</a></li>
									</ul>
								</li>
							</li>
							<li><a href="<?php echo base_url('Contactinfo');?>">Contacts</a></li>
							<li><a href="<?php echo base_url('notification');?>">Queries</a></li>
							<li><a href="<?php echo base_url('login/logout');?>">Logout</a></li>
							
						</ul>
					</li>
				<?php } ?>
				<!-- END -->

				<!-- Admin -->
				<?php if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='ADMIN'){?>
					<li><a href="<?php echo base_url('dashboardad');?>">DASHBOARD</a></li>
					<li><a href='javascript:void()'>SETTINGS</a>
						<ul>
							<li><a href="<?php echo base_url('myaccountad');?>">My Account</a></li>
							<li><a href="<?php echo base_url('changepass');?>">Change Password</a></li>
							<li><a href="<?php echo base_url('login/logout');?>">Logout</a></li>
						</ul>
					</li>
				<?php } ?>
				<!-- END -->

				<!-- Employee -->
				<?php if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='EMPLOYEE'){?>
					<li><a href="<?php echo base_url('dashboardem');?>">DASHBOARD</a></li>
					<li><a href='javascript:void()'>SETTINGS</a>
						<ul>
							<li><a href="<?php echo base_url('myaccountem');?>">My Account</a></li>
							<li><a href="<?php echo base_url('changepass');?>">Change Password</a></li>
							<li><a href="<?php echo base_url('login/logout');?>">Logout</a></li>
						</ul>
					</li>
				<?php } ?>
				<!-- END -->
			<?php }?>
		</ul>
	</div>
	
</header>
<?php		
	}
?>

