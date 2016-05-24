$(document).ready(function(){

	$('#register-submit').on('click',function(e){
		e.preventDefault();

		var username = $('#username').val();
		var password = $('#password').val();
		var confirmPass = $('#confirm-password').val();
		var email = $('#email').val();
		var fname = $('#fname').val();
		var lname = $('#lname').val();
		var captcha = $('#captcha').val();
		var code = $('#hidden-code').val();
		var url = $('#form-register').attr('href');

		if( (username != "") && (password == confirmPass) && (isValidEmailAddress(email) == true) &&  (fname != "") && (lname != "") && (captcha != "") && (password != "") && (confirmPass != ""))
		{
			$('#form-register').submit();
		}
		else
		{
			if(captcha != code)
			{
				$('#captcha').css('background-color','#f2dede');
				$('#captcha').css('color','#a94442');
				$('#captcha').css('border-color','#ebccd1');				
			}

			if(password != confirmPass)
			{
				$('#password').css('background-color','#f2dede');
				$('#password').css('color','#a94442');
				$('#password').css('border-color','#ebccd1');

				$('#confirm-password').css('background-color','#f2dede');
				$('#confirm-password').css('color','#a94442');
				$('#confirm-password').css('border-color','#ebccd1');					
			}

			if(isValidEmailAddress(email) == false)
			{
				$('#email').css('background-color','#f2dede');
				$('#email').css('color','#a94442');
				$('#email').css('border-color','#ebccd1');				
			}

			if(username == "")
			{
				$('#username').css('background-color','#f2dede');
				$('#username').css('color','#a94442');
				$('#username').css('border-color','#ebccd1');
			}

			if(password == "")
			{
				$('#password').css('background-color','#f2dede');
				$('#password').css('color','#a94442');
				$('#password').css('border-color','#ebccd1');				
			}

			if(confirmPass == "")
			{
				$('#confirm-password').css('background-color','#f2dede');
				$('#confirm-password').css('color','#a94442');
				$('#confirm-password').css('border-color','#ebccd1');					
			}

			if(email == "")
			{
				$('#email').css('background-color','#f2dede');
				$('#email').css('color','#a94442');
				$('#email').css('border-color','#ebccd1');					
			}

			if(fname == "")

			{
				$('#fname').css('background-color','#f2dede');
				$('#fname').css('color','#a94442');
				$('#fname').css('border-color','#ebccd1');					
			}

			if(lname == "")
			{
				$('#lname').css('background-color','#f2dede');
				$('#lname').css('color','#a94442');
				$('#lname').css('border-color','#ebccd1');							
			}

			if(captcha == "")
			{
				$('#captcha').css('background-color','#f2dede');
				$('#captcha').css('color','#a94442');
				$('#captcha').css('border-color','#ebccd1');					
			}
		}
	});

	function isValidEmailAddress(emailAddress) {
	    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
	    return pattern.test(emailAddress);
	};

	$('#username').on('focus',function(){
		$('#username').css('background-color','#FFF');
		$('#username').css('color','#333');
		$('#username').css('border-color','');
	});

	$('#password').on('focus',function(){
		$('#password').css('background-color','#FFF');
		$('#password').css('color','#333');
		$('#password').css('border-color','');		
	});

	$('#fname').on('focus',function(){
		$('#fname').css('background-color','#FFF');
		$('#fname').css('color','#333');
		$('#fname').css('border-color','');
	});

	$('#lname').on('focus',function(){
		$('#lname').css('background-color','#FFF');
		$('#lname').css('color','#333');
		$('#lname').css('border-color','');		
	});

	$('#email').on('focus',function(){
		$('#email').css('background-color','#FFF');
		$('#email').css('color','#333');
		$('#email').css('border-color','');		
	});

	$('#captcha').on('focus',function(){
		$('#captcha').css('background-color','#FFF');
		$('#captcha').css('color','#333');
		$('#captcha').css('border-color','');		
	});

	$('#confirm-password').on('focus',function(){
		$('#confirm-password').css('background-color','#FFF');
		$('#confirm-password').css('color','#333');
		$('#confirm-password').css('border-color','');		
	});

});