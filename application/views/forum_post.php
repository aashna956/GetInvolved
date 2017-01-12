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
.comment:last-child {
    border:none;
}
</style>
<div class="container post-container" style="margin:2% auto;">
	<h3><?= $title ?></h3>
	<h4 class="category"><?= $category ?></h4>
	<hr>
	<div class="post">
		<p class="content"><?= $content ?></p>
	</div>
	<p class="author">Posted by <?=$author_fname ?> <?=  $author_lname ?> &bull; <?= date('jS F, Y \a\t h:i A',strtotime($timestamp)) ?></p>
</div>
<div class="container post-container" style="margin:2% auto;">
	<p><?= count($comments) ?> comments</p>
	<hr style="margin-top: 5px; margin-bottom: 5px">
	<p>ADD COMMENT</p>
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
<!--div id="new-comment">
    <div>
        <a href="" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
        <div class="clearfix"></div>
        <form method="" id="new-comment-form">
            <label>Content</label>
            <textarea id="new-post-content" name="content" class="form-control"></textarea>
            <br>
            <input type="button" class="pull-right post-button" onclick="newpost_process()" value="POST">
        </form>
    </div>
</div-->

