
   
   
   <link rel="stylesheet" href="<?=base_url()?>css/demo.css">
<link rel="stylesheet" href="<?=base_url()?>css/slippry.css">
<script src="<?=base_url()?>js/jquery.min.js"></script>
<script src="<?=base_url()?>js/slippry.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/default.include.a29efb.css" media="all">
<style type="text/css">
.removed_comment
{
	background: black;
	color: white !important;
	font-weight: bold;
	padding: 1px 4px;
}
.image_box_button
{
	padding: 7px 10px;
	background: black;
	color: white;
}
.container_detail
{
	width: 82%;
}
body
{
	background-color: #E6E7E8;
}

.reportive
{
	font-size: 12px;
	color: #1E6A87;
}
.reportive:hover
{
	text-decoration:none;
	color: #45AED6;
}

.reportive1
{
	font-size: 12px;
	color: #1E6A87;
}
.reportive1:hover
{
	text-decoration:none;
	color: #45AED6;
}


.demo_wrapper
{
	margin-top:126px;
}


	.wrap_image_throb:hover
	{
		-moz-transform: scale(2,2);
		-webkit-transform: scale(2,2);
		transform: scale(1.5,1.5);
	}
	
	.wrap_image_throb
	{
		moz-transition: all .5s;
		-webkit-transition: all .5s;
		transition: all .1s;
		-moz-transform: scale(1,1);
		-webkit-transform: scale(1,1);
		transform: scale(1,1);
	}
</style>


<script type="text/javascript">
function show_members()
{ 
	$('#openModalAddfriend').css('display','block');
	return false;
}
	
function hide_members()
{
	$('#openModalAddfriend').css('display','none');
}


function remove_member(userid)
{
	if(confirm('Are you sure you want to remove this members from this cause?')==true)
	{
		var cause_id = $('#cause_id').val();
		var dataString = '&userid='+ userid + '&cause_id='+ cause_id;
		//$('#m_members'+userid).remove();
		$('#m_members'+userid).html("Removed");
		$('#m_members'+userid).css("width",'36px');
		$.ajax({
				type: "POST",
				url: '<?=base_url()?>causes/remove_member',
				data: dataString,
				cache: false,
				success: function(result){
						if(result)
						{
							$(".notification-bar").html('Member Removed sucessfully!!!'); 
							$(".notification-bar").css('display','block'); 
							setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
							return false;
						}
				}
			});
		return false;
	}
}


</script>


<div id="openModalAddfriend" class="mb_elegantModal" style="display: none;">
	<div class="animated  swing">
			
		<a title="Close" class="mb_elegantModalclose" onclick="return hide_members()">X</a>
		<h2>Current Cause Members</h2>
		<br>
		
		<ul>
		<?php
			if($cause_members && count($cause_members)>0)
			{
				foreach($cause_members as $cause_members_data)
				{
					
					foreach($users as $usersdata)
					{
						if($usersdata->id == $cause_members_data->userid)
						{
							echo "<li id='m_members".$cause_members_data->userid."'><a href='javascript:'>".$usersdata->fname." ".$usersdata->lname."</a> &nbsp;&nbsp;&nbsp; <a style='float: right;' href='javascript:' onclick='remove_member(".$cause_members_data->userid.")'>X</a></li>";
						}
					}

				}
			}
			else
			{
				echo "<li>No Members found here.</li>";
			}
		?>
			
		</ul>
		<div style="clear:both"></div>
	</div>
	
</div>

<style type="text/css">
	#openModalAddfriend
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
		
#openModalAddfriend
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

