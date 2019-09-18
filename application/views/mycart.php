<?php include_once('header.php');?>

<section class="w-100 float-left wrap-signup pt-3 pb-5 list-carts" id="cart">
	<div class="container">
		<div class="row">
			<form name="cart" method="post" action="">
			<div class="col-lg-12 float-left page-title-top mt-3">
				<h1>Cart</h1>
			</div>

			<?php 
             if($this->session->flashdata('success')){
           ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
               <?php  echo $this->session->flashdata('success'); ?>
              </div>
          <?php    
          }else if($this->session->flashdata('error')){
          ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
             <?php echo $this->session->flashdata('error'); ?>
           </div>
          <?php } ?>
          	<?php
					$sumSubTotal = 0;
					$sumTotal = 0;
					if(isset($cart_details) && count($cart_details)>0){
			?>
			<div class="col-lg-12 float-left">
					<?php
						$i=1;
						foreach ($cart_details as $cartkey => $cartvalue) {
						
							
							$productName = 'NA';
							$productStart = '0';
							$productType = 'NA';
							$productTotAmount = '0';
							$productAmount = '0';
							$quantity = 1;
							$subtitle = '';

							if(isset($cartvalue['key_type']) && $cartvalue['key_type']=='HOTEL'){

								$query = "SELECT * FROM hotel
                  						WHERE id = '".$cartvalue['key_id']."'
                  						AND status = 'ACTIVE' 
                  						ORDER BY id DESC";
        

        						$hotelDetails = $this->db->query($query)->result_array();
        						$productName = isset($hotelDetails[0]['hotel_name']) ? $hotelDetails[0]['hotel_name'] : 'NA';
        						$productStart = isset($hotelDetails[0]['hotel_category']) ? $hotelDetails[0]['hotel_category'] : '0';
        						$productType = isset($hotelDetails[0]['room_type']) ? $hotelDetails[0]['room_type'] : 'NA';
        						$productAmount = isset($hotelDetails[0]['pernight_room_rate']) ? $hotelDetails[0]['pernight_room_rate'] : '0';
        						$subtitle = 'Room rate per night';

							}elseif(isset($cartvalue['key_type']) && $cartvalue['key_type']=='PACKAGE'){
								$query = "SELECT * FROM contents
                  						WHERE id = '".$cartvalue['key_id']."'
                  						 AND slider_for = 'package'
                  						ORDER BY id DESC";
        

        						$packageDetails = $this->db->query($query)->result_array();
        						$productName = isset($packageDetails[0]['slider_name']) ? $packageDetails[0]['slider_name'] : 'NA';
        						$productStart = isset($packageDetails[0]['tag_name']) ? $packageDetails[0]['tag_name'] : '0';
        						$productType = isset($packageDetails[0]['room_type']) ? $packageDetails[0]['room_type'] : 'NA';
        						$arr = isset($packageDetails[0]['slider_details']) ? json_decode($packageDetails[0]['slider_details'],true) : array();
        						$productAmount = isset($arr['cost']) ? $arr['cost'] : 0; 
        						$subtitle = '';
							}

							$productTotAmount = isset($cartvalue['amount']) ? $cartvalue['amount'] : 0;
							$quantity = isset($cartvalue['counts']) ? $cartvalue['counts'] : 1;
							$sumSubTotal+= $productTotAmount;

				?>
				<input type="hidden" name="cartfield_<?php echo $i;?>" id="cartfield_<?php echo $i;?>" value="<?php echo $cartvalue['id'];?>">
				<article class="product cart-page position-relative  w-100 float-left" id="cartdiv_<?php echo $i;?>">
					<div class="remove-hotels position-absolute">
						<a class="remove1" onclick="removeTheItem(<?php echo $i;?>);"><i class="fas fa-trash-alt"></i></a>
					</div>

					<div class="content">

						<div class="w-100 float-left hotel-list-wrap">
							<div class="img-hotels float-left">
								<img src="<?php echo base_url('assets/images/hotels.png');?>" alt="hotel-img">
							</div>
							<div class="hotel-name float-left">
								<h2 class="w-100 float-left"><?php echo $productName;?>
									<input type="hidden" name="cart[<?php echo $cartvalue['id'];?>][productname]" value="<?php echo $productName;?>">
								</h2>
								<div class="star-ratings float-left w-100">
									<div class="float-left starts-all">
										<?php 
											if(isset($productStart) && $productStart==5){
										?>
										<i class="fas fa-star fill-star"></i>
										<i class="fas fa-star fill-star"></i>
										<i class="fas fa-star fill-star"></i>
										<i class="fas fa-star fill-star"></i>
										<i class="fas fa-star fill-star"></i>
										<?php }elseif(isset($productStart) && $productStart==4){
										?>
										<i class="fas fa-star fill-star"></i>
										<i class="fas fa-star fill-star"></i>
										<i class="fas fa-star fill-star"></i>
										<i class="fas fa-star fill-star"></i>
										<i class="fas fa-star"></i>
										<?php }elseif(isset($productStart) && $productStart==3){
										?>
										<i class="fas fa-star fill-star"></i>
										<i class="fas fa-star fill-star"></i>
										<i class="fas fa-star fill-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<?php }elseif(isset($productStart) && $productStart==2){
										?>
										<i class="fas fa-star fill-star"></i>
										<i class="fas fa-star fill-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<?php }elseif(isset($productStart) && $productStart==1){
										?>
										<i class="fas fa-star fill-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<?php }else{
										?>
										<!-- <i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i> -->
										<?php }?>
										
									</div>
									<?php
										if(isset($productStart) && $productStart>0){
									?>
									<span class="float-left"><?php echo $productStart;?> star</span>
									<?php 
										}?>
									<?php 

										if(isset($productType) && $productType!='NA'){
									?>
									<h3 class="room-type-hotel float-left"><?php echo $productType;?> Room</h3>
									<?php }?>
								</div>
								<div class="w-100 float-left bottom-info-hotels mt-2">
									<div
										class="hotel-price-wrap float-right position-relative w-100 content">
										<input type="text" name="cart[<?php echo $cartvalue['id'];?>][producttotamount]" id="producttotamount_<?php echo $i;?>" class="full-price float-right totprice" value="<?php echo $productTotAmount;?>" readonly>
										<!-- <h2 class="full-price float-right">
											69.98
										</h2> -->
										<span class="qt-plus  float-right" onclick="addroom(<?php echo $i;?>);">+</span>
										<!-- <span class="qt  float-right">2</span> -->
										<input type="text" name="cart[<?php echo $cartvalue['id'];?>][quantity]" id="quantity_<?php echo $i;?>" value="<?php echo $quantity;?>" class="qt  float-right" readonly>
										<span class="qt-minus float-right" onclick="subroom(<?php echo $i;?>);">-</span>
										<h2 class="float-left room-tate-text"><?php echo $subtitle;?> <i
												class="fas fa-rupee-sign"></i> </h2>

										<input type="text" name="cart[<?php echo $cartvalue['id'];?>][productamount]" id="productamount_<?php echo $i;?>" value="<?php echo $productAmount;?>" class="price float-left price-rate-night invisible-input iput-1" readonly>
										<!-- <h2 class="price float-left price-rate-night">
											34.99
										</h2> -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</article>
				<?php $i++;}

					$sumTotal = $sumSubTotal;
				?>

			</div>

			<div id="site-footer" class="float-right w-100">
				<div class="w-100 float-right">

					<div class="left w-100 float-right">
						<h2 class="subtotal w-100 float-right text-right">Subtotal: <!-- <span class="will-price">163.96</span> -->
						<input type="text" name="subtotal" id="subtotalid" value="<?php echo $sumSubTotal;?>" class="will-price" readonly>
						</h2>
						<h3 class="tax w-100 float-right text-right">Taxes (0%): <!-- <span class="will-price">8.2</span> -->

						<input type="text" name="tax" id="taxid" value="0" class="will-price invisible-input iput-2" readonly>
						</h3>
						<!-- <h3 class="shipping w-100 float-right text-right">Shipping: <span class="will-price">5.00</span></h3> -->
					</div>

					<div class="right w-100 float-right">
						<h1 class="total w-100 float-right text-right total-priceshow">Total <!-- <span class="will-price">177.16</span> -->
						<input type="text" name="total" id="totalid" value="<?php echo $sumTotal;?>" class="will-price invisible-input iput-3" readonly>
						</h1>
					
					</div>

				</div>
			</div>



			<div class="col-lg-12 float-left mt-0">
				<input type="submit" value="Place Order" class="register-button-form float-right mr-3 " onclick="return myFunction()">

			</div>
			<?php }else{?>
				<?php echo 'Your Cart is Empty';?>
			<?php }?>
			</form>
		</div>
	</div>
