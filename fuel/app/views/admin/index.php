<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Project</title>
	<?php echo Asset::css('bootstrap.min.css'); ?>
	<?php echo Asset::css('front-style.css'); ?>

	<?php echo Asset::js('dashboard/jquery.js'); ?>
	<?php echo Asset::js('bootstrap.min.js'); ?>
</head>
<body>

	<div class="container">

    		<div class = "row" style = "margin-top:10%" align = "center">
              	<span class = "header-urban-text">Admin</span>
    		</div>	
    		<div class = "row">
    			<form class = "form-horizontal" action = "<?php echo Uri::base()."admin";?>" method = "POST" id = "form-post">
	 				<div class="col-md-4 col-md-offset-4">
	 					<div class = "form-group">
	 						<div class = "col-sm-12">
	 							<?php if($message != ""):?>
	 								<div class="alert alert-danger" role="alert"> 
	 									<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
	 									<strong>Opps!</strong> <?php echo $message;?>
	 								</div>
	 							<?php endif;?>
	 						</div>
	 					</div>

				 		<div class="form-group">
				    		<div class="col-sm-12">
			           			<?php echo Asset::img('admin.png', array('id' => 'logo','class'=>'img-circle', 'style'=>'display:block;margin:0 auto;width:30%'));?>
				    		</div>
				  		</div>

				 		<div class="form-group">
				    		<div class="col-sm-12">
				      			<input type="text"  placeholder="Username" id = "username" name = "username" class = "form-control" />
				    		</div>
				  		</div>

				 		<div class="form-group">
				    		<div class="col-sm-12">
				      			<input type="password"  placeholder="Password" id = "password" name = "password" class = "form-control" />
				    		</div>
				  		</div>		

				 		<div class="form-group">
				    		<div class="col-sm-12">
				      			<input type = "submit" value = "Login" class = "form-control btn btn-primary" id = "submit-btn">
				    		</div>
				  		</div>						  						  				  		
	 					
	 				</div>
	 			</form>
    		</div>	

	</div>
	<script type = "text/javascript">
		var base_url = "<?php echo Uri::base()?>";
	</script>
</body>
</html>
