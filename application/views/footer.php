			<?php include_once('footer_box.php');?>

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
	<script>
		$(document).ready(function () {
			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
	<!-- Owl Carousel -->
	<!-- Waypoints -->
	<script src="<?php echo base_url('assets/js/jquery.waypoints.min.js');?>"></script>

	<script src="<?php echo base_url('assets/js/owl.carousel.min.js');?>"></script>
	<!-- Main JS (Do not remove) -->
	<script src="<?php echo base_url('assets/js/main.js');?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.nice-select.min.js');?>"></script>
	<script>
		// $(document).ready(function () {
		// 	$('.selectbox:not(.ignore)').niceSelect();
		// 	FastClick.attach(document.body);
		// });   
	</script>
	<script>
	$(document).ready(function() {
		$('#example1').DataTable();
	} );
	</script>
	<script>
		$('.sub-menu ul').hide();
		$(".sub-menu a").click(function () {
			$(this).parent(".sub-menu").children("ul").slideToggle("100");
			$(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
		});
	</script>
	<script src="<?php echo base_url('assets/js/gijgo.min.js');?>" type="text/javascript"></script>
	<script>
		$('#datepicker').datepicker({
			showOtherMonths: true
		});
		$('#datepicker1').datepicker({
			showOtherMonths: true
		});
	</script>
	<script src="<?php echo base_url('assets/js/destination-autocomplete.js');?>"></script>
</body>

</html>

<?php
  if(isset($_SESSION['success'])){
    unset($_SESSION['success']);
  }
  if(isset($_SESSION['error'])){
    unset($_SESSION['error']);
  }
?>