.wrap_image
{
	background: transparent url("../../images/ignite.png") repeat scroll 18% 0%;
	width: 30px;
	height: 30px;
	float: right;
	margin-left: 6px;
	cursor: pointer;
	moz-transition: all .5s;
		-webkit-transition: all .5s;
		transition: all .1s;
		-moz-transform: scale(1,1);
		-webkit-transform: scale(1,1);
		transform: scale(1,1);
}
.wrap_image1
{
	background: transparent url("../../images/ignite2.png") repeat scroll 18% 0%;
	width: 31px;
	height: 31px;
	float: right;
	margin-left: 6px;
	cursor: pointer;
	moz-transition: all .5s;
		-webkit-transition: all .5s;
		transition: all .1s;
		-moz-transform: scale(1,1);
		-webkit-transform: scale(1,1);
		transform: scale(1,1);
}

.wrap_image1:hover
	{
		-moz-transform: scale(2,2);
		-webkit-transform: scale(2,2);
		transform: scale(1.5,1.5);
	}
	
	.wrap_image:hover
	{
		-moz-transform: scale(2,2);
		-webkit-transform: scale(2,2);
		transform: scale(1.5,1.5);
	}
</style>
<script>
	function cause_login_action()
	{
		$(".notification-bar").html('Please Login to Join this Cause.'); 
		$(".notification-bar").css('display','block'); 
		setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
		return false;
	}
	
	function owner_cause()
	{
		$(".notification-bar").html('You are a Owner of this Cause.'); 
		$(".notification-bar").css('display','block'); 
		setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
		return false;
	}
	
	
	function cause_request()
	{
		$(".notification-bar").html('Your Request to join this cause is waiting to approve.'); 
		$(".notification-bar").css('display','block'); 
		setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
		return false;
	}
	
	function cause_action(val)
	{
		var msg = '';
		if(val=='0')
		{
			var msg = 'Are you sure you want to leave this cause?';
		}
		else
		{
			var msg = 'Are you sure you want to send?';
		}
		if(confirm(msg)==true)
		{
			var cause_id = $('#cause_id').val();
			var dataString = '&val='+ val + '&cause_id='+ cause_id;
				
			$.ajax({
					type: "POST",
					url: '<?=base_url()?>causes/cause_action',
					data: dataString,
					cache: false,
					success: function(result){
							if(result)
							{
								$(".notification-bar").html(result); 
								$(".notification-bar").css('display','block'); 
								setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
								setTimeout(function() { window.location.reload(); }, 5000);
								
								return false;
							}
					}
				});
			return false;
		}
	}
	
	
	function max_members()
	{
		$(".notification-bar").html('Maximum Volunters already assigned!!!'); 
		$(".notification-bar").css('display','block'); 
		setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
		return false;
	}
	
	setInterval(function() { refresh_comments()},6000);
	function refresh_comments()
	{
		var cause_id = $('#cause_id').val();
		//refresh_section
		var cause_id = $('#cause_id').val();
			var dataString = '&cause_id='+ cause_id;
				
			$.ajax({
					type: "POST",
					url: '<?=base_url()?>causes/refresh_comments',
					data: dataString,
					cache: false,
					success: function(result){
							if(result)
							{
								$(".refresh_section").html(result); 
								return false;
							}
					}
				});
			return false;
	}
 </script>
 <script>
    function fbShare(url, title, descr, image, winWidth, winHeight) {
        var winTop = (screen.height / 2) - (winHeight / 2);
        var winLeft = (screen.width / 2) - (winWidth / 2);
        window.open('http://www.facebook.com/sharer.php?s=100&p[title]=' + title + '&p[summary]=' + descr + '&p[url]=' + url + '&p[images][0]=' + image, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
    }
</script>
<script>
  function twshare(url)
  {
    var width  = 575,
        height = 400,
        left   = ($(window).width()  - width)  / 2,
        top    = ($(window).height() - height) / 2,
        url    = url,
        opts   = 'status=1' +
                 ',width='  + width  +
                 ',height=' + height +
                 ',top='    + top    +
                 ',left='   + left;
    
    window.open(url, 'twitter', opts);
 
    return false;
  }
</script>
<?php
	$ignite_option = '';
	$fn = '';
	if($this->session->userdata('user_id')=='')
	{
		$ignite_option = '<a href="javascript:" onclick="cause_login_action()">
							<img src="../../images/ignite1.png" title="Join Cause" class="wrap_image_throb">
						</a>';
		$fn = "<p class='wrap_image1' onclick='cause_login_action()'> </p>";
	}
	elseif($this->session->userdata('user_id')==$details[0]->userid)
	{
		$ignite_option = '<a href="javascript:" onclick="owner_cause()">
							<img src="../../images/ignite.png" title="Join Cause" class="wrap_image_throb">
						</a>';
		$fn = "<p class='wrap_image' onclick='owner_cause()'> </p>";
	}
	else
	{
		$st = '';
		$flag = 0;
		foreach($cause_members as $cause_members_data)
		{
			
			if($cause_members_data->userid == $this->session->userdata('user_id'))
			{
				$flag = 1;
				$st = $cause_members_data->status;
			}
		}
		if($flag == 1)
		{
			
			if($st=='Inactive')
			{
				$ignite_option = '<a href="javascript:" onclick="cause_request()">
									<img src="../../images/ignite.png" title="Request waiting to Approve" class="wrap_image_throb">
								</a>';
					$fn = "<p class='wrap_image' onclick='cause_request()'> </p>";
			}	
			else
			{
				$ignite_option = '<a href="javascript:" onclick="cause_action(0)">
									<img src="../../images/ignite.png" title="Leave Cause" class="wrap_image_throb">
								</a>';
				$fn = "<p class='wrap_image' onclick='cause_action(0)'> </p>";
			}
			
		}
		else
		{
			if($cause_members && (count($cause_members) < $details[0]->volunters))
			{
				$ignite_option = '<a href="javascript:" onclick="cause_action(1)">
									<img src="../../images/ignite1.png" title="Join Cause" class="wrap_image_throb">
								</a>';
				$fn = "<p class='wrap_image1' onclick='cause_action(1)'> </p>";
			}
			else
			{
				$ignite_option = '<a href="javascript:" onclick="max_members()">
									<img src="../../images/ignite1.png" title="Join Cause" class="wrap_image_throb">
								</a>';
				$fn = "<p class='wrap_image1' onclick='max_members()'> </p>";
				
			}
		}
	}
	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>



<section class="demo_wrapper" id="main-slider">
	<article class="demo_block">
		<div class="detail_page">
			<ul>
				<li>
					<a onclick= 'twshare("https://twitter.com/home?status= <?=$details[0]->title?>+<?=$actual_link?>")' href="javascript:">
						<img src="<?=base_url()?>images/face.png" />
					</a>
				</li>
				<li>
					<a href="javascript:fbShare('<?=$actual_link?>', '<?=$details[0]->title?>', '<?=substr($details[0]->details,0,10)?>', '<?=base_url()?>causes_images/<?=$details[0]->image?>', 520, 350)">
						<img src="<?=base_url()?>images/thank.png" />
					</a>
				</li>
			</ul>
		</div>
		<ul id="demo1">
			<li><a href="javascript:">
				<img src="<?=base_url()?>causes_images/<?=$details[0]->image?>" alt="<?=$details[0]->title?> <?=$fn?>" ></a>
			</li>
			
			<?php
					if($cause_image && count($cause_image) > 0)
					{
						foreach($cause_image as $cause_image_data)
						{
							if($cause_image_data->image!='')
							{
				?>
							
							<li><a href="javascript:">
								<img src="<?=base_url()?>causes_images/<?=$cause_image_data->image?>" alt="<?=$details[0]->title?> <?=$fn?>"></a>
							</li>
				<?php
							}
						}
				?>
							<style>
								.sy-controls
								{
									display:block!important;
								}
							</style>
				<?php
					}
				?>
			
			
			<!--<li><a href="#slide2"><img src="img/image-2.jpg"  alt="This is caption 2"></a></li>
			<li><a href="#slide3"><img src="img/image-4.jpg" alt="And this is some very long caption for slide 3. Yes, really long."></a></li>-->
		</ul>
	</article>
</section>	
<!--
 <meta property="og:url" content="http://www.your-domain.com/your-page.html" />
   <meta property="og:type" content="website" />
   <meta property="og:title" content="Your Website Title" />
   <meta property="og:description" content="Your description" />
   <meta property="og:image" content="http://www.your-domain.com/path/image.jpg" />
   
   
   <div id="fb-root"><img src="http://www.abcairportshuttle.com/wp-content/uploads/2015/06/logoabc.jpg" /></div>
   <script>(function(d, s, id) {
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) return;
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));</script>

   
   <div class="fb-like"
       data-href="http://www.your-domain.com/your-page.html"
       data-layout="standard"
       data-action="like"
       data-show-faces="true">
   </div>
   -->
 
