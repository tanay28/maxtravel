<?php include_once('header.php');?>


<span  class="col-lg-12 float-left text-right user-info p-3 bg-primary" style="color: #FFF;">
<?php
$checkuservars = $this->session->userdata; echo isset($checkuservars['useremail']) ? 'Wecome, '.$checkuservars['useremail'] : '';   
?>
</span>	
<section class="w-100 float-left wrap-signup pt-3 pb-5">
	<div class="container">
		<div class="row">

			<div class="col-lg-12 float-left page-title-others mt-3">
				<h1>Ledger Details</h1>
			</div>
			<div class="col-lg-12 float-left wrap-hotel-search">
				<form name="frmsearchledger" method="POST" action="">
					<div class="w-100 float-left search-hotels-bg text-center">
						<h3 class="w-100 float-left text-center">Find Ledger</h3>

						<div class="col-12 col-md-12 col-lg-3 d-inline-block text-left checkin-dates align-top">
							<label>Agent </label>
							
							<select name="searchagent">
								<option value="">Select Agent</option>
								<?php
									if(isset($agent_list) && count($agent_list)>0){
										foreach ($agent_list as $akey => $avalue) {
								?>
								<option value="<?php echo $avalue['user_id'];?>" <?php echo (isset($_POST['searchagent']) && ($_POST['searchagent']==$avalue['user_id'])) ? 'selected' : '';?>><?php echo $avalue['agency_name'];?></option>
								<?php }}?>
							</select>

						</div>



						<div class="col-12 col-md-12 col-lg-3 d-inline-block text-left checkin-dates align-top">
							<label>From Date </label>
							<input id="datepicker" name="ledgerStartDate" value="<?php echo (isset($_POST['ledgerStartDate']) && $_POST['ledgerStartDate']!='') ? date('m/d/Y',strtotime($_POST['ledgerStartDate'])) : '';?>" /></div>


						<div
							class="col-12 col-md-12 col-lg-3 d-inline-block text-left checkin-dates align-top ">
							<label>To Date</label>
							<input id="datepicker1" name="ledgerEndDate" value="<?php echo (isset($_POST['ledgerEndDate']) && $_POST['ledgerEndDate']!='') ? date('m/d/Y',strtotime($_POST['ledgerEndDate'])) : '';?>" />
						</div>


						<div
							class="col-12 col-md-12 col-lg-2 d-inline-block rating-dates pr-0 button-ledger align-top">
							<input type="submit" name="btnSearchLedger" value="Search Ledger" class="search-button-form float-left  ">
						</div>

					</div>
				</form>
			</div>

			<div class="col-lg-12 float-left lastfive-inner-orders dataTables_wrapper ledger-table mt-5">
				<table class="table table-striped dataTable no-footer">
					<thead>
						<tr>
							<th>Agent</th>
							<th>Date</th>
							<th>Type</th>
							<th>Order No.</th>
							<th>Debit</th>
							<th>Credit</th>
							<th>Balance</th>
						</tr>
					</thead>
					<tbody>
						<?php
							if(isset($ledger_list) && count($ledger_list)>0){
								foreach ($ledger_list as $lkey => $lvalue) {
								$sqlUserDetails = "SELECT ag.*, users.status, users.id AS user_id, users.email,city.city_name,tz.timezone FROM agents ag LEFT JOIN agent_user_mapping ag_map ON ag.id = ag_map.agent_id LEFT JOIN users ON users.id = ag_map.user_id LEFT JOIN city ON city.id = ag.city LEFT JOIN timezone tz ON ag.time_zone = tz.id WHERE ag.id = '".$lvalue['user_id']."'";
								$userDetails = $this->db->query($sqlUserDetails)->result_array(); 
						?>
						<tr>
							<td><?php echo $userDetails[0]['agency_name']?></td>
							<td><?php echo date('d F Y', strtotime($lvalue['posted_on']));;?></td>
							<td>Hotel</td>
							<td><?php echo '#'.$lvalue['orderno']?></td>
							<td><?php echo $lvalue['purchase_amount']?></td>
							<td><?php echo $lvalue['credit_amount']?></td>
							<td><?php echo $lvalue['after_deduction_point']?></td>
						</tr>
						<tr>
							<td colspan="6"><?php echo $lvalue['description']?>
							</td>
						</tr>
						<?php
							}}else{
						?>
						<tr>
							<td colspan="6">No Record Found!</td>
						</tr>
						<?php }?>
						
						
					</tbody>
				</table>

			</div>

		</div>
	</div>
</section>
<?php include_once('footer.php');?>
