<?php include_once('header.php');?>
			
<section class="w-100 float-left wrap-signup pt-3 pb-5">
      <div class="container">
            <?php
                  if(isset($page_access) && $page_access=='ACTIVE'){
            ?>	
            <div class="row">
                  <div class="col-lg-12 float-left page-title-top mt-3">
                        <h1>Hotel List</h1>
                  </div>
                  <div class="col-lg-12 float-left mt-4">
                        <div class="table-responsive">
                              <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                          <tr>
                                                <th>SL No.</th>
                                                <th>Name</th>
                                                <th>Facilities</th>                    
                                                <th>Category</th>
                                                <th>Sub Category</th>
                                                <th>Room Type</th>
                                                <th>Breakfast</th>
                                                <th>Room Rate</th>
                                                <th>Action</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          <?php
                                                if(isset($hotel_list) && count($hotel_list)>0){
                                                      $i=1;
                                                      foreach ($hotel_list as $hkey => $hvalue) {
                                          ?>
                                          <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo isset($hvalue['hotel_name']) ? $hvalue['hotel_name'] : '';?></td>
                                                <td><?php echo isset($hvalue['facilities']) ? $hvalue['facilities'] : '';?></td>
                                                <td>
                                                      <?php if(isset($hvalue['hotel_category']) && $hvalue['hotel_category']==1){?>
                                                            <i class="fas fa-star"></i>
                                                      <?php }?>
                                                      <?php if(isset($hvalue['hotel_category']) && $hvalue['hotel_category']==2){?>
                                                            <i class="fas fa-star"></i><i class="fas fa-star"></i>
                                                      <?php }?>
                                                      <?php if(isset($hvalue['hotel_category']) && $hvalue['hotel_category']==3){?>
                                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                                      <?php }?>
                                                      <?php if(isset($hvalue['hotel_category']) && $hvalue['hotel_category']==4){?>
                                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                                      <?php }?>
                                                      <?php if(isset($hvalue['hotel_category']) && $hvalue['hotel_category']==5){?>
                                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                                      <?php }?>

                                                </td>
                                                <td>
                                                      <?php
                                                            if(isset($hvalue['subcategories']))
                                                            {
                                                                  $arr = json_decode($hvalue['subcategories'],true);
                                                                  if(isset($arr) && count($arr)>0){
                                                                  foreach ($arr as $ikey => $subcat)
                                                                  {
                                                      ?>
                                                                        <span class="h-subcat"><?php echo $subcat;?></span>
                                                      <?php
                                                                  }
                                                            }
                                                            }
                                                      ?>
                                                </td>
                                                <td><?php echo isset($hvalue['room_type']) ? $hvalue['room_type'] : '';?></td>
                                                <td><?php echo isset($hvalue['breakfast']) ? $hvalue['breakfast'] : '';?></td>
                                                <td><?php echo isset($hvalue['pernight_room_rate']) ? $hvalue['pernight_room_rate'] : '';?></td>
                                                <td>
                                                      <a href="<?php echo base_url('hotel/edit/'.base64_encode($hvalue['id']));?>"><i class="fa fa-fw fa-edit"></i></a></td>
                                          </tr>
                                          <?php $i++;}}else{?>
                                          <tr><td colspan="7">No Record !!</td></tr>
                                          <?php }?>
                                    </tbody>
                              </table>
                        </div>	
                  </div>
            </div>
            <?php }else{ echo 'OOPS!! Something went wrong. Try again after sometime';}?>
      </div>
</section>
<?php include_once('footer.php');?>


			