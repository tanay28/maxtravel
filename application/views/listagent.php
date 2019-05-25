<?php include_once('header.php');?>
			
<section class="w-100 float-left wrap-signup pt-3 pb-5">
  <div class="container">
  	<div>
		<?php if ($this->session->userdata('success')) { ?>
      	<div class="alert alert-success">
          <?php echo $this->session->userdata('success');?>
      	</div>
        <?php }?>
        <?php if ($this->session->userdata('error')) { ?>
          <div class="alert alert-danger">
              <?php echo $this->session->userdata('error');?>
          </div>
        <?php }?>
        <div class="alert alert-danger" id="ajaxmsg" style="display: none"></div>
	</div>
    <?php
          if(isset($page_access) && $page_access=='ACTIVE'){
    ?>	
    <div class="row">
      <div class="col-lg-12 float-left page-title-top mt-3">
            <h1>Agent List</h1>
      </div>
      <div class="col-lg-12 float-left mt-4">
            <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                        <thead>
                              <tr>
                                    <th>SL No.</th>
                                    <th>Agency Name</th>
                                    <th>Agency Email</th>
                                    <th>First Name</th>                    
                                    <th>Last Name</th>
                                    <th>Designation</th>
                                    <th>Iata Status</th>
                                    <th>Nature of Business</th>
                                    <th>Business Type</th>
                                    <th>Know From</th>
                                    <th>preffered_currency</th>
                                    <th>Address</th>
                                    <th>Pin</th>
                                    <th>Phone</th>
                                    <th>Mobile</th>
                                    <th>City</th>
                                    <th>Status</th>
                                    <th>Action</th>
                              </tr>
                        </thead>
                        <tbody>
                              <?php
                                    if(isset($agents) && count($agents)>0){
                                          $i=1;
                                          foreach ($agents as $akey => $avalue) {
                              ?>
                              <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo isset($avalue['agency_name']) ? $avalue['agency_name'] : '';?></td>
                                    
                                     <td><?php echo isset($avalue['email']) ? $avalue['email'] : '';?></td>

                                    <td><?php echo isset($avalue['first_name']) ? $avalue['first_name'] : '';?></td>
                                    <td><?php echo isset($avalue['last_name']) ? $avalue['last_name'] : '';?></td>
                                    <td><?php echo isset($avalue['designation']) ? $avalue['designation'] : '';?></td>
                                    <td><?php echo isset($avalue['iata_status']) ? $avalue['iata_status'] : '';?></td>
                                    <td><?php echo isset($avalue['nature_of_business']) ? $avalue['nature_of_business'] : '';?></td>
                                    <td><?php echo isset($avalue['business_type']) ? $avalue['business_type'] : '';?></td>
                                    <td><?php echo isset($avalue['know_from']) ? $avalue['know_from'] : '';?></td>
                                    <td><?php echo isset($avalue['preffered_currency']) ? $avalue['preffered_currency'] : '';?></td>
                                    <td><?php echo isset($avalue['address']) ? $avalue['address'] : '';?></td>
                                    <td><?php echo isset($avalue['pin']) ? $avalue['pin'] : '';?></td>
                                    <td><?php echo isset($avalue['phone']) ? $avalue['phone'] : '';?></td>
                                    <td><?php echo isset($avalue['mobile']) ? $avalue['mobile'] : '';?></td>
                                    <td><?php echo isset($avalue['city']) ? $avalue['city'] : '';?></td>
                                    
                                    <td><a href="<?php echo base_url('agents/change_status/'.$avalue['user_id'].'/'.$avalue['status']);?>"><?php echo isset($avalue['status']) ? $avalue['status'] : '';?></a></td>
                                    <input type="hidden" name="txtUserid" id="txtUserid" value="<?php echo isset($avalue['user_id']) ? $avalue['user_id'] : '';?>">
                                   
                                    <td>
                                          <a href="<?php echo base_url('agents/edit/'.base64_encode($avalue['id']));?>"><i class="fa fa-fw fa-edit"></i></a>
                                    </td>
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


			