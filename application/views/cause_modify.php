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

		$(".ptext1").html('Please choose a file to upload'); 
		$("#openModalpopup1").css('display','block'); 
		setTimeout(function() { $("#openModalpopup1").fadeOut(1500); }, 5000);
		return false;
	}
	for (var i = 0; i < uploadImg.files.length; i++) 
	{
	   var f = uploadImg.files[i];
	   if (!endsWith(f.name, 'JPEG') && !endsWith(f.name,'jpeg') && !endsWith(f.name, 'jpg') && !endsWith(f.name,'JPG') && !endsWith(f.name, 'PNG') && !endsWith(f.name,'png')) 
	   {

			$(".ptext1").html(f.name + ' format not accepted. Please upload JPEG, PNG, JPG files only.'); 
			$("#openModalpopup1").css('display','block'); 
			setTimeout(function() { $("#openModalpopup1").fadeOut(1500); }, 5000);
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
	
	$('.loadingimageaction').html('');	
	if(event.target.responseText!='')
	{
		var imgval = event.target.responseText;
		var part = imgval.split('---');
		
		$('#image_value').val(part[0]);
		
		if(part.length > 1 )
		{
			
		$('#image_submit_final').css('display','block');
		$('#image_submit').css('display','none');
		
		$(".ptext1").html('Image uploaded successfully'); 
		$("#openModalpopup1").css('display','block'); 
		setTimeout(function() { $("#openModalpopup1").fadeOut(1500); }, 5000);
		return false;
		}
		else
		{
			$('#image_value').val('');
			$('.imgpath').attr('src','<?=base_url()?>causes_images/blog1.jpg');	
			/*$(".ptext1").html('Format not accepted. Please upload JPEG, PNG, JPG files only..'); */
			$(".ptext1").html('Minimum Image size should be 1080px'); 
			$("#openModalpopup1").css('display','block'); 
			setTimeout(function() { $("#openModalpopup1").fadeOut(1500); }, 5000);
			return false;
		}
		
	}
	else
	{
		//$('.img_preview').html('<img title="Preview" src="<?=base_url()?>causes_images/blog1.jpg">');
		//$('#preview').remove();
		$('#image_value').val('');

		$(".ptext1").html('Format not accepted. Please upload JPEG, PNG, JPG files only..'); 
		$("#openModalpopup1").css('display','block'); 
		setTimeout(function() { $("#openModalpopup1").fadeOut(1500); }, 5000);
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
		$(".ptext1").html('Please choose a file to upload'); 
		$("#openModalpopup1").css('display','block'); 
		setTimeout(function() { $("#openModalpopup1").fadeOut(1500); }, 5000);
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
		btitle = 'Please enter Cause Title';
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
</style>

<?php
	if($msg123 && !empty($msg123))
	{
		?>
			<script>
				$(".ptext1").html('<?=$msg123?>'); 
				$("#openModalpopup1").css('display','block'); 
				setTimeout(function() { $("#openModalpopup1").fadeOut(1500); }, 5000);				
			</script>
		<?php
	}

?>

<?php
	$categoriesArray = explode(',',$details[0]->categories);
	
?>
	<section id="" class="ch_bg cause_section">
        <div class="container">
            <div class="page_head_text">
                <h2 class="about_tit text-center wow fadeInDown">Add New Cause (Step 2)</h2>
            </div>
			<input type="button" onclick="previous_step()" id="image_submit_previous" style="display:block;" value="Previous Step">
			<div class="row">
				<form id="cause_form" name="cause_form" method="post" action="<?=base_url()?>causes/modify_process" enctype="multipart/form-data" onsubmit="return cause_validate()">
				
					<input type="hidden" name="cause_id" id="cause_id" value="<?=$cause_id?>" />
				<div class="col-md-3">
					
					<div class="form_right_pannel">
						<h3 class="cat_title">Categories</h3>
						<?php
							if($categories)
							{
								foreach($categories as $categories_data)
								{
									$followingResult = '';
									/*$followingResult = search($categoriesArray,'id',$categories_data->id);*/
										
										
						?>
									<div class="checkbox">
										<label>
										  <input name="categories[]" <?php if(in_array($categories_data->id,$categoriesArray)){ ?> checked="checked" <?php } ?> type="checkbox" class="catvalue cat_validate" value="<?=$categories_data->id?>"> <?=$categories_data->title?>
										</label>
									</div>
						<?php
								}
							}
						?>
					
					
					</div>
					
					
					<div class="form_right_pannel">
						<h3 class="cat_title">Causes Type</h3>
						<div class="checkbox c_type">
							<label>
								<input type="radio" class="catvalue" <?php if($details[0]->type=='Indivisual'){ ?> checked="checked" <?php } ?>  value="Indivisual" name="type"> Individual
							</label>
						</div>
						<div class="checkbox c_type">
							<label>
								<input type="radio" class="catvalue" <?php if($details[0]->type=='Organisational'){ ?> checked="checked" <?php } ?>   value="Organisational" name="type"> Organizational
							</label>
						</div>
					</div>
				
				</div>

				
				
					<div class="col-md-9 form_box_all">
						
						<!--<div class="u_section">
							
								<span class="form_text">UPLOAD IMAGE</span>
								<input type="file" id="file1" name="file1" class="upload_boot">
								<input type="button" name="image_submit" value="Upload" onclick="uploadFile()">
							
								<div class="img_preview"></div>
							
							<input type="hidden" name="image_value" id="image_value" value="">
							<div style="clear:both"></div>
							
						</div>-->
						<div style="clear:both"></div>
						
						
						<input type="text" class="login_box2" placeholder="CAUSE TITLE" name="btitle" id="btitle" value="<?=$details[0]->title?>">
						<textarea name="bdetails" style="width:99%; margin-bottom: 12px;" placeholder="CAUSE DESCRIPTION" id="bdetails" class="form-control"><?=$details[0]->details?></textarea>
						<div style="clear:both;"></div>
						
						
						<input type="text" class="login_box3" placeholder="AREA" name="barea" id="barea" value="<?=$details[0]->area?>" />
						<!--<input type="text" class="login_box3" placeholder="CITY" name="bcity" id="bcity">-->
						<select  class="login_box3" placeholder="CITY" name="bcity" id="bcity">
							<option value="">SELECT CITY</option>
							<?php
								if($cities && count($cities)>0)
								{
									foreach($cities as $cities_data)
									{
										
							?>
									<option value="<?=$cities_data->city_name?>" <?php if($details[0]->city==$cities_data->city_name){ ?> selected="selected" <?php } ?> ><?=$cities_data->city_name?></option>
							<?php
									}
								}
							
							?>
						</select>
						
						<div style="clear:both"></div>
						
						
						<span class="form_text stdate">START DATE</span>
						<link href="<?=base_url()?>css/datepicker.css" rel="stylesheet">
						<div class="input-append date" id="dp3" data-date="" data-date-format="yyyy-mm-dd">
							<input class="login_box4" size="16" name="etime" id="etime" value="<?=$details[0]->startdate?>" readonly="readonly" type="text">
							<span class="add-on"><i class="fa fa-calendar"></i></span>
						</div>
						
						
		 
						<span class="form_text stdate">END DATE</span>
						<div class="input-append date" id="dp4" data-date="" data-date-format="yyyy-mm-dd">
							<input class="login_box4" size="16" name="etime1" id="etime1" value="<?=$details[0]->enddate?>" readonly="readonly" type="text">
							<span class="add-on"><i class="fa fa-calendar"></i></span>
						</div>
		 
						<script src="<?=base_url()?>js/jquery_datep.js"></script>
						<script src="<?=base_url()?>js/bootstrap-datepicker.js"></script>
						<script>
							$(function(){
								var checkin = $('#dp3').datepicker('hide').on('changeDate', function(ev) {checkin.hide();}).data('datepicker');
							});
							
							$(function(){
								var checkin = $('#dp4').datepicker('hide').on('changeDate', function(ev) {checkin.hide();}).data('datepicker');
							});
						</script>
						
						<div style="clear:both"></div>
						
						<div style="clear:both"></div>
		 
						
						<!--<input type="text" class="login_box3" name="bphone" id="bphone" placeholder="Phone No">-->
						<input type="text" class="login_box3" placeholder="VOLUNTEERS TO BE MOBILIZED" name="bvolun" id="bvolun" value="<?=$details[0]->volunters?>"/>
						
						<input type="text" class="login_box3" name="bmobile" id="bmobile" placeholder="PHONE NUMBER" value="<?=$details[0]->mobile_no?>"/>
						
						
						
						<div style="text-align:center;">
							<input type="submit" class="login_box6" value="Update">
							<input type="button" onclick="return display_preview()" class="login_box6" value="Preview">
						</div>
					</div>
					<input type="hidden" name="image_value" id="image_value" value="<?=($details[0]->image)?$details[0]->image:''?>">
				</form>
		 
	<script type="text/javascript">
		
		function cause_validate()
		{
			
			var image_value = $('#image_value').val();
			if(image_value=='')
			{
				$('#openModalcauses').css('display','block');
				return false;
			}
		/*	
			var uploadImg = document.getElementById('file1');
			 
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
		*/
		
			var btitle = $('#btitle').val();
			if(btitle=='')
			{
				
				$(".ptext1").html('Please enter Cause Title'); 
				$("#openModalpopup1").css('display','block'); 
				setTimeout(function() { $("#openModalpopup1").fadeOut(1500); }, 5000);
				return false;
			}
			
			/*var bdesc = $('#bdesc').val();
			if(bdesc=='')
			{
				$(".notification-bar").html('Please Provide Cause Description.'); 
				$(".notification-bar").css('display','block'); 
				setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
				return false;
			}
			*/
			var bdetails = $('#bdetails').val();
			if(bdetails=='')
			{
				$(".ptext1").html('Please enter Cause Details'); 
				$("#openModalpopup1").css('display','block'); 
				setTimeout(function() { $("#openModalpopup1").fadeOut(1500); }, 5000);
				return false;
				
			}
			
			
			
			var bcity = $('#bcity').val();
			if(bcity=='')
			{

				$(".ptext1").html('Please enter Cause City'); 
				$("#openModalpopup1").css('display','block'); 
				setTimeout(function() { $("#openModalpopup1").fadeOut(1500); }, 5000);
				return false;
			}
			
			var letters = /^[A-Za-z]+$/;
			/*if(!bcity.match(letters))
			 {  

				$(".ptext1").html('City should not contain number.'); 
				$("#openModalpopup1").css('display','block'); 
				setTimeout(function() { $("#openModalpopup1").fadeOut(1500); }, 5000);
				return false;
			 }
			 */

			var barea = $('#barea').val();
			if(barea=='')
			{

				$(".ptext1").html('Please enter Cause Area'); 
				$("#openModalpopup1").css('display','block'); 
				setTimeout(function() { $("#openModalpopup1").fadeOut(1500); }, 5000);
				return false;
			}
			
			/*if(!barea.match(letters))
			 {  
				$(".ptext1").html('Area should not contain number.'); 
				$("#openModalpopup1").css('display','block'); 
				setTimeout(function() { $("#openModalpopup1").fadeOut(1500); }, 5000);
				return false;
			 }
			 */
			 var numbers = /^[0-9]+$/;  
			 
			 
			 var bvolun = $('#bvolun').val();
			if(bvolun=='')
			{				
				$(".ptext1").html('Please enter No. of Volunteers'); 
				$("#openModalpopup1").css('display','block'); 
				setTimeout(function() { $("#openModalpopup1").fadeOut(1500); }, 5000);
				return false;
			}
			
			if(!bvolun.match(numbers))
			 {  

				$(".ptext1").html('Volunteers cannot contain character'); 
				$("#openModalpopup1").css('display','block'); 
				setTimeout(function() { $("#openModalpopup1").fadeOut(1500); }, 5000);
				return false;
			 }
			 
			 
			 
			var bmobile = $('#bmobile').val();
			
			if(!bmobile.match(numbers))
			 {  
				$(".ptext1").html('Please enter valid Phone No.'); 
				$("#openModalpopup1").css('display','block'); 
				setTimeout(function() { $("#openModalpopup1").fadeOut(1500); }, 5000);
				return false;
			 }
			
			var checkedAtLeastOne = false;
			$('.cat_validate').each(function() {
				if ($(this).is(":checked")) {
					checkedAtLeastOne = true;
				}
			});
			
			if(checkedAtLeastOne == false)
			{
				$(".ptext1").html('Please select at least one category'); 
				$("#openModalpopup1").css('display','block'); 
				setTimeout(function() { $("#openModalpopup1").fadeOut(1500); }, 5000);
				return false;
			}
			
		}
		
	function endsWith(str, suffix) 
	{
		return str.indexOf(suffix, str.length - suffix.length) !== -1;
	}
		
	function previous_step()
	{
		$('#openModalcauses').css('display','block');
				return false;
	}
	</script>
	
				
			</div>
		</div> 
   </div>
   </section>
	
	<?php
		if(!$val && $val=='')
		{
	?>
	
	<div id="openModalcauses" class="mb_elegantModal" style="display: block;">
	<div class="animated swing">
		<a title="Close" class="mb_elegantModalclose" onclick="return hide_media_boc()">X</a>
		<h2>Step 1</h2>
		
		<p>Add Media to Cause</p>
		
		<div class="media_section">
			<div class="media_section_left">
				<label class="preview_label">Preview</label>
				<div class="img_preview">
					<?php
						if($details[0]->image!='')
						{
					?>
							<img src="<?=base_url()?>causes_images/<?=$details[0]->image?>" class="imgpath">
					<?php		
						}
						else
						{
					?>
							<img src="<?=base_url()?>causes_images/blog1.jpg" class="imgpath">
					<?php
						}
					?>
				</div>
				
				<div style="clear:both"></div>
				
			</div>
			
			<div class="media_section_right">
				<span class="form_text">UPLOAD IMAGE</span>
				<input type="file" id="file1" name="file1" class="upload_boot">
				<div class="loadingimageaction">
				</div>
				<input type="button" name="image_submit" id="image_submit" value="Upload" onclick="uploadFile()">
			
				<input type="button" onclick="page_reload()" id="image_submit_final" style="display:none;" value="Next Step">
				
				
				<div style="clear:both"></div>
			</div>
			
			
			
		</div>
		
		<div style="clear:both"></div>
	</div>
	
</div>
		<?php } ?>
		<script type="text/javascript">
  $(function() {
     $("#file1").change(function (event){
		 var path = URL.createObjectURL(event.target.files[0]);
       $('#image_submit').css('display','block');
	   $('.imgpath').attr('src',path);	
     });
  });
</script>

<style type="text/css">
@media all and (max-width: 1500px) and (min-width: 768px)
{
.cause_add_media
	{
		width:800px!important;
	}
}

.loadingimageaction
{
	width: 50px;
}

</style>


<div id="openModalpreview" class="mb_elegantModal123" style="display:none;">
	<div class="animated swing">
		<a title="Close" class="mb_elegantModalclose" onclick="return hide_preview_box()">X</a>
		<h2>Preview</h2>
		
		<div class="media_section">
		
			<div class="media_section_left">
				<div class="img_preview">
					<img src="<?=base_url()?>causes_images/blog1.jpg" class="imgpath" id="pp_image">
				</div>
				
				<div style="clear:both"></div>		
			</div>
			
			<div class="media_section_right">
				
				<table>
					<tr>
						<th colspan="2">
							<label id="pp_title" class="preview_box"></label>
						</th>
					</tr>
					
					<tr>
						<td colspan="2">
							<label id="pp_details" class="preview_box">
								
							</label>
						</td>
					</tr>
					
					<tr>
						<th>Area :</th>
						<td>
							<input type="text" id="pp_area" class="preview_box" value=""/>
						</td>
					</tr>
					<tr>
						<th>City : </th>
						<td>
							<input type="text" id="pp_city" class="preview_box" value=""/>
						</td>
					</tr>
					
					<tr>
						<th>No. Of Volunteers :</th>
						<td>
							<input type="text" id="pp_volun" class="preview_box" value=""/>
						</td>
					</tr>
					
					<tr>
						<th>Phone number :</th>
						<td>
							<input type="text" id="pp_phone" class="preview_box" value=""/>
						</td>
					</tr>
					
					<tr>
						<th>Date :</th>
						<td>
							<input type="text" id="pp_sdate" class="preview_box" value=""/>
							<input type="text" id="ppp_date" value=" to "/> 
							<input type="text" id="pp_edate" class="preview_box" value=""/>
						</td>
					</tr>
					
					<tr>
						
					</tr>
				
				</table>
				
				
				<div style="clear:both"></div>
			</div>
			
			
			
			<div style="clear:both"></div>
		</div>
		
		<div style="clear:both"></div>
	</div>
	
</div>

<style type="text/css">
label#pp_details
{
	font-weight: 100;
	font-size: 12px!important;
	line-height: 23px;
	width: 100%;
}

#openModalpreview p
{
	font-size: 11px!important;
	text-align: left!important;
	color: black!important;
	width: 95%;
	margin: 9px auto;
}
@media all and (max-width: 1500px) and (min-width: 768px)
{
	.mb_elegantModal123 > div
	{
		width: 65%;
		position: relative;
		margin: 4% auto;
		border-radius: 10px;
		background: #fff;
		padding: 20px;
		box-shadow: 8px 0px 20px 14px rgba(0, 0, 0, 0.08)
	}
	#openModalpreview .media_section
	{
		padding:1%;
	}

	#openModalpreview .media_section .media_section_left
	{
		width: 33%;
		padding-left:1%
	}
	#openModalpreview .media_section .media_section_right
	{
		width: 65%;
		height: 460px;
		overflow: scroll;
	}

	#openModalpreview .media_section .media_section_right table
	{
		width:98%;
	}

	#openModalpreview .media_section .media_section_right table tr
	{
		line-height: 32px;
	}
	#openModalpreview .media_section .media_section_right table tr td
	{
		width: 74%;
	}
	#openModalpreview .media_section .media_section_right table tr th
	{
		width: 35%;
		text-align:left;
		padding-right:10px
	}

	.preview_box
	{
		width:100%;
		text-align:left;
		border: 0;
	}

	#openModalpreview
	{
		.mb_elegantModal 
		position: fixed;
		font-family: Arial,Helvetica,sans-serif;
		top: 0px;
		right: 0px;
		bottom: 0px;
		left: 0px;
		background: none repeat scroll 0% 0% rgba(0, 0, 0, 0.8);
		z-index: 99999;
		opacity: 1;
		display: none;
	}

	#openModalpreview h2
	{
		font-size: 25px;
		text-align: center;
		margin:0;
	}	
	#pp_sdate,#pp_edate
	{
		width:28%;
		float:left;
	}
	#ppp_date
	{
		float:left;
		width:10%;
		font-weight:bold;
		border: 0;
	}
}



@media all and (max-width: 500px) and (min-width: 320px) 
{
	.mb_elegantModal123 > div
	{
		width: 82%;
		position: relative;
		margin: 4% auto;
		border-radius: 10px;
		background: #fff;
		padding: 20px 5px;
		box-shadow: 8px 0px 20px 14px rgba(0, 0, 0, 0.08)
	}
	#openModalpreview .media_section
	{
		padding:1%;
	}

	#openModalpreview .media_section .media_section_left
	{
		width: 100%;
		padding-left:1%
	}
	#openModalpreview .media_section .media_section_left#pp_image
	{
		width:145px !important;
	}
	#openModalpreview .media_section .media_section_right
	{
		width: 100%;
		height: 200px;
		overflow: scroll;
		padding-left: 0%!important;
	}

	#openModalpreview .media_section .media_section_right table
	{
		width:99%;
	}

	#openModalpreview .media_section .media_section_right table tr
	{
		line-height: 32px;
	}
	#openModalpreview .media_section .media_section_right table tr td
	{
		width: 50%;
		font-size:12px!important;
	}
	#openModalpreview .media_section .media_section_right table tr th
	{
		width: 50%;
		text-align:left;
		padding-right:10px
	}

	.preview_box
	{
		width:100%;
		text-align:left;
		border: 0;
	}

	#openModalpreview
	{
		.mb_elegantModal 
		position: fixed;
		font-family: Arial,Helvetica,sans-serif;
		top: 0px;
		right: 0px;
		bottom: 0px;
		left: 0px;
		background: none repeat scroll 0% 0% rgba(0, 0, 0, 0.8);
		z-index: 99999;
		opacity: 1;
		display: none;
	}

	#openModalpreview h2
	{
		font-size: 25px;
		text-align: center;
		margin:0;
	}	
	#pp_sdate,#pp_edate
	{
		width:28%;
		float:left;
	}
	#ppp_date
	{
		float:left;
		width:10%;
		font-weight:bold;
		border: 0;
	}
}
</style>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/default.include.a29efb.css" media="all">
<?php
	function search($array, $key, $value)
	{
		$results = array();

		if (is_array($array)) {
			if (isset($array[$key]) && $array[$key] == $value) {
				$results[] = $array;
			}

			foreach ($array as $subarray) {
				$results = array_merge($results, search($subarray, $key, $value));
			}
		}

		return $results;
	}
?>