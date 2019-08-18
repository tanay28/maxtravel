<?php include_once('header.php');?>
			
<section class="w-100 float-left wrap-signup pt-3 pb-5">
      <div class="container">
            <?php
                  if(isset($page_access) && $page_access=='ACTIVE'){
            ?>	
            <div class="row">

                  <div class="col-lg-12 float-left page-title-others mt-3">
                        <h1>Hotels</h1>
                  </div>

                  <div class="col-lg-12 float-left wrap-hotel-search">
                        <form name="advancedsearchbookhotel" action="" method="post">
                              <div class="w-100 float-left search-hotels-bg">
                                    <h3 class="w-100 float-left">Search Hotel</h3>
                                    <div class="col-12 col-md-12 col-lg-4 float-left hotel-sel pl-0">
                                          <label>Select Hotel</label>
                                          
                                          <div action='' autocomplete='off' class="w-100">
                                                <div class='input-group w-100 float-left'>
                                                  <!-- <input aria-describedby='button-addon2' aria-label='Country' class='form-control autocomplete w-100 float-left' id='myInput' name='myCountry' placeholder='Select Hotel Destination' type='text'> -->
                                                  <select class='w-100 float-left select2 selectbox selecy-full' name="searchbycity" >
                                                      <option value="">Select Destination</option>
                                                      <?php
                                                        if(isset($city_list) && count($city_list)>0){
                                                          foreach ($city_list as $citykey => $cityvalue) {
                                                          
                                                      ?>
                                                        <option value="<?php echo $cityvalue['id'];?>" <?php echo (isset($_POST['searchbycity']) && $_POST['searchbycity']==$cityvalue['id']) ? 'selected' : '';?>><?php echo $cityvalue['city_name'];?></option>
                                                      <?php }}?>
                                                    </select>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="col-12 col-md-12 col-lg-2 float-left checkin-dates">
                                          <label>Select Check In </label>
                                          <input id="datepicker" name="searchbycheckin" value="<?php echo (isset($_POST['searchbycheckin'])) ? $_POST['searchbycheckin'] : '';?>" /></div>


                                    <div class="col-12 col-md-12 col-lg-2 float-left checkin-dates">
                                          <label>Select Check Out </label>
                                          <input id="datepicker1" name="searchbycheckout" value="<?php echo (isset($_POST['searchbycheckout'])) ? $_POST['searchbycheckout'] : '';?>" />
                                    </div>


                                    <div class="col-12 col-md-12 col-lg-4 float-right rating-dates pr-0">
                                          <label class="w-100 float-left">Select Person </label>
                                          
                                          <div class="wrap-peroson position-relative">
                                          <i class="far fa-plus-square"></i>
                                          <input aria-describedby='button-addon2' aria-label='Country' class='form-control autocomplete w-50 float-left' id='myInput' name='searchnoofadults' placeholder='Adults' type='text' value="<?php echo (isset($_POST['searchnoofadults'])) ? $_POST['searchnoofadults'] : '';?>">
                                          </div>
                                    <div class="wrap-peroson position-relative">
                                    <i class="far fa-plus-square"></i>
                                          <input aria-describedby='button-addon2' aria-label='Country' class='form-control autocomplete w-50 float-left' id='myInput' name='searchnoofchild' placeholder='Child' type='text' value="<?php echo (isset($_POST['searchnoofchild'])) ? $_POST['searchnoofchild'] : '';?>">
                                          </div>
                                    </div>
                                    <div class="w-100 float-left mt-4">
                                          <input type="submit" value="Search Hotel" name="btnSearchhotel" 
                                                class="search-button-form float-left mr-3 ">

                                    </div>
                              </div>
                        </form>
                  </div>


                  <div class="col-lg-12 float-left wrap-hotel-list-agent mt-4 mb-4">
                        <?php
                              if(isset($hotels) && count($hotels)>0){
                                    foreach ($hotels as $hkey => $hvalue) {
                              
                        ?>
                        <div class="w-100 float-left hotel-list-wrap">
                              <div class="img-hotels float-left">
                                    <img src="<?php echo base_url('assets/images/hotels.png');?>" alt="hotel-img">
                              </div>
                              <div class="hotel-name float-left">
                                    <h2 class="w-100 float-left"><?php echo isset($hvalue['hotel_name']) ? $hvalue['hotel_name'] : 'NA';?></h2>
                                    <div class="star-ratings float-left w-100">
                                          <div class="float-left starts-all">
                                                <?php 
                                                      if(isset($hvalue['hotel_category']) && $hvalue['hotel_category']==1){
                                                ?>
                                                <i class="fas fa-star fill-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <?php }else if(isset($hvalue['hotel_category']) && $hvalue['hotel_category']==2){
                                                ?>
                                                <i class="fas fa-star fill-star"></i>
                                                <i class="fas fa-star fill-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <?php }else if(isset($hvalue['hotel_category']) && $hvalue['hotel_category']==3){
                                                ?>
                                                <i class="fas fa-star fill-star"></i>
                                                <i class="fas fa-star fill-star"></i>
                                                <i class="fas fa-star fill-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <?php }else if(isset($hvalue['hotel_category']) && $hvalue['hotel_category']==4){
                                                ?>
                                                <i class="fas fa-star fill-star"></i>
                                                <i class="fas fa-star fill-star"></i>
                                                <i class="fas fa-star fill-star"></i>
                                                <i class="fas fa-star fill-star"></i>
                                                <i class="fas fa-star"></i>
                                                <?php }else if(isset($hvalue['hotel_category']) && $hvalue['hotel_category']==5){
                                                ?>
                                                <i class="fas fa-star fill-star"></i>
                                                <i class="fas fa-star fill-star"></i>
                                                <i class="fas fa-star fill-star"></i>
                                                <i class="fas fa-star fill-star"></i>
                                                <i class="fas fa-star fill-star"></i>
                                                <?php }else{?>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <?php }?>
                                                
                                          </div>
                                          <span class="float-left"><?php echo isset($hvalue['hotel_category']) ? $hvalue['hotel_category'] : 0;?> star</span>
                                          <h3 class="room-type-hotel float-left"><?php echo isset($hvalue['room_type']) ? $hvalue['room_type'] : 'NA';?></h3>
                                    </div>
                                    <div class="w-100 float-left bottom-info-hotels">
                                          <div class="col-12 col-md-6 col-lg-6 float-left address-hotel p-0">
                                                <i class="fas fa-map-marker-alt float-left mr-2"></i>
                                                <span class="float-left address-wrap-hotel"><?php echo isset($hvalue['hotel_address']) ? $hvalue['hotel_address'] : 'NA';?>,<?php echo isset($hvalue['city_name']) ? $hvalue['city_name'] : 'NA';?>,<?php echo isset($hvalue['country_name']) ? $hvalue['country_name'] : 'NA';?></span>
                                          </div>
                                          <div class="col-12 col-md-6 col-lg-6 float-left facilities-hotel">
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Swmming Pool">
                                                      <i class="fas fa-swimmer"></i>
                                                </div>
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Restaurants">
                                                      <i class="fas fa-utensils"></i>
                                                </div>
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Gym">
                                                      <i class="fas fa-dumbbell"></i>
                                                </div>
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Bar">
                                                      <i class="fas fa-glass-cheers"></i>
                                                </div>
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Car Parking">
                                                      <i class="fas fa-shuttle-van"></i>
                                                </div>
                                                <div class="facilities-single float-left position-relative"
                                                      data-toggle="tooltip" data-placement="top" title="Wi-Fi">
                                                      <i class="fas fa-wifi"></i>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                              <div class="hotel-price-wrap float-right position-relative">
                                    <h1 class="w-100 float-left"><i class="fas fa-rupee-sign"></i> <?php echo isset($hvalue['room_rate_include_breakfast']) ? number_format($hvalue['room_rate_include_breakfast'],2) : 'NA';?></h1>
                                    <span class="w-100 float-left">Per Night</span>
                                    <a href="javascript:void(0);" class="btn btn-booknow" data-toggle="modal" data-target="#myCartModel" onclick="addtocart('<?php echo $hvalue['id']?>','<?php echo $hvalue['hotel_name']?>');">Add to cart</a>
                              </div>
                        </div>
                        <?php }}else{ echo 'No Records !!';}?>

                  </div>

            </div>

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
                                          
            <?php }else{ echo 'OOPS!! Something went wrong. Try again after sometime';}?>
      </div>
