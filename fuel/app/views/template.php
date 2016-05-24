<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">


    <title><?php echo $title;?></title>
    
    <!-- Bootstrap Core CSS -->
	<?php echo Asset::css('dashboard/bootstrap.css'); ?>
	<?php echo Asset::css('dashboard/dashboard.css'); ?>
	<?php echo Asset::css('dashboard/sb-admin.css'); ?>
	<?php echo Asset::css('dashboard/dataTables.bootstrap.css'); ?>

    <!-- Custom CSS -->
    <?php echo Asset::css('dashboard/jasny-bootstrap.min.css'); ?>

    <!-- Custom Fonts -->
    <?php echo Asset::css('fonts/font-awesome/css/font-awesome.min.css'); ?>
    
	<?php echo Asset::js('dashboard/jquery.js'); ?>

	<?php echo Asset::js('dashboard/jquery.blockUI.js'); ?>

	<?php echo Asset::js('dashboard/jquery.dataTables.min.js'); ?>

	<?php echo Asset::js('dashboard/dataTables.bootstrap.js'); ?>

	<?php echo Asset::js('dashboard/bootstrap.min.js'); ?>

	<?php echo Asset::js('dashboard/jasny-bootstrap.min.js'); ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id = "wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="">Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo Uri::base();?>dashboard/change_password"><i class="fa fa-fw fa-key"></i> Change Pass</a>
                        </li>                        
                        <li>
                            <a href="<?php echo Uri::base();?>logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li id = "items-nav">
                        <a href="<?php echo Uri::base();?>dashboard"><i class="fa fa-fw fa-file"></i> Items</a>
                    </li>

                    <li id = "customers-nav">
                        <a href="<?php echo Uri::base();?>dashboard/customers"><i class="fa fa-fw fa-file"></i> Customers</a>
                    </li>

                    <li id = "orders-nav">
                        <a href="<?php echo Uri::base();?>dashboard/orders"><i class="fa fa-fw fa-file"></i> Orders</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>


	<div class = "container">

        <?php echo $content;?>

	</div>


	<footer>

	</footer>

</div>