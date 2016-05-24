<!DOCTYPE html>
<html>
	
	<?php echo View::forge('template/head'); ?>

<body>

	<?php echo View::forge('template/header'); ?>

	<div class = "row" style = "margin-left:0px;margin-right:0px;margin-top:95px">

		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
			    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
			</ol>

			<!-- Wrapper for slides -->
		  	<div class="carousel-inner" role="listbox">
			    <div class="item active">
			      	<?php echo Asset::img('mens.jpg', array('id' => 'logo','class'=>'img-responsive', 'style'=>'margin:0 auto;width:100%'));?>
			    </div>
			    <div class="item">
			      <?php echo Asset::img('children.jpg', array('id' => 'logo','class'=>'img-responsive', 'style'=>'margin:0 auto;width:100%'));?>
			    </div>
	
			</div>


		</div>


	</div>

	<div class = "container">
		<div class = "row" style = "background-color:#eee;padding:20px">
			<h3>RUSTANS LIFE STYLE</h3>
		</div>

		<div class = "row" style = "padding:20px">
			<?php echo Asset::img('passport_poster_small.jpg', array('id' => 'logo','class'=>'img-responsive', 'style'=>'margin:0 auto;width:50%'));?>
		</div>

	</div>

		<script type = "text/javascript">
			$('#home-nav').addClass('isactive');
		</script>

</body>
</html>
