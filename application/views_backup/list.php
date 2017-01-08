<script src="<?=base_url()?>js/modernizr-2.6.2.min.js"></script>	
<link rel="stylesheet" href="<?=base_url()?>css/style-selector.css"> 
<link rel="stylesheet" href="<?=base_url()?>css/style3.css"> 
		
<div id="main">
	<section id="CAUSEDETAILS">
        <div class="container container2 list_section blo">
		
		<script type="text/javascript">
		
			function cat_filter(cat_id)
			{
				var area_value = $('#area_value').val();
				var city_value = $('#city_value').val();
				
				if(cat_id!='0' && cat_id!=0)
				{
					$('.cuases_section').html('<span class="load_cat"><img title="Preview" src="<?=base_url()?>images/loading.gif" height="64px" width="64px"></span>');
					var dataString = '&area_value='+ area_value + '&city_value='+ city_value + '&cat_id='+ cat_id;
						
						$.ajax({
								type: "POST",
								url: '<?=base_url()?>causes/cat_filter',
								data: dataString,
								cache: false,
								success: function(result){
										if(result)
										{
											$('.cuases_section').html(result);
											return false;
										}
										else
										{
											$('.cuases_section').html('No Cause found');
											return false;
										}
								}
							});
							return false;	
				}
			}
			
		</script>
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
		
		
			<div class="col-md-2">
				<div class="right-section clearfix">
					<p class="voffset2 large-font">Categories</p>
					  <div class="tabbable tabs-right voffset2" id="project-categories">
						<ul class="nav nav-tabs">
							<?php
							
								if($categories)
								{
							?>
									<li role="presentation" class="active no-top-margin" id="category-all">
										<a role="tab" data-category-id="" data-remote="true" href="<?=base_url()?>causes/lists">All categories</a>
									</li>
							<?php
									foreach($categories as $categories_data)
									{
							?>
										<li id="category-1" class="">
										  <a data-category-id="1" role="tab" data-remote="true" href="javascript:" onclick="cat_filter('<?=$categories_data->id?>')"><?=$categories_data->title?></a>
										</li>
							<?php
									}
								}
								else
								{
							?>
										<li id="category-1" class="">
										  No Category Found.
										</li>
							<?php
								}
							?>
							
							
						</ul>
					</div>
					<!-- /tabs -->
				</div>
			</div>
		
		<style type="text/css">
		span.load_cat
		{
			clear: both;
			position: absolute;
			background: rgba(89, 89, 89, 0.16) none repeat scroll 0% 0%;
			width: 94%;
			height: 100%;
			opacity: 0.3;
			margin-left: 2%;
		}
		span.load_cat img
		{
			width: 50px;
			margin: 3% auto 0px 6%;
			
		}
		ul#area_list_id {
			width: 206px;
			border: 1px solid #eaeaea;
			position: absolute;
			z-index: 9;
			background: #f3f3f3;
			list-style: none;
			padding-left: 0px;
		}
		ul#area_list_id li {
			padding: 2px;
		}
		ul#area_list_id li:hover {
			background: #eaeaea;
		}
		#area_list_id {
			display: none;
		}
		
		ul#city_list_id {
			width: 206px;
			border: 1px solid #eaeaea;
			position: absolute;
			z-index: 9;
			background: #f3f3f3;
			list-style: none;
			left:50%;
			padding-left: 0px;
			
		}
		ul#city_list_id li {
			padding: 2px;
		}
		ul#city_list_id li:hover {
			background: #eaeaea;
		}
		#city_list_id {
			display: none;
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
		$(document).on('click', function( e ) {
			var container = $("#areabox");
			
			if (!container.is(e.target) // if the target of the click isn't the container...
				&& container.has(e.target).length === 0) // ... nor a descendant of the container
			{
				$('#area_list_id').hide();
				$('#city_list_id').hide();
			}
		   
		});
		function areaautocomplet() {
			$('#city_list_id').hide();
			var min_length = 0; // min caracters to display the autocomplete
			var keyword = $('#areabox').val();
			if (keyword.length > min_length) {
				$.ajax({
					url: '<?=base_url()?>causes/areaautocomplet',
					type: 'POST',
					data: {keyword:keyword},
					success:function(data){
						$('#area_list_id').show();
						$('#area_list_id').html(data);
					}
				});
			} else {
				$('#area_list_id').hide();
			}
		}
		function set_item(item) {
			$('#areabox').val(item);
			$('#area_list_id').hide();
		}
		
		function cityautocomplet() {
			$('#area_list_id').hide();
			var min_length = 0; // min caracters to display the autocomplete
			var keyword1 = $('#citybox').val();
			if (keyword1.length > min_length) {
				$.ajax({
					url: '<?=base_url()?>causes/cityautocomplet',
					type: 'POST',
					data: {keyword1:keyword1},
					success:function(data){
						$('#city_list_id').show();
						$('#city_list_id').html(data);
					}
				});
			} else {
				$('#city_list_id').hide();
			}
		}
		function city_set_item(item) {
			$('#citybox').val(item);
			$('#city_list_id').hide();
		}
		function validate_filter()
		{
			var areabox = $('#areabox').val();
			var citybox = $('#citybox').val();
			
			if(citybox=='' && areabox=='')
			{
				$(".notification-bar").html('Please Provide Search value.'); 
				$(".notification-bar").css('display','block'); 
				setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
				return false;
			}
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
			<div class="col-md-10">
	
				<section id="CAUSEDETAILS">
       
					<div class="col-sm-12 padd-input">
						<form action="<?=base_url()?>causes/filter" method="post" onsubmit="return validate_filter()">
							<!--<input type="text" class="box-text" placeholder="Search by Title">&nbsp&nbsp-->
							<input type="text" name="areabox" autocomplete="off" id="areabox" onkeyup="areaautocomplet()" class="box-text" placeholder="Search by Area" value="<?=($area_value)?$area_value:''?>">&nbsp&nbsp
							<ul id="area_list_id"></ul>
							
							
							<input type="text" class="box-text" autocomplete="off" placeholder="Search by City" name="citybox" id="citybox" onkeyup="cityautocomplet()" value="<?=($city_value)?$city_value:''?>">
							<ul id="city_list_id"></ul>
							
							<input type="submit" name="search_submit" id="search_submit" value="Search">
						</form>
						
						<input type="hidden" name="area_value" id="area_value" value="<?=($area_value)?$area_value:''?>" />
						<input type="hidden" name="city_value" id="city_value" value="<?=($city_value)?$city_value:''?>" />
						
					</div>
		
					<div class="col-sm-12">
				
						<div class="row blog-list blog-masonry isotope-masonry cuases_section" style="position: relative; height: 5284px;">
						<?php $l1 = "0px"; $l2 = "312px"; $l3 = "624px"; ?>
                        
						<?php
							if($causes)
							{
								foreach($causes as $causes_data)
								{
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
															<img src="../images/ignite.png" title="Cause Owner" class="wrap_image_throb">
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
																	<img src="../images/ignite.png" title="Request waiting to Approve" class="wrap_image_throb">
																</a>';
											}	
											else
											{
												$ignite_option = '<a href="javascript:" onclick="cause_action(0,'.$rand.')">
																	<img src="../images/ignite.png" title="Leave Cause" class="wrap_image_throb">
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
									<div class="col-sm-6 col-md-4 blog-item isotope-item" style="">
										<input type="hidden" name="cause_id" id="cause_id<?=$rand?>" value="<?=$causes_data->id?>">
										<div class="blog-image">
											<a href="<?=base_url()?>causes/details/<?=$causes_data->id?>" class="img-eye-hover">
												<img src="<?=base_url()?>causes_images/<?=$causes_data->image?>" alt="" style="width:370px;height:246px;">
											</a>
										</div>
										
										<div class="blog-body">
											<div class="icon-chat">
												<a href="javascript:" onclick="cause_action(0)">
													<?=$ignite_option?>
												</a>
												
												<a onclick= 'twshare("https://twitter.com/home?status= <?=$causes_data->title?>+<?=base_url()?>causes/details/<?=$causes_data->id?>")' href="javascript:" class="right_social">
													<img src="<?=base_url()?>images/t_share.png">
												</a>
												
												<a href="javascript:fbShare('<?=base_url()?>causes/details/<?=$causes_data->id?>', '<?=$causes_data->title?>', '<?=substr($causes_data->details,0,10)?>', '<?=base_url()?>causes_images/<?=$causes_data->image?>', 520, 350)" class="right_social1">
													<img src="<?=base_url()?>images/f_share.png">
												</a>
											</div>
											
											
											<h3 class="blog-title">
												<a href="<?=base_url()?>causes/details/<?=$causes_data->id?>">
													<?=substr($causes_data->title,0,35)?>
												</a>
											</h3>
											<p class="blog-info"><a href="<?=base_url()?>user/timeline/<?=$causes_data->userid?>">INGNITED BY
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
											 on <time datetime="2014-01-16"><?=date('F j, Y',strtotime($causes_data->edate))?></time> <!--/ <a href="#">15 Comments</a></p>-->
											  
											<div class="blog-excerpt">
												<p><?=substr($causes_data->details,0,120)?></p>
											</div>
											<a href="<?=base_url()?>causes/details/<?=$causes_data->id?>" class="btn btn-default blog-readmore">Read more</a>
										</div>
									</div>
						<?php
								}
							}
							else
							{
						?>
								<div class="col-sm-6 col-md-4 blog-item isotope-item" style="">
										
										<div class="blog-body">
											
											<p class="blog-info">
												No Causes Available.
											</p>
											
										</div>
									</div>
						<?php
							}
						?>
								</div>
		
		
		
		 </section>

	
	</div>
	
		</div>
		
		
		
		
		 </section>
          

            <div class="section">
			
		
               <section>
                  <div class="container">

                     <di

                  </div> <!-- container -->
               </section>
            </div> <!-- section -->

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
            <!--<div id="footer" class="ft-single-post text-center">
               <footer>
                  <a href="javascript:" class="footer-loadmore" data-link="#" data-offset="5" data-items-per-page="5" style="display: inline;">Load more</a>
                  <span class="loading-spinner" style="display: none;"></span>
               </footer>
            </div>
			-->

         </div> <!-- main -->

		 
	<script src="<?=base_url()?>js/jquery-1.10.2.min.js"></script>
	<script src="<?=base_url()?>js/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="<?=base_url()?>js/jquery.touchSwipe.min.js"></script>

	<script src="<?=base_url()?>js/carousel.js"></script>
	<script src="<?=base_url()?>js/tab.js"></script>
	<script src="<?=base_url()?>js/collapse.js"></script>
	<script src="<?=base_url()?>js/transition.js"></script>


	<script src="<?=base_url()?>js/jquery.knob.min.js"></script>
	<script src="<?=base_url()?>js/fastclick.min.js"></script>
	<script src="<?=base_url()?>js/jquery.stellar.min.js"></script>

	<script src="<?=base_url()?>js/jquery.mousewheel.js"></script>
	<script src="<?=base_url()?>js/perfect-scrollbar.min.js"></script>
	<script src="<?=base_url()?>js/jquery.mtmenu.js"></script>

	<script src="<?=base_url()?>js/isotope.pkgd.min.js"></script>

	<script src="<?=base_url()?>js/plugins.js"></script>
	<script src="<?=base_url()?>js/main.js"></script>