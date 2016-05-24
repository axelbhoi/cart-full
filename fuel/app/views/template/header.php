<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
            	<?php echo Asset::img('rustans-logo.png', array('style'=>'margin-top:-8px;'));?>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="<?php echo Uri::base()."home";?>" title="Home Page" id = "home-nav">Home</a>
                </li>

                <li>
                    <a href="<?php echo Uri::base()."cart";?>" title="Cart Page" id = "cart-nav">Cart</a>
                </li>

                <li>
                    <a href="<?php echo Uri::base()."checkout";?>" title="Checkout Page" id = "checkout-nav">Checkout</a>
                </li>

                <li>
                    <a href="<?php echo Uri::base()."service";?>" title="Service Page" id = "service-nav">Services</a>
                </li>  

                <li>
                    <a href="<?php echo Uri::base()."careers";?>" title="Careers Page" id = "career-nav">Careers</a>
                </li> 

                <li>
                    <a href="<?php echo Uri::base()."about";?>" title="About Page" id = "about-nav">About Us</a>
                </li>  

                <li>
                    <a href="<?php echo Uri::base()."contacts";?>" title="Contact Page" id = "contacts-nav">Contact Us</a>
                </li>  

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown" id = "profile-nav">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" id = "prof-a"><i class="fa fa-user text-yellow"></i> Account <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo Uri::base()."cart/change_password";?>" title="Password" >Change Password</a>
                        </li>

                        <li>
                            <a href="<?php echo Uri::base()."cart/profile";?>" title="Profile" >View Profile</a>
                        </li>
                    </ul>
                </li>
                <li>
					<a href="<?php echo Uri::base()."logout";?>" ><i class="fa fa-lock"></i> Logout</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