<section id="CAUSEDETAILS">
    
    <div class="container container_detail">
		<div class="col-sm-8 icon-chat">
			
				<?=$ignite_option?>
			&nbsp&nbsp 
			<!--<a href="">
				<img src="<?=base_url()?>images/chat1.png">
			</a>-->
		</div>
		
		<div class="col-sm-4 text icon-text">
			<?php /*
				if($details[0]->userid==$this->session->userdata('user_id'))
				{
			
			?>
			
						<a href="javascript:" onclick="show_members()">All Members</a>&nbsp;&nbsp;&nbsp;&nbsp;
			<?php } */?>
			
			<a href="<?=base_url()?>user/timeline/<?=$details[0]->userid?>" class="black_text">
			
			IGNITED BY 
			<?php
				if($users)
				{
					foreach($users as $usersdata)
					{
						if($usersdata->id == $details[0]->userid)
						{
							echo "<strong>".$usersdata->fname." ".$usersdata->lname."</strong>";
						}
					}
				}
			?>
			</a>
			<?php
				if($details[0]->userid==$this->session->userdata('user_id'))
				{
			
			?>
			
						<a href="javascript:" class="image_box_button" id="0" onclick="display_image_box()" title="Add More Image">+</a>
			<?php } ?>

		</div>
		
		<form id="image_box_div" enctype="multipart/form-data" name="contact-form" method="post" action="<?=base_url()?>causes/cause_more_image" onsubmit="return validate_more_image()" style="display:none">
						<div class="row">
							<div class="col-sm-7 col-sm-77">                        
								
								<div class="form-group">
									<label>Upload More Image</label>
									
								</div>
								<input type="hidden" name="cause_id" id="cause_id" value="<?=$details[0]->id?>">
								<input type="hidden" name="cause_title" id="cause_title" value="<?=$details[0]->title?>">
								<div class="form-group col-sm-77_form-group">
									<input type="file" name="more_images" id="more_images">
									<button type="submit" class="btn btn-primary btn-lg" required="required">Upload</button>
								</div>
							</div>
						</div>
					</form>     
	</div>
		
	<div class="container container_detail">
		
		<div class="col-sm-12 border-text">
			<div class="col-sm-3 start-border center">
		
				<h4>START DATE</h4>
				<p><?=$details[0]->startdate?></p>
			</div>
		
			<div class="col-sm-3 start-border center">
				<h4>LOCATION</h4>
				<p><?=$details[0]->city?></p>
			</div>
		
			<div class="col-sm-3 start-border center">
				<h4>NO.OF VOLUNTEERS</h4>
				<p><label style="color: green;"><?=count($cause_members)?></label> / <label style="color: red;"><?=$details[0]->volunters?></label></p>
			</div>
		
			<div class="col-sm-3  center">
				<h4>END DATE</h4>
				<p><?=$details[0]->enddate?></p>
			</div>
		</div>
	</div>
