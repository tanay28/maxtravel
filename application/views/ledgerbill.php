<?php include_once('header.php');?>
<script type="text/javascript">
	function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
<section class="w-100 float-left wrap-signup pt-3 pb-5">
	<div class="container">
		<div class="col-lg-12 float-left page-title-others mt-3" style="text-align: right;">
			<a href="javascript:void(0);" onclick="printDiv('printableArea');">Print</a>
		</div>
		<div class="row" id="printableArea">
			
			<div class="col-lg-12 float-left page-title-others mt-3">
				<img src="<?php echo base_url('assets/images/logo-full.png');?>" alt="">
				<br/>
				<h1><?php echo (isset($transaction_details[0]['transactionstatus']) && $transaction_details[0]['transactionstatus']=='CREDIT') ? 'Credit' : 'Debit';?> Note</h1>
			</div>
			
			
			<div class="w-100 float-left debot-note-wrap">
				<div class="col-lg-8 col-md-12 col-12 float-left debit-top p-0">
					<div class="col-lg-12 float-left">
						<h5>TO,</h5>
					</div>
					<div class="w-100 float-left blocks-details-leg-dip">
						<div class="col-lg-3 col-md-4 col-12 float-left debit-blocks">Agency Name</div>
						<div class="col-lg-9 col-md-8 col-12 float-left debit-blocks"><?php echo isset($agent_details[0]['agency_name']) ? $agent_details[0]['agency_name'] : ''; ?></div>
					</div>
					<div class="w-100 float-left blocks-details-leg-dip">
						<div class="col-lg-3 col-md-4 col-12 float-left debit-blocks">Address</div>
						<div class="col-lg-9 col-md-8 col-12 float-left debit-blocks"><?php echo isset($agent_details[0]['address']) ? $agent_details[0]['address'] : ''; ?></div>
					</div>
					<div class="w-100 float-left blocks-details-leg-dip">
						<div class="col-lg-3 col-md-4 col-12 float-left debit-blocks">Email</div>
						<div class="col-lg-9 col-md-8 col-12 float-left debit-blocks">

							<?php
								if(isset($transaction_details[0]['user_id'])){
										$sqludetails = "SELECT email FROM users WHERE id = '".$transaction_details[0]['user_id']."'";
            							$uDetails = $this->db->query($sqludetails)->result_array();  
            					}
							?>
							<?php echo isset($uDetails[0]['email']) ? $uDetails[0]['email'] : '';?></div>
					</div>
					<div class="w-100 float-left blocks-details-leg-dip">
						<div class="col-lg-3 col-md-4 col-12 float-left debit-blocks">Contact</div>
						<div class="col-lg-9 col-md-8 col-12 float-left debit-blocks"><?php echo isset($agent_details[0]['mobile']) ? $agent_details[0]['mobile'] : ''; ?></div>
					</div>
				</div>
			</div>
			<div class="col-lg-12 float-left lastfive-inner-orders dataTables_wrapper ledger-table mt-3">
				<table class="table table-striped dataTable no-footer">
					<thead>
						<tr>
							<th>Item</th>
							<th>Particulars</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Issual Date</td>
							<td><?php echo (isset($transaction_details[0]['posted_on']) && $transaction_details[0]['posted_on']!='') ? $transaction_details[0]['posted_on'] : '0000-00-00 00:00:00';?></td>
						</tr>
						<tr>
							<td>TransactionID</td>
							<td>#<?php echo (isset($transaction_details[0]['transaction_code']) && $transaction_details[0]['transaction_code']!='') ? $transaction_details[0]['transaction_code'] : 'NA';?></td>
						</tr>
						<tr>
							<td>Previous Fund</td>
							<td><?php echo (isset($transaction_details[0]['available_point']) && $transaction_details[0]['available_point']!='') ? $transaction_details[0]['available_point'] : '0';?></td>
						</tr>

						<?php
							if(isset($transaction_details[0]['transactionstatus']) && $transaction_details[0]['transactionstatus']=='CREDIT'){
						?>
						<tr>
							<td>Credit Fund</td>
							<td><?php echo (isset($transaction_details[0]['credit_amount']) && $transaction_details[0]['credit_amount']!='') ? $transaction_details[0]['credit_amount'] : '0';?></td>
						</tr>
						<?php }?>

						<?php
							if(isset($transaction_details[0]['transactionstatus']) && $transaction_details[0]['transactionstatus']=='DEBIT'){
						?>
						<tr>
							<td>Debit Fund</td>
							<td><?php echo (isset($transaction_details[0]['purchase_amount']) && $transaction_details[0]['purchase_amount']!='') ? $transaction_details[0]['purchase_amount'] : '0';?></td>
						</tr>
						<?php }?>
						<tr>
							<td>Current Fund</td>
							<td><?php echo (isset($transaction_details[0]['after_deduction_point']) && $transaction_details[0]['after_deduction_point']!='') ? $transaction_details[0]['after_deduction_point'] : '0';?></td>
						</tr>
						<tr>
							<td>Admin Remarks</td>
							<td><?php echo (isset($transaction_details[0]['description']) && $transaction_details[0]['description']!='') ? $transaction_details[0]['description'] : 'NA';?></td>
						</tr>

					</tbody>
				</table>

			</div>
			<p class="col-lg-12">ps: Being a computer generated statement, signature not required</p>
		</div>
	</div>
</section>
<?php include_once('footer.php');?>




