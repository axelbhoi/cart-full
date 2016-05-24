                <input type = "hidden" id = "hidden-page" value = "orders-nav"/>

                <!-- Page Heading -->
                <div class="row" style = "margin-left:0px;margin-right:0px">
                    <div class="col-lg-12" style = "padding:0px">
                        <h1 class="page-header">
                            Change Password
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
                <?php if($confirmation != ""):?>
                    <div class="alert alert-success" role="alert">
                        <strong>Password Changed</strong>
                    </div>
                <?php endif;?>
                    <form role ="form" class = "form-horizontal" action = "<?php echo Uri::base().'dashboard/change_password';?>" method = "POST" id = "change-form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">New Password:</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" id="password" name = "password" placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Confirm Password:</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" id="confirm" placeholder="">
                            </div>
                        </div>
                         <div class="form-group"> 
                            <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" class="btn btn-primary" id = "submit-btn">Submit</button>
                            </div>
                        </div>
                    </form>

                </div>


                <script type = "text/javascript" charset="utf-8">
                    $(function(){
                        $('#submit-btn').on('click',function(e){
                            e.preventDefault();

                            if($('#password').val() == $('#confirm').val()  && $('#password').val()!="" && $('#confirm').val()!="")
                            {
                                $('#change-form').submit();
                            }
                            else
                            {
                                if($('#password').val() == "")
                                {
                                    $('#password').css('background-color','#f2dede');
                                    $('#password').css('color','#a94442');
                                    $('#password').css('border-color','#ebccd1');                                           
                                }
                                if($('#confirm').val() == "")
                                {
                                    $('#confirm').css('background-color','#f2dede');
                                    $('#confirm').css('color','#a94442');
                                    $('#confirm').css('border-color','#ebccd1');                                           
                                }
                                if($('#confirm').val() != $('#password').val())
                                {
                                    $('#confirm').css('background-color','#f2dede');
                                    $('#confirm').css('color','#a94442');
                                    $('#confirm').css('border-color','#ebccd1');    
                                    
                                    $('#password').css('background-color','#f2dede');
                                    $('#password').css('color','#a94442');
                                    $('#password').css('border-color','#ebccd1'); 

                                }
                            }
                        });

                        $('#password').on('focus',function(){
                            $('#password').css('background-color','#FFF');
                            $('#password').css('color','#333');
                            $('#password').css('border-color','');      
                        });  
                        
                        $('#confirm').on('focus',function(){
                            $('#confirm').css('background-color','#FFF');
                            $('#confirm').css('color','#333');
                            $('#confirm').css('border-color','');      
                        });                                        
                    });


               </script>