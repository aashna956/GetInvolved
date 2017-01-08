            <!-- page content -->
            <div class="right_col" role="main">

                <!-- /top tiles -->
				<div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>Add Category</h3>
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
											<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" action="<?=base_url()?>administrator/categories_modify_process">
												<input type="hidden" name="pid" value="<?=$pid?>" />
									<?php
										}
										else
										{
									?>
											<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" action="<?=base_url()?>administrator/categories_process">
										<?php } ?>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Category Title <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="first-name" name="title" value="<?=$categories[0]->title?>" required="required" class="form-control col-md-7 col-xs-12">
												<?php echo form_error('title','<span class="help-block" id="username-error">'); ?>
                                            </div>
                                        </div>
                                       
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <button type="button" class="btn btn-primary" onclick="javascript:document.location.href='<?=base_url()?>administrator/categories'">Cancel</button>
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </div>

                                    </form>
									
									
									
                                </div>
                            </div>
                        </div>
                    </div>

                   

        </div>