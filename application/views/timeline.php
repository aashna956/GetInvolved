
 

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=532121923604176";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>



<section id="CAUSEDETAILS">
			<div class="container blo2">
				<div class="box_mar box_mar2">
					<div class="portfolio-items al_box isotope" style="position: relative; overflow: hidden;">
						
						<div class="media comment_section">
                            <div class="pull-left post_comments pull-left2 timeline_pic">
							<?php
								if($profile[0]->image!="")
								{
							?>
									<img src="<?=$profile[0]->image?>"  alt="" class="Image"/>
							<?php
								}
								else
								{
							?>
									<img src="<?=base_url()?>images/blog1.jpg"  alt="" class="timeline_profile_image"/>
							<?php
								}
							?>
									
									
                            </div>
                            <div class="media-body post_reply_comments time1">
								<div style="width:100%;padding-bottom:99px;">
									<div class="col-sm-5 heading">
									
										<h2>
											<?=($profile[0]->fname)?ucfirst($profile[0]->fname):''?> 
											<?=($profile[0]->lname)?ucfirst($profile[0]->lname):''?>
										</h2>
											
										<p class="loc">LOCATION : <?=($profile[0]->city)?ucfirst($profile[0]->city).",":''?> <?=($profile[0]->state)?ucfirst($profile[0]->state):''?></p>
									</div>
									<?php $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
										$twitter_title = 'Get Involved User Timeline';
									
									?>
									<div class="col-sm-2 icon-right">
										<a href="javascript:fbShare('<?=$actual_link?>', '<?=ucfirst($profile[0]->fname)?>', 'TimeLine', '<?=($profile[0]->image)?$profile[0]->image:''?>', 520, 350)">
											<img src="<?=base_url()?>images/thank.png" />
										</a>
										<a onclick= 'twshare("https://twitter.com/home?status=<?=$twitter_title?>+<?=$actual_link?>")' href="javascript:">
											<img src="<?=base_url()?>images/face.png" />
										</a>
									</div>
							
								</div>
								<script>
    function fbShare(url, title, descr, image, winWidth, winHeight) {
        var winTop = (screen.height / 2) - (winHeight / 2);
        var winLeft = (screen.width / 2) - (winWidth / 2);
        window.open('http://www.facebook.com/sharer.php?m2w&s=100&p[title]=' + title + '&p[summary]=' + descr + '&p[url]=' + url + '&p[images][0]=' + image, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
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
<style type="text/css">
	.pluginButtonLabel
	{
		display:none!important;
	}
	
	.sp_plugin-button
	{
		background-image: url("http://webeyestech.com/demo/get_involved/images/thank.png")!important;
		background-size: auto auto!important;
		background-repeat: no-repeat!important;
		display: inline-block!important;
		height: 46px!important;
		width: 29px!important;
		background-color: white!important;
		border: 0px solid white!important;
	}
	
	.time-line-pro2 h3 a
	{
		color:black!important;
	}
	.time-line-pro4 h3 a img
	{
		width: 36px;
	}
</style>
                                <h3>About Me</h3>
                              
								<p>
									<?=($profile[0]->brief)?$profile[0]->brief:''?>
								</p>
                             
                            </div>
                        </div> 
						<hr/>
					</div>
				</div>
			</div>
		</section>
	
		<section id="CAUSEDETAILS">
			<div class="container blo2">
				<div class="time">
					<div class="time-heading">
						<h2>TIMELINE</h2>
					</div>
					<?php
					
						if($timeline && ($timeline) > 0)
						{
							foreach($timeline as $timeline_data)
							{
								
								/*if($timeline_data['userid'] == $this -> session -> userdata('user_id'))*/
								if($timeline_data['userid'] == $uid)
								{
					?>
								
									<div class="col-sm-6 border-1" style="padding-right:0px;">
										<div class="time-line-pro2  time-line-pro4">
											<h3>
											<a href="<?=base_url()?>causes/details/<?=$timeline_data['id']?>">
												<?=substr($timeline_data['title'],0,30)?>
												
												<img src="<?=base_url()?>images/ignite_icon1.png">
											</a>
											</h3>
											<div>
												<div class="time-right">
													<div class="volun-box-main">
														<h4><?=$timeline_data['volunters']?></h4>
														<p>VOLUNTEERS</p>
													</div>
													
													<div class="volun-box-main">
														<?php
														$now = strtotime(date('Y-m-d H:i:s')); // or your date as well
														$your_date = strtotime($timeline_data['edate']);
														 $datediff = $now - $your_date;
															
														?>
														<h4><?=$days_total =  floor($datediff/(60*60*24));?></h4>
														<p>DAY</p>
													</div>
												</div>
						
												<div class="time-left">
													<a href="<?=base_url()?>causes/details/<?=$timeline_data['id']?>">
														<img src="<?=base_url()?><?=($timeline_data['image'])?'causes_images/'.$timeline_data['image']:'images/blog1.jpg'?>">
													</a>
												</div>
						
												<div></div>
											</div>
										</div>
									</div>
									<div class="col-sm-6 sm2">
										<div class="time-line-pro2" style="padding-left:10px;" >
											<!--<a href="<?=base_url()?>causes/details/<?=$timeline_data['userid']?>">
												<img src="<?=base_url()?>images/ignite.png">
											</a>-->
										</div>
									</div>
								
								
					<?php		}
								else
								{
					?>
							
									<div class="col-sm-6 border-1" style="padding-right:0px;">
										<div class="time-line-pro">
											<!--<a href="<?=base_url()?>causes/details/<?=$timeline_data['userid']?>">
												<img src="<?=base_url()?>images/ignite.png">
											</a>-->
										</div>
						
										
									</div>
						
						
									<div class="col-sm-6 sm2">
										<div class="time-line-pro2">
											
											<h3>
											<a href="<?=base_url()?>causes/details/<?=$timeline_data['id']?>">
												<img src="<?=base_url()?>images/ignite.png">
												<?=substr($timeline_data['title'],0,30)?></h3>
											</a>
											<div style="margin-left:10px;">
												<div class="time-left">
													<a href="<?=base_url()?>causes/details/<?=$timeline_data['id']?>">
														<img src="<?=base_url()?><?=($timeline_data['image'])?'causes_images/'.$timeline_data['image']:'images/blog1.jpg'?>">
													</a>
												</div>
												
												<div class="time-right">
													<div class="volun-box-main">
														<h4><?=$timeline_data['volunters']?></h4>
														<p>VOLUNTEERS</p>
													</div>
													
													<div class="volun-box-main">
														<?php
														$now = strtotime(date('Y-m-d H:i:s')); // or your date as well
														$your_date = strtotime($timeline_data['edate']);
														 $datediff = $now - $your_date;
															
														?>
														<h4><?=$days_total =  floor($datediff/(60*60*24));?></h4>
														<p>DAY</p>
													</div>
												</div>
											
												<div></div>
											</div>
										</div>
									
									</div>
	
					<?php
								}
								echo '<div style="clear:both"></div>';
							}
						}
						/*
						else
						{
							echo "No Causes Ignited";
						}
						*/
					
					?>
					
					<!-- 111  -->
					<!--
					<div class="col-sm-6 border-1" style="padding-right:0px;">
						<div class="time-line-pro">
							<img src="<?=base_url()?>images/ignite.png">
						</div>
		
						
					</div>
		
		
					<div class="col-sm-6 sm2">
						<div class="time-line-pro2">
							<h3>EDUCATING SLUM CHILDREN2 </h3>
							<div style="margin-left:10px;">
								<div class="time-left">
									<img src="<?=base_url()?>images/time-pro.jpg">
								</div>
								
								<div class="time-right">
									<div class="volun-box-main">
										<h4>7</h4>
										<p>VOLUNTEERS</p>
									</div>
									
									<div class="volun-box-main">
										<h4>51</h4>
										<p>DAY</p>
									</div>
								</div>
							
								<div></div>
							</div>
						</div>
					
					</div>
					-->
					
					
					
					
					<!-- 222  -->
					<!--
					<div class="col-sm-6 border-1" style="padding-right:0px;">
						<div class="time-line-pro2  time-line-pro4">
							<h3>EDUCATING SLUM CHILDREN1 </h3>
							<div>
								<div class="time-right">
									<div class="volun-box-main">
										<h4>17506</h4>
										<p>VOLUNTEERS</p>
									</div>
									
									<div class="volun-box-main">
										<h4>51</h4>
										<p>DAY</p>
									</div>
								</div>
		
								<div class="time-left">
									<img src="<?=base_url()?>images/time-pro.jpg">
								</div>
		
								<div></div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 sm2">
						<div class="time-line-pro2" style="padding-left:10px;" >
							<img src="<?=base_url()?>images/ignite.png">
						</div>
					</div>
					
					
					-->
					
					
					
					
					
					
					
				</div>
			</div>
	</section>