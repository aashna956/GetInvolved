<link rel="stylesheet" id="foobox-free-min-css" href="<?=base_url()?>css/foobox.css" type="text/css" media="all">
<script type="text/javascript" src="<?=base_url()?>js/jquery_002.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/jquery-migrate.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/foobox.js"></script>
<link rel='stylesheet' id='foobox-free-min-css'  href='http://foo.gallery/wp-content/plugins/foobox-image-lightbox/css/foobox.free.min.css?ver=1.0.6' type='text/css' media='all' />
<link rel='stylesheet' id='minimum-google-fonts-css'  href='//fonts.googleapis.com/css?family=Roboto%3A300%2C400%7CRoboto+Slab%3A300%2C400&#038;ver=3.0.1' type='text/css' media='all' />


    <section id="about" class="ch_bg">
        <div class="container">
           <div class="portfolio_main">
		   <h2 class="about_tit text-center wow fadeInDown">GALLERY</h2>
		   

			
			<?php
				if($causes)
				{
					foreach($causes as $causes_data)
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
							
							
					
			<div class="clearfix"></div>
			
		</div>
	</div>
		</div>
    </section>
   
	
    <script src="<?=base_url()?>js/bootstrap.min.js"></script>
    
	<script type="text/javascript" src="<?=base_url()?>gall/jquery.min.js"></script>
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
	</style>