			<input type = "hidden" id = "hidden-page" value = "items-nav"/>

                 <!-- Page Heading -->
                <div class="row" style = "margin-left:0px;margin-right:0px">
                    <div class="col-lg-12" style = "padding:0px">
                        <h1 class="page-header">
                            Edit Item
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

                <div class = "row">
                    <form class = "form-horizontal" role="form" method = "POST" action = "<?php echo Uri::base()."dashboard/editItem/".$entry->id;;?>" id = "cover-form" enctype="multipart/form-data">    

                        <div class="form-group">
                            <label class = "col-sm-2 control-label">Item Name</label>
                            <div class="col-sm-10">
                                <input type="text"  placeholder="Item Name" id = "item_name" name = "item_name" class = "form-control" value = "<?php echo $entry->item_name;?>"/>
                            </div>
                            <input type = "hidden" name = "hidden_item_id" value = "<?php echo $entry->id;?>" />
                            <input type = "hidden" name = "hidden_item_thumb" value = "<?php echo $entry->item_thumb;?>"/>
                            <input type = "hidden" name = "hidden_item_image" value = "<?php echo $entry->item_image;?>"/>
                        </div>

                        <div class="form-group">
                            <label class = "col-sm-2 control-label">Item Description</label>
                            <div class="col-sm-10">
                                <input type="text"  placeholder="Item Description" id = "item_description" name = "item_description" class = "form-control" value = "<?php echo $entry->item_description;?>" />
                            </div>
                        </div>   

                        <div class="form-group">
                            <label class = "col-sm-2 control-label">Item Price</label>
                            <div class="col-sm-10">
                                <input type="text"  placeholder="Item Price" id = "item_price" name = "item_price" class = "form-control" value = "<?php echo $entry->item_price;?>" />
                            </div>
                        </div>   

                        <div class="form-group">
                            <label class = "col-sm-2 control-label">Quantity</label>
                            <div class="col-sm-10">
                                <input type="text"  placeholder="Quantity" id = "quantity" name = "quantity" class = "form-control" value = "<?php echo $entry->quantity;?>"/>
                                <span id="errmsg"></span>                            
                            </div>
                        </div>  


                        <div class="form-group">
                            <label class = "col-sm-2 control-label">Image</label>
                            <div class="col-sm-10">
                               <input type = "file" name = "userfile" class = "form-horizontal" size = "20"/>
                            </div>
                        </div>  

                        <input type = "submit" class = "form-control btn btn-primary" id = "submit-btn" value = "Submit" />

                    </form>
                </div>

                <script type = "text/javascript" charset="utf-8">
                    $(function(){               
                        var hidden = $('#hidden-page').val();

                        $('#'+ hidden).addClass('active');


                    });


               </script>    