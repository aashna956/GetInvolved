<section id="FORUM">
    <div class="container">
    	<?php
			if ($this -> session -> userdata('user_id') &&($this -> session -> userdata('user_id') != "")) {
		?>
    	<p> You can now post stuff </p>
    	<?php
    		} else {
    	?>
    	<p> You can't post stuff </p>
    	<?php
    		}
    	?>

        
	</div><!--/.container-->
</section>
