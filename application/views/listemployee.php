<?php include_once('header.php');?>
			
<section class="w-100 float-left wrap-signup pt-3 pb-5">
      <div class="container">
            <?php
                  if(isset($page_access) && $page_access=='ACTIVE'){
            ?>	
            <div class="row">
                  <div class="col-lg-12 float-left page-title-top mt-3">
                        <h1>Emoloyee List</h1>
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
                                                if(isset($employeelist) && count($employeelist)>0){
                                                      $i=1;
                                                      foreach ($employeelist as $ekey => $evalue) {
                                          ?>

                                          <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo isset($evalue['name']) ? $evalue['name'] : '';?></td>
                                                <td><?php echo isset($evalue['email']) ? $evalue['email'] : '';?></td>

                                                <td><?php echo isset($evalue['phoneno']) ? $evalue['phoneno'] : '';?></td>
                                                <td><?php echo isset($evalue['address']) ? $evalue['address'] : '';?></td>
                                                <td><?php echo isset($evalue['designation']) ? $evalue['designation'] : '';?></td>
                                                
                                                <td>
                                                      <a href="<?php echo base_url('employee/edit/'.base64_encode($evalue['id']));?>"><i class="fa fa-fw fa-edit"></i></a></td>
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


			