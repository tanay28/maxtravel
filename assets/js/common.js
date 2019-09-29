function login(){

	var email = $('#txtEmail').val();
	var password = $('#txtPassword').val();
	if(email==''){
		$('#ajaxmsg').show('slow');
		var msg = 'Enter Valid Email !!'; 
		$('#ajaxmsg').html(msg);
	}else if(password==''){
		$('#ajaxmsg').show('slow');
		var msg = 'Enter Password!!'; 
		$('#ajaxmsg').html(msg);
	}else{
		$.ajax({

			url     : base_url+'login/login',
			type    : "post",
			data    : {"txtEmail":email,"txtPassword":password},
			success : function(result){
			//alert(result);
			if(result == 'AGENT')
			{
				window.location.href = base_url+'package_management/view_packages';	
			}
			if(result == 'SUPERADMIN')
			{
				window.location.href = base_url+'dashboardsa';
			}
			if(result == 'ADMIN')
			{
				window.location.href = base_url+'dashboardad';
			}
			if(result == 'EMPLOYEE')
			{
				window.location.href = base_url+'dashboardem';	
			}
			else if(result == '')
			{
				$('#ajaxmsg').show('slow');
				var msg = 'Enter Valid Email And Password!!'; 
				$('#ajaxmsg').html(msg);
			}
						
		}});
	}
}

function forgotPassword()
{
	var email = $('#txtAgencyemail').val();
    $.ajax({
      url  : base_url+'Forgotpassword/viewforgetpassword',
      type : "post",
      data : {"txtEmail":email}, 
      success: function(result){
      			//alert(result);
      			if(result == 'error')
      			{
      				//alert('Please provide a valid email..!!');
      				$('#ajaxmsg').show('slow');
      				var msg = 'Please provide a valid email..!!';
      				$('#ajaxmsg').html(msg);
      				return false;
      			}
      			else
      			{
      				window.location.href = base_url+'Forgotpassword/show_password_reset_confirmation';
      				// $('#ajaxmsg').show('slow');
      				// var msg = 'Please check your mail for reset password link';
      				// $('#ajaxmsg').html(msg);	
      			}
    }});
}

function changeStatus()
{
	$id = $('#txtUserid').val();
	//alert($id);
}

function currency_converter()
{
	var amount = $('#txtAmount').val();
	var from_currency = $('#cmbFromCurrency').val();
	var to_currency = $('#cmbToCurrency').val();
	if(from_currency != 'none' || to_currency != 'none')
	{
		$.ajax({
	      url  : base_url+'Currency_converter/index',
	      type : "post",
	      data : {"txtamount":amount,"txtfromcurrency":from_currency,"txttocurrency":to_currency}, 
	      success: function(result){$('#covertedval').html(result);}});
	}
}

function notifications()
{
	
	var ct = $('#ct_notification').val();
	var user_id = $('#user_id').val();
	$.ajax({
	      url  : base_url+'Notification/notification_reset',
	      type : "post",
	      data : {"user_id":user_id,"ct":ct}, 
	      success: function(result){
	      	console.log(result);
	      	if(result == 'ok')
	      	{
	      		$('#show_ct').hide('slow');
	      	}
	      }});
}

