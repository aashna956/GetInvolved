<?php
					if($cause_comment && count($cause_comment) > 0)
					{
						foreach($cause_comment as $cause_comment_data)
						{
							
				?>
							<div class="media comment_section" id="c_box<?=$cause_comment_data['id']?>">
								<div class="pull-left post_comments" style="overflow: hidden;height: 85px;">
									
										<?php
											if($users)
											{
												foreach($users as $usersdata)
												{
													if($usersdata->id == $cause_comment_data['userid'])
													{
														if(!empty($usersdata->image))
														{
															?>
																<a  id="single_1" href="<?=$usersdata->image?>">
																	<img src="<?=$usersdata->image?>"  style="width:85px;" />
																</a>
															<?php
														}
														else
														{
															?>
																<a  id="single_1" href="<?=base_url()?>images/blog1.jpg">
																	<img src="<?=base_url()?>images/blog1.jpg"  alt="" />
																</a>
															<?php
														}
														
													}
												}
											}
										?>
								</div>
								
								<div class="media-body post_reply_comments">
									<h3>
										<a href="<?=base_url()?>user/timeline/<?=$cause_comment_data['userid']?>" class="timeline_link">
										<?php
											if($users)
											{
												foreach($users as $usersdata)
												{
													if($usersdata->id == $cause_comment_data['userid'])
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
										
										<a href="javascript:" title="Remove Comment" class="removed_comment" onclick="remove_comment('<?=$cause_comment_data['id']?>')">Delete</a>
										<?php } ?>
									</h3>
									<?php
									/*$test = '';
									
									if($this->session->userdata('user_id')!='')
									{
										
										foreach($abused as $abusedData)
										{
											if(($abusedData->userid==$this -> session -> userdata('user_id')) && ($abusedData->comment_id==$cause_comment_data['id']) )
											{
												$test = "test";
											}
										}
									}
									*/
									
									if($this->session->userdata('user_id')!='')
									{

										/*if($test!='') */
										if(count($cause_comment_data['abusive']) > 0)
										{
											$aname = '';
											$ucause = '';
											foreach($cause_comment_data['abusive'] as $abusive_data)
											{
												
												foreach($users as $usersdata)
												{
													if($usersdata->id == $abusive_data['userid'])
													{
														$aname .= $usersdata->fname." ".$usersdata->lname."\n";
													}
													
													if($abusive_data['userid'] == $this->session->userdata('user_id'))
													{
														$ucause = 'deepak';
													}
												}
											}
											
											if(!empty($ucause))
											{
									?>
										<label class="mark_action">
											<a href="javascript:" onclick="mark_reportive_cancel('<?=$details[0]->id?>','<?=$cause_comment_data['id']?>')" class="reportive" title="<?=$aname?>">Marked as Abusive </a>
										</label>
									<?php
											}
											else
											{
												?>
													<label class="mark_action">
														<a href="javascript:" onclick="mark_reportive('<?=$details[0]->id?>','<?=$cause_comment_data['id']?>')" class="reportive" title="<?=$aname?>">Marked as Abusive </a>
													</label>
												<?php
											}
											
										}
										else
										{
											if($this->session->userdata('user_id')!=$cause_comment_data['userid'])
											{
									?>
											<label class="mark_action">
												<a href="javascript:" onclick="mark_reportive('<?=$details[0]->id?>','<?=$cause_comment_data['id']?>')" class="reportive" title="Mark as Reportive">Mark as Abusive</a>
											</label>
									<?php
											}
										}
									}
									
									?>
									<p><?=$cause_comment_data['comment']?></p>
									<?php
										
											if(!empty($cause_comment_data['image']))
											{
										?>
												<p class="cooment_photos">
													<a  id="single_1" href="<?=base_url()?>causes_images/<?=$cause_comment_data['image']?>">
														<img src="<?=base_url()?>causes_images/<?=$cause_comment_data['image']?>"/>
													</a>
												</p>
											
										<?php
											}
									?>
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