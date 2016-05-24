<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Project</title>
	<?php echo Asset::js('register.js'); ?>
	<?php echo Asset::css('bootstrap.min.css'); ?>
	<?php echo Asset::css('front-style.css'); ?>

	<?php echo Asset::js('dashboard/jquery.js'); ?>
	<?php echo Asset::js('bootstrap.min.js'); ?>	
</head>
<body>

	<header id = "register-id">
    	<a href = "<?php echo Uri::base();?>">	
			<span class = "header-the-text">Rustans</span>
            <span class = "header-urban-text">Shopping Cart</span>
      	</a>	
	</header>

	<div class="container">

    			<form class = "form-horizontal" action = "<?php echo Uri::base()."register";?>" method = "POST" id = "form-register">
    				<legend>Registration</legend>
    				<input type = "hidden" id = "hidden-code" value = "<?php echo Session::get('code');?>" />
				 		<div class = "form-group">
				 			<div class = "col-sm-10 col-sm-offset-2">
	 							<?php if($message != ""):?>
	 								<div class="alert alert-danger" role="alert"> 
	 									<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
	 									<strong>Opps!</strong> <?php echo $message;?>
	 								</div>
	 							<?php endif;?>
				 			</div>
				 		</div>
				 		<div class="form-group">
				 			<label class = "col-sm-2 control-label">Username</label>
				    		<div class="col-sm-10">
				      			<input type="text"  placeholder="Username" id = "username" name = "username" class = "form-control" />
				    		</div>
				  		</div>

				 		<div class="form-group">
				 			<label class = "col-sm-2 control-label">Password</label>
				    		<div class="col-sm-10">
				      			<input type="password"  placeholder="Password" id = "password" name = "password" class = "form-control" />
				    		</div>
				  		</div>				  						  				  		

				 		<div class="form-group">
				 			<label class = "col-sm-2 control-label">Confirm Password</label>
				    		<div class="col-sm-10">
				      			<input type="password"  placeholder="Confirm Password" id = "confirm-password" name = "confirm-password" class = "form-control" />
				    		</div>
				  		</div>	

				 		<div class="form-group">
				 			<label class = "col-sm-2 control-label">Email</label>
				    		<div class="col-sm-10">
				      			<input type="email"  placeholder="Email" id = "email" name = "email" class = "form-control" />
				    		</div>
				  		</div>		

				 		<div class="form-group">
				 			<label class = "col-sm-2 control-label">First Name</label>
				    		<div class="col-sm-10">
				      			<input type="text"  placeholder="First Name" id = "fname" name = "fname" class = "form-control" />
				    		</div>
				  		</div>	

				 		<div class="form-group">
				 			<label class = "col-sm-2 control-label">Last Name</label>
				    		<div class="col-sm-10">
				      			<input type="text"  placeholder="Last Name" id = "lname" name = "lname" class = "form-control" />
				    		</div>
				  		</div>		

				 		<div class="form-group">
				 			<label class = "col-sm-2 control-label">Captcha</label>
				    		<div class="col-sm-10">
				    			<img src = "<?php echo Uri::base(false)."register/captcha";?>" style = "padding:5px"/>
				    			<input type = "text" id = "captcha" name = "captcha" class = "form-control" value = "" />
				    			<input type = "submit" class = "form-control btn btn-primary" style = "margin-top:20px" id = "register-submit">
				    		</div>
				  		</div>	



	 			</form>



	</div>

	<script type = "text/javascript">
		var base_url = "<?php echo Uri::base()?>";
	</script>


</body>
</html>
