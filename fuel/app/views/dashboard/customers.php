                <input type = "hidden" id = "hidden-page" value = "customers-nav"/>

                <!-- Page Heading -->
                <div class="row" style = "margin-left:0px;margin-right:0px">
                    <div class="col-lg-12" style = "padding:0px">
                        <h1 class="page-header">
                            Customers
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
                            <th>ID</th>
                            <th>Username</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                        </thead>                            

                        <tbody>
                            <?php foreach($entry as $post):?>
                                <tr>
                                    <td><?php echo $post->id;?></td>
                                    <td><?php echo $post->username;?></td>
                                    <td><?php echo $post->fname;?></td>
                                    <td><?php echo $post->lname;?></td>
                                    <td><?php echo $post->email;?></td>
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