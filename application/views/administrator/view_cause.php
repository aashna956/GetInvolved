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
                            <h3>Cause Details</h3>
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
									<fieldset style="border: 1px solid grey;padding: 10px;font-size: 15px;">
										<legend style="padding: 5px;border: 0px none;margin: 0px 7px 0px 35px;width: auto;">Title</legend>
										<?=$causes[0]->title?>
									</fieldset>
									
								
                                    <br />
									<?php
										if($pid && $pid!='')
										{
									?>
											<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" action="<?=base_url()?>administrator/view_cause_update">
												<input type="hidden" name="pid" value="<?=$pid?>" />
									
										
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Page Title <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                
												<?php
													if($causes[0]->categories!='')
													{
														$catArray = explode(',',$causes[0]->categories);
														if($catArray && count($catArray) > 0)
														{
														foreach($categories as $categoriesData)
														{
															
															foreach($catArray as $categories_data)
															{
																if($categories_data!='' && $categories_data!=',')
																{		
																	$chk = '';
																	
																	if($categoriesData->id==$categories_data)
																	{
																		$chk = 'checked="checked"';
																		break;
																	}
																}
															}
												?>
															<div class="checkbox">
																<label>
																  <input name="categories[]" <?=$chk?> type="checkbox" class="catvalue cat_validate" value="<?=$categoriesData->id?>" /> <?=$categoriesData->title?>
																</label>
															</div>
												<?php
														}
														}
													}
												?>
												
                                            </div>
                                        </div>
                                        
										
										
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <button type="button" class="btn btn-primary" onclick="javascript:document.location.href='<?=base_url()?>administrator/pages'">Cancel</button>
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </div>

                                    </form>
									
									<?php
										}
										
									
									?>
                                </div>
                            </div>
                        </div>
                    </div>

                   

        </div>