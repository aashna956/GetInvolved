	<script src="<?=base_url()?>tab/jquery.js"></script>
	<script src="<?=base_url()?>tab/theme.js"></script>
	<script src="<?=base_url()?>tab/theme.init.js"></script>	
	<link rel="stylesheet" href="<?=base_url()?>tab/theme-elements.css">
	<link rel="stylesheet" href="<?=base_url()?>tab/default.css">

	<link href="<?=base_url()?>css/font-awesome.css" rel="stylesheet">
	
	
	<script type="text/javascript" src="http://tinymce.cachefly.net/4.2/tinymce.min.js"></script>
	<!--<script type="text/javascript" src="<?=base_url()?>js/tinymce.min.js"></script>-->
	<script type="text/javascript">
	
	
	/*
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
	*/
	</script>
	
	<script>
/* Script written by Adam Khoury @ DevelopPHP.com */
/* Video Tutorial: http://www.youtube.com/watch?v=EraNFJiY0Eg */
function _(el){
	return document.getElementById(el);
}
function uploadFile(){
	
	/*var image_value = $('#image_value').val();
	if(image_value=='')
	{
		$(".notification-bar").html('Please Upload Cause Image.'); 
		$(".notification-bar").css('display','block'); 
		setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
		return false;
	}
	*/
	var uploadImg = document.getElementById('file1');
	 
	if(uploadImg.files.length < 1)
	{
		$(".notification-bar").html('Please Choose file to Upload.'); 
		$(".notification-bar").css('display','block'); 
		setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
		return false;
	}
	for (var i = 0; i < uploadImg.files.length; i++) 
	{
	   var f = uploadImg.files[i];
	   if (!endsWith(f.name, 'JPEG') && !endsWith(f.name,'jpeg') && !endsWith(f.name, 'jpg') && !endsWith(f.name,'JPG') && !endsWith(f.name, 'PNG') && !endsWith(f.name,'png')) 
	   {
		   $(".notification-bar").html(f.name + ' format not accepted. Please upload JPEG, PNG, JPG files only.'); 
			$(".notification-bar").css('display','block'); 
			setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
			return false;
	   }
	}
			
	$('.loadingimageaction').html('<img title="Preview" src="<?=base_url()?>images/loading.gif" id="preview" style="width:50px">');	
	
	var file = _("file1").files[0];
	// alert(file.name+" | "+file.size+" | "+file.type);
	var formdata = new FormData();
	formdata.append("file1", file);
	var ajax = new XMLHttpRequest();
	//ajax.upload.addEventListener("progress", progressHandler, false);
	ajax.addEventListener("load", completeHandler, false);
	ajax.addEventListener("error", errorHandler, false);
	ajax.addEventListener("abort", abortHandler, false);
	ajax.open("POST", "<?=base_url()?>causes/upload_cause_image");
	ajax.send(formdata);
}
/*function progressHandler(event){
	_("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
	var percent = (event.loaded / event.total) * 100;
	_("progressBar").value = Math.round(percent);
	_("status").innerHTML = Math.round(percent)+"% uploaded... please wait";
}
*/
function completeHandler(event){
	//$('.img_preview').html('');
	$('.loadingimageaction').html('');	
	if(event.target.responseText!='')
	{
		var imgval = event.target.responseText;
		var part = imgval.split('---');
		//$('.preview_img').html('');
		//$('.img_preview').html('<img title="Preview" src="<?=base_url()?>causes_images/'+part[0]+'" id="preview">');
		$('#image_value').val(part[0]);
		$('#image_submit_final').css('display','block');
		$(".notification-bar").html('Image Uploaded sucessfully.'); 
		$(".notification-bar").css('display','block'); 
		setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
		return false;
		
	}
	else
	{
		//$('.img_preview').html('<img title="Preview" src="<?=base_url()?>causes_images/blog1.jpg">');
		//$('#preview').remove();
		$('#image_value').val('');
		$(".notification-bar").html('Format not accepted. Please upload JPEG, PNG, JPG files only..'); 
		$(".notification-bar").css('display','block'); 
		setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
		return false;
	}
	/*_("status").innerHTML = event.target.responseText;
	_("progressBar").value = 0;
	*/
}
function errorHandler(event)
{
	$('.loadingimageaction').html('');	
	_("status").innerHTML = "Upload Failed";
}
function abortHandler(event){
	$('.loadingimageaction').html('');	
	_("status").innerHTML = "Upload Aborted";
}

