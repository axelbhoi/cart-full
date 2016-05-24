				<input type = "hidden" id = "hidden-page" value = "items-nav"/>

                <!-- Page Heading -->
				<div class="row" style="margin-left:0px;margin-right:0px">
                    <div class="col-lg-12" style="padding:0px">
                        <h1 class="page-header">
                            Items <small><a href="<?php echo Uri::base()."dashboard/addItem";?>" class="btn btn-default" id="add-portfolio"><i class="fa fa-plus"></i> Add Item</a></small>
                        </h1>

                    </div>
                </div>
                <!-- /.row -->

                <div class = "row" style = "margin-left:0px;margin-right:0px">

                    <table id = "blog-table" class = "table table-bordered">

                        <thead style = "color:#221517;background-color:#FFFFFF">
                            <th>Item Image</th>
                            <th>Item Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Options</th>
                        </thead>                            

                        <tbody>
                            <?php foreach($entry as $post):?>
                                <tr>
                                    <td><?php echo Asset::img('thumb/'.$post->item_thumb, array('id' => 'thumb','class'=>'', 'style'=>''));?></td>
                                    <td><?php echo $post->item_name;?></td>
                                    <td><?php echo $post->item_description;?></td>
                                    <td><?php echo $post->item_price;?></td>
                                    <td><?php echo $post->quantity;?></td>
                                    <td>
                                        <?php if($post->status == "active"):?>
                                            <span style = "color:#00cc00"><?php echo $post->status;?></span>
                                        <?php else:?>
                                            <span style = "color:#ff0000"><?php echo $post->status;?></span>
                                        <?php endif;?>
                                    </td>
                                    <td>
                                            <a href = "<?php echo Uri::base()."dashboard/editItem/".$post->id;?>" ><i class = "fa fa-edit"></i></a>
                                            <!--
                                                <a href = "<?php echo Uri::base()."dashboard/index/".$post->id;?>" class = "delete-item"><i class = "fa fa-trash"></i></a>                  
                                            -->
                                            <?php if($post->status == "active"):?>
                                                <a href = "<?php echo Uri::base()."dashboard/index/".$post->id;?>" class = "delete-item" type = "delete"><i class = "fa fa-close"></i></a>                  
                                            <?php else:?>
                                                <a href = "<?php echo Uri::base()."dashboard/index/".$post->id;?>" class = "delete-item" type = "activate"><i class = "fa fa-check"></i></a>                  
                                            <?php endif;?>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>

                    </table>

                </div>


        <div class="modal fade" id = "delete-item">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header" style = "background-color:#101010;color:#FFFFFF">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id = "delete-type"></h4>
              </div>
              <div class="modal-body">
                <form action = "" method = "POST" id = "deleteForm" />
                    <input type = "hidden" name = "hiddenPost" value = "" id = "hiddenPost"/>
                    <div class="alert alert-warning alert-dismissible" role="alert"> 
                        <strong>Warning!</strong> <span id = "warning-tag"></span> 
                    </div>
                </form>
              </div>
              <div class="modal-footer">
                <a class = "btn btn-primary" s-type = "" id = "delete-item-save"></a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->  

 

                <script type = "text/javascript" charset="utf-8">
                    $(function(){               
                        
                        $('#blog-table').dataTable(); 

                        var hidden = $('#hidden-page').val();

                        $('#'+ hidden).addClass('active');

                        $(document).on('click','.delete-item',function(e){
                            e.preventDefault();
                            $('#deleteForm').attr('action',$(this).attr('href'));

                            if($(this).attr('type') == "delete")
                            {   
                                $('#delete-type').text('Deactivate Item');
                                $('#warning-tag').text('Are you sure you want to deactivate this item?.');
                                $('#delete-item-save').text('Deactivate');
                                $('#hiddenPost').val('delete');
                            }
                            else
                            {
                                $('#delete-type').text('Activate Item');
                                $('#warning-tag').text('Are you sure you want to activate this item?.');
                                $('#delete-item-save').text('Activate');
                                $('#hiddenPost').val('activate');
                            }

                            $('#delete-item').modal('show');
                        });

     
                    
                        $('#delete-item-save').click(function(e){
                            e.preventDefault();

                            $('#deleteForm').submit();
                        });
                    });


               </script>