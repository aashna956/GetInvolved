<style type="text/css">
	.wrap_image
	{
		background: transparent url("<?=base_url()?>images/ignite.png") repeat scroll 18% 0%;
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
		transform: scale(1.2,1.2);
	}
	.wrap_image:hover
	{
		-moz-transform: scale(2,2);
		-webkit-transform: scale(2,2);
		transform: scale(1.5,1.5);
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
	.more_cause1
	{
		font-size: 18px;
		color:#BD1818 !important;
	}
	#about1{
		padding: 17px 0px;
		width: 100%;
		text-align: right;
		float:right;
		
	}
</style>
<?php

	$home_ignite_option = "<a href='#portfolio'><p class='wrap_image'></p></a>";
?>

<section id="main-slider">
        <!--<div class="owl-carousel">-->
			<ul id="demo1">
			<?php
				if($sliders)
				{
					foreach($sliders as $sliders_data)
					{
				?>
			<li><a href="javascript:" style="cursor:text">
				<img src="<?=base_url()?>slider/<?=$sliders_data->slide?>" alt="<?=$sliders_data->title?> <?=$home_ignite_option?>" ></a>
			</li>
			<?php 
					}
				}
			?>
			
			
			
			
		</ul>
			<?php
			/*
				if($sliders)
				{
					foreach($sliders as $sliders_data)
					{
				?>
						<div class="item" style="background-image: url(<?=base_url()?>slider/<?=$sliders_data->slide?>);"></div><!--/.item-->
				<?php
					}
				}
				*/
			?>
            
        <!--</div>-->
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
	
	
	function about_long()
	{
		
		$('.about_short').css('display','none');
		$('.about_long').css('display','block');
	}
	
	function about_short()
	{
		$('.about_long').css('display','none');
		$('.about_short').css('display','block');
	}
</script>
		
		<!--/.owl-carousel-->
    </section><!--/#main-slider-->
	
	
	<section id="aboutus" class="ch_bg about_us_section">
        <div class="container">
           <div class="portfolio_main">
		   <p class="how1">
					<i>“The mere awareness of things that inspire change”</i>
				</p>
		   <h2 class="about_tit text-center wow fadeInDown">ABOUT US</h2>
		   
		   <div class="about_us_content">
				<div class="about_short">
					
					<?=substr($about_us[0]->content,0,1100)?>
					<a href="javascript:" onclick="about_long()" id="about" class="more_cause1">More +</a>
				</div>
				
				<div class="about_long" style="display:none;">
					<?php
						if($about_us && count($about_us) > 0)
						{
							echo $about_us[0]->content;
						}
					?>
					<a href="javascript:" onclick="about_short()" id="about1" class="more_cause1">Less -</a>
				</div>
				
				
			<div class="about_social_media">