</section>
<?php include_once('footer.php');?>
<script>
$(document).ready(function () {
      $('.selectbox:not(.ignore)').niceSelect();
      FastClick.attach(document.body);
});  
$(function () {
    //Initialize Select2 Elements
    $('.select2').select2();
}); 

function addtocart(hotelid,hotelname){

      //alert(hotelid);
      //alert(hotelname);
      $('#cartmodeltitle').html(hotelname);
      $('#modelhotelid').val(hotelid);
}

function savecart(){

      var hotelid = $('#modelhotelid').val();
      var checkin = $('#modelcartcheckin').val();
      var checkout = $('#modelcartcheckout').val();
      var room = $('#modelcartroom').val();
      var adult = $('#modelcartadults').val();
      var child = $('#modelcartchild').val();

      if(hotelid!=0){
            alert('Select Hotel.');
            return false;
      }else if(checkin!=''){
            alert('Select Check In Time.');
            return false;
      }else if(checkout!=''){
            alert('Select Check Out Time.');
            return false;
      }else{
            $.ajax({

                  url     : base_url+'hotel/savecart',
                  type    : "post",
                  data    : {"hotelid":hotelid,"checkin":checkin,"checkin":checkin,"checkin":checkin,"checkin":checkin,"checkin":checkin},
                  success : function(result){
                                    //alert(result);
                  if(result == 'AGENT')
                  {
                        window.location.href = base_url+'dashboardag';  
                  }
                  if(result == 'SUPERADMIN')
                  {
                        window.location.href = base_url+'dashboardsa';
                  }
                  if(result == 'ADMIN')
                  {
                        window.location.href = base_url+'dashboardad';
                  }
                  if(result == 'EMPLOYEE')
                  {
                        window.location.href = base_url+'dashboardem';  
                  }
                  else if(result == '')
                  {
                        $('#ajaxmsg').show('slow');
                        var msg = 'Enter Valid Email And Password!!'; 
                        $('#ajaxmsg').html(msg);
                  }
                                    
            }});
      }

}
</script>

