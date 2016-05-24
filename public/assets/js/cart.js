$(document).ready(function(){

		$('.cart-btn').on('click',function(e){
			e.preventDefault();
				console.log($(this).attr('i_src'));
	 			product_id = $(this).attr('i_id');
	 			product_name = $(this).attr('i_name');
	 			product_image = $(this).attr('i_src');
	 			product_price =	$(this).attr('i_price');
	 			product_stock = $(this).attr('i_stock');	
	 			product_remaining = $(this).attr('i_remain');

	 			html_data = 	'<div class = "row">' + 

	 								'<div class = "col-md-4 col-sm-4 col-xs-4">' +
	 									'<img src = "'+product_image+'" class = "img-responsive" id = "item-image" />' +
	 								'</div>' +

	 								'<div class = "col-md-8 col-sm-8 col-xs-8">' +
	 									'<h3 id = "item-name">'+product_name+'</h3>'+
	 									'<div class = "input-group">'+
	 										'<input id = "count-input" name = "count-input" type="text" class="form-control" placeholder="" aria-describedby="basic-addon2">'+
	 										'<span class="input-group-addon" id="basic-addon2">Pc/s</span>' +
	 									'</div>' + 
	 									'<div class = "input-group">'+
	 										'<input type = "hidden" id = "pid" name = "pid" value = "'+product_id+'"  />'+
	 										'<input type = "hidden" id = "remaining" name = "remaining" value = "'+product_remaining+'" />' +
	 										'<input type = "hidden" id = "stock" name = "stock" value = "'+product_stock+'"  />'+
	 										'<span class="input-group-addon" v_stock = "'+product_stock+'" id="basic-addon2">Remaining Stock:'+product_stock+'</span>' +
	 									'</div>' +  									
	 								'</div>' +

	 							'</div>' +

	 							'<div class = "row">' +
	 								'<p style = "text-align:center;font-size:24px">P <span id = "added-price" p_price = '+product_price+' p_id = '+product_id+'>0.00</span></p>'
	 							'</div>';

	 			$('#cart-html').html(html_data);

	 			if(product_remaining == "0")
	 			{
	 				$('#add-btn').prop('disabled', true);
	 				$('#count-input').prop('disabled', true);
	 			}
	 			else
	 			{
	 				$('#add-btn').prop('disabled', false);
	 				$('#count-input').prop('disabled', false);
	 			}

			$('#cart-modal').modal('show');
		});


    	$('#cart-html').on('keydown','#count-input',function(){
	               if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 
	                   	|| event.keyCode == 27 || event.keyCode == 13 
	                    || (event.keyCode == 65 && event.ctrlKey === true) 
	                    || (event.keyCode >= 35 && event.keyCode <= 39)){
	                   	  
	                    return;
	                }else {
	                    // If it's not a number stop the keypress
	                    if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
	                        event.preventDefault(); 
	                    }   
	                }
    	});

    	$('#cart-html').on('keyup','#count-input',function(){

    		if($('#remaining').val() == "")
    		{
	    		if(parseInt($(this).val()) > $('#stock').val())
	    		{
	  				$('#add-btn').prop('disabled', true);
	    		}	
	    		else
	    		{
	    			$('#add-btn').prop('disabled', false);
	    		}
    		}
    		else
    		{
	    		if(parseInt($(this).val()) > $('#remaining').val())
	    		{
	  				$('#add-btn').prop('disabled', true);
	    		}	
	    		else
	    		{
	    			$('#add-btn').prop('disabled', false);
	    		}    			
    		}

				price = parseInt($('#count-input').val()) * $('#added-price').attr('p_price');
				if(isNaN(price))
				{
					$('#added-price').text('0.00');
				}
				else
				{
					$('#added-price').text(price.toFixed(2));
				}	

    	});    	

    	$('#add-btn').on('click',function(e){
    		e.preventDefault();
    		if($('#count-input').val() == "")
    		{
    			alert("Please Input a Value");
    		}
    		else
    		{
    			$('#add-cart-form').submit();
    		}
    	});

    	$('#cart').popover({
    		html: true,
    		placement: 'bottom',
		    content: function() {
		      return $('#popover_content_wrapper').html();
		    }	          		
    	});
	
    	$('.refresh-btn').on('click',function(e){
    		e.preventDefault();
    		//validate 
    		$('#hidden_temp_id').val($(this).attr('id'));
    		$('#hidden_quantity').val($('#'+ $(this).attr('id') +'_input').val());

    		if(parseInt($(this).attr('quantity')) >= parseInt($('#'+ $(this).attr('id') +'_input').val()))
    		{
    			$('#refresh-form').submit();	
    		}
    		else
    		{
    			alert("check stock");
    			$('#'+ $(this).attr('id') +'_input').val($('#'+ $(this).attr('id') +'_input').attr('original_quantity'));
    		}
    		
    	});


});