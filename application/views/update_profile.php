	<section id="get-in-touch" class="ch_bg register_panel">
        <div class="container">
            <div class="section-header">
                <h2 class="about_tit text-center wow fadeInDown">PROFILE</h2>
            </div>
			
			<div style="clear:both"></div>
		
			<form id="register_panel" name="" method="">
				
				<div style="clear:both"></div>
				<!--<div class="col-md-2"></div>-->
				<div class="col-md-9 form_box_all" style="margin-top:21px;">
					 <input type="text" class="login_box7" id="fname" placeholder="First Name" value="<?=$profile[0]->fname?>">
					 <input type="text" class="login_box7" id="lname" placeholder="Last Name" value="<?=$profile[0]->lname?>">
					 <input type="text" class="login_box7" id="city" placeholder="City" value="<?=$profile[0]->city?>">
					 <input type="text" class="login_box7" id="state" placeholder="State" value="<?=$profile[0]->state?>">
					 <input type="text" class="login_box7" id="r_email" placeholder="Email" value="<?=$profile[0]->email?>" readonly>
					 <input type="text" class="login_box7" id="pnumber" placeholder="Mobile Number">
					 <textarea name="brief" id="brief" class="login_box11" placeholder="Brief Description About You"><?=$profile[0]->brief?></textarea>
					 
					 <?php
							if($profile[0]->image!='')
							{
						?>
								<img src="<?=$profile[0]->image?>" id="pfile" name="pfile" /> <a href="javascript:" id="upload_new_picture" onclick="upload_new()" style="color:black;">Change Profile Picture</a>
						<?php
							}
							else
							{
						?>
								<img src="<?=base_url()?>images/no_images.png" id="pfile" name="pfile" /> <a href="javascript:" id="upload_new_picture" onclick="upload_new()" style="color:black;">Upload New Profile Picture</a>
						<?php
							}
						?>
					 
					 
				</div>
				 
				 <div style="text-align:left; margin-left:10px;">
					<input type="button" onclick="register_process()" class="login_box6 login_box666" value="Update">
				</div>
			
			
				
			</form>
			
			
			
			
			
			
			
			
			
			<div style="clear:both"></div>
			<br>
			<form id="register_panel1" name="" method="">
				
				<h4>Change Password</h4>
				<div style="clear:both"></div>
				<!--<div class="col-md-2"></div>-->
				<div class="col-md-9 form_box_all" style="margin-top:21px;">
					<input type="hidden" id="cemail" value="<?=$profile[0]->email?>">
					 <input type="password" class="login_box7" id="cpwd" placeholder="Password" value="">
					 <div style="clear:both"></div>
					 <input type="password" class="login_box7" id="ccpwd" placeholder="Confirm Password" value="">
					 
					 
				</div>
				 
				 <div style="text-align:left;margin-left: 13px;">
					<input type="button" onclick="update_password_process()" class="login_box6 login_box66" value="Save">
				</div>
			
			
				
			</form>
			
				<script>
				function endsWith(str, suffix) 
	{
		return str.indexOf(suffix, str.length - suffix.length) !== -1;
	}
/* Script written by Adam Khoury @ DevelopPHP.com */
/* Video Tutorial: http://www.youtube.com/watch?v=EraNFJiY0Eg */
function _(el){
	return document.getElementById(el);
}
function uploadFile(){
	
	var uploadImg = document.getElementById('file1');
	 
	if(uploadImg.files.length < 1)
	{
		$(".notification-bar").html('Please choose a file to upload'); 
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
	ajax.open("POST", "<?=base_url()?>home/profile_pic");
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
		
		$(".notification-bar").html('Image uploaded successfully'); 
		$(".notification-bar").css('display','block'); 
		//setTimeout(function() { window.location.href='<?=base_url()?>user/profile'; }, 5000);
		setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
		$("#openModalcauses").css('display','none'); 
		$("#pfile").attr('src','<?=base_url()?>profile/'+part[0]); 
		return false;
		
	}
	else
	{
		
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
		$(".notification-bar").html('Please choose a file to upload'); 
		$(".notification-bar").css('display','block'); 
		setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
		return false;
	}
	
}

function upload_new()
{
	$('#openModalcauses').css('display','block');
			return false;
}

function hide_media_boc()
{
	$('#openModalcauses').css('display','none');
	return false;
}
</script>
<script type="text/javascript">
  $(function() {
     $("#file1").change(function (event){
		 var path = URL.createObjectURL(event.target.files[0]);
       //var fileName = $(this).val();
	   
	   
       //$(".filename").html(fileName);
	   $('.imgpath').attr('src',path);	
     });
  });