</section>


<section id="CAUSEDETAILS">
    <div class="container container_detail">
        <div class="section-header section-header2">
            <h2 class="comments_title wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">CAUSE DETAILS</h2>
        </div>

        <div class="box_mar box_mar2">
            <div class="portfolio-items al_box isotope" style="position: relative; overflow: hidden;">
                <p><?=$details[0]->details?></p>
				
				<hr/>
 
				<!--<h1 class="comments_title">DISCUSSIONS</h1>-->
	
	<script src="<?=base_url()?>js/jquery.mousewheel-3.0.6.pack.js"></script>
	<script src="<?=base_url()?>js/jquery.fancybox.js"></script>
	<script src="<?=base_url()?>js/jquery.fancybox.pack.js"></script>
	<link rel="stylesheet" href="<?=base_url()?>css/jquery.fancybox.css">
	<script type="text/javascript">
		$(document).ready(function() {
			 $("#single_1").fancybox({
    	openEffect	: 'elastic',
    	closeEffect	: 'elastic',

    	helpers : {
    		title : {
    			type : 'inside'
    		}
    	}
    });

		});
	</script>
	
				<h2 class="comments_title wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">DISCUSSIONS</h2>
				<div class="refresh_section">
				<?php
					if($cause_comment && count($cause_comment) > 0)
					{
						foreach($cause_comment as $cause_comment_data)
						{
							
				?>
							<div class="media comment_section" id="c_box<?=$cause_comment_data->id?>">
								<div class="pull-left post_comments">
									
										<?php
											if(!empty($cause_comment_data->image))
											{
										?>
											<a  id="single_1" href="<?=base_url()?>causes_images/<?=$cause_comment_data->image?>">
												<img src="<?=base_url()?>causes_images/<?=$cause_comment_data->image?>" style="width:85px;height:85px;"/>
										<?php
											}
											else
											{
										?>
												<a  id="single_1" href="<?=base_url()?>images/blog1.jpg">
												<img src="<?=base_url()?>images/blog1.jpg"  alt="" />
										<?php
											}
										
										?>
										
									</a>
								</div>
								
								<div class="media-body post_reply_comments">
									<h3>
										<a href="<?=base_url()?>user/timeline/<?=$cause_comment_data->userid?>" class="timeline_link">
										<?php
											if($users)
											{
												foreach($users as $usersdata)
												{
													if($usersdata->id == $cause_comment_data->userid)
													{
														echo $usersdata->fname." ".$usersdata->lname;
													}
												}
											}
										?>
										</a>
										:
										
										<?php
											if($details[0]->userid==$this->session->userdata('user_id'))
											{
										
										?>
										
										<a href="javascript:" title="Remove Comment" class="removed_comment" onclick="remove_comment('<?=$cause_comment_data->id?>')">X</a>
										<?php } ?>
									</h3>
									<?php
									$test = '';
									
									if($this->session->userdata('user_id')!='')
									{
										
										foreach($abused as $abusedData)
										{
											if($abusedData->userid==$this -> session -> userdata('user_id'))
											{
												$test = "test";
											}
										}
									}
									if($this->session->userdata('user_id')!='')
									{

										if($test!='')
										{
									?>
										<label class="mark_action">
											<a href="javascript:" onclick="mark_reportive_cancel('<?=$details[0]->id?>','<?=$cause_comment_data->id?>')" class="reportive" title="Cancel">Marked as Abusive By You <span class="mark_count">(<?=count($abused)?>)</span></a>
										</label>
									<?php
											
										}
										else
										{
									?>
											<label class="mark_action">
												<a href="javascript:" onclick="mark_reportive('<?=$details[0]->id?>','<?=$cause_comment_data->id?>')" class="reportive" title="Mark as Reportive">Mark as Abusive <span class="mark_count">(<?=count($abused)?>)</span></a>
											</label>
									<?php
										}
									}
									else
									{
								?>
										<label class="mark_action">
												<a href="javascript:" onclick="mark_reportive_login()" class="reportive1" title="Mark as Reportive">Mark as Abusive <span class="mark_count">(<?=count($abused)?>)</span></a>
											</label>
								<?php
									}
									?>
									<p><?=$cause_comment_data->comment?></p>
								</div>
								<div style="clear:both"></div>
							</div> 

				<?php
						}
					}
					else
					{
						
				?>
						<div class="media comment_section">
								<div class="pull-left post_comments">
									
								</div>
								
								<div class="media-body post_reply_comments">
									
									<p>No Discussion available</p>
								</div>
								<div style="clear:both"></div>
							</div>
				
				<?php
					}
				
				?>
				</div>
				<hr/>
				
				<?php
					//$uid = ",".$this->session->userdata('user_id').",";
					//if(strpos($details[0]->eligibility,$uid)===false && $this->session->userdata('user_id'))
					if(($flag && $flag=='1' && $st=='Active') || $this->session->userdata('user_id')==$details[0]->userid)
					{
				?>
				<div id="contact-page clearfix">
                    <script type="text/javascript">
						
						function remove_comment(id)
						{
							if(confirm('Are you sure to perform this action?')==true)
							{
								var dataString = '&id='+ id;
								$('#c_box'+id).remove();
								$.ajax({
										type: "POST",
										url: '<?=base_url()?>causes/remove_comment',
										data: dataString,
										cache: false,
										success: function(result){
												if(result)
												{
													$(".notification-bar").html('Comment Removed sucessfully!!!'); 
													$(".notification-bar").css('display','block'); 
													setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
													return false;
												}
										}
									});
								return false;
							}
						}
						function display_image_box()
						{
							var val_id = $('.image_box_button').attr('id');
							if(val_id=='0')
							{
								$('#image_box_div').css('display','block');
								$('.image_box_button').attr('id','1');
							}
							else
							{
								$('#image_box_div').css('display','none');
								$('.image_box_button').attr('id','0');
							}
						}
					
						function validate_more_image()
						{
							
							var uploadImg = document.getElementById('more_images');
							if(uploadImg.files.length<1)
							{
								$(".notification-bar").html('Please select image that you want to add.'); 
								$(".notification-bar").css('display','block'); 
								setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
								return false;	
							}
							var f = uploadImg.files[0];
							
							
						   if (!endsWith(f.name, 'JPEG') && !endsWith(f.name,'jpeg') && !endsWith(f.name, 'jpg') && !endsWith(f.name,'JPG') && !endsWith(f.name, 'PNG') && !endsWith(f.name,'png')) 
						   {
							   $(".notification-bar").html(f.name + ' format not accepted. Please upload JPEG, PNG, JPG files only.'); 
								$(".notification-bar").css('display','block'); 
								setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
								return false;
						   }
						}
					
						function validate_comment()
						{
							var msg = $('#message').val();
							if(msg=='')
							{
								$(".notification-bar").html('Please provide Your Comment'); 
								$(".notification-bar").css('display','block'); 
								setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
								return false;
							}
							
							var uploadImg = document.getElementById('comment_image');
							var f = uploadImg.files[0];
							
							
						   if (!endsWith(f.name, 'JPEG') && !endsWith(f.name,'jpeg') && !endsWith(f.name, 'jpg') && !endsWith(f.name,'JPG') && !endsWith(f.name, 'PNG') && !endsWith(f.name,'png')) 
						   {
							   $(".notification-bar").html(f.name + ' format not accepted. Please upload JPEG, PNG, JPG files only.'); 
								$(".notification-bar").css('display','block'); 
								setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
								return false;
						   }
							
						}
						function endsWith(str, suffix) 
						{
							return str.indexOf(suffix, str.length - suffix.length) !== -1;
						}
					</script>
					
					<form id="main-contact-form" class="contact-form" enctype="multipart/form-data" name="contact-form" method="post" action="<?=base_url()?>causes/comment_add" onsubmit="return validate_comment()">
						<div class="row">
							<!--<div class="col-sm-5">
								<div class="form-group">
									<label>Name *</label>
									<input type="text" class="form-control" required="required">
								</div>
								
								<div class="form-group">
									<label>Email *</label>
									<input type="email" class="form-control" required="required">
								</div>
								
								<div class="form-group">
									<label>URL</label>
									<input type="url" class="form-control">
								</div>                    
							</div>
							-->
							<input type="hidden" name="cause_id" id="cause_id" value="<?=$details[0]->id?>">
							<input type="hidden" name="cause_title" id="cause_title" value="<?=$details[0]->title?>">
							<div class="col-sm-7">                        
								<div class="form-group">
									<label>Message *</label>
									<textarea name="message" id="message" class="form-control" rows="8"></textarea>
								</div>

								<div class="form-group">
									<label>Attach Media</label>
									<input type="file" name="comment_image" id="comment_image">
								</div>
								
								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-lg tell_us_review" required="required">Post</button>
								</div>
							</div>
						</div>
					</form>     
                </div><!--/#contact-page-->
				<?php }
				else
				{
				?>
					<input type="hidden" name="cause_id" id="cause_id" value="<?=$details[0]->id?>">
							<input type="hidden" name="cause_title" id="cause_title" value="<?=$details[0]->title?>">
					<div class="media comment_section">
						<div class="pull-left post_comments">
						</div>
						<div class="media-body post_reply_comments">
								
							<p>Please join this Cause to participate here.</p>
						</div>
					</div> 
				<?php
				}
				?>
            </div>
        </div>
	</div><!--/.container-->
