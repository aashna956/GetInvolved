            <!-- page content -->
            <div class="right_col" role="main">

                <!-- /top tiles -->
				<div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>Add New Slide</h3>
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
                                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" action="<?=base_url()?>administrator/slide_process" onsubmit="return validate_slide()">

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Title <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="first-name" name="title" required="required" class="form-control col-md-7 col-xs-12">
												<?php echo form_error('title','<span class="help-block" id="username-error">'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">File <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="file" id="slide" multiple name="slide[]" required="required" class="form-control1 col-md-7 col-xs-12">
												<div style="clear:both"></div>
												<span class="msg_error"> Please Provide Image only.</span>
                                            </div>
                                        </div>
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <button type="button" class="btn btn-primary" onclick="javascript:document.location.href='<?=base_url()?>administrator/sliders'">Cancel</button>
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </div>

                                    </form>
									
									<script type="text/javascript">
										function endsWith(str, suffix) 
										{
											return str.indexOf(suffix, str.length - suffix.length) !== -1;
										}
										function validate_slide()
										{
											
											var uploadImg = document.getElementById('slide');
												 
											for (var i = 0; i < uploadImg.files.length; i++) 
											{
											   var f = uploadImg.files[i];
											   
											   if (!endsWith(f.name, 'JPEG') && !endsWith(f.name,'jpeg') && !endsWith(f.name, 'jpg') && !endsWith(f.name,'JPG') && !endsWith(f.name, 'PNG') && !endsWith(f.name,'png')) 
											   {
												   $(".msg_error").html(f.name + ' format not accepted. Please upload JPEG, PNG, JPG files only.'); 
													$(".msg_error").css('display','block'); 
													return false;
											   }
											}
											
										}
									</script>
									
									
									
                                </div>
                            </div>
                        </div>
                    </div>

                   

        </div>