</script>
		</div>
    </section>
   
   <div id="openModalcauses" class="mb_elegantModal" style="display: none;">
	<div class="animated swing">
		<a title="Close" class="mb_elegantModalclose" onclick="return hide_media_boc()">X</a>
		
		<p>Add Profile Picture`</p>
		
		<div class="media_section">
			<div class="media_section_left">
				<label class="preview_label">Preview</label>
				<div class="img_preview">
					<img src="<?=base_url()?>causes_images/blog1.jpg" class="imgpath">
				</div>
				
				<div style="clear:both"></div>
				
			</div>
			
			<div class="media_section_right">
				<span class="form_text">UPLOAD IMAGE</span>
				<input type="file" id="file1" name="file1" class="upload_boot">
				<div class="loadingimageaction">
				</div>
				<input type="button" name="image_submit" id="image_submit" value="Update" onclick="uploadFile()">
				
				<div style="clear:both"></div>
			</div>
			
			
			
		</div>
		
		<div style="clear:both"></div>
	</div>
	
</div>

	<script type="text/javascript">
	
		function register_process()
		{
			var letters = /^[A-Za-z]+$/;
			
			var fname = $('#fname').val();
			if(fname=='')
			{
				$(".notification-bar").html('Please enter your first name'); 
				$(".notification-bar").css('display','block'); 
				setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
				return false;
			}
			/*
			if(!fname.match(letters))
			 {  
				$(".notification-bar").html('First Name should not contain number.'); 
				$(".notification-bar").css('display','block'); 
				setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
				return false;
			 }
			 */
			var lname = $('#lname').val();
			if(lname=='')
			{
				$(".notification-bar").html('Please enter your last name'); 
				$(".notification-bar").css('display','block'); 
				setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
				return false;
			}
			/*
			if(!lname.match(letters))
			 {  
				$(".notification-bar").html('Last Name should not contain number.'); 
				$(".notification-bar").css('display','block'); 
				setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
				return false;
			 }
			 */
			var city = $('#city').val();
			if(city=='')
			{
				$(".notification-bar").html('Please enter your city'); 
				$(".notification-bar").css('display','block'); 
				setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
				return false;
			}
			/*
			if(!city.match(letters))
			 {  
				$(".notification-bar").html('City should not contain number.'); 
				$(".notification-bar").css('display','block'); 
				setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
				return false;
			 }
			 */
			var state = $('#state').val();
			if(state=='')
			{
				$(".notification-bar").html('Please enter your state'); 
				$(".notification-bar").css('display','block'); 
				setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
				return false;
			}
			/*
			if(!state.match(letters))
			 {  
				$(".notification-bar").html('State should not contain number.'); 
				$(".notification-bar").css('display','block'); 
				setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
				return false;
			 }
			 */
			 var numbers = /^[0-9]+$/;  
			var pnumber = $('#pnumber').val();
			if(!pnumber.match(numbers) && pnumber!='')
			 {  
				$(".notification-bar").html('Please enter valid mobile no.'); 
				$(".notification-bar").css('display','block'); 
				setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
				return false;
			 }
			
			var brief = $('#brief').val();
			var dataString = '&fname='+ fname + '&lname='+ lname + '&city='+ city + '&state='+ state + '&mobile='+ pnumber + '&brief='+ brief;
			
			$.ajax({
					type: "POST",
					url: '<?=base_url()?>home/update_profile',
					data: dataString,
					cache: false,
					success: function(result){
							if(result)
							{
								$(".notification-bar").html('Your profile has been successfully updated'); 
								$(".notification-bar").css('display','block'); 
								setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
								return false;
							}
							else
							{
								$(".notification-bar").html('Oops somethings wrong. Try again!!'); 
								$(".notification-bar").css('display','block'); 
								setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
								return false;

							}
					}
				});
				return false;		
		}
		
		
		
		
		
		function update_password_process()
		{
			var cpwd = $('#cpwd').val();
			if(cpwd=='')
			{
				$(".notification-bar").html('Please enter password'); 
				$(".notification-bar").css('display','block'); 
				setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
				return false;
			}
			
			var ccpwd = $('#ccpwd').val();
			if(ccpwd=='')
			{
				$(".notification-bar").html('Please confirm password'); 
				$(".notification-bar").css('display','block'); 
				setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
				return false;
			}
			
			
			if(ccpwd!=cpwd)
			{
				$(".notification-bar").html('Passwords do not match'); 
				$(".notification-bar").css('display','block'); 
				setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
				return false;
			}
			
			var cemail = $('#cemail').val();
			
			var dataString = '&cpwd='+ cpwd + '&cemail='+ cemail;
			
			$.ajax({
					type: "POST",
					url: '<?=base_url()?>home/update_password_process',
					data: dataString,
					cache: false,
					success: function(result){
							if(result)
							{
								$('#ccpwd').val('');
								$('#cpwd').val('');
								$(".notification-bar").html('Your password has been successfully changed'); 
								$(".notification-bar").css('display','block'); 
								setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
								return false;
							}
							else
							{
								$(".notification-bar").html('Oops somethings wrong. Try again!!'); 
								$(".notification-bar").css('display','block'); 
								setTimeout(function() { $(".notification-bar").fadeOut(1500); }, 5000);
								return false;

							}
					}
				});
				return false;		
		}
		
	</script>
    
	
	<script type="text/javascript" src="<?=base_url()?>gall/jquery.min.js"></script>
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

		