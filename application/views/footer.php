<footer class="w-100 float-left">
				<div class="container">
					<div class="w-100 float-left">
						<div class="float-left left-foot-logo"><a href="#"><img src="<?php echo base_url('assets/images/logo-full.png')?>" alt=""></a>
						</div>
						<div class="float-right right-footer">
							<div class="foot-nav float-right">
								<ul>
									<li><a href="#">Home</a></li>
									<li><a href="#">About Us</a></li>
									<li><a href="#">maxx Team </a></li>
									<li><a href="#">Careers </a></li>
									<li><a href="#">Join Us</a></li>
									<li><a href="#">Contact Us</a></li>
								</ul>
							</div>
							<div class="social float-right w-100">
								<a href="#"><i class="fab fa-whatsapp whapp"></i></a>
								<a href="#"><i class="fab fa-twitter tw"></i></a>
								<a href="#"><i class="fab fa-facebook-f face"></i></a>
							</div>
						</div>
						<div class="w-100 float-left copy mt-3">
							<p>© 2019 maxxholidays.com All rights reserved </p>
						</div>
					</div>
				</div>
			</footer>

		</div>
	</div>
	<!-- jQuery -->
	<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
	<script>
		$(window).load(function () {
			jQuery('#page').fadeIn(500);
			jQuery('#loading').hide();
		});
	</script>
	<!-- jQuery Easing -->
	<script src="<?php echo base_url('assets/js/jquery.easing.1.3.js');?>"></script>
	<!-- Bootstrap -->
	<script src="<?php echo base_url('assets/js/popper.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/dataTables.bootstrap4.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js');?>"></script>
	<!-- Owl Carousel -->
	<!-- Waypoints -->
	<script src="<?php echo base_url('assets/js/jquery.waypoints.min.js');?>"></script>

	<script src="<?php echo base_url('assets/js/owl.carousel.min.js');?>"></script>
	<!-- Main JS (Do not remove) -->
	<script src="<?php echo base_url('assets/js/main.js');?>"></script>
	<!-- <script src="<?php echo base_url('assets/js/jquery.nice-select.min.js');?>"></script> -->
	<script>
		/*$(document).ready(function () {
			$('select:not(.ignore)').niceSelect();
			FastClick.attach(document.body);
		});*/    
	</script>
	<script>
	$(document).ready(function() {
		$('#example1').DataTable();
	} );
	</script>
</body>

</html>