<!--				<ul>
					<li>
						<a href="">
							<img src="<?=base_url()?>images/f_icon.png" />
						</a>
					</li>
					
					<li>
						<a href="">
							<img src="<?=base_url()?>images/twitter_icon.png" />
						</a>
					</li>
					
					<li>
						<a href="">
							<img src="<?=base_url()?>images/be.png" />
						</a>
					</li>
					
					<li>
						<a href="">
							<img src="<?=base_url()?>images/g_icon.png" />
						</a>
					</li>
				<ul>
				-->
			</div>
				
		   </div>
		   
		   

			<div class="clearfix"></div>
			
		</div>
		
	</div>
    </section>
	
	
	

 <section id="how_it_work" class="wow fadeIn">
        <div class="container">
            <div class="section-header">
                <h2 class="about_tit text-center wow fadeInDown">HOW IT WORKS</h2>
                
				<p class="how2">
					Take a <strong>Walkabout</strong> and <strong>GetInvolved</strong> with people to make a collective difference 
				</p>
				
				<p class="how3">
					Lead the way and <strong>Ignite</strong> a cause to form a collective and inspire change 
				</p>
				
                </div>
			 </div>
			
			<h2 class="about_tit text-center wow fadeInDown ch_bg ingiite_head">
				<?php
					if (($this -> session -> userdata('user_id') == "")) 
					{
				?>
						<a href="#get-in-touch" class="timeline_link">IGNITE</a>							
				<?php
					}
					else
					{
				?>
						<a href="<?=base_url()?>causes/add" class="timeline_link">IGNITE</a>
				<?php
					}
				?>
			
			</h2>
			 
			 <div class="container">
            <div class="row">
                <div class="features">
				<div class="work_cun" style="position:relative">
				<div class="app_bord dis_non">&nbsp;</div>
                    <div class="col-md-4 col-sm-6 wow fadeInUp alin_center" data-wow-duration="300ms" data-wow-delay="0ms">
                        <div class="media service-box">
                             <div class="media-body">
                                <h4 class="media-heading">STEP 1</h4>
								<img src="<?=base_url()?>images/st_1.jpg">
                                <p class="special_menu">CLICK A<br><strong>PICTURE</strong></p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInUp alin_center" data-wow-duration="300ms" data-wow-delay="0ms">
                        <div class="media service-box">
                            
                            <div class="media-body">
                                <h4 class="media-heading">STEP 2</h4>
								<img src="<?=base_url()?>images/st_2.png">
                                <p class="special_menu">SHARE<br><strong>CAMPAIGN</strong></p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInUp alin_center" data-wow-duration="300ms" data-wow-delay="0ms">
                        <div class="media service-box">
                            
                            <div class="media-body">
                                <h4 class="media-heading">STEP 3</h4>
								<?php
									if (($this -> session -> userdata('user_id') == "")) 
									{
								?>
										<a href="#get-in-touch" class="timeline_link how_ignite_button">
											<img src="<?=base_url()?>images/st_3.png" >
											<p class="special_menu"><br><strong>IGNITE</strong></p>
										</a>							
								<?php
									}
									else
									{
								?>
										<a href="<?=base_url()?>causes/add" class="timeline_link how_ignite_button">
											<img src="<?=base_url()?>images/st_3.png">
											<p class="special_menu"><br><strong>IGNITE</strong></p>
										
										</a>
								<?php
									}
								?>
								<!--<img src="<?=base_url()?>images/st_3.png">
                                <p><strong>IGNITE</strong></p>-->
                            </div>
                        </div>
                    </div><!--/.col-md-4-->
					</div>
                </div>
		</div><!--/.row-->    
      </div> <!--/.container-->
    </section><!--/#cta-->



   

	
	<h2 class="about_tit text-center wow fadeInDown ch_bg ingiite_head">
		<a href="#portfolio" class="timeline_link">GETINVOLVED</a>							
	</h2>
	
	<div class="container">
            <div class="row">
                <div class="features">
				<div class="work_cun" style="position:relative">
				<div class="app_bord dis_non">&nbsp;</div>
                    <div class="col-md-4 col-sm-6 wow fadeInUp alin_center" data-wow-duration="300ms" data-wow-delay="0ms">
                        <div class="media service-box">
                             <div class="media-body">
                                <h4 class="media-heading">STEP 1</h4>
								<img src="<?=base_url()?>images/st_4.png">
                                <p class="special_menu">TAKE A<br><strong>WALKABOUT</strong></p>

                            </div>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInUp alin_center" data-wow-duration="300ms" data-wow-delay="0ms">
                        <div class="media service-box">
                            
                            <div class="media-body">
                                <h4 class="media-heading">STEP 2</h4>
								<img src="<?=base_url()?>images/st_5.png">
                                <p class="special_menu">CHOOSE A<br><strong>CAUSE</strong></p>

                            </div>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInUp alin_center" data-wow-duration="300ms" data-wow-delay="0ms">
                        <div class="media service-box">
                            
                            <div class="media-body">
                                <h4 class="media-heading">STEP 3</h4>
									<a href="#portfolio" class="timeline_link how_ignite_button">
										<img src="<?=base_url()?>images/st_6.png">
										<p class="special_menu">GET<br><strong>INVOLVED</strong></p>
									</a>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->
					</div>
                </div>
		</div><!--/.row-->    
      </div> <!--/.container-->
	
	
	
    

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
	
	function cause_action(val,rand)
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
			var cause_id = $('#cause_id'+rand).val();
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
    <section id="portfolio">
        <div class="container">
            <div class="section-header">
                <h2 class="about_tit text-center wow fadeInDown">WALKABOUT</h2>
                <p class="text-center wow fadeInDown">Take a walkbout of all the different posts of individuals and organizations who have ignited a cause, read about them and if interested ask to join the cause.</p>
				<div style="clear:both"></div>
            </div>
			<div style="clear:both"></div>
            <div class="text-center">
                <ul class="portfolio-filter">
					<li><a class="active" href="javascript:" data-filter="*">ALL</a></li>
                    <li><a class="" href="javascript:" data-filter=".Indivisual">INDIVIDUALS</a></li>
                    <li><a href="javascript:" data-filter=".Organisational">ORGANISATIONS</a></li>
                </ul><!--/#portfolio-filter-->
            </div>
			
			<div class="box_mar">
            <div class="portfolio-items al_box walk_about">
				
				<?php
						if($causes)
						{
							$z = 0;
							foreach($causes as $causes_data)
							{
								$z++;
								if($z<10)
								{
									?>
									
								<?php
								$rand = rand();
					?>
								<?php
									$ignite_option = '';
									
									if($this->session->userdata('user_id')=='')
									{
										$ignite_option = '<a href="javascript:" onclick="cause_login_action()">
																<img id="ca_id'.$causes_data->id.'" src="'.base_url().'images/ignite1.png" title="Join Cause" onmouseover="bigImg('.$causes_data->id.')" onmouseout="normalImg('.$causes_data->id.')" class="wrap_image_throb">
												
														</a>';
									
									}
									elseif($this->session->userdata('user_id')==$causes_data->userid)
									{
										$ignite_option = '<a href="javascript:" onclick="owner_cause()">
															<img src="'.base_url().'images/ignite.png" title="Cause Owner" class="wrap_image_throb">
														</a>';
									
									}
									else
									{
										$st = '';
										$flag = 0;
										foreach($cause_members as $cause_members_data)
										{
											
											if(($cause_members_data->userid == $this->session->userdata('user_id')) && ($cause_members_data->cause_id == $causes_data->id))
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
																	<img src="'.base_url().'images/ignite.png" title="Request waiting to Approve" class="wrap_image_throb">
																</a>';
											}	
											else
											{
												$ignite_option = '<a href="javascript:" onclick="cause_action(0,'.$rand.')">
																	<img src="'.base_url().'images/ignite.png" title="Leave Cause" class="wrap_image_throb">
																</a>';
											}
											
										}
										else
										{
											$cot =0;
											foreach($cause_members as $cause_members_data)
											{
												
												if($cause_members_data->cause_id == $causes_data->id)
												{
													$cot++;
												}
											}
											
											if($cot < $causes_data->volunters)
											{
												$ignite_option = '<a href="javascript:" onclick="cause_action(1,'.$rand.')">
																	<img id="ca_id'.$causes_data->id.'" src="'.base_url().'images/ignite1.png" title="Join Cause" onmouseover="bigImg('.$causes_data->id.')" onmouseout="normalImg('.$causes_data->id.')" class="wrap_image_throb">
																</a>';
											}
											else
											{
												$ignite_option = '<a href="javascript:" onclick="max_members()">
																	<img id="ca_id'.$causes_data->id.'" src="'.base_url().'images/ignite1.png" title="Join Cause" onmouseover="bigImg('.$causes_data->id.')" onmouseout="normalImg('.$causes_data->id.')" class="wrap_image_throb">
																</a>';
												
											}
										}
									}
									
								?>
								
								<div class="portfolio-item isotope-item * <?=$causes_data->type?> med_box page_img">
								<input type="hidden" name="cause_id" id="cause_id<?=$rand?>" value="<?=$causes_data->id?>">
									<div class="portfolio-item-inner">
										<img class="img-responsive" src="<?=base_url()?>causes_images/<?=$causes_data->image?>" alt="">
										 <div class="iclr"></div>
										 
										 <div style="margin:7px;">
										 <div class="icon-chat">
												<!--<a href="javascript:" onclick="cause_action(0)">-->
													<?=$ignite_option?>
												<!--</a>-->
												
												<!--<a href="https://www.facebook.com/sharer/sharer.php?u=<?=base_url()?>causes/details/<?=$causes_data->id?>" class="right_social1">-->
												<!--<a href="http://www.facebook.com/dialog/feed?app_id=532121923604176&link=<?=base_url()?>causes/details/<?=$causes_data->id?>&picture=<?=base_url()?>causes_images/<?=$causes_data->image?>&name=<?=$causes_data->title?>&caption=<?=substr($causes_data->details,0,10)?>&redirect_uri=http://getinvolved.co.in" class="right_social1">-->
												


												
												<!--<a href="https://twitter.com/home?status=<?=base_url()?>causes/details/<?=$causes_data->id?>" target="_blank" class="right_social">-->
												<a onclick= 'twshare("https://twitter.com/home?status= <?=$causes_data->title?>+<?=base_url()?>causes/details/<?=$causes_data->id?>")' href="javascript:" class="right_social">
													<img src="<?=base_url()?>images/t_share.png">
												</a>
												
												<a href="javascript:fbShare('<?=base_url()?>causes/details/<?=$causes_data->id?>', '<?=$causes_data->title?>', '<?=substr($causes_data->details,0,10)?>', '<?=base_url()?>causes_images/<?=$causes_data->image?>', 520, 350)" class="right_social1">
													<img src="<?=base_url()?>images/f_share.png">
												</a>
												<div style="clear:both"></div>
												<p class="home_ignited_by"><a href="<?=base_url()?>user/timeline/<?=$causes_data->userid?>">IGNITED BY 
												<?php
												if($users)
												{
													foreach($users as $usersdata)
													{
														if($usersdata->id == $causes_data->userid)
														{
															echo "<strong>".ucfirst($usersdata->fname)." ".ucfirst($usersdata->lname)."</strong>";
														}
													}
												}
											?>
											</a>
												</p>
												
											</div>
										  <h3 class="box_text">
											<!--<a href="<?=base_url()?>causes/details/<?//=str_replace(' ','_',$causes_data->title)?>">-->
											<a href="<?=base_url()?>causes/details/<?=$causes_data->id?>">
												<?=substr($causes_data->title,0,20)?>
											</a>
										</h3>
											NEEDED: <?=$causes_data->volunters?> VOLUNTEERS</br>
											<p class="walk_about_location">LOCATION: <?=$causes_data->area?> <?=($causes_data->area!='')?", ".$causes_data->city:$causes_data->city?></p>
											</div>
									</div>
										<div style="clear:both;"></div>
								</div><!--/.portfolio-item-->
									<div style="clear:both;"></div>
					<?php
								}
								if($z>9){ break; }
							}
						}
					?>
					
					<div style="clear:both;"></div>
					<div style="width:100%;"></div>

                <script>
						function bigImg(id)
						{
							$('#ca_id'+id).attr('src', '<?=base_url()?>images/ignite1_hover.png');
						}
						
						function normalImg(id)
						{
							$('#ca_id'+id).attr('src', '<?=base_url()?>images/ignite1.png');
						}
						
				</script>
				
            </div>
			<a href="<?=base_url()?>causes/lists" class="more_cause">More +</a>
        </div></div><!--/.container-->
    </section><!--/#portfolio-->

    
    

    <script type="text/javascript">
			window._wpemojiSettings = {"baseUrl":"http:\/\/s.w.org\/images\/core\/emoji\/72x72\/","ext":".png","source":{"concatemoji":"http:\/\/foo.gallery\/wp-includes\/js\/wp-emoji-release.min.js?ver=4.2.4"}};
			!function(a,b,c){function d(a){var c=b.createElement("canvas"),d=c.getContext&&c.getContext("2d");return d&&d.fillText?(d.textBaseline="top",d.font="600 32px Arial","flag"===a?(d.fillText(String.fromCharCode(55356,56812,55356,56807),0,0),c.toDataURL().length>3e3):(d.fillText(String.fromCharCode(55357,56835),0,0),0!==d.getImageData(16,16,1,1).data[0])):!1}function e(a){var c=b.createElement("script");c.src=a,c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var f,g;c.supports={simple:d("simple"),flag:d("flag")},c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.simple&&c.supports.flag||(g=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",g,!1),a.addEventListener("load",g,!1)):(a.attachEvent("onload",g),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),f=c.source||{},f.concatemoji?e(f.concatemoji):f.wpemoji&&f.twemoji&&(e(f.twemoji),e(f.wpemoji)))}(window,document,window._wpemojiSettings);
		</script>
<link rel='stylesheet' id='minimum-google-fonts-css'  href='//fonts.googleapis.com/css?family=Roboto%3A300%2C400%7CRoboto+Slab%3A300%2C400&#038;ver=3.0.1' type='text/css'/>

<section id="about123" class="ch_bg">
        <div class="container">
           <div class="portfolio_main">
		   <h2 class="about_tit text-center wow fadeInDown">GALLERY</h2>
		   
<link rel="stylesheet" id="foobox-free-min-css" href="<?=base_url()?>css/foobox.css" type="text/css" media="all">
<script type="text/javascript" src="<?=base_url()?>js/jquery_002.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/jquery-migrate.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/foobox.js"></script>
			
			<?php
			$i = 0;
				if($causes)
				{
					foreach($causes as $causes_data)
					{
						if($i<9)
						{
						if($causes_data->image!='')
						{
			?>
					<div id="foogallery-gallery-266" class="foogallery-container foogallery-thumbnail foogallery-lightbox-foobox-free caption-scale position-block fbx-instance">
								<a class="fbx-link" href="<?=base_url()?>causes_images/<?=$causes_data->image?>">
									<img src="<?=base_url()?>causes_images/<?=$causes_data->image?>" class="img-responsive">        
									<span class="thumbnail-caption" style="background-color: rgba(0, 0, 0, 0.8); color:rgb(255, 255, 255)">
										<h3><?=$causes_data->title?></h3>										
									</span>
								</a>
								<div style="display: none;">
								
									<?php
										if($causes_gallery)
										{
											foreach($causes_gallery as $causes_gallery_data)
											{
												if($causes_gallery_data->cause_id == $causes_data->id)
												{
									?>
									<a class="fbx-link" href="<?=base_url()?>causes_images/<?=$causes_gallery_data->image?>" data-caption-title="<?=$causes_data->title?>" data-caption-desc="" data-attachment-id="">
										<img src="<?=base_url()?>causes_images/<?=$causes_gallery_data->image?>"class="img-responsive">
									</a>
									<?php
												}
											}
											
										}
									
									?>
									
								</div>
							</div>
			<?php
							$i++;
						}
						}
					}
				}
				
			?>
							<style type="text/css">.foogallery-thumbnail h3 {
								color: #fff !important;
								}
							</style>
							

<script type="text/javascript">/* Run FooBox FREE (v1.0.6) */
	(function( FOOBOX, $, undefined ) {
	  FOOBOX.o = {wordpress: { enabled: true }, excludes:'.fbx-link,.nofoobox,.nolightbox,a[href*="pinterest.com/pin/create/button/"]', affiliate : { enabled: false }};
	  FOOBOX.init = function() {
	    $(".fbx-link").removeClass("fbx-link");
	    $(".foobox, .gallery, .wp-caption, a:has(img[class*=wp-image-]), .foogallery-container.foogallery-lightbox-foobox, .foogallery-container.foogallery-lightbox-foobox-free").foobox(FOOBOX.o);
	  };
	}( window.FOOBOX = window.FOOBOX || {}, jQuery ));
	
	FooBox.ready(function() {
	  //preload the foobox font
	  jQuery("body").append("<span style=\"font-family:'foobox'; color:transparent; position:absolute; top:-1000em;\">f</span>");
	  FOOBOX.init();
	
	});
</script>	
							
							
							
							
						<!--<div id="portfoliolist">
							<div class="portfolio sgi" data-cat="sgi">
								<div class="portfolio-wrapper">
									<div class="fancyDemo imgLiquidFill imgLiquid">
										<a rel="group" title="" href="images/06.jpg"><img src="<?=base_url()?>images/06.jpg" alt=""class="img-responsive"/></a>
									</div>
									<div class="label">
										<div class="label-text">
											<span class="text-category">SHARDA GRoup Of InSTITUTIONS (SGI)</span>
										</div>
										<div class="label-bg"></div>
									</div>
								</div>
							</div>
							<div class="portfolio sgi" data-cat="sgi">
								<div class="portfolio-wrapper">
									<div class="fancyDemo imgLiquidFill imgLiquid">
										<a rel="group" title="" href="images/06.jpg"><img src="<?=base_url()?>images/06.jpg" alt=""class="img-responsive"/></a>
									</div>
									<div class="label">
										<div class="label-text">
											<span class="text-category">SHARDA GRoup Of InSTITUTIONS (SGI)</span>
										</div>
										<div class="label-bg"></div>
									</div>
								</div>
							</div>
                            
                            <div class="portfolio sgi" data-cat="sgi">
								<div class="portfolio-wrapper">
									<div class="fancyDemo imgLiquidFill imgLiquid">
										<a rel="group" title="" href="images/06.jpg"><img src="<?=base_url()?>images/06.jpg" alt=""class="img-responsive"/></a>
									</div>
									<div class="label">
										<div class="label-text">
											<span class="text-category">SHARDA GRoup Of InSTITUTIONS (SGI)</span>
										</div>
										<div class="label-bg"></div>
									</div>
								</div>
							</div>
                            
                            <div class="portfolio sgi" data-cat="sgi">
								<div class="portfolio-wrapper">
									<div class="fancyDemo imgLiquidFill imgLiquid">
										<a rel="group" title="" href="images/06.jpg"><img src="<?=base_url()?>images/06.jpg" alt=""class="img-responsive"/></a>
									</div>
									<div class="label">
										<div class="label-text">
											<span class="text-category">SHARDA GRoup Of InSTITUTIONS (SGI)</span>
										</div>
										<div class="label-bg"></div>
									</div>
								</div>
							</div>
							
							
							
                            
                            
                            <div class="portfolio bhiwadi" data-cat="bhiwadi">
								<div class="portfolio-wrapper">
									<div class="fancyDemo imgLiquidFill imgLiquid">
										<a rel="group" title="" href="images/06.jpg"><img src="<?=base_url()?>images/06.jpg" alt=""class="img-responsive"/></a>
									</div>
									<div class="label">
										<div class="label-text">
											<span class="text-category">BB  MALL  (BhiWADI)</span>
										</div>
										<div class="label-bg"></div>
									</div>
								</div>
							</div>
                            
                            <div class="portfolio bhiwadi" data-cat="bhiwadi">
								<div class="portfolio-wrapper">
									<div class="fancyDemo imgLiquidFill imgLiquid">
										<a rel="group" title="" href="images/06.jpg"><img src="<?=base_url()?>images/06.jpg" alt=""class="img-responsive"/></a>
									</div>
									<div class="label">
										<div class="label-text">
											<span class="text-category">BB  MALL  (BhiWADI)</span>
										</div>
										<div class="label-bg"></div>
									</div>
								</div>
							</div>
                            
                            <div class="portfolio bhiwadi" data-cat="bhiwadi">
								<div class="portfolio-wrapper">
									<div class="fancyDemo imgLiquidFill imgLiquid">
										<a rel="group" title="" href="images/06.jpg"><img src="<?=base_url()?>images/06.jpg" alt=""class="img-responsive"/></a>
									</div>
									<div class="label">
										<div class="label-text">
											<span class="text-category">BB  MALL  (BhiWADI)</span>
										</div>
										<div class="label-bg"></div>
									</div>
								</div>
							</div>
                            
                            <div class="portfolio bhiwadi" data-cat="bhiwadi">
								<div class="portfolio-wrapper">
									<div class="fancyDemo imgLiquidFill imgLiquid">
										<a rel="group" title="" href="images/06.jpg"><img src="<?=base_url()?>images/06.jpg" alt=""class="img-responsive"/></a>
									</div>
									<div class="label">
										<div class="label-text">
											<span class="text-category">BB  MALL  (BhiWADI)</span>
										</div>
										<div class="label-bg"></div>
									</div>
								</div>
							</div>
                            
                           
                            
						</div>-->
			<div class="clearfix"></div>
			
		</div>
		<a href="<?=base_url()?>causes/gallery" class="more_cause">More +</a>
	</div>
		</div>
    </section>
   

    

    
        <section id="get-in-touch" class="ch_bg">
		<?php
			if (($this -> session -> userdata('user_id') == "")) 
			{
		?>
        <div class="container">
            <div class="section-header">
                <h2 class="about_tit text-center wow fadeInDown">LOGIN</h2>
                <p class="text-center wow fadeInDown" style="color:#000000">
				</p>
            </div>
			<div class="row">
			<div class="log_boot">
                <div class="col-md-2"></div>
				<!--<div class="col-md-3 chk_box"><a href="#"><img src="<?=base_url()?>images/facebook_box.png"></a></div>-->
				<button data-ember-action="16" class="facebook" id="facebook">FACEBOOK</button>
                <div class="col-md-3 chk_box"><a href="javascript:" id="gplus"><img src="<?=base_url()?>images/google_box.png"></a></div>
                <div class="col-md-3 chk_box"><a href="javascript:" id="twitter"><img src="<?=base_url()?>images/twitter_box.png"></a></div>
                </div>
        </div>
         <h2 class="about_tit text-center wow fadeInDown" style="padding:20px 0">OR</h2>
         
		 
		
		
        <form id="login_panel" name="" method="">
			<div style="text-align:center">
				<input type="text" class="login_box" id="l_email" autocomplete="off" placeholder="Email Id">
				<input type="password" class="login_box" id="l_password" autocomplete="off" placeholder="Password">
			</div>
			
			<div class="f_pass">
				<a href="javascript:" onclick="forgot_popup()">FORGET PASSWORD</a>
			</div>
         
			<div class="efog">
				<div class="col-md-2"></div>

				
				<!--<div class="col-md-3 chk_box"><input type="checkbox" id=""> FORGOT EMAIL ID</div>-->
			</div>
			<div style="clear:both"></div>
			<div style="text-align:center;">
				<input type="button" onclick="login_process()" class="login_box6" value="GET INVOLVED">
			</div>
			
			<!--<div class="col-md-3 ger_in get_main_cun"><img src="<?=base_url()?>images/get_involved.png"></div>-->
        </form>
		
		<div style="clear:both"></div>
		<div class="action_field_div">
			<div class="col-md-3 chk_box action_fields">
				<!--<input type="checkbox" id="register_box" onclick="display_register()"> NEW REGISTERATION-->
				<a href="javascript:" id="0" onclick="display_register()" class="resg">NEW REGISTERATION</a>
			</div>
			
		</div>
		<?php }else{ ?>
			<div style="text-align:center">
				<input type="button" class="login_box6" value="Logout" onclick="JavaScript: document.location.href='<?=base_url()?>home/logout';">
			</div>
		<?php } ?>
		
		
		
		<div style="clear:both"></div>
		
		<form id="register_panel" name="" method="" style="display:none">
			
			<div style="clear:both"></div>
			<div class="col-md-2"></div>
			<div class="efog">
				<div class="col-md-2"></div>
				
			</div>
			<div style="clear:both"></div>
			<div class="col-md-2"></div>
			<div class="col-md-9 form_box_all" style="margin-top:21px;">
				 <input type="text" class="login_box7" id="fname" placeholder="First Name">
				 <input type="text" class="login_box7" id="lname" placeholder="Last Name">
				 <input type="text" class="login_box7" id="city" placeholder="City">
				 <input type="text" class="login_box7" id="state" placeholder="State">
				 <input type="text" class="login_box7" id="r_email" placeholder="Email">
				 <input type="text" class="login_box7" id="r_password" placeholder="Password">
				 <input type="text" class="login_box7" id="pnumber" placeholder="Mobile Number">
			</div>
			 
			 <div style="text-align:center;">
				<input type="button" onclick="register_process()" class="login_box6" value="SIGNUP">
			</div>
		
		
			
        </form>
		
		
		</div>
    </section>
	
	
	<!-- Forgot Password Section Start -->
	<script type="text/javascript">
		function forgot_popup()
		{ 
			$('#openModalforgot').css('display','block');
			return false;
		}
			
		function forgot_popup_hide()
		{
			$('#openModalforgot').css('display','none');
		}
		
		function forgot_process()
		{
			var email = $('#f_email').val();
			if(email=='')
			{
				$(".notification-bar").html('Please Provide Your Email.'); 
				$(".notification-bar").css('display','block'); 
				setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
				return false;
			}
			
			$('.loader').html('<img src="<?=base_url()?>images/loading.gif" style=" display: block;width: 50px;">');
			var dataString = '&email='+ email;
			
			$.ajax({
					type: "POST",
					url: '<?=base_url()?>home/forgot_process',
					data: dataString,
					cache: false,
					success: function(result){
							if(result)
							{
								$('.loader').html('');
								$(".notification-bar").html('We have sent you a temporary password throught email.'); 
								$(".notification-bar").css('display','block'); 
								setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
								return false;
							}
							else
							{
								$('.loader').html('');
								$(".notification-bar").html('Please Provide valid Email Id.'); 
								$(".notification-bar").css('display','block'); 
								setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
								return false;

							}
					}
				});
				return false;		
		}

	</script>
	
	
<div id="openModalforgot" class="mb_elegantModal" style="display: none;">
	<div class="animated  swing">
			
		<a title="Close" class="mb_elegantModalclose" onclick="return forgot_popup_hide()">X</a>
		<h2>Forgot Password</h2>

		<form id="login_panel1" name="" method="">
			<div style="text-align:center">
				<input type="text" class="login_box" id="f_email" placeholder="Email Id">
			</div>
         
			
			<div style="clear:both"></div>
			<div style="text-align:center;">
				<input type="button" onclick="forgot_process()" class="login_box6" value="Submit">
				
				<span class="loader">
					
				</span>
				
			</div>
			
			<!--<div class="col-md-3 ger_in get_main_cun"><img src="<?=base_url()?>images/get_involved.png"></div>-->
        </form>
		
		<div style="clear:both"></div>
	</div>
	
</div>

<style type="text/css">

#openModalforgot p
{
	font-size: 11px!important;
	text-align: left!important;
	color: black!important;
	width: 95%;
	margin: 9px auto;
}
#openModalforgot
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
.forgot_error
{
	color:red!important;
	font-size: 13px!important;
}

#openModalforgot h2
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
	
	<!-- Forgot Password Section End -->
	<!--<script src="<?=base_url()?>js/jquery.js"></script>-->
    <script type="text/javascript">
		$(document).ready(function(){
			
			$("#facebook").click(function () {
					location.href="<?=base_url()?>fbconfig.php";
				});
				
				$("#twitter").click(function () {
					location.href="<?=base_url()?>twitterconfig.php";
				});
				
				$("#gplus").click(function () {
					location.href="<?=base_url()?>gplus_login.php";
				});
		});
		function login_process()
		{
			var email = $('#l_email').val();
			if(email=='')
			{
				$(".notification-bar").html('Please Provide Your Email.'); 
				$(".notification-bar").css('display','block'); 
				setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
				return false;
			}
			var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

			if(!email.match(filter))
			{
				$(".notification-bar").html('Please Provide valid Email address'); 
				$(".notification-bar").css('display','block'); 
				setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
				return false;
			}
			
			var password = $('#l_password').val();
			if(password=='')
			{
				$(".notification-bar").html('Please Provide Password'); 
				$(".notification-bar").css('display','block'); 
				setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
				return false;
			}
			
			var dataString = '&email='+ email + '&password='+ password;
			
			$.ajax({
					type: "POST",
					url: '<?=base_url()?>home/login_process',
					data: dataString,
					cache: false,
					success: function(result){
							if(result)
							{
								window.location.href='<?=base_url()?>home/index';
							}
							else
							{
								$(".notification-bar").html('Please Provide valid Email Id & Password.'); 
								$(".notification-bar").css('display','block'); 
								setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
								return false;

							}
					}
				});
				return false;		
		}
		
		
		
		
		
		function register_process()
		{
			var letters = /^[A-Za-z]+$/;
			
			var fname = $('#fname').val();
			if(fname=='')
			{
				$(".notification-bar").html('Please Provide Your First Name.'); 
				$(".notification-bar").css('display','block'); 
				setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
				return false;
			}
			if(!fname.match(letters))
			 {  
				$(".notification-bar").html('First Name should not contain number.'); 
				$(".notification-bar").css('display','block'); 
				setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
				return false;
			 }
			
			
			
			var lname = $('#lname').val();
			if(lname=='')
			{
				$(".notification-bar").html('Please Provide Your Last Name.'); 
				$(".notification-bar").css('display','block'); 
				setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
				return false;
			}
			if(!lname.match(letters))
			 {  
				$(".notification-bar").html('Last Name should not contain number.'); 
				$(".notification-bar").css('display','block'); 
				setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
				return false;
			 }
			
			var city = $('#city').val();
			if(city=='')
			{
				$(".notification-bar").html('Please Provide Your City.'); 
				$(".notification-bar").css('display','block'); 
				setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
				return false;
			}
			
			if(!city.match(letters))
			 {  
				$(".notification-bar").html('City should not contain number.'); 
				$(".notification-bar").css('display','block'); 
				setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
				return false;
			 }
			
			
			var state = $('#state').val();
			if(state=='')
			{
				$(".notification-bar").html('Please Provide Your State'); 
				$(".notification-bar").css('display','block'); 
				setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
				return false;
			}
			
			if(!state.match(letters))
			 {  
				$(".notification-bar").html('State should not contain number.'); 
				$(".notification-bar").css('display','block'); 
				setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
				return false;
			 }
			
			
			var r_email = $('#r_email').val();
			if(r_email=='')
			{
				$(".notification-bar").html('Please Provide Your Email.'); 
				$(".notification-bar").css('display','block'); 
				setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
				return false;
			}
			
			var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

			if(!r_email.match(filter))
			{
				$(".notification-bar").html('Please Provide valid Email address'); 
				$(".notification-bar").css('display','block'); 
				setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
				return false;
			}
			
			var r_password = $('#r_password').val();
			if(r_password=='')
			{
				$(".notification-bar").html('Please Provide Password'); 
				$(".notification-bar").css('display','block'); 
				setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
				return false;
			}
			
			var numbers = /^[0-9]+$/;  
			var pnumber = $('#pnumber').val();
			if(!pnumber.match(numbers))
			 {  
				$(".notification-bar").html('Please Provide valid Mobile No.'); 
				$(".notification-bar").css('display','block'); 
				setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
				return false;
			 }
			
			var dataString = '&fname='+ fname + '&lname='+ lname + '&city='+ city + '&state='+ state + '&email='+ r_email + '&password='+ r_password + '&mobile='+ pnumber;
			
			$.ajax({
					type: "POST",
					url: '<?=base_url()?>home/register_process',
					data: dataString,
					cache: false,
					success: function(result){
							if(result)
							{
								$(".notification-bar").html('Congratulation. You have sucessfully Signed Up.'); 
								$(".notification-bar").css('display','block'); 
								setTimeout(function() { window.location.href='<?=base_url()?>home/index'; }, 5000);
								return false;
							}
							else
							{
								$(".notification-bar").html('This Email is already used. Please Provide different Email Id.'); 
								$(".notification-bar").css('display','block'); 
								setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
								return false;

							}
					}
				});
				return false;
		}
		function display_register()
		{
			var id = $('.resg').attr('id');
			
			if(id=='0')
			{
				$('#register_panel').css('display','block');
				$('#login_panel').css('display','none');
				$('.resg').attr('id','1');
			}
			else
			{
				$('#register_panel').css('display','none');
				$('#login_panel').css('display','block');
				$('.resg').attr('id','0');
			}
			
			/*
			if($('#register_box').prop("checked") == true)
			{
				$('#register_panel').css('display','block');
				$('#login_panel').css('display','none');
			}
			else
			{
				$('#register_panel').css('display','none');
				$('#login_panel').css('display','block');
			}
			*/
			
		}
		
		function display_register1()
		{
			/*
			if($('#register_box1').prop("checked") == true)
			{
				$('#register_panel').css('display','block');
				$('#login_panel').css('display','none');
			}
			else
			{
				$('#register_panel').css('display','none');
				$('#login_panel').css('display','block');
			}
			
			*/
		}
	</script>
    
<script src="<?=base_url()?>js/main.js"></script>
<!--<script src="<?=base_url()?>js/jquery.js"></script>-->
    <script src="<?=base_url()?>js/bootstrap.min.js"></script>
    
    <!--<script src="<?=base_url()?>js/owl.carousel.min.js"></script>-->
	
    <script src="<?=base_url()?>js/mousescroll.js"></script>
    <script src="<?=base_url()?>js/smoothscroll.js"></script>
    <script src="<?=base_url()?>js/jquery.prettyPhoto.js"></script>
    <script src="<?=base_url()?>js/jquery.isotope.min.js"></script>
    <script src="<?=base_url()?>js/jquery.inview.min.js"></script>
    <script src="<?=base_url()?>js/wow.min.js"></script>
    
	
	<script type="text/javascript" src="<?=base_url()?>gall/jquery.min.js"></script>
	<link rel="stylesheet" href="<?=base_url()?>css/slippry.css">
	<script src="<?=base_url()?>js/slippry.min.js"></script>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

		<script type="text/javascript" src="<?=base_url()?>gall/fliplightbox.min.js"></script>
		<script type="text/javascript">
		
			$('body').flipLightBox()
		</script>
		
		<script type="text/javascript" src="<?=base_url()?>gall/jquery.mixitup.min.js"></script>
		<script type="text/javascript">
			$(function() {

				var filterList = {

					init : function() {

						// MixItUp plugin
						// http://mixitup.io
						$('#portfoliolist').mixitup({
							targetSelector : '.portfolio',
							filterSelector : '.filter',
							effects : ['fade'],
							easing : 'snap',
							// call the hover effect
							onMixEnd : filterList.hoverEffect()
						});

					},

					hoverEffect : function() {

						// Simple parallax effect
						$('#portfoliolist .portfolio').hover(function() {
							$(this).find('.label').stop().animate({
								bottom : 0
							}, 200, 'easeOutQuad');
							$(this).find('img').stop().animate({
								top : -30
							}, 500, 'easeOutQuad');
						}, function() {
							$(this).find('.label').stop().animate({
								bottom : -40
							}, 200, 'easeInQuad');
							$(this).find('img').stop().animate({
								top : 0
							}, 300, 'easeOutQuad');
						});

					}
				};

				// Run the show!
				filterList.init();

			});
		</script>
<!-- start light_box -->
<link rel="stylesheet" type="text/css" href="<?=base_url()?>gall/jquery.fancybox.css" media="screen" />

<script type="text/javascript" src="<?=base_url()?>gall/jquery.fancybox-1.2.1.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("div.fancyDemo a").fancybox();
		});
	</script>
	<style>
	
	.portfolio-items
	{
		overflow:visible!important;
	}
	
	.sy-controls
	{
		display:block!important;
	}
</style>