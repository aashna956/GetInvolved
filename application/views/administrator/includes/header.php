<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?=($title)?$title:'Get Involved'?></title>

    <!-- Bootstrap core CSS -->

    <link href="<?=base_url()?>css/administrator/bootstrap.min.css" rel="stylesheet">

    <link href="<?=base_url()?>fonts/administrator/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=base_url()?>css/administrator/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="<?=base_url()?>css/administrator/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/administrator/maps/jquery-jvectormap-2.0.1.css" />
    <link href="<?=base_url()?>css/administrator/icheck/flat/green.css" rel="stylesheet" />
    <link href="<?=base_url()?>css/administrator/floatexamples.css" rel="stylesheet" type="text/css" />

    <script src="<?=base_url()?>js/administrator/jquery.min.js"></script>
    <script src="<?=base_url()?>js/administrator/nprogress.js"></script>
    <script>
        NProgress.start();
    </script>
    
    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>


<body class="nav-md">
	<style>
	.notification-bar.error {

    -webkit-animation-duration: 1s;

    -moz-animation-duration: 1s;

    -o-animation-duration: 1s;

    animation-duration: 1s;

    -webkit-animation-fill-mode: both;

    -moz-animation-fill-mode: both;

    -o-animation-fill-mode: both;

    animation-fill-mode: both;

    -webkit-animation-name: slideInDown;

    animation-name: slideInDown;

    z-index: 100000;

    background: rgba(255, 87, 107, .95);

    top: 0px!important;

    left: 0px;

}

.notification-bar {

    -webkit-animation-duration: 1s;

    -moz-animation-duration: 1s;

    -o-animation-duration: 1s;

    animation-duration: 1s;

    -webkit-animation-fill-mode: both;

    -moz-animation-fill-mode: both;

    -o-animation-fill-mode: both;

    animation-fill-mode: both;

    -webkit-animation-name: slideOutUp;

    animation-name: slideOutUp;

    position: fixed;

    z-index: 10000;

    padding: 0.5em .5em .5em 3em;

    color: white;

    width: 100%;

    color: #fff;

}

.error {

    border: 2px solid #ff576b;

}
	
	</style>
	
	<div class="notification-bar error" style="display:none;"></div>
	
	
	<?php if($error != '') { ?>

			<div class="notification-bar error">
				<script>setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);</script>
				<?php echo $error;?>
			</div>
			
	<?php } ?>

    <div class="container body">


        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="<?=base_url()?>administrator/index" class="site_title"><i class="fa fa-paw"></i> <span>Get Involved!</span></a>
                    </div>
                    <div class="clearfix"></div>

                    
                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            <ul class="nav side-menu">
                                <li>
									<a href="<?=base_url()?>administrator/index"><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li>
											<a href="<?=base_url()?>administrator/index">Dashboard</a>
                                        </li>
                                        
                                    </ul>
                                </li>
								
								<li>
									<a href="<?=base_url()?>administrator/sliders"><i class="fa fa-edit"></i> Sliders <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu" style="display: none">
										<li>
											<a href="<?=base_url()?>administrator/sliders">Listing</a>
										</li>
										<li>
											<a href="<?=base_url()?>administrator/slider_new">Add Slider Image</a>
										</li>
									</ul>
                                </li>
								
								<li>
									<a href="<?=base_url()?>administrator/pages"><i class="fa fa-edit"></i> Pages <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu" style="display: none">
										<li>
											<a href="<?=base_url()?>administrator/pages">Pages</a>
										</li>
										<li>
											<a href="<?=base_url()?>administrator/pages_add">Add Page</a>
										</li>
									</ul>
                                </li>
								<li>
									<a href="<?=base_url()?>administrator/categories"><i class="fa fa-edit"></i> Categories <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu" style="display: none">
										<li>
											<a href="<?=base_url()?>administrator/categories">Categories</a>
										</li>
										<li>
											<a href="<?=base_url()?>administrator/categories_add">Add Page</a>
										</li>
									</ul>
                                </li>
								<li>
									<a><i class="fa fa-windows"></i> Users <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li>
											<a href="<?=base_url()?>administrator/users">Detials</a>
                                        </li>
										
										<li>
											<a href="<?=base_url()?>administrator/causes">Causes</a>
                                        </li>
										
										<li>
											<a href="<?=base_url()?>administrator/abusive">Report Abusive</a>
                                        </li>
										
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                    <!-- /sidebar menu -->

                    
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    My Account
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    
                                    <li><a href="<?=base_url()?>administrator/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>

                            </ul>
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->