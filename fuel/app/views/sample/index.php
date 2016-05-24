<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Project</title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<?php echo Asset::css('front-style.css'); ?>

	<?php echo Asset::js('jquery.min.js'); ?>
	<?php echo Asset::js('bootstrap.min.js'); ?>
</head>
<body>

	<div class="container">
		<h3>test</h3>
		<form role="form" method = "POST" action = "<?php echo Uri::base()."sample";?>" id = "cover-form" enctype="multipart/form-data">    

			<input type = "text" name = "test" value = "test" />

			<input type = "file" name = "userfile" size = "20">

			<input type = "submit" value = "submit"  class = "form-control"/>
		</form>
		
	</div>
	<script type = "text/javascript">
		var base_url = "<?php echo Uri::base()?>";
	</script>
</body>
</html>
