<!DOCTYPE html>
<html>
    
    <?php echo View::forge('template/head'); ?>

<body>

    <?php echo View::forge('template/header'); ?>

    <div class = "container" style = "margin-top:95px;margin-bottom:80px">

                <div class = "row">
                    <?php if($confirmation != ""):?>
                        <div class="alert alert-success" role="alert">
                            <strong>Password Changed</strong>
                        </div>
                    <?php endif;?>
                    <form role ="form" class = "form-horizontal" action = "<?php echo Uri::base().'cart/change_password';?>" method = "POST" id = "change-form">
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


    </div>


                <script type = "text/javascript" charset="utf-8">
                    $(function(){

                        $('#profile-nav').addClass('isactive');
                        $('#prof-a').addClass('isactive-a');

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

</body>
</html>
