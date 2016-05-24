<!DOCTYPE html>
<html>
	
	<?php echo View::forge('template/head'); ?>

<body>

	<?php echo View::forge('template/header'); ?>

	<div class="container" style = "margin-top:95px">

        <div class="alert alert-info" role="alert">
            <strong>Attention!</strong>
                <ul>
                    <li> Prices are subject to change.</li>
                    <li> Checkout immediately before the stocks run-out.</li>
                    <li> Items that are out of stock will not be displayed.</li>
                </ul>
        </div>
   
	   <div class = "row">

            <div class = "col-md-5">
                <h3>CART ITEMS</h3>
            </div>

            <div class="col-md-2 col-md-offset-5" style="line-height:50px;text-align:center">
                <a type = "button" id = "cart" data-toggle="popover" >
                    <i class="fa fa-shopping-cart" style="color:#4d79ff;margin-left:5%"></i>
                    <span id="count-cart" style="color:#333"></span>   
                    <span style="color:#333"><?php echo $totalitems;?> ITEM(S)</span>                    
                </a>
            </div>

       </div>	
       
       <hr/>

		<div class="row">
            <?php foreach($items as $item):?>
                <div class="col-md-4 portfolio-item">
                    <h3 style  = "text-align:center"><?php echo $item['item_name'];?></h3>

                    <a href="#">
                        <?php echo Asset::img('items/'.$item['item_image'], array('id' => 'thumb','class'=>'img-responsive', 'style'=>'width:180px;height:165px;margin: 0 auto;'));?>
                    </a>

                    <h4 >&#8369;&nbsp;<?php echo $item['item_price'];?></h4>
                    <a href = "" i_remain = "<?php echo $remaining[$item['id']];?>" i_stock = "<?php echo $item['quantity'];?>"  i_id = "<?php echo $item['id']?>" i_name = "<?php echo $item['item_name'];?>" i_src = "<?php echo Uri::base().'assets/img/items/'.$item['item_image'];?>" i_price = "<?php echo $item['item_price'];?>"  class = "cart-btn"><div class = "circle"><i class="fa fa-shopping-cart"></i></div></a>
                </div>                
            <?php endforeach;?>


        </div>

        <div class = "row" style = "text-align:right;margin-bottom:40px;">
            <?php // fetch a previously forged instance, and render it
            echo Pagination::instance('mypagination')->render();?>
        </div>


        <script type = "text/javascript">
            $('#cart-nav').addClass('isactive');
        </script>


	</div>

    <div id="popover_content_wrapper" style="display: none" >
        <p>Recently Added Order(s)</p>

        <div id = "cart-content">

                <div class = "t-div row" id = "t-div">
                    <?php foreach($temporaries as $tempo):?>
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-4">
                                <?php echo Asset::img('thumb/'.$tempo['item_thumb'], array('id' => 'thumb','class'=>'img-responsive', 'style'=>'margin: 0 auto;'));?>
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-8">
                                <p><?php echo $tempo['item_name']?></p>
                                <p><span><?php echo $tempo['quantity'];?></span> <span>Pc/s.</span> x <span><?php echo $tempo['item_price'];?></span><a href="<?php echo Uri::base().'cart/remove/'.$tempo['temp_id'];?>" class="remove-cart-item"><span class="circle-cart"><i class="fa fa-close"></i></span></a></p>
                            </div>
                        </div>
                    <?php endforeach;?>   
                </div>
                <hr/>
                <div class = "row" style = "text-align:center">
                    <p><span style = "font-weight:bold">Total: </span>&#8369;&nbsp;<span id = "cart-total"><?php echo number_format($total_price,2,'.','');?></span></p>
                </div>
        </div>

            <div class = "row" style = "padding:10px">
                <a href = "<?php echo Uri::base().'checkout';?>" id = "check-out" class = "btn btn-primary" style = "width:90%">Check-out</a>
            </div>

    </div>


        <div class="modal fade" id = "cart-modal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">

                <form action = "<?php echo Uri::current();?>" method = "POST" id = "add-cart-form">
                    <div class = "row" style = "padding:20px" id = "cart-html">

                    </div>
                

                <div class = "row" style = "padding:20px">
                    <input type = "submit" class = "btn btn-primary" id = "add-btn" style = "width:100%" value = "Add to Cart" />
                    <button type = "button" data-dismiss="modal" class = "btn btn-default"  style = "width:100%;margin-top:1%">Close</button>
                    
                </div>

                </form>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->  
</body>
</html>
