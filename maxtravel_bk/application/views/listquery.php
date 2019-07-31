<?php include_once('header.php');?>
			
<section class="w-100 float-left wrap-signup pt-3 pb-5">
      <div class="container">
            <?php
                  if(isset($page_access) && $page_access=='ACTIVE'){
            ?>	
            <div class="row">
                  <div class="col-lg-12 float-left page-title-top mt-3">
                        <h1>Query List</h1>
                  </div>
                  <div class="col-lg-12 float-left mt-4">
                        <div class="table-responsive">
                              <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                          <tr>
                                                <th>SL No.</th>
                                                <th>Agency Name</th>
                                                <th>Name</th>                    
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>Title</th>
                                                <th>Status</th>
                                                <!-- <th>Action</th> -->
                                          </tr>
                                    </thead>
                                    <tbody>
                                          
                                          <?php
                                                if(isset($queries) && count($queries)>0){
                                                      $i=1;
                                                      foreach ($queries as $ukey => $uvalue) {
                                          ?>

                                          <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo isset($uvalue['agency_name']) ? $uvalue['agency_name'] : '';?></td>
                                                <td><?php echo isset($uvalue['first_name']) ? $uvalue['first_name'] : '';?></td>

                                                <td><?php echo isset($uvalue['phone']) ? $uvalue['phone'] : '';?></td>
                                                <td><?php echo isset($uvalue['address']) ? $uvalue['address'] : '';?></td>
                                                <td><?php echo isset($uvalue['title']) ? $uvalue['title'] : '';?></td>
                                                <td><?php echo isset($uvalue['status']) ? $uvalue['status'] : '';?></td>
                                                <!-- <td>
                                                      <a href="<?php //echo base_url('users/edit/'.base64_encode($uvalue['id']));?>"><i class="fa fa-fw fa-edit"></i></a>
                                                </td> -->
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


			