<style type="text/css">
body {
    font-family: 'Roboto', sans-serif;
}
.post-container {
    /*background-color: #DED7D7;*/
    color: #000000;
}
.author {
	color: #898989;
	font-weight: bold;
}
.category {
	color:#C02025;
}
.comment-container{
	padding-left: 50px;
}
.comment {
	border-bottom: 1px dotted #000000;
	padding: 5px;
}
#comment {
	border: 2px solid #898989;
}
.comment:last-child {
    border:none;
}
.post-button
{
    font-weight: bolder;
    font-size: 16px;
    color: #C02025;
    border: none;
    background-color: white;
}
a {
    color: #000000;
    text-transform: uppercase;
}
a:hover {
    color: #8A0C10;  
}
</style>
<div class="container post-container" style="margin:2% auto;">
	<a href="<?= base_url() ?>forum" style="font-weight: bold;"><span class="glyphicon glyphicon-chevron-left"></span> Posts</a>
	<h3><?= $title ?></h3>
	<h4 class="category"><?= $category ?></h4>
	<hr>
	<div class="post">
		<p class="content"><?= $content ?></p>
	</div>
	<p class="author">Posted by <?=$author_fname ?> <?=  $author_lname ?> &bull; <?= date('jS F, Y \a\t h:i A',strtotime($timestamp)) ?></p>
</div>
<div class="container post-container" style="margin:2% auto;">
	<p><?= count($comments) ?> <?php if(count($comments)==1) { echo "comment";} else {echo "comments";} ?></p>
	<hr style="margin-top: 5px; margin-bottom: 5px">
	<?php if($this->session->userdata('user_id') && $this->session->userdata('user_id')!='') { ?>
	<a href="#new-comment">ADD COMMENT</a>
	<?php } ?>
	<br>
	<div class="comment-container">
	<?php foreach ($comments as $comment_data) { ?>
		<div class="comment">
			<p class="author">Posted by <?= $comment_data->fname ?> <?= $comment_data->lname ?> &bull; <?= date('jS F, Y \a\t h:i A',strtotime($comment_data->datetime)) ?></p>
			<?= $comment_data->comment ?>
		</div>
	<?php } ?>
	</div>
</div>
<?php if($this->session->userdata('user_id') && $this->session->userdata('user_id')!='') { ?>
<div class="container" id="new-comment" style="margin:2% auto;">
    <div class="comment-container">
        <form method="" id="new-comment-form">
            <textarea id="comment" name="content" class="form-control"></textarea>
            <br>
            <input type="button" class="pull-right post-button" onclick="newcomment_process()" value="POST">
        </form>
    </div>
</div>
<?php } ?>
<script>
function newcomment_process() {
    var comment = $('#comment').val();

    var dataString = '&comment='+ comment + '&post_id=' + '<?= $post_id ?>';

    $('.pageloadeing').css('display','block');

    $.ajax({
            type: "POST",
            url: '<?=base_url()?>forum/newcomment',
            data: dataString,
            cache: false,
            success: function(result){
                if(result)
                {
                    console.log("inside");
                    $('.pageloadeing').css('display','none');
                    window.location.href="<?=base_url()?>forum/viewpost/<?= $post_id ?>";
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

