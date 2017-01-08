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