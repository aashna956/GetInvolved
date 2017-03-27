<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<meta name="appName" content="chrome">
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
	
	<link rel="Shortcut Icon" href="<?=base_url()?>images/favicon1.ico" type="image/x-icon" />
    <!--[if lt IE 9]>
    <script src="<?=base_url()?>js/html5shiv.js"></script>
    <script src="<?=base_url()?>js/respond.min.js"></script>
    <![endif]-->       
    <!--<link rel="shortcut icon" href="<?=base_url()?>images/ico/favicon.ico">-->
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
			<style>
			#main-menu.navbar-default .navbar-nav > li > a.active
			{
				color:#BD1818 !important;
			}
			
			::-webkit-input-placeholder { background: #ccc; color:black; }
			:-moz-placeholder { background: #ccc; color:black; }
			::-moz-placeholder { background: #ccc; color:black; }
			:-ms-input-placeholder { background: #ccc; color:black;}
			
			textarea::-webkit-input-placeholder { background: #ccc!important; color: rgb(98, 98, 98)!important; font-weight: normal;}
			textarea:-moz-placeholder { background: #ccc!important; color: rgb(98, 98, 98)!important; font-weight: normal;}
			textarea::-moz-placeholder { background: #ccc!important; color: rgb(98, 98, 98)!important; font-weight: normal;}
			textarea:-ms-input-placeholder { background: #ccc!important; color: rgb(98, 98, 98)!important; font-weight: normal;}
			</style>
	<!--menu_end-->	
</head><!--/head-->

<body id="home" class="homepage">
<div class="notification-bar error" style="display:none;"></div>

<div class="pageloadeing">&nbsp;</div>

<div id="openModalpopup" class="mb_elegantModal" style="display: none;">
	<div class="animated  swing">
			
		<a title="Close" class="mb_elegantModalclose" onClick="return popup_close()">X</a>
		<h2 style="text-align: center;">
			<img src="<?=base_url()?>images/logo.png" />
		</h2>
		
		<div class="popup_container">
        
            
            <div class="popup_container_right ptext">
            	
            </div>
        	<div style="clear:both"></div>
            <div class="popup_container_bottom">
            	<a href="" class="pc1">DECLINE</a>
            	<a href="" class="pc2">ACCEPT</a>
            </div>
        
        </div>
		
		<div style="clear:both"></div>
	</div>
	
</div>


<div id="openModalpopup1" class="mb_elegantModal" style="display: none;">
	<div class="animated  swing">
			
		<a title="Close" class="mb_elegantModalclose" onClick="return popup_close1()">X</a>
		<h2 style="text-align: center;">
			<img src="<?=base_url()?>images/logo.png" />
		</h2>
		
		<div class="popup_container">
        
        	
            <div class="popup_container_right ptext1">
            	
            </div>
        	<div style="clear:both"></div>
        
        </div>
		
		<div style="clear:both"></div>
	</div>
	
</div>

<script>
	function popup_close()
	{
		$('#openModalpopup').css('display','none');
		return false;
	}
	
	function popup_close1()
	{
		$('#openModalpopup1').css('display','none');
		return false;
	}
</script>

<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/default.include.a29efb.css" media="all">

<?php
	if($msg && !empty($msg))
	{
		?>
			<script>

				$(".ptext1").html('You are the Admin of this cause'); 
				$("#openModalpopup1").css('display','block'); 
				setTimeout(function() { $("#openModalpopup1").fadeOut(1500); }, 5000);				
				setTimeout(function() { window.location.href = "<?=base_url()?>"; }, 3000);
			</script>
		<?php
	}

?>

<?php
	if($msg123 && !empty($msg123))
	{
		?>
			<script>

				$(".ptext1").html('<?=$msg123?>'); 
				$("#openModalpopup1").css('display','block'); 
				setTimeout(function() { $("#openModalpopup1").fadeOut(1500); }, 5000);				
				setTimeout(function() { window.location.href = "<?=base_url()?>"; }, 3000);
			</script>
		<?php
	}

?>

<?php
	if($msg1 && !empty($msg1))
	{
		?>
			<script>

				$(".ptext1").html('<?=$msg1?>'); 
				$("#openModalpopup1").css('display','block'); 
				setTimeout(function() { $("#openModalpopup1").fadeOut(1500); }, 5000);				
				setTimeout(function() { window.location.href = "<?=base_url()?>"; }, 5000);
			</script>
		<?php
	}

?>


    <header id="header">
        <nav id="main-menu" class="navbar navbar-default navbar-fixed-top" role="banner">
            <div class="container mymenu">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?=base_url()?>"><img src="<?=base_url()?>images/logo.png" alt="logo"></a>
                </div>
				<?php
				if($this->session->userdata('user_id') && $this->session->userdata('user_id')!='')
				{
			
			?>
				<div class="fb_notification">
					<ul class="notification_head">
						<li onclick="show_panel()" id="0" class="message_button" title="Comments">
							&nbsp;
							<?php
								if($notification_top_count && count($notification_top_count) > 0)
								{
							?>
							<span class="notification_top_count">
								<?=count($notification_top_count)?>
							</span>
								<?php } ?>
						</li>
						
						<li onclick="show_panel1()" id="0" class="member_button" title="Member Requests">
							&nbsp;
							<?php
								if($member_notification_top_count && count($member_notification_top_count) > 0)
								{
							?>
							<span class="notification_top_count1">
								<?=count($member_notification_top_count)?>
							</span>
								<?php } ?>
						</li>
					</ul>
					
					<div class="notification_body" style="display:none;">
						<ul>
						<?php
							if($notification_top && count($notification_top) > 0)
							{
								foreach($notification_top as $notification_data)
								{
									
						?>
						
							<li>
								
									<p>
										<a href="<?=base_url()?>user/timeline/<?=$notification_data->userid?>">
											<label><?=$notification_data->fname?></label>
										</a>
										commented on your cause  
										
										<a href="<?=base_url()?>causes/details/<?=$notification_data->cause_id?>">
											<label><?=$notification_data->title?></label>
										</a>
									</p>
									
									<span class="edate"><?php echo date('F j, Y, g:i a',strtotime($notification_data->edate)) ?></span>
								
								<div style="clear:both"></div>
							</li>
						<?php
								}
							}
							else
							{
						?>
								<li>
									No Comments found...
									<div style="clear:both"></div>
								</li>
						<?php
							}
						?>
							
						</ul>
					</div>
					
					
					<div class="notification_body1" style="display:none;">
						<ul>
						<?php
						
							if($member_notification_top && count($member_notification_top) > 0)
							{
								foreach($member_notification_top as $notification_data)
								{
						?>
						
							<li>
								<?php
									if($notification_data->status=='Active')
									{
								?>
										<p class="umsg">
											<a href="<?=base_url()?>user/timeline/<?=$notification_data->userid?>">
												<b><?=$notification_data->fname?> <?=$notification_data->lname?></b> 
											</a>
											
											joined your cause 
											<a href="<?=base_url()?>causes/details/<?=$notification_data->cause_id?>">
												<b><?=$notification_data->title?></b> 
											</a>
										</p>
								<?php
									}
									else
									{
										
									?>
											<p class="umsg">
												<a href="<?=base_url()?>user/timeline/<?=$notification_data->userid?>">
													<b><?=$notification_data->fname?> <?=$notification_data->lname?></b> 
												</a>	
												wants to join your cause 
												<a href="<?=base_url()?>causes/details/<?=$notification_data->cause_id?>">
													<b><?=$notification_data->title?></b> 
												</a>
											</p>
											
											<p class="ureq">	
												<a href="javascript:" onclick="a_member('<?=$notification_data->id?>')">Accept</a>
												<a href="javascript:" onclick="d_member('<?=$notification_data->id?>')">Cancel</a>
											</p>
									
								<?php
									
									}
								
								?>
								
								
								
								<span class="edate"><?php echo date('F j, Y, g:i a',strtotime($notification_data->edate)) ?></span>
								
								<div style="clear:both"></div>
							</li>
							
						<?php
								}
							}
							else
							{
						?>
								<li>
									No Request found...
									<div style="clear:both"></div>
								</li>
						<?php
							}
						?>
							
						</ul>
					</div>
					
				</div>
				<?php } ?>
				<script type="">
				   	$(function(){
		$('.nav a').click(function(){
			$(this).parent().addClass('active').siblings().removeClass('active')	
		})
	})
				</script>
                <div id="cssmenu" class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="scroll <?=($active && $active!='')?'active':''?>"><a href="#home">HOME</a></li>
						<li class="scroll"><a href="<?=base_url()?>#aboutus">ABOUT US</a></li>
                        <li class="scroll"><a href="<?=base_url()?>#how_it_work">HOW IT WORKS</a></li>
                        <li class="scroll"><a href="<?=base_url()?>#portfolio">WALKABOUT</a></li>
                        <li class="scroll"><a href="<?=base_url()?>#about123">GALLERY</a></li>
                        <li class="scroll"><a href="<?=base_url()?>forum">FORUM</a></li>
						<?php
							if (($this -> session -> userdata('user_id') == "")) 
							{
						?>
								<li class="scroll">
									<a href="<?=base_url()?>#get-in-touch" style="border-right:none;">LOGIN</a>
								</li>                        
						<?php
							}
							else
							{
						?>
								<li class="scroll">
									<a href="javascript:" style="border-right:none;">My Account</a>
									<ul style="top: 34px !important;">
										<li><a href="<?=base_url()?>causes/mycause">My Causes</a></li>
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
				
				<script>
					function show_panel()
					{
						var ids = $('.message_button').attr('id');
						$('.notification_top_count').html('0');
						
						
						if(ids=='0')
						{
							$('.notification_body').css('display','block');
							$('.message_button').attr('id','1');
						}
						else
						{
							$('.notification_body').css('display','none');
							$('.message_button').attr('id','0');
						}
						
						var dataString = '&update=update';
						$.ajax({
							type: "POST",
							url: '<?=base_url()?>home/notification_update',
							data: dataString,
							cache: false,
							success: function(result){
									if(result)
									{
										$('.notification_top_count').html('0');
									}
							}
						});
						
						
					}
					
					function show_panel1()
					{
						var ids = $('.member_button').attr('id');
						$('.notification_top_count1').html('0');
						
						
						if(ids=='0')
						{
							$('.notification_body1').css('display','block');
							$('.member_button').attr('id','1');
						}
						else
						{
							$('.notification_body1').css('display','none');
							$('.member_button').attr('id','0');
						}
						
						var dataString = '&update=update';
						$.ajax({
							type: "POST",
							url: '<?=base_url()?>home/notification_update1',
							data: dataString,
							cache: false,
							success: function(result){
									if(result)
									{
										$('.notification_top_count1').html('0');
									}
							}
						});
						
						
					}
					
					function a_member(member_requesrt_id)
					{
						if(confirm('Are you sure to Perform this action?')==true)
						{
							var dataString = '&member_requesrt_id='+ member_requesrt_id;
							
							$.ajax({
									type: "POST",
									url: '<?=base_url()?>causes/approve_member',
									data: dataString,
									cache: false,
									success: function(result){
											if(result)
											{
												
												$(".ptext1").html('Member Request Accepted sucessfully.'); 
												$("#openModalpopup1").css('display','block'); 
												/*setTimeout(function() { $("#openModalpopup1").fadeOut(1500); }, 5000);*/
												setTimeout(function() { window.location.href='<?=base_url()?>'; }, 5000);
												return false;
						
											}
									}
								});
							return false;
						}
					}
					
					function d_member(member_requesrt_id)
					{
						if(confirm('Are you sure to Perform this action?')==true)
						{
							var dataString = '&member_requesrt_id='+ member_requesrt_id;
							
							$.ajax({
									type: "POST",
									url: '<?=base_url()?>causes/disapprove_member',
									data: dataString,
									cache: false,
									success: function(result){
											if(result)
											{
												$(".ptext1").html('Member request canceled sucessfully.'); 
												$("#openModalpopup1").css('display','block'); 
												setTimeout(function() { window.location.href='<?=base_url()?>'; }, 5000);
												return false;
												
											}
									}
								});
							return false;
						}
					}
				</script>
			
		<?php if($this->session->userdata('user_id')!=''){ ?>		
		
			<script type="text/javascript">
			
				setInterval(function() { getCommentNotification()},10000);
				function getCommentNotification()
				{
					
					var dataString = '&test=test';
						
						$.ajax({
								type: "POST",
								url: '<?=base_url()?>causes/getCommentNotification',
								data: dataString,
								cache: false,
								success: function(result){
										if(result)
										{
											
											$(".fb_notification").html(result); 
											return false;
										}
								}
							});
						return false;
				}
				
				

			</script>
		<?php } ?>
					
            </div><!--/.container-->
        </nav><!--/nav-->
    </header><!--/header-->
