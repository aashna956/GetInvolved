
<section id="CAUSEDETAILS">
    <div class="container container_detail">
        <div class="section-header section-header2">
            <h2 class="comments_title wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;"><?=$details[0]->title?></h2>
        </div>

        <div class="box_mar box_mar2">
            <div class="portfolio-items al_box isotope" style="position: relative; overflow: hidden;">
                
				<link href="<?=base_url()?>js/causegallerybox/jquery.css" rel="stylesheet" type="text/css">
				<script src="<?=base_url()?>js/causegallerybox/jquery_002.js" type="text/javascript"></script>
				<script src="<?=base_url()?>js/causegallerybox/jquery.js" type="text/javascript"></script>
				
				
				<section class="examples">
				
					<?php
						if($causes_gallery && count($causes_gallery) > 0)
						{
							foreach($causes_gallery as $causes_gallerydata)
							{
								
					?>
							<div class="example"> 
								<a class="sample" data-height="720" data-lighter="<?=base_url()?>causes_images/<?=$causes_gallerydata->image?>" data-width="1280" href="<?=base_url()?>causes_images/<?=$causes_gallerydata->image?>"> 
									<img src="<?=base_url()?>causes_images/<?=$causes_gallerydata->image?>"> 
								</a> 
							</div>
					
					<?php
							}
						}
					
					?>
				
			</section>
				
            </div>
        </div>
	</div><!--/.container-->
</section>
