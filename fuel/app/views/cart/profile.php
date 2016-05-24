<!DOCTYPE html>
<html>
	
	<?php echo View::forge('template/head'); ?>

<body>

	<?php echo View::forge('template/header'); ?>

	<div class = "container" style = "margin-top:95px;margin-bottom:80px">

		<?php foreach($profiles as $profile):?>
			<form class="form-horizontal" role="form">
			  	<div class="form-group">
				    <label class="control-label col-sm-2" for="email">Username:</label>
				    <div class="col-sm-10">
				     	<h5><?php echo $profile['username'];?></h5>
				    </div>
			  	</div>


			  	<div class="form-group">
				    <label class="control-label col-sm-2" for="email">Email:</label>
				    <div class="col-sm-10">
				   		<h5><?php echo $profile['email'];?></h5>
				    </div>
			  	</div>

			  	<div class="form-group">
				    <label class="control-label col-sm-2" for="email">First Name:</label>
				    <div class="col-sm-10">
				   		<h5><?php echo $profile['fname'];?></h5>
				    </div>
			  	</div>

			  	<div class="form-group">
				    <label class="control-label col-sm-2" for="email">Last Name:</label>
				    <div class="col-sm-10">
				   		<h5><?php echo $profile['lname'];?></h5>
				    </div>
			  	</div>
			</form>		
		<?php endforeach;?>
	</div>


		<script type = "text/javascript">
			$('#profile-nav').addClass('isactive');
			$('#prof-a').addClass('isactive-a');
		</script>

</body>
</html>
