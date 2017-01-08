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
    <!--[if lt IE 9]>
    <script src="<?=base_url()?>js/html5shiv.js"></script>
    <script src="<?=base_url()?>js/respond.min.js"></script>
    <![endif]-->       
	<link rel="Shortcut Icon" href="<?=base_url()?>images/favicon1.ico" type="image/x-icon" />
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
			/*#main-menu.navbar-default .navbar-nav > li > a.active
			{
				color:#BD1818 !important;
			}
			#cssmenu ul ul li a.active
			{
				background: background:rgb(138, 135, 135) none repeat scroll 0% 0%;
			}*/
			ul.ssmenu li a.active 
			{
				background:rgb(138, 135, 135) none repeat scroll 0% 0%!important;
				color:white!important;
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
				
                <div id="cssmenu" class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="scroll"><a href="<?=base_url()?>">HOME</a></li>
						<li class="scroll"><a href="<?=base_url()?>#aboutus">ABOUT US</a></li>
                        <li class="scroll"><a href="<?=base_url()?>#how_it_work">HOW IT WORKS</a></li>
                        <li class="scroll"><a href="<?=base_url()?>#portfolio">WALKABOUT</a></li>
                        <li class="scroll"><a href="<?=base_url()?>#about">GALLERY</a></li>
						<?php
							if (($this -> session -> userdata('user_id') == "")) 
							{
						?>
								<li class="scroll">
									<!--<a href="javascript:" onClick="login_popup()" style="border-right:none;">LOGIN</a>-->
									<a href="<?=base_url()?>" style="border-right:none;">LOGIN</a>
								</li>                        
						<?php
							}
							else
							{
						?>
								<li class="scroll <?=($active_cause_detail!='' || $active_timeline!='' || $active_profile!='')?'active':''?>">
									<a href="javascript:" style="border-right:none;">My Account</a>
									<ul style="top: 32px !important;" class="ssmenu">
										<li><a class="<?=($active_cause_detail!='')?'active':''?>" href="<?=base_url()?>causes/mycause">My Causes</a></li>
										<li><a class="<?=($active_profile!='')?'active':''?>" href="<?=base_url()?>user/profile">Update Profile</a></li>
										<li><a class="<?=($active_timeline!='')?'active':''?>" href="<?=base_url()?>user/timeline">Timeline</a></li>
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
												
												$(".ptext1").html('Member request Accepted sucessfully.'); 
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
												$(".ptext1").html('Member removed successfully!'); 
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
		
		
				<?php /* ?>
				<?php
				if($notification && $notification=='show' && $this->session->userdata('user_id')!='' && $this->session->userdata('user_id')==$details[0]->userid)
				{
			
			?>
				<div class="box-right">
					<a href="javascript:" onClick="notif()" class="one1">
						<img src="<?=base_url()?>images/icon.png" class="notify_image">
					</a>

					<div id="one" style="display:none;">
						<div class="box-text1">
						
							<div class="heading-noti">
								<img src="<?=base_url()?>images/icon.png">NOTIFICATIONS
							</div>
							
							<div class="notification_panel">
								<?php
								if($cause_members && count($cause_members) > 0)
								{
									foreach($cause_members as $cause_members_data)
									{
										foreach($users as $usersdata)
										{
											if($usersdata->id == $cause_members_data->userid)
											{
									?>
											<div class="abhijit-box" id="uaction<?=$cause_members_data->id?>">
												<div class="abhijit-box-left">
													<?=$usersdata->fname." ".$usersdata->lname;?>
													
													<?php
														if($cause_members_data->status=='Inactive')
														{
													
													?>
													<p class="request_action" id="paction<?=$cause_members_data->id?>">
														<a href="javascript:" onClick="disapprove_member('<?=$cause_members_data->id?>')" class="right_action">
															 &nbsp;No 
														</a>
														<a href="javascript:" onClick="approve_member('<?=$cause_members_data->id?>')" class="right_action">
															Yes | 
														</a>
													</p>
														<?php }else{ ?>
													<p class="request_action1" id="m_members<?=$cause_members_data->userid?>">
														<a style='float: right;' href='javascript:' onclick='remove_member("<?=$cause_members_data->userid?>")'>X</a>
													</p>
														<?php } ?>
												</div>
											</div>
									<?php
											
											}
										}
									}
								}
								else
								{
							?>
									<div class="abhijit-box">
										<div class="abhijit-box-left">
											No Members available.
										</div>
									</div>
							<?php
								}
								?>
											
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
				<?php */ ?>
	<?php if($this->session->userdata('user_id')==$details[0]->userid){ ?>		
		<script type="text/javascript">
			function approve_member(member_requesrt_id)
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
										$("#paction"+member_requesrt_id).html("Approved");
										$("#paction"+member_requesrt_id).css('display','block');
										
										/*$(".ptext1").html('Member Request Removed sucessfully.'); */
										$("#openModalpopup1").css('display','block'); 
										setTimeout(function() { $("#openModalpopup1").fadeOut(1500); }, 5000);
										return false;
				
									}
							}
						});
					return false;
				}
			}
			function disapprove_member(member_requesrt_id)
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
										//$("#uaction"+member_requesrt_id).remove(); 
										$("#paction"+member_requesrt_id).html("Canceled");
										$("#paction"+member_requesrt_id).css('display','block');
										
										$(".ptext1").html('Member removed successfully!'); 
										$("#openModalpopup1").css('display','block'); 
										setTimeout(function() { $("#openModalpopup1").fadeOut(1500); }, 5000);
										return false;
										
									}
							}
						});
					return false;
				}
			}
		
		/*
			setInterval(function() { notification()},6000);
			function notification()
			{
				var cause_id = $('#cause_id').val();
				
				var dataString = '&cause_id='+ cause_id;
					
					$.ajax({
							type: "POST",
							url: '<?=base_url()?>causes/notification',
							data: dataString,
							cache: false,
							success: function(result){
									if(result)
									{
										//$('.notify_image').attr('src','<?=base_url()?>images/icon-consulting.png');
										$(".notification_panel").append(result); 
										return false;
									}
							}
						});
					return false;
			}
*/
		</script>
	<?php } ?>	
	
	
	<script type="text/javascript">
		/*
		$(document).ready(function()
		{
			// Optional code to hide all divs
			$("#one").hide();
			// Show chosen div, and hide all others
			$(".one1").click(function () 
			{
				//$("#" + $(this).attr("class")).show().siblings('div').hide();
				$("#one").show();
			});

		});
		*/
		function notif()
		{
			var id = $('.one1').attr('id');
			
			if(id=='1')
			{
				$("#one").css('display','none');
				$('.one1').attr('id','0');
				
			}
			else
			{
				$("#one").css('display','block');
				$('.one1').attr('id','1');
			}
			
			
		}
		
	</script>
				
            </div><!--/.container-->
        </nav><!--/nav-->
    </header><!--/header-->

	<script type="text/javascript">
		function login_popup()
		{ 
			$('#openModallogin').css('display','block');
			return false;
		}
			
		function login_popup_hide()
		{
			$('#openModallogin').css('display','none');
		}
		
		function login_process()
		{
			var email = $('#l_email').val();
			if(email=='')
			{
				$(".ptext1").html('Please enter your email'); 
				$("#openModalpopup1").css('display','block'); 
				setTimeout(function() { $("#openModalpopup1").fadeOut(1500); }, 5000);
				return false;
				
			}
			
			var password = $('#l_password').val();
			if(password=='')
			{
				$(".ptext1").html('Please enter Password'); 
				$("#openModalpopup1").css('display','block'); 
				setTimeout(function() { $("#openModalpopup1").fadeOut(1500); }, 5000);
				return false;
				
			}
			$('.loader').html('<img src="<?=base_url()?>images/loading.gif" style=" display: block;width: 50px;">');
			var dataString = '&email='+ email + '&password='+ password;
			
			$.ajax({
					type: "POST",
					url: '<?=base_url()?>home/login_process',
					data: dataString,
					cache: false,
					success: function(result){
							if(result)
							{
								$('.loader').html('');
								//window.location.href='<?=base_url()?>home/index';
								window.location.reload();
							}
							else
							{
								$('.loader').html('');
								
								$(".ptext1").html('Please enter valid email address & password'); 
								$("#openModalpopup1").css('display','block'); 
								setTimeout(function() { $("#openModalpopup1").fadeOut(1500); }, 5000);
								return false;
								
							}
					}
				});
				return false;		
		}

	</script>
	
	<div id="openModallogin" class="mb_elegantModal" style="display: none;">
	<div class="animated  swing">
			
		<a title="Close" class="mb_elegantModalclose" onClick="return login_popup_hide()">X</a>
		<h2>Login</h2>
		
		
		<form id="login_panel" name="" method="">
			<div style="text-align:center">
				<input type="text" class="login_box" id="l_email" placeholder="Email Id">
				<input type="password" class="login_box" id="l_password" placeholder="Password">
			</div>
         
			
			<div style="clear:both"></div>
			<div style="text-align:center;">
				<input type="button" onClick="login_process()" class="login_box6" value="GET INVOLVED">
				
				<span class="loader">
					
				</span>
				
			</div>
			
			<!--<div class="col-md-3 ger_in get_main_cun"><img src="<?=base_url()?>images/get_involved.png"></div>-->
        </form>
		
		<div style="clear:both"></div>
	</div>
	
</div>

<style type="text/css">
#openModallogin
{
	.mb_elegantModal 
	position: fixed;
	font-family: Arial,Helvetica,sans-serif;
	top: 0px;
	right: 0px;
	bottom: 0px;
	left: 0px;
	background: none repeat scroll 0% 0% rgba(0, 0, 0, 0.8);
	z-index: 99999;
	opacity: 1;
	display: none;
}


#openModallogin h2
{
	font-size: 25px;
	text-align: center;
}	
.loader
{
	
	float: right;
	margin-right: 7%;
	margin-top: 5%;
}
	

</style>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/default.include.a29efb.css" media="all">

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