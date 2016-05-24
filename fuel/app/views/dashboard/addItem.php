			<input type = "hidden" id = "hidden-page" value = "items-nav"/>

                 <!-- Page Heading -->
                <div class="row" style = "margin-left:0px;margin-right:0px">
                    <div class="col-lg-12" style = "padding:0px">
                        <h1 class="page-header">
                            Add Items
                        </h1>
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
                    <form class = "form-horizontal" role="form" method = "POST" action = "<?php echo Uri::base()."dashboard/addItem";?>" id = "cover-form" enctype="multipart/form-data">    
                            <?php if($message):?>    
                                <?php if($state == 1):?>
                                    <div class="alert alert-success" role="alert"> 
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                                        <strong>Hiya!</strong> <?php echo $message;?>
                                    </div>
                                <?php else:?>
                                    <div class="alert alert-danger" role="alert"> 
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                                        <strong>Opps!</strong> <?php echo $message;?>
                                    </div>                            
                                <?php endif;?>
                            <?php endif;?>
                        <div class="form-group">
                            <label class = "col-sm-2 control-label">Item Name</label>
                            <div class="col-sm-10">
                                <input type="text"  placeholder="Item Name" id = "item_name" name = "item_name" class = "form-control" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class = "col-sm-2 control-label">Item Description</label>
                            <div class="col-sm-10">
                                <input type="text"  placeholder="Item Description" id = "item_description" name = "item_description" class = "form-control" />
                            </div>
                        </div>   

                        <div class="form-group">
                            <label class = "col-sm-2 control-label">Item Price</label>
                            <div class="col-sm-10">
                                <input type="text"  placeholder="Item Price" id = "item_price" name = "item_price" class = "form-control" />
                            </div>
                        </div>   

                        <div class="form-group">
                            <label class = "col-sm-2 control-label">Quantity</label>
                            <div class="col-sm-10">
                                <input type="text"  placeholder="Quantity" id = "quantity" name = "quantity" class = "form-control" />
                                <span id="errmsg"></span>                            
                            </div>
                        </div>  


                        <div class="form-group">
                            <label class = "col-sm-2 control-label">Image</label>
                            <div class="col-sm-10">
                               <input type = "file" name = "userfile" class = "form-horizontal" size = "20"/>
                            </div>
                        </div>  

                        <input type = "submit" class = "form-control btn btn-primary" id = "submit-btn" />

                    </form>
                </div>


                <script type = "text/javascript" charset="utf-8">
                    $(function(){               
                        var hidden = $('#hidden-page').val();

                        $('#'+ hidden).addClass('active');

                        $('#submit-btn').on('click',function(e){
                            e.preventDefault();

                            var itemName = $('#item_name').val();
                            var itemDescription = $('#item_description').val();
                            var itemPrice = $('#item_price').val();
                            var quantity = $('#quantity').val();
   
                            if( (itemName != "") && (itemDescription != "") && (itemPrice != "") && (quantity != "") )
                            {
                                $('#cover-form').submit();
                            }
                            else
                            {
                                if(itemName == "")
                                {
                                    $('#item_name').css('background-color','#f2dede');
                                    $('#item_name').css('color','#a94442');
                                    $('#item_name').css('border-color','#ebccd1');                                    
                                }
                                if(itemDescription == "")
                                {
                                    $('#item_description').css('background-color','#f2dede');
                                    $('#item_description').css('color','#a94442');
                                    $('#item_description').css('border-color','#ebccd1');                                       
                                }
                                if(itemPrice == "")
                                {
                                    $('#item_price').css('background-color','#f2dede');
                                    $('#item_price').css('color','#a94442');
                                    $('#item_price').css('border-color','#ebccd1');  
                                }
                                if(quantity == "")
                                {
                                    $('#quantity').css('background-color','#f2dede');
                                    $('#quantity').css('color','#a94442');
                                    $('#quantity').css('border-color','#ebccd1');                                      
                                }
                            }
                        });

                          $("#quantity").keypress(function (e) {
                             //if the letter is not digit then display error and don't type anything
                             if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                                //display error message
                                return false;
                            }
                           });

                        $('#item_price').keypress(function(event) {
                          if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                            event.preventDefault();
                          }
                        });
                    });


               </script>    