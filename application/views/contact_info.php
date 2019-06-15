<?php include_once('header.php');?>
			
<section class="w-100 float-left wrap-signup pt-3 pb-5">
      <div class="container">
            <?php
                  if(isset($page_access) && $page_access=='ACTIVE'){
            ?>	
            <div class="row">
                  <div class="col-lg-12 float-left page-title-top mt-3">
                        <h1>Contact List</h1>
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
                                                <th>Message</th>
                                                <th>Mail status</th>
                                                <th>Created At</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          <?php
                                                if(isset($datas) && count($datas)>0){
                                                      $i=1;
                                                      foreach ($datas as $ukey => $uvalue) {
                                          ?>
                                          <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo isset($uvalue['name']) ? $uvalue['name'] : '';?></td>
                                                <td><?php echo isset($uvalue['email']) ? $uvalue['email'] : '';?></td>

                                                <td><?php echo isset($uvalue['phone']) ? $uvalue['phone'] : '';?></td>
                                                <td><?php echo isset($uvalue['msg']) ? $uvalue['msg'] : '';?></td>
                                                <td><?php echo isset($uvalue['mail_status']) ? $uvalue['mail_status'] : '';?></td>
                                                <td><?php echo isset($uvalue['created_at']) ? $uvalue['created_at'] : '';?></td>
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


			