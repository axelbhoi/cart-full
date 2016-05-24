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

        <?php if($thankyou != ""):?>
            <div class="alert alert-success" role="alert">
                <strong>Thank You for using our service!</strong>
            </div>
        <?php endif;?>

        <div class="table-responsive">

                <table class="table" id = "check-out-table">
                    <thead>
                      <tr>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Available Stock</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th></th>
                      </tr>
                    </thead>

                    <tbody>
                        <?php if($items->count()):?>
                            <?php $total = 0; $none = 0; foreach ($items as $item):?>
                                <?php 
                                    $total = $total + ($item['quantity'] * $item['item_price']); 
                                ?>
                                <tr>
                                    <td><?php echo Asset::img('thumb/'.$item['item_thumb'], array('id' => 'thumb','class'=>'img-responsive', 'style'=>''));?></td>
                                    <td><?php echo $item['item_name'];?></td>
                                    <td>
                                            <div class="input-group">
                                                <input original_quantity = "<?php echo $item['quantity'];?>" value = "<?php echo $item['quantity'];?>" name = "quantity[]" id="<?php echo $item['temp_id'].'_input'?>" type="text"  placeholder="" class = "check-out-quantity form-control" style = "width:30%">
                                                <a class = "refresh-btn" href = "" id = "<?php echo $item['temp_id'];?>" quantity = "<?php echo $item['stock'];?>" ><span style = "vertical-align:middle;margin-left:10px"><i class = "fa fa-refresh"></i></span></a>
                                            </div>
                                    </td>
                                    <td><?php echo $item['stock'];?></td>
                                    <td>&#8369;&nbsp;<?php echo $item['item_price'];?></td>
                                    <td>&#8369;&nbsp;<?php echo number_format($item['item_price'] * $item['quantity'],'2','.','');?></td>
                                    <td>
                                        <a href = "<?php echo Uri::base().'checkout/remove/'.$item['temp_id'];?>" id = "1" class = "check-out-remove"><i class = "fa fa-close" style = "color:#FF0000;font-size:18px"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        <?php else: $total = 0; $none = 1;?>
                        <?php endif;?>
                    </tbody>
                </table>

        </div>

        <form action = "<?php echo Uri::base().'checkout'?>" method = "POST" id = "checkout-form" >>
            <div class = "row" style = "padding-bottom:40px;padding-top:40px">
                    <div class="form-group">
                        <label for="username" class="col-sm-2 control-label">Comment</label>
                        <div class="col-sm-10">
                            <textarea class = "form-control" id = "comment" name = "comment" placeholder = "comment" style = "resize:none;height:150px"></textarea>
                        </div>
                    </div>   
            </div>


            <div class = "row" style = "padding-bottom:40px">
                <div class = "col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <?php if($none == 1):?>
                        <input disabled = "true" type="submit" value ="Confirm Order" id="order-out" class="btn btn-primary" style=""/>
                    <?php else:?>
                        <input type="submit" value ="Confirm Order" id="order-out" class="btn btn-primary" style=""/>
                    <?php endif;?>
                </div>
                <div class = "col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <p class = "pull-right"><span style = "font-weight:bold">Total: </span>
                    <span class = "check-out-total">&#8369;&nbsp;<?php echo number_format($total,'2','.','');?></span></p>
                    <input type = "hidden" name = "total_amount" value = "<?php echo $total;?>" />
                </div>          
            </div>
        </form>

        <form action = "<?php echo Uri::base().'checkout/refresh'?>" method = "POST" id = "refresh-form" >
            <input type = "hidden" id = "hidden_temp_id" name = "hidden_temp_id"  />
            <input type = "hidden" id = "hidden_quantity" name = "hidden_quantity"  />
        </form>


        <script type = "text/javascript">
            $('#checkout-nav').addClass('isactive');
        </script>


	</div>

</body>
</html>
