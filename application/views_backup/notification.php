<?php

	if($notification && count($notification) > 0)
	{
		foreach($notification as $notification_data)
		{
?>
			<div class="abhijit-box">
				<div class="abhijit-box-left">
					<?php
						if($users)
						{
							foreach($users as $usersdata)
							{
								if($usersdata->id == $notification_data->userid)
								{
									echo $usersdata->fname." ".$usersdata->lname;
								}
							}
						}
					?>
					<p class="request_action" id="paction<?=$notification_data->id?>">
					<a href="javascript:" onclick="disapprove_member('<?=$notification_data->id?>')" class="right_action">
														 &nbsp;No 
					</a>
					<a href="javascript:" onclick="approve_member('<?=$notification_data->id?>')" class="right_action">
						Yes | 
					</a>
					</p>
				</div>
			</div>
<?php
		}
	}


?>