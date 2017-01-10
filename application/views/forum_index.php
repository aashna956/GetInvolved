<div class="container" style="margin:7% auto;">
    <h4>Latest Discussion</h4>
    <hr>
    <?php
        if($categories)
        {
            foreach($categories as $category_data)
            {
    ?>
    <li><a href="#">
        <?= $category_data->category ?>
    </a></li>
    <?php
            }
        }
    ?>
      
</div>