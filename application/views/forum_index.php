<style type="text/css">
body {
    font-family: 'Roboto', sans-serif;
}
.panel.panel-success.bootstrap-override {
    border-color: #DED7D7;
    border-radius: 0;
}
.panel-heading.bootstrap-override {
    background-color: #DED7D7;
    color: #000000;
    border-radius: 0;
    border: none;
    text-transform: uppercase;
}
.posts-list {
    list-style: none;
    padding-left:0;
}
.post {
    padding: 10px;
    background-color: #DED7D7;
    border-bottom: 1px dotted #000000;
}
.post:last-child {
    border:none;
}
.post-title a {
    color: #C02025;
    font-weight: bold;
    font-size: 16px;
}
.post-title a:hover {
    color: #8A0C10;
}
</style>
<script>
$(document).ready(function() {
    $(".post-content").text(function(index, currentText) {
        if(currentText.length > 150)
            return currentText.substr(0, 150) + "....";
        else
            return currentText;
    });
});
</script>
<div class="container" style="margin:2% auto;">
    <h4>Latest Discussion</h4>
    <hr>
    <?php
        if($categories)
        {
            foreach($categories as $category_data)
            {
    ?>
    <div class="panel panel-success bootstrap-override">
        <div class="panel-heading bootstrap-override">
            <h3 class="panel-title"><?= $category_data->category ?></h3>
        </div> 
        <div class="panel-body">
            <ul class="posts-list">
                <?php
                    if($posts)
                    {
                        foreach ($posts as $category_post) {
                            foreach($category_post as $post_data) {
                ?>
                <li class="post">
                    <div class="post-title"><a href="#"><?= $post_data->title ?></a></div>
                    <div class="post-content"><?= $post_data->content ?></div>
                </li>
                <?php
                            }
                        }
                    }
                ?>
            </ul>
        </div>
    <?php
            }
        }
    ?>
      
</div>