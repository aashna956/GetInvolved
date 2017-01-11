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
a {
    color: #000000;
}
a:hover {
    color: #8A0C10;  
}

</style>
<script>
$(window).load(function() {
    $(".post-content").text(function(index, currentText) {
        if(currentText.length > 150)
            return currentText.substr(0, 150) + "....";
        else
            return currentText;
    });
});
function open_modal(category) {
    console.log(category);
    //$("#category").append(category);
    $("#cat-select").val(category);
    return false;
}
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
            <h3 class="panel-title" style="float:left;"><?= $category_data->category ?></h3>
            <a href="#new-post" style="float:right" id="new-post-button" onclick="open_modal('<?= $category_data->category ?>')">New Post <span class="glyphicon glyphicon-pencil"></span></a>
            <div class="clearfix"></div>
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
</div>
<style type="text/css">
#new-post
{
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: rgba(0,0,0,0.8);
    z-index: 99999;
    opacity: 0;
    -webkit-transition: opacity 100ms ease-in;
    -moz-transition: opacity 100ms ease-in;
    transition: opacity 100ms ease-in;
    pointer-events: none;
}
#new-post > div
{
    width: 40%;
    height: 55%;
    margin: 5% auto;
    background: #fff;
    padding: 10px;
}

#new-post:target
{
    opacity: 1;
    pointer-events: auto;
}
.post-button
{
    font-weight: bolder;
    font-size: 16px;
    color: #C02025;
}
</style>
<div id="new-post">
    <div>
        <a href="" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
        <div class="clearfix"></div>
        <form method="" id="new-post-form">
            <label>Category</label>
            <select id="cat-select" name="post_category" class="form-control">
                <?php foreach($categories as $category_data) { ?>
                <option value='<?= $category_data->category ?>'><?= $category_data->category ?></option>
                <?php } ?>
            </select>
            <label>Post Title</label>
            <input id="new-post-title" type="text" class="form-control" name="title" required>
            <label>Content</label>
            <textarea id="new-post-content" name="content" class="form-control"></textarea>
            <br>
            <input type="button" class="pull-right post-button" onclick="newpost_process()" value="POST">
        </form>
    </div>
</div>
<script>
function newpost_process()
{
    var post_category = $('#cat-select').val();
    var post_title = $('#new-post-title').val();
    var post_content = $('#new-post-content').val();

    var dataString = '&cat='+ post_category + '&title='+ post_title + '&content='+ post_content;

    $('.pageloadeing').css('display','block');
    console.log("before ajax");

    $.ajax({
            type: "POST",
            url: '<?=base_url()?>forum/newpost',
            data: dataString,
            cache: false,
            success: function(result){
                if(result)
                {
                    console.log("inside");
                    $('.pageloadeing').css('display','none');
                    window.location.href='<?=base_url()?>forum/index';
                    return false;
                }
            },
            error: function(result) {
                console.log("something was off");
                console.log(result);
            }
        });
        console.log("after ajax");
        return false;
}
</script>
