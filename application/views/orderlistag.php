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
                                                <th>Hotel</th>
                                                <th>Amount</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          <tr>
                                                <td>AAAA</td>
                                                <td>3000</td>
                                                <td>23-05-2019</td>
                                                <td>Success</td>
                                          </tr>
                                          <tr>
                                                <td>test</td>
                                                <td>5000</td>
                                                <td>20-05-2019</td>
                                                <td>Error</td>
                                          </tr>
                                          <tr>
                                                <td>AAAA</td>
                                                <td>7000</td>
                                                <td>23-06-2019</td>
                                                <td>Success</td>
                                          </tr>
                                          <tr>
                                                <td>test123</td>
                                                <td>8000</td>
                                                <td>29-05-2019</td>
                                                <td>Error</td>
                                          </tr>
                                          <tr>
                                                <td>test456</td>
                                                <td>7000</td>
                                                <td>27-05-2019</td>
                                                <td>Success</td>
                                          </tr>
                                          <tr>
                                                <td>AAAA</td>
                                                <td>3000</td>
                                                <td>23-05-2019</td>
                                                <td>Status</td>
                                          </tr>
                                    </tbody>
                              </table>
                        </div>      
                  </div>
            </div>
            <?php }else{ echo 'OOPS!! Something went wrong. Try again after sometime';}?>
      </div>
</section>
<?php include_once('footer.php');?>