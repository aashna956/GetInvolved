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
	
	<!--menu-->
			<link rel="stylesheet" href="<?=base_url()?>css/styles.css">
			<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
			<script src="<?=base_url()?>js/script.js"></script>
			
		<!--menu_end-->	
</head><!--/head-->

<body id="home" class="homepage">
<div class="notification-bar error" style="display:none;"></div>
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
                    <a class="navbar-brand" href="index.html"><img src="<?=base_url()?>images/logo.png" alt="logo"></a>
                </div>
				
                <div id="cssmenu" class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="scroll active"><a href="#home">HOME</a></li>
                        <li class="scroll"><a href="#how_it_work">HOW IT WORKS</a></li>
                        <li class="scroll"><a href="#portfolio">WALKABOUT</a></li>
                        <li class="scroll"><a href="#about">GALLERY</a></li>
						<?php
							if (($this -> session -> userdata('user_id') == "")) 
							{
						?>
								<li class="scroll">
									<a href="#get-in-touch">LOGIN</a>
								</li>                        
						<?php
							}
							else
							{
						?>
								<li class="scroll">
									<a href="">My Account</a>
									<ul>
										<li><a href="">Update Profile</a></li>
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

	
	<link rel="stylesheet" href="<?=base_url()?>tab/theme-elements.css">
<link rel="stylesheet" href="<?=base_url()?>tab/default.css">
 

	<section id="" class="ch_bg cause_section">
        <div class="container">
            <div class="page_head_text">
                <h2 class="about_tit text-center wow fadeInDown">Add New Cause</h2>
            </div>
			
			<div class="row">
				<div class="col-md-3">
					<div style="background-color:#333333;">
						<div class="form-group">
							<input type="file" id="exampleInputFile" class="upload_boot">
						</div>
					</div>
					
					<div class="form_right_pannel">
					<div class="checkbox">
						<label>
						  <input type="checkbox"> Remember me
						</label>
					</div>
					
					<div class="checkbox">
						<label>
						  <input type="checkbox"> Remember me
						</label>
					</div>
				
					<div class="checkbox">
						<label>
						  <input type="checkbox"> Remember me
						</label>
					</div>
				
				</div>
				
				</div>
				
				
				<form id="" name="" method="">
					<div class="col-md-9 form_box_all">
		 
						<input type="text" class="login_box2" placeholder="CAUSE TITLE">
						<input type="text" class="login_box2" placeholder="CAUSE DETAILS">
						<input type="text" class="login_box3" placeholder="CITY">
						<input type="text" class="login_box3" placeholder="AREA">
						<input type="text" class="login_box3" placeholder="VOLUNTEERS TO BE MOBILIZED">
		 
						<span class="form_text">START DATE</span>
						<input type="text" class="login_box4" placeholder="DD/MM/YY">
		 
						<span class="form_text">END DATE</span>
						<input type="text" class="login_box4" placeholder="DD/MM/YY"></br>
		 
						<span class="form_text">PHONE NO</span>
						<input type="text" class="login_box5" placeholder="">
		 
						<span class="form_text">MOBILE NO</span>
						<input type="text" class="login_box5" placeholder="">
		 
						<div style="text-align:center;">
							<input type="submit" class="login_box6" value="IGNITE">
						</div>
					</div>
				</form>
		 
			
				<div class="toogle" data-plugin-toggle style="padding-bottom:100px;">
					<section class="toggle">
						<label>Benefits of Home Loan<span class="more_tex">More Detail</span></label>
						<p>
							Tenure of up to 25 years<br>Easy repayment through Equated Monthly Instalments (EMIs)<br>Interest paid is entitled for tax benefit<br>Flexibility of interest rates by option of selecting fixed or floating rate of interest
						</p>
					</section>
                                
                                
                    <section class="toggle">
						<label>Who can borrow Home Loans?<span class="more_tex">More Detail</span></label>
						<p>
                            Salaried Individuals<br>Self-Employed Individuals / Companies<br>Self-Employed Professionals like a lawyer, a doctor, a CA, an architect etc.<br>Minimum age of applicant should be 21 years<br>
						</p>
					</section>
                </div>
			</div>
		</div> 
   </div>
   </section>
<script src="<?=base_url()?>tab/jquery.js"></script>
	<script src="<?=base_url()?>tab/theme.js"></script>
	<script src="<?=base_url()?>tab/theme.init.js"></script>