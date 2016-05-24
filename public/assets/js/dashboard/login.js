$(document).ready(function(){

	$('#sub-btn').on('click',function(e){
		e.preventDefault();
		var username = $('#username').val();
		var password = $('#pass').val();

			if( (username != "") && (password != "") )
			{
				$.ajax({
					type: "POST",
					url: base_url + "admin/validate_user",
					data: {username:username,
							password:password},
					asyc: false,
					cache: false,
		            beforeSend : function (){
		            	$.blockUI({ message: "<h5><img src='"+base_url+"img/busy.gif' /> Just a moment...</h5>" });
		            },				
					success:
						function(data)
						{	
							if(data === "success")
							{
								window.location = base_url + "dashboard";
							}
							else if(data === "invalid")
							{
								$('#username').css('background-color','#f2dede');
								$('#username').css('color','#a94442');
								$('#username').css('border-color','#ebccd1');
								$('#pass').css('background-color','#f2dede');
								$('#pass').css('color','#a94442');
								$('#pass').css('border-color','#ebccd1');							
							}
							else
							{
								alert(data);
							}
						},
		            complete : function (){
		                $.unblockUI();
		            }

				});	
			}
			else
			{
				if(username == "" && password != "")
				{
					
					$('#username').css('background-color','#f2dede');
					$('#username').css('color','#a94442');
					$('#username').css('border-color','#ebccd1');	
				}

				else if(password == "" && username != "")
				{
					
					$('#pass').css('background-color','#f2dede');
					$('#pass').css('color','#a94442');
					$('#pass').css('border-color','#ebccd1');
				}

				else
				{	
					$('#username').css('background-color','#f2dede');
					$('#username').css('color','#a94442');
					$('#username').css('border-color','#ebccd1');					
					$('#pass').css('background-color','#f2dede');
					$('#pass').css('color','#a94442');
					$('#pass').css('border-color','#ebccd1');
				}
			}

	});


	$('#username').on('focus',function(){
		$('#username').css('background-color','#FFF');
		$('#username').css('color','#333');
		$('#username').css('border-color','');
	});

	$('#pass').on('focus',function(){
		$('#pass').css('background-color','#FFF');
		$('#pass').css('color','#333');
		$('#pass').css('border-color','');		
	});

});