function page_reload()
{
	if($('#image_value').val() !='')
	{
		$('#openModalcauses').css('display','none');
	}
	else
	{
		$(".notification-bar").html('Please Choose file to Upload.'); 
		$(".notification-bar").css('display','block'); 
		setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
		return false;
	}
	
}

function hide_media_boc()
{
	$('#openModalcauses').css('display','none');
	return false;
}

function hide_preview_box()
{
	$('#openModalpreview').css('display','none');
	return false;
}

function display_preview()
{
	var image_value = $('#image_value').val();
	if(image_value=='')
	{
		image_value = 'blog1.jpg';
	}
	$('#pp_image').attr('src','<?=base_url()?>causes_images/'+image_value);
	
	var btitle = $('#btitle').val();
	if(btitle=='')
	{
		btitle = 'No Title Entered';
	}
	$('#pp_title').html(btitle);
	
	var bdetails = $('#bdetails').val();
	$('#pp_details').html(bdetails);
	
	var bcity = $('#bcity').val();
	$('#pp_city').val(bcity);
	
	
	var barea = $('#barea').val();
	$('#pp_area').val(barea);
	
	
	var bvolun = $('#bvolun').val();
	$('#pp_volun').val(bvolun);
	
	var bmobile = $('#bmobile').val();
	$('#pp_phone').val(bmobile);
	
	var etime = $('#etime').val();
	$('#pp_sdate').val(etime);
	
	var etime1 = $('#etime1').val();
	$('#pp_edate').val(etime1);
	$('#openModalpreview').css('display','block');
	return false;
}
</script>
<style>
.img_preview
{
	width: auto;
	float: left;
	margin-bottom: 10px;
}
.img_preview img
{
	border: 2px solid black;
}
#loading
{
	width: 52px!important;
	height: 49px!important;
	border: 0!important;
}
.page_head_text
{
	padding-top: 30px;
}
.ch_bg
{
	min-height: 600px;
}
</style>

	<section id="" class="ch_bg cause_section">
        <div class="container">
            <div class="page_head_text">
                <h2 class="about_tit text-center wow fadeInDown">Causes</h2>
            </div>
			<div class="row">
			<!--<div class="toogle" data-plugin-toggle style="padding-bottom:100px;">-->
				<div class="toogle" style="padding-bottom:100px;">
					
					<?php
						if($causes)
						{
							foreach($causes as $causes_data)
							{
					?>
								
								<section class="toggle">
									
									<label>
										<a href="<?=base_url()?>causes/details/<?=$causes_data->id?>">
										<?=$causes_data->title?>
										<span class="more_tex">More Detail</span>
										<a href="<?=base_url()?>causes/delete/<?=$causes_data->id?>" onclick="javascript:check=confirm('Are you sure to perform this action?');if(check==false) return false;" style="float: right;margin-left: 10px;color: red;">Delete</a>
										<span class="publish_data">
											<?php
												if($causes_data->status=='Active')
												{
													echo "(Published on - ".date("M j, Y",strtotime($causes_data->edate)).")";
												}
												else
												{
													echo "(Waiting to Publish - ".date("M j, Y",strtotime($causes_data->edate)).")";
												}
											
											?>
										</span>
										
										</a>
									</label>
									<!--<p>
										<?=substr($causes_data->details,0,15)?> &nbsp;&nbsp;&nbsp;<a href="<?=base_url()?>causes/details/<?=$causes_data->id?>">View Detail</a>
									</p>-->
									
								</section>
								
					<?php
							}
						}
					?>
				
                              
                </div>
			</div>
		</div> 
   </div>
   </section>
	
	
</div>

