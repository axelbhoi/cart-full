                <input type = "hidden" id = "hidden-page" value = "orders-nav"/>

                <!-- Page Heading -->
                <div class="row" style = "margin-left:0px;margin-right:0px">
                    <div class="col-lg-12" style = "padding:0px">
                        <h2 class="page-header">
                            Order Details for Reference No. <?php echo $details[0]['reference_no'];?>
                        </h2>
                        <!--
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-fw fa-file"></i>Blogs
                            </li>
                        </ol>
                    	-->
                    </div>
                </div>
                <!-- /.row -->

                <div class = "row">
                    <table class="table">
                        <thead> 
                            <tr>
                                <th>Image</th> 
                                <th>Item Name</th> 
                                <th>Item Price</th> 
                                <th>Quantity</th> 
                                <th>Total Amount </th>
                            </tr> 
                        </thead> 

                        <tfoot>
                            <tr>
                              <th>SUM:</th>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>&#8369;&nbsp;<?php echo number_format($total,'2','.','');?></td>
                            </tr>
                        </tfoot>

                        <tbody> 
                            <?php foreach($details as $detail):?>
                                <tr> 
                                    <th scope="row">
                                        <?php echo Asset::img('thumb/'.$detail['image_thumb'], array('id' => 'thumb','class'=>'img-responsive', 'style'=>'margin: 0 auto;'));?>
                                    </th> 
                                    <td><?php echo $detail['name'];?></td> 
                                    <td>&#8369;&nbsp;<?php echo number_format($detail['item_price'],'2','.','')?></td> 
                                    <td><?php echo $detail['quantity'];?></td> 
                                    <td>&#8369;&nbsp;<?php echo number_format(intval($detail['item_price']) * intval($detail['quantity']),'2','.','')?></td>
                                </tr> 
                            <?php endforeach;?>
                        </tbody>
                    </table>

                </div>

                <script type = "text/javascript" charset="utf-8">
                    $(function(){
                        $('#blog-table').dataTable();                       
                    
                        var hidden = $('#hidden-page').val();

                        $('#'+ hidden).addClass('active');
                    });


               </script>