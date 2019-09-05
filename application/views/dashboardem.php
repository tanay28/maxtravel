<?php include_once('header.php');?>
<span class="col-lg-12 float-left text-right user-info p-3 bg-primary" style="color: #FFF;">
		<?php
			$checkuservars = $this->session->userdata; echo isset($checkuservars['useremail']) ? 'Wecome, '.$checkuservars['useremail'] : '';   
		?>
</span>		
<section>
	<div class="container">
		<div class="w-100 float-left mt-5 mb-5">
			  <?php if ($this->session->userdata('success')) { ?>
			    <div class="alert alert-success w-100 float-left">
			        <?php echo $this->session->userdata('success');?>
			    </div>
			  <?php }?>
			  <?php if ($this->session->userdata('error')) { ?>
			    <div class="alert alert-danger">
			        <?php echo $this->session->userdata('error');?>
			    </div>
			  <?php }?>
			<p class="w-100 text-center">
				<?php
					$checkuservars = $this->session->userdata;
					if(isset($checkuservars['useremail'])) echo 'Welcome ' . $checkuservars['useremail'];  
				?><br/>
				Dhaboard will be activated very shortly !!
			</p>
				
		</div>
	<div>
</section>

<?php include_once('footer.php');?>


			