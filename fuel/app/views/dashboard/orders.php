                <input type = "hidden" id = "hidden-page" value = "orders-nav"/>

                <!-- Page Heading -->
                <div class="row" style = "margin-left:0px;margin-right:0px">
                    <div class="col-lg-12" style = "padding:0px">
                        <h1 class="page-header">
                            Orders
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


                <div class = "row" style = "margin-left:0px;margin-right:0px">

                    <table id = "blog-table" class = "table table-bordered">

                        <thead style = "color:#221517;background-color:#FFFFFF">
                            <th>Reference No.</th>
                            <th>Name</th>
                            <th>Notes</th>
                            <th>Total Amount</th>
                            <th>Details</th>
                        </thead>                            

                        <tbody>
                            <?php foreach($orders as $order):?>
                                <tr>
                                    <td><?php echo $order['reference_no'];?></td>
                                    <td><?php echo $order['fname'].'&nbsp;'.$order['lname'];?></td>
                                    <td><?php echo $order['notes'];?></td>
                                    <td>&#8369;&nbsp;<?php echo number_format($order['total'],'2','.','');;?></td>
                                    <td>
                                        <a href="<?php echo Uri::base()."dashboard/order_details/".$order['id'];?>"><i class="fa fa-history"></i></a>
                                    </td>
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