<div class="float_footer">
	
	<?php
		if (($this -> session -> userdata('user_id') == "")) 
		{
			if($login_action && !empty($login_action) && $login_action=='1')
			{
				?>
					<a href="#get-in-touch">
						<img src="<?=base_url()?>images/ignite_icon.png" />
					</a>
				<?php
			}
			else
			{
				?>
					<a href="javascript:" onclick="return login_popup()">
						<img src="<?=base_url()?>images/ignite_icon.png" />
					</a>
				<?php
			}
		}
		else
		{
			
				if($login_action1!='0')
				{
			?>
				<a href="<?=base_url()?>causes/add">
					<img src="<?=base_url()?>images/ignite_icon.png" />
				</a>
			<?php
				}
		}
		
	?>
	

	
</div>    

<style>
	.float_footer
	{
		position: fixed;
		z-index: 10000000;
		right: 3%;
		top: 90%;
	}
	
	.float_footer img
	{
		width: 107px;
		height: 50px;
	}
	.float_footer img:hover
	{
		width: 115px;
		height: 55px;
	}

</style>


</body>
</html>