</section>

<script>
	$(function() {
		var demo1 = $("#demo1").slippry({
			// transition: 'fade',
			// useCSS: true,
			// speed: 1000,
			// pause: 3000,
			 auto: true,
			// preload: 'visible',
			// autoHover: false
		});

		$('.stop').click(function () {
			demo1.stopAuto();
		});

		$('.start').click(function () {
			demo1.startAuto();
		});

		$('.prev').click(function () {
			demo1.goToPrevSlide();
			return false;
		});
		$('.next').click(function () {
			demo1.goToNextSlide();
			return false;
		});
		$('.reset').click(function () {
			demo1.destroySlider();
			return false;
		});
		$('.reload').click(function () {
			demo1.reloadSlider();
			return false;
		});
		$('.init').click(function () {
			demo1 = $("#demo1").slippry();
			return false;
		});
	});
</script>

<script type="text/javascript">
	function mark_reportive(cause_id,comment_id)
	{
		if(confirm('Are you sure to perform this action?')==true)
		{
			var dataString = '&cause_id='+ cause_id + '&comment_id='+ comment_id;
			$.ajax({
					type: "POST",
					url: '<?=base_url()?>user/mark_as_reportive',
					data: dataString,
					cache: false,
					success: function(result){
							if(result)
							{
								$(".mark_action").html(result); 
								$(".notification-bar").html('Comment Marked as Abusive'); 
								$(".notification-bar").css('display','block'); 
								setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
								return false;
							}
							
					}
				});
			return false;
		}
	}
	function mark_reportive_login()
	{
		$(".notification-bar").html('Please login to Mark as Abusive'); 
		$(".notification-bar").css('display','block'); 
		setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
		return false;
	}
	
	function mark_reportive_cancel(cause_id,comment_id)
	{
		if(confirm('Are you sure to perform this action?')==true)
		{
			var dataString = '&cause_id='+ cause_id + '&comment_id='+ comment_id;
			$.ajax({
					type: "POST",
					url: '<?=base_url()?>user/mark_reportive_cancel',
					data: dataString,
					cache: false,
					success: function(result){
							if(result)
							{
								$(".mark_action").html(result); 
								$(".notification-bar").html('Mark as Abusive Removed'); 
								$(".notification-bar").css('display','block'); 
								setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
								return false;
							}
							
					}
				});
			return false;
		}
	}

</script>