</section>
<?php include_once('footer.php');?>
<script>
function myFunction() {
  var txt;
  var r = confirm("Press a button!\nEither OK or Cancel.");
  if (r == true) {
   	return true;
  } else {
    return false;
  }
  
}
</script>
<script type="text/javascript">
	function addroom(id){

		var roomquantity = eval($('#quantity_'+id).val());
		roomquantity = eval(roomquantity + 1);
		$('#quantity_'+id).val(roomquantity);

		var productamount = eval($('#productamount_'+id).val());
		var producttotamount = eval($('#producttotamount_'+id).val());

		producttotamount = eval(producttotamount + productamount);

		$('#producttotamount_'+id).val(producttotamount);
		calculateTotal();
	}
	function subroom(id){

		var roomquantity = eval($('#quantity_'+id).val());
		roomquantity = eval(roomquantity - 1);
		$('#quantity_'+id).val(roomquantity);

		var productamount = eval($('#productamount_'+id).val());
		var producttotamount = eval($('#producttotamount_'+id).val());

		producttotamount = eval(producttotamount - productamount);

		$('#producttotamount_'+id).val(producttotamount);

		calculateTotal();
	}

	function calculateTotal(){

		sum = 0;
		$("input[class *= 'totprice']").each(function(){
	        sum += +eval($(this).val());
	    });
	    $('#subtotalid').val(sum);
	    var tax = eval($('#taxid').val());
	    var tot = eval(sum+tax);
	    $('#totalid').val(tot);
	}

	function removeTheItem(id){
		var cartfield = $('#cartfield_'+id).val();
		//alert(cartfield);

		if(cartfield!=''){

			$.ajax({

                  url     : base_url+'cart/deletecart',
                  type    : "post",
                  data    : {"cartfield":cartfield},
                  success : function(result){
                        
                        //result = JSON.parse(result);
                        window.location.href=base_url+'cart';
                        //console.log(result);
                        /*if(result.status=='false'){
                              $('#errormsg').html(result.message);
                        }else{
                              $('#successmsg').html(result.message);

                              setTimeout(function(){ $('#myCartModel').modal('hide'); }, 3000);
                        }*/
                        

                                    
            }});
		}
		//$('#cartdiv_'+id).display('none');
		//calculateTotal();
	}
</script>



