<?php include_once('header.php');?>
			
<section class="w-100 float-left wrap-signup pt-3 pb-5">
      <div class="container">
            <?php
                  if(isset($page_access) && $page_access=='ACTIVE'){
            ?>	
            <div class="row">
                  <div class="col-lg-12 float-left page-title-top mt-3">
                        <h1>Requested Ponts</h1>
                  </div>
                  <div class="col-lg-12 float-left mt-4">
                        <div class="table-responsive">
                              <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                          <tr>
                                                <th>SL No.</th>
                                                <th>Requested User</th>
                                                <th>Requested Point</th>                    
                                                <th>Requested Date</th>
                                                <th>Action</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          <?php
                                                if(isset($request_points) && count($request_points)>0){
                                                      $i=1;
                                                      foreach ($request_points as $pkey => $pvalue) {

                                                            $query = "SELECT email FROM users
                                                                        WHERE id = '".$pvalue['sender_id']."'";
                                                              

                                                              $usersDetails = $this->db->query($query)->result_array();
                                          ?>
                                          <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo isset($usersDetails[0]['email']) ? $usersDetails[0]['email'] : '';?></td>
                                                <td><?php echo isset($pvalue['request_point']) ? $pvalue['request_point'] : '';?></td>
                                                
                                                <td><?php echo isset($pvalue['request_date']) ? $pvalue['request_date'] : '';?></td>
                                                
                                                <td>
                                                      <a href="<?php echo base_url('point/approvepoint/'.base64_encode($pvalue['id']));?>"><i class="fa fa-fw fa-edit"></i></a></td>
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


			