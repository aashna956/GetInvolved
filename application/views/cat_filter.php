<?php
							if($causes)
							{
								foreach($causes as $causes_data)
								{
						?>
									<div class="col-sm-6 col-md-4 blog-item isotope-item" style="">
										<div class="blog-image">
											<a href="<?=base_url()?>causes/details/<?=$causes_data->id?>" class="img-eye-hover">
												<img src="<?=base_url()?>causes_images/<?=$causes_data->image?>" alt="" style="width:370px;height:246px;">
											</a>
										</div>
										<div class="blog-body">
											<h3 class="blog-title">
												<a href="<?=base_url()?>causes/details/<?=$causes_data->id?>">
													<?=substr($causes_data->title,0,35)?>
												</a>
												
												<a onclick= 'twshare("https://twitter.com/home?status= <?=$causes_data->title?>+<?=base_url()?>causes/details/<?=$causes_data->id?>")' href="javascript:" class="right_social">
													<img src="<?=base_url()?>images/t_share.png">
												</a>
												
												<a href="javascript:fbShare('<?=base_url()?>causes/details/<?=$causes_data->id?>', '<?=$causes_data->title?>', '<?=substr($causes_data->details,0,10)?>', '<?=base_url()?>causes_images/<?=$causes_data->image?>', 520, 350)" class="right_social1">
													<img src="<?=base_url()?>images/f_share.png">
												</a>
											</h3>
											<p class="blog-info">IGNITED BY
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
											 on <time datetime="2014-01-16"><?=date('F j, Y',strtotime($causes_data->edate))?></time></p>
											  
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