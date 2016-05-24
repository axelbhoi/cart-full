<!DOCTYPE html>
<html>
	
	<?php echo View::forge('template/head'); ?>

<body>

	<?php echo View::forge('template/header'); ?>

	<div class = "container" style = "margin-top:95px;margin-bottom:80px">
		
		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			<div class="panel panel-default">
			    <div class="panel-heading" role="tab" id="headingOne">
			  	<h4 class="panel-title">
			       	<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
			         Nursing Station
			        </a>
			  	</h4>
				</div>

			    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
			      <div class="panel-body">
			        Have the comforts of home while shopping. 
			      </div>
			    </div>

			</div>

		  <div class="panel panel-default">
		    <div class="panel-heading" role="tab" id="headingTwo">
		      <h4 class="panel-title">
		        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
		          After Sales Service
		        </a>
		      </h4>
		    </div>
		    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
		      <div class="panel-body">
		      	<p>Enjoy world class services for jewelry, watches and pens at the International Service Center.</p>
		      	<p>The International Service Center is the official service center of the following brands:</p>
		      	
		      	<ul>
		      		<li>Bedat & Co.</li>
		      		<li>Cartier</li>
		      		<li>Montblanc</li>
		      		<li>Piaget</li>
		      		<li>Vacheron Constantin</li>
		      	</ul>

		      	<p>Contact No.: (02) 813-05-61</p>
		      </div>
		    </div>
		  </div>




		<div class="panel panel-default">
		    <div class="panel-heading" role="tab" id="headingThree">
		      <h4 class="panel-title">
		        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
		          Personalize Your Gifts
		        </a>
		      </h4>
		    </div>
		    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
		      <div class="panel-body">
		      	<p>We offer engraving and embroidery for a wide range of merchandise at a minimal cost.</p>
		      </div>
		    </div>
		  </div>
		
		  <div class="panel panel-default">
		    <div class="panel-heading" role="tab" id="headingFour">
		      <h4 class="panel-title">
		        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
		         Gift Wrapping
		        </a>
		      </h4>
		    </div>
		    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
		      <div class="panel-body">
		      	<p> Avail of FREE Rustan's wrapping for all merchandise with a minumum purchase of P300.00 per gift.</p>

		      </div>
		    </div>
		  </div>


		  <div class="panel panel-default">
		    <div class="panel-heading" role="tab" id="headingFive">
		      <h4 class="panel-title">
		        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
		         Valet Parking
		        </a>
		      </h4>
		    </div>
		    <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
		      <div class="panel-body">
		      	<p>Avail of Valet Parking services at Rustan’s Makati. (Free parking for a minumum P4,000.00 purchase)</p>

		      </div>
		    </div>
		  </div>


		  <div class="panel panel-default">
		    <div class="panel-heading" role="tab" id="headingSix">
		      <h4 class="panel-title">
		        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
		         Purchase Assembly Card
		        </a>
		      </h4>
		    </div>
		    <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
		      <div class="panel-body">
		      	<p>Enjoy the convenience of our Purchase Assembly Card, which allows you to PAY ONCE and CLAIM ONCE for all your purchases.</p>

		      </div>
		    </div>
		  </div>

		</div>

	</div>


		<script type = "text/javascript">
			$('#service-nav').addClass('isactive');
		</script>

</body>
</html>
