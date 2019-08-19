<?php include_once('header.php');?>
			
<section class="w-100 float-left wrap-signup pt-3 pb-5">
      <div class="container">
            <?php
                  if(isset($page_access) && $page_access=='ACTIVE'){
            ?>	
            <div class="row">
                  <div class="col-lg-12 float-left page-title-top mt-3">
                        <h1>Transaction List</h1>
                  </div>
                  <div class="col-lg-12 float-left mt-4">
                        <div class="table-responsive">
                              <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                          <tr>
                                                <th>Sl No.</th>
                                                <th>Hotel</th>
                                                <th>Amount</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          <?php
                                                if(isset($transaction_list) && count($transaction_list)>0){
                                                      $i = 1;
                                                      foreach ($transaction_list as $tkey => $tvalue) {
                                                            
                                                      
                                          ?>
                                          <tr>
                                                <td>AAAA</td>
                                                <td>3000</td>
                                                <td>23-05-2019</td>
                                                <td>Success</td>
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


			