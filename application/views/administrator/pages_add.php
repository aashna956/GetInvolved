            <!-- page content -->
	<script type="text/javascript" src="http://tinymce.cachefly.net/4.2/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    theme: "modern",
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern imagetools"
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    toolbar2: "print preview media | forecolor backcolor emoticons",
    image_advtab: true,
    templates: [
        {title: 'Test template 1', content: 'Test 1'},
        {title: 'Test template 2', content: 'Test 2'}
    ]
});
</script>


            <div class="right_col" role="main">

                <!-- /top tiles -->
				<div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>Add Page</h3>
                        </div>
                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                
                                <div class="x_content">
                                    <br />
									<?php
										if($pid && $pid!='')
										{
									?>
											<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" action="<?=base_url()?>administrator/page_modify_process">
												<input type="hidden" name="pid" value="<?=$pid?>" />
									<?php
										}
										else
										{
									?>
											<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" action="<?=base_url()?>administrator/page_process">
										<?php } ?>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Page Title <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="first-name" name="title" value="<?=$pages[0]->title?>" required="required" class="form-control col-md-7 col-xs-12">
												<?php echo form_error('title','<span class="help-block" id="username-error">'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Page Content <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <!--<textarea id="message" required="required" class="form-control" name="content" data-parsley-trigger="keyup" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10"><?=$pages[0]->content?></textarea>-->
												<textarea name="content" style="width:100%" id="message" required="required" class="form-control" name="content"><?=$pages[0]->content?></textarea>

												<div style="clear:both"></div>
												<?php echo form_error('content','<span class="help-block" id="username-error">'); ?>
                                            </div>
                                        </div>
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <button type="button" class="btn btn-primary" onclick="javascript:document.location.href='<?=base_url()?>administrator/pages'">Cancel</button>
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </div>

                                    </form>
									
									
									
                                </div>
                            </div>
                        </div>
                    </div>

                   

        </div>