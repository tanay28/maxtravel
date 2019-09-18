<?php include_once('header.php');?>
<section class="w-100 float-left wrap-signup pt-3 pb-5">
	<div class="container">
		 <?php if(isset($page_access) && $page_access=='ACTIVE'){?>	
		<div class="row">
			<div class="col-lg-12 float-left page-title-others mt-3">
				<h1>Package List</h1>
			</div>
			<div class="col-lg-12 float-left">
                <?php if ($this->session->userdata('success')) { ?>
                <div class="alert alert-success w-100 float-left">
                    <?php echo $this->session->userdata('success');?>
                </div>
                <?php }?>
                <?php if ($this->session->userdata('error')) { ?>
                <div class="alert alert-danger">
                    <?php echo $this->session->userdata('error');?>
                </div>
                <?php }?>   
            </div>
			<div class="col-lg-12 float-left wrap-hotel-list-agent mt-4 mb-4">

				<?php
					if(isset($datas) && count($datas)>0){
	                  foreach ($datas as $ukey => $uvalue) {
				?>
				<div class="w-100 float-left hotel-list-wrap">
					<input type="hidden" name="HiddID" id="HiddID" value="<?php echo isset($uvalue['id']) ? $uvalue['id'] : ''?>">
					<input type="hidden" name="HiddCost" id="HiddCost" value="<?php echo isset($uvalue['details']['cost']) ? $uvalue['details']['cost'] : ''?>">
					<div class="img-hotels float-left">
						<img src="<?php echo base_url('assets/content/'.$uvalue['image_name'])?>" class="myImg" alt="<?php echo $uvalue['image_name'];?>">
					</div>
					<div class="hotel-name float-left">
						<a href="<?php echo base_url('itinerary/show_itinerary/'.base64_encode($uvalue['id']).'/package');?>">
							<h2 class="w-100 float-left">
								<?php echo isset($uvalue['slider_name']) ? $uvalue['slider_name'] : '';?>
							</h2>
						</a>
						<div class=" tour-durations float-left w-100">

							<h4 class="mb-0">
								<?php echo isset($uvalue['details']['duration']) ? $uvalue['details']['duration'] : '';?>
							</h4>

						</div>
						<div class="w-100 float-left info-tours mt-2">
							<div class="float-left mr-4">
								<i class="fas fa-calendar-alt float-left mr-2"></i>
								<span class="float-left address-wrap-hotel">
									<?php echo isset($uvalue['details']['date']) ? $uvalue['details']['date'] : '';?>
								</span>
							</div>
							<div class="float-left mr-4">

								<span class="float-left address-wrap-hotel">Tour code : <?php echo isset($uvalue['details']['code']) ? $uvalue['details']['code'] : '';?></span>
							</div>
							<div class=" float-left facilities-hotel included-wrap">
								<span class="mr-2 float-left">Included at this price</span>

								<div class="facilities-single float-left position-relative"
									data-toggle="tooltip" data-placement="top" title="Lunch">
									<i class="fas fa-utensils"></i>
								</div>
								<div class="facilities-single float-left position-relative"
									data-toggle="tooltip" data-placement="top" title="Hotel">
									<i class="fas fa-hotel"></i>
								</div>

							</div>
						</div>
					</div>
					<div class="hotel-price-wrap float-right position-relative">
						<h1 class="w-100 float-left"> <?php echo isset($uvalue['details']['cost']) ? $uvalue['details']['cost'] : '';?> USD</h1>
						<span class="w-100 float-left">Per Person</span>
						<a href="javascript:void()" id="btnBook" class="btn btn-booknow">Book Now</a>
					</div>
				</div>
				<?php }}?>
				<!-- <div class="w-100 float-left hotel-list-wrap">
					<div class="img-hotels float-left">
						<img src="images/desimg.jpg" alt="hotel-img">
					</div>
					<div class="hotel-name float-left">
						<h2 class="w-100 float-left">Package Name</h2>
						<div class=" tour-durations float-left w-100">

							<h4 class="mb-0">2 Days 3 Night</h4>

						</div>
						<div class="w-100 float-left info-tours mt-2">
							<div class="float-left mr-4">
								<i class="fas fa-calendar-alt float-left mr-2"></i>
								<span class="float-left address-wrap-hotel">25-09-2019</span>
							</div>
							<div class="float-left mr-4">

								<span class="float-left address-wrap-hotel">Tour code : 212352</span>
							</div>
							<div class=" float-left facilities-hotel included-wrap">
								<span class="mr-2 float-left">Included at this price</span>

								<div class="facilities-single float-left position-relative"
									data-toggle="tooltip" data-placement="top" title="Lunch">
									<i class="fas fa-utensils"></i>
								</div>
								<div class="facilities-single float-left position-relative"
									data-toggle="tooltip" data-placement="top" title="Hotel">
									<i class="fas fa-hotel"></i>
								</div>

							</div>
						</div>
					</div>
					<div class="hotel-price-wrap float-right position-relative">
						<h1 class="w-100 float-left"><i class="fas fa-rupee-sign"></i> 3000</h1>
						<span class="w-100 float-left">Per Person</span>
						<a href="#" class="btn btn-booknow">BooK Now</a>
					</div>
				</div>

				<div class="w-100 float-left hotel-list-wrap">
					<div class="img-hotels float-left">
						<img src="images/desimg.jpg" alt="hotel-img">
					</div>
					<div class="hotel-name float-left">
						<h2 class="w-100 float-left">Package Name</h2>
						<div class=" tour-durations float-left w-100">

							<h4 class="mb-0">2 Days 3 Night</h4>

						</div>
						<div class="w-100 float-left info-tours mt-2">
							<div class="float-left mr-4">
								<i class="fas fa-calendar-alt float-left mr-2"></i>
								<span class="float-left address-wrap-hotel">25-09-2019</span>
							</div>
							<div class="float-left mr-4">

								<span class="float-left address-wrap-hotel">Tour code : 212352</span>
							</div>
							<div class=" float-left facilities-hotel included-wrap">
								<span class="mr-2 float-left">Included at this price</span>

								<div class="facilities-single float-left position-relative"
									data-toggle="tooltip" data-placement="top" title="Lunch">
									<i class="fas fa-utensils"></i>
								</div>
								<div class="facilities-single float-left position-relative"
									data-toggle="tooltip" data-placement="top" title="Hotel">
									<i class="fas fa-hotel"></i>
								</div>

							</div>
						</div>
					</div>
					<div class="hotel-price-wrap float-right position-relative">
						<h1 class="w-100 float-left"><i class="fas fa-rupee-sign"></i> 3000</h1>
						<span class="w-100 float-left">Per Person</span>
						<a href="#" class="btn btn-booknow">BooK Now</a>
					</div>
				</div>

				<div class="w-100 float-left hotel-list-wrap">
					<div class="img-hotels float-left">
						<img src="images/desimg.jpg" alt="hotel-img">
					</div>
					<div class="hotel-name float-left">
						<h2 class="w-100 float-left">Package Name</h2>
						<div class=" tour-durations float-left w-100">

							<h4 class="mb-0">2 Days 3 Night</h4>

						</div>
						<div class="w-100 float-left info-tours mt-2">
							<div class="float-left mr-4">
								<i class="fas fa-calendar-alt float-left mr-2"></i>
								<span class="float-left address-wrap-hotel">25-09-2019</span>
							</div>
							<div class="float-left mr-4">

								<span class="float-left address-wrap-hotel">Tour code : 212352</span>
							</div>
							<div class=" float-left facilities-hotel included-wrap">
								<span class="mr-2 float-left">Included at this price</span>

								<div class="facilities-single float-left position-relative"
									data-toggle="tooltip" data-placement="top" title="Lunch">
									<i class="fas fa-utensils"></i>
								</div>
								<div class="facilities-single float-left position-relative"
									data-toggle="tooltip" data-placement="top" title="Hotel">
									<i class="fas fa-hotel"></i>
								</div>

							</div>
						</div>
					</div>
					<div class="hotel-price-wrap float-right position-relative">
						<h1 class="w-100 float-left"><i class="fas fa-rupee-sign"></i> 3000</h1>
						<span class="w-100 float-left">Per Person</span>
						<a href="#" class="btn btn-booknow">BooK Now</a>
					</div>
				</div> -->



				<div class="w-100 float-left bottom-hotels-pagi">
					<p class="w-100 float-left">Showing result 10 of 100</p>
					<nav class="w-100 float-left pagination-hotels mt-2">
						<ul class="pagination mb-0">
							<li class="page-item"><a class="page-link p-n-but" href="#">Previous</a></li>
							<li class="page-item"><a class="page-link" href="#">1</a></li>
							<li class="page-item"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item"><a class="page-link p-n-but" href="#">Next</a></li>
						</ul>
					</nav>
				</div>
			</div>

		</div>
		<?php }else{ echo 'OOPS!! Something went wrong. Try again after sometime';}?>
	</div>
</section>
<?php include_once('footer.php');?>
<script type="text/javascript">
	$(document).ready(function(){
   $('#btnBook').on('click',function(){
         var base_url = "<?php echo base_url();?>";
         var id = $('#HiddID').val();
         var ptype = 'package';
         var cost = $('#HiddCost').val();;
         $.ajax({

         url     : base_url+'package_management/ajax_save_package',
         type    : "post",
         data    : {"id":id,"ptype":ptype,'cost':cost},
         success : function(result){
            if(result == 'success')
            {
               alert('Added to cart');
            }
            else if(result == 'error')
            {
               alert('Something went worng..Please try again later..!!');  
            }
            else
            {
               alert(result);
            }
      }});
   });
  });
</script>