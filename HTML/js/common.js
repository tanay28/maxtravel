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

			url     : base_url+'login/index',
			type    : "post",
			data    : {"txtEmail":email,"txtPassword":password},
			success : function(result){
						//alert(result);
			if(result == 'AGENT')
			{
				window.location.href = base_url+'dashboardag';	
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