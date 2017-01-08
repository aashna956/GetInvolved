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
						?>
							
						</ul>
					</div>