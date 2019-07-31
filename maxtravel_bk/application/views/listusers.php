<?php include_once('header.php');?>
			
<section class="w-100 float-left wrap-signup pt-3 pb-5">
      <div class="container">
            <?php
                  if(isset($page_access) && $page_access=='ACTIVE'){
            ?>	
            <div class="row">
                  <div class="col-lg-12 float-left page-title-top mt-3">
                        <h1>Users List (All Are Admin Users) </h1>
                  </div>
                  <div class="col-lg-12 float-left mt-4">
                        <div class="table-responsive">
                              <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                          <tr>
                                                <th>SL No.</th>
                                                <th>Name</th>
                                                <th>Email</th>                    
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>Designation</th>
                                                <th>Action</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          
                                          <?php
                                                if(isset($userslist) && count($userslist)>0){
                                                      $i=1;
                                                      foreach ($userslist as $ukey => $uvalue) {
                                          ?>

                                          <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo isset($uvalue['name']) ? $uvalue['name'] : '';?></td>
                                                <td><?php echo isset($uvalue['email']) ? $uvalue['email'] : '';?></td>

                                                <td><?php echo isset($uvalue['phoneno']) ? $uvalue['phoneno'] : '';?></td>
                                                <td><?php echo isset($uvalue['address']) ? $uvalue['address'] : '';?></td>
                                                <td><?php echo isset($uvalue['designation']) ? $uvalue['designation'] : '';?></td>
                                                
                                                <td>
                                                      <a href="<?php echo base_url('users/edit/'.base64_encode($uvalue['id']));?>"><i class="fa fa-fw fa-edit"></i></a></td>
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


			