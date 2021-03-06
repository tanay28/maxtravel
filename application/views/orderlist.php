<?php include_once('header.php');?>
                  
<section class="w-100 float-left wrap-signup pt-3 pb-5">
      <div class="container">
            <?php
                  if(isset($page_access) && $page_access=='ACTIVE'){
            ?>    
            <div class="row">
                  <div class="col-lg-12 float-left page-title-top mt-3">
                        <h1>Order List</h1>
                  </div>
                  <div class="col-lg-12 float-left mt-4">
                        <div class="table-responsive">
                              <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                          <tr>
                                                <th>Sl No.</th>
                                                <th>Order No.</th>
                                                <th>Sub Total (INR)</th>
                                                <th>Tax(%)</th>
                                                <th>Total Amount(INR)</th>
                                                <th>Status</th>
                                                <th>Message</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          <?php 
                                                if(isset($order_list) && count($order_list)>0){
                                                      $i=1;
                                                      foreach ($order_list as $okey => $ovalue) {
                                                
                                                      
                                          ?>
                                          <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $ovalue['orderno'];?></td>
                                                <td><?php echo $ovalue['subtotal'];?></td>
                                                <td><?php echo $ovalue['tax'];?></td>
                                                <td><?php echo $ovalue['totalamount'];?></td>
                                                <td><?php echo $ovalue['orderstatus'];?></td>
                                                <td><?php echo $ovalue['ordermessage'];?></td>
                                                <td><?php echo date('Y-m-d',strtotime($ovalue['posted_on']));?></td>
                                                <td><a href="<?php echo 'printorder/'.$ovalue['id'];?>" target="_blank">Print</a></td>
                                          </tr>
                                          <?php $i++;}}?>
                                    </tbody>
                              </table>
                        </div>      
                  </div>
            </div>
            <?php }else{ echo 'OOPS!! Something went wrong. Try again after sometime';}?>
      </div>
</section>
<?php include_once('footer.php');?>