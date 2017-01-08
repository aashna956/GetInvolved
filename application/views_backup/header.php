<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?=($title)?$title:'Get Involved'?></title>
	<!-- core CSS -->
    <link href="<?=base_url()?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=base_url()?>css/animate.min.css" rel="stylesheet">
    <link href="<?=base_url()?>css/owl.carousel.css" rel="stylesheet">
    <link href="<?=base_url()?>css/owl.transitions.css" rel="stylesheet">
    <link href="<?=base_url()?>css/prettyPhoto.css" rel="stylesheet">
    <link href="<?=base_url()?>css/main.css" rel="stylesheet">
    <link href="<?=base_url()?>css/responsive.css" rel="stylesheet">
	<link href="<?=base_url()?>css/custom1.css" rel="stylesheet">
	<link href="<?=base_url()?>css/my_custom.css" rel="stylesheet">
	
	<link href="<?=base_url()?>css/font-awesome.min.css" rel="stylesheet">
	<link href="<?=base_url()?>css/font-awesome.css" rel="stylesheet">
	
	
    <!--[if lt IE 9]>
    <script src="<?=base_url()?>js/html5shiv.js"></script>
    <script src="<?=base_url()?>js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="<?=base_url()?>images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=base_url()?>images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=base_url()?>images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=base_url()?>images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?=base_url()?>images/ico/apple-touch-icon-57-precomposed.png">
	
	<link href="<?=base_url()?>gall/blue.css" rel="stylesheet" type="text/css" media="all" />

	<!-- start plugins -->
	<script src="<?=base_url()?>js/jquery.js"></script>
	<!--menu-->
			<link rel="stylesheet" href="<?=base_url()?>css/styles.css">
			<!--<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>-->
			<script src="<?=base_url()?>js/script.js"></script>
			
	<!--menu_end-->	
</head><!--/head-->

<body id="home" class="homepage">
<div class="notification-bar error" style="display:none;"></div>

<?php
	if($msg && !empty($msg))
	{
		?>
			<script>
				$(".notification-bar").html('You are a Owner of this Cause.'); 
				$(".notification-bar").css('display','block'); 
				setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
				setTimeout(function() { window.location.href = "<?=base_url()?>"; }, 3000);
			</script>
		<?php
	}

?>


    <header id="header">
        <nav id="main-menu" class="navbar navbar-default navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?=base_url()?>"><img src="<?=base_url()?>images/logo.png" alt="logo"></a>
                </div>
				
                <div id="cssmenu" class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="scroll"><a href="#home">HOME</a></li>
						<li class="scroll"><a href="<?=base_url()?>#aboutus">ABOUT US</a></li>
                        <li class="scroll"><a href="#how_it_work">HOW IT WORKS</a></li>
                        <li class="scroll"><a href="#portfolio">WALKABOUT</a></li>
                        <li class="scroll"><a href="#about">GALLERY</a></li>
						<?php
							if (($this -> session -> userdata('user_id') == "")) 
							{
						?>
								<li class="scroll">
									<a href="#get-in-touch" style="border-right:none;">LOGIN</a>
								</li>                        
						<?php
							}
							else
							{
						?>
								<li class="scroll">
									<a href="javascript:" style="border-right:none;">My Account</a>
									<ul>
										<li><a href="<?=base_url()?>causes/add">Causes</a></li>
										<li><a href="<?=base_url()?>user/profile">Update Profile</a></li>
										<li><a href="<?=base_url()?>user/timeline">Timeline</a></li>
										<li><a href="<?=base_url()?>home/logout">Logout</a></li>
									</ul>
								</li>                        
						<?php
							}
						?>
                        
                    </ul>
                </div>
				
			
				
				
				
            </div><!--/.container-->
        </nav><!--/nav-->
    </header><!--/header-->