<!-- Modal -->
<div id="myCartModel" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="cartmodeltitle">Modal Header</h4>
        <input type="hidden" name="modelhotelid" id="modelhotelid" value="0">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        
        <!-- -->
            <div class="col-12 col-md-12 col-lg-2 float-left checkin-dates">
                  <label>Select Check In </label>
                  <input type="text" name="modelcartcheckin" id="modelcartcheckin" value="" />
            </div>


            <div class="col-12 col-md-12 col-lg-2 float-left checkin-dates">
                  <label>Select Check Out </label>
                  <input type="text" name="modelcartcheckout" id="modelcartcheckout" value="" />
            </div>
            <div class="col-12 col-md-12 col-lg-2 float-left checkin-dates">
                  <label>Room</label>
                  <input type="text" name="modelcartroom" id="modelcartroom" value="" />
            </div>

            <div class="col-12 col-md-12 col-lg-4 float-right rating-dates pr-0">
                  <label class="w-100 float-left">Select Person </label>
                  
                  <div class="wrap-peroson position-relative">
                  <i class="far fa-plus-square"></i>
                  <input aria-describedby='button-addon2' aria-label='Country' class='form-control autocomplete w-50 float-left' name='modelcartadults' id="modelcartadults" placeholder='Adults' type='text' value="">
                  </div>
            <div class="wrap-peroson position-relative">
            <i class="far fa-plus-square"></i>
                  <input aria-describedby='button-addon2' aria-label='Country' class='form-control autocomplete w-50 float-left' name='modelcartchild' id="modelcartchild" placeholder='Child' type='text' value="">
                  </div>
            </div>
      
        <!-- -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" onclick="savecart()">Save Cart</button>
      </div>
    </div>

  </div>
</div>

			