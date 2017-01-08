
<script src="<?=base_url()?>js/jquery.tabSlideOut.v1.3.js"></script>
	<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js" type="text/javascript"></script>-->
<script type="text/javascript">
$(function(){
	$('.slide-out-div').tabSlideOut({
		tabHandle: '.handle',
		pathToTabImage: '<?=base_url()?>images/feedback.png',
		imageHeight: '122px',
		imageWidth: '40px',  
		tabLocation: 'right', 
		speed: 300,          
		action: 'click',     
		topPos: '110px',     
		leftPos: '20px',     
		fixedPosition: true 
	});

});

</script>
		   
<script type="text/javascript">
	function feedback()
	{
		var letters = /^[A-Za-z]+$/;
		
		var femail = $('#femail').val();
		if(femail=='')
		{			
			$(".ptext1").html('Please Provide Your Email.'); 
			$("#openModalpopup1").css('display','block'); 
			setTimeout(function() { $("#openModalpopup1").fadeOut(1500); }, 5000);
			return false;
		}
		
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

		if(!femail.match(filter))
		{
			
			$(".ptext1").html('Please Provide valid Email address'); 
			$("#openModalpopup1").css('display','block'); 
			setTimeout(function() { $("#openModalpopup1").fadeOut(1500); }, 5000);
			return false;
		}
		
		var numbers = /^[0-9]+$/;  
		var fmobile = $('#fmobile').val();
		if(!fmobile.match(numbers) && fmobile!='')
		 {  			
			$(".ptext1").html('Please Provide valid Mobile No.'); 
			$("#openModalpopup1").css('display','block'); 
			setTimeout(function() { $("#openModalpopup1").fadeOut(1500); }, 5000);
			return false;
		 }
		
		var fmsg = $('#fmsg').val();
		if(fmsg=='')
		{			
			$(".ptext1").html('Please Provide Your Message.'); 
			$("#openModalpopup1").css('display','block'); 
			setTimeout(function() { $("#openModalpopup1").fadeOut(1500); }, 5000);
			return false;
		}		
		 
		 
		 var dataString = '&femail='+ femail + '&fmobile='+ fmobile + '&fmsg='+ fmsg;
			
			$.ajax({
					type: "POST",
					url: '<?=base_url()?>user/feedback',
					data: dataString,
					cache: false,
					success: function(result){
							if(result)
							{
								$('#femail').val('');
								$('#fmobile').val('');
								$('#fmsg').val('');
								
								$(".ptext1").html('Thankyou for contacting us. We will contact you soon!!'); 
								$("#openModalpopup1").css('display','block'); 
								setTimeout(function() { window.location.href='<?=base_url()?>home/index'; }, 5000);
								return false;
							}
							else
							{
								$('#femail').val('');
								$('#fmobile').val('');
								$('#fmsg').val('');								
								$(".ptext1").html('Something went wrong. Please try again!!!'); 
								$("#openModalpopup1").css('display','block'); 
								setTimeout(function() { $("#openModalpopup1").fadeOut(1500); }, 5000);
								return false;

							}
					}
				});
				return false;
		 
	}
			
</script>

<div class="slide-out-div">
	<a class="handle" href="javascript:">Content</a>
	<h3>Tell us What you think.</h3>
	<p>Love us / have suggestions / ideas / feature requests? Tell us how we can improve our website</p>
	
	
	<div class="right_panel">
	
		<div class="side_box">
			<label>Email <span>*</span></label>
			<input type="text" name="femail" id="femail" />
		</div>
		
		<div class="side_box">
			<label>Mobile Number</label>
			<input type="text" name="fmobile" id="fmobile" />
		</div>
		
		<div class="side_box">
			<label>Message <span>*</span></label>
			<textarea name="fmsg" id="fmsg" ></textarea>
		</div>
		
		<button type="button" onclick="feedback()" >Submit</button>
	
	</div>
</div>
		

<style type="text/css">
	.right_panel
	{
		
	}
	
	.right_panel .side_box
	{
		margin-bottom: 15px;
	}
	.right_panel .side_box label span
	{
		color:#F66969;
	}
	.right_panel .side_box label
	{
		width: 100%;
	}
	
	.right_panel .side_box input
	{
		width: 85%;
		height: 28px;
		border: 0;
	}
	
	.right_panel .side_box textarea
	{
		width: 85%;
		height: 80px;
		border: 0;
	}
	
	.slide-out-div h3
	{
		margin-top: 0;
	}
	.slide-out-div 
	{
		padding: 20px;
		width: 282px;
		background: #ccc;
		border: 1px solid #29216d;
		z-index: 10;
		height: auto !important;
		padding-bottom: 10px;
    }      
	
	.slide-out-div button
	{
		width: 90px;
		height: 31px;
		border: 0;
		background: #7E7676;
		color: white;
	}

	.slide-out-div button:hover
	{
		background: #A48787;
	}

	
	.handle
	{
		/*background-color: #005387;*/
		background-color: grey;
		background-position: 10px 15px;
		z-index: 10000000;
	}
	  
</style>
	  
	  
	  



<div class="float_footer">
	
	<?php
		if (($this -> session -> userdata('user_id') == "")) 
		{
			if($login_action && !empty($login_action) && $login_action=='1')
			{
				?>
					<a href="#get-in-touch">
						<img src="<?=base_url()?>images/ignite_icon.png" />
					</a>
				<?php
			}
			else
			{
				?>
					<a href="javascript:" onclick="return login_popup()">
						<img src="<?=base_url()?>images/ignite_icon.png" />
					</a>
				<?php
			}
		}
		else
		{
			
				if($login_action1!='0')
				{
			?>
				<a href="<?=base_url()?>causes/add">
					<img src="<?=base_url()?>images/ignite_icon.png" />
				</a>
			<?php
				}
		}
		
	?>
	

	
</div>    

<style>
	.float_footer
	{
		position: fixed;
		z-index: 10000000;
		right: 3%;
		top: 90%;
	}
	
	.float_footer img
	{
		width: 107px;
		height: 50px;
	}
	.float_footer img:hover
	{
		width: 115px;
		height: 55px;
	}
.footer_rights
{
	text-align: center;
	border-top: 1px solid #9e9e9e;
	padding: 10px 0;
	/*position: fixed;
	bottom: 0;*/
	width: 100%;
	background: #fff;
	z-index: 100;
}
.disclimer
{
	display:none;
	position: fixed;
	top: 11%;
	width: 80%;
	z-index: 10000;
	background: #ececec;
	left: 10%;
	padding: 2% 2%;
	height:80%;
	overflow-y:scroll;
}

.disclimer a.close
{
	position: absolute;
	right: 10px;
	color: black !important;
	top: 6px;
	font-weight: normal;
}
</style>
<div class="disclimer">
<a href="javascript:" onclick="closeshowdisclaimer()" class="close">X</a>
<strong>GENERAL DISCLAIMER</strong>:  GETINVOLVED is not responsible for material posted to this social media site and does not guarantee the content, accuracy, or use of the content in this site.   GETINVOLVED does not in any way endorse or recommend individuals, products or services that may be discussed on this site.  GETINVOLVED specifically disclaims all liability for claims or damages that may result from any posting on this site.   GETINVOLVED accepts no responsibility for the opinions and information posted on this forum, and such opinions do not necessarily reflect the policies of GETINVOLVED.  In no event shall GETINVOLVED be liable to you or anyone else for any decision made or action taken by you in reliance on information on this site.
<div style="clear:both"></div>
With the foregoing in mind, the GETINVOLVED terms of use for this site are as follows:<div style="clear:both"></div><br/>
1.	You must be at least 15 years old to interact with any content on any GETINVOLVED Social Media Site.<div style="clear:both"></div>
2.	As a guest posting content on GETINVOLVED Social Media Site on the internet, you agree that you will not: violate any local, state, federal and international laws and regulations, including but not limited to copyright and intellectual property rights laws regarding any content that you send or receive via this Policy; transmit any material (by uploading, posting, email or otherwise) that is unlawful, disruptive, threatening, profane, abusive, harassing, embarrassing, tortuous, defamatory, obscene, libelous, or is an invasion of another's privacy, is hateful or racially, ethnically or otherwise objectionable as solely determined in GETINVOLVED’s discretion; impersonate any person or entity or falsely state or otherwise misrepresent your affiliation with a person or entity; transmit any material (by uploading, posting, email or otherwise) that you do not have a right to make available under any law or under contractual or fiduciary relationships; transmit any material (by uploading, posting, email or otherwise) that infringes any patent, trademark, trade secret, copyright or other proprietary rights of any party; transmit (by uploading, posting, email or otherwise) any unsolicited or unauthorized advertising (including advertising of non-GETINVOLVED services or products), promotional materials, "junk mail,""spam,""chain letters,""pyramid schemes" or any other form of solicitation; transmit any material (by uploading, posting, email or otherwise) that contains software viruses, worms, disabling code, or any other malicious computer code, files or programs designed to interrupt, destroy or limit the functionality of any computer software or hardware or telecommunications equipment; harass another; or collect or store, or attempt to collect or store, personal data about third parties without their knowledge or consent; or to share confidential pricing information of any party.<div style="clear:both"></div>
3.	By posting any content on GETINVOLVED Social Media Site, you grant to GETINVOLVED the irrevocable right to reproduce, distribute, publish, and display such content and the right to create derivative works from your content, edit or modify such content and use such content for any GETINVOLVED purpose.<div style="clear:both"></div>
4.	You expressly acknowledge that you assume all responsibility related to the security, privacy, and confidentiality risks inherent in sending any content over the internet. GETINVOLVED does not control third-party sites and the internet over which you may choose to send confidential or personal information; therefore GETINVOLVED does not make any warranties, express or implied, against interceptions or compromises to your information. <div style="clear:both"></div>
5.	You may not provide any content to GETINVOLVED Social Media Site that contains any product or service endorsements.<div style="clear:both"></div>
6.	GETINVOLVED is a nonpartisan organization.   In furtherance of that policy, you may not provide any content to GETINVOLVED Social Media Site that may be construed as (a) lobbying for or against any legislation or legislative proposal, (b) a solicitation of contributions for any persons, entity or cause, or (c) a statement for or against any political candidate for public office.   In addition, you may not link to any sites of political candidates or parties or use the GETINVOLVED Social Media Site to discuss political campaigns.<div style="clear:both"></div>
7.	GETINVOLVED’s policy is to scrupulously comply with all antitrust laws, and all users of this site are cautioned to guard against activity that could be construed as a violation of the antitrust laws. Do not post any material that:<div style="clear:both"></div>
•	References specific fees charged or paid for professional services.<div style="clear:both"></div>
•	Discusses prices, discounts, terms or conditions of sale and other price or cost-related items.<div style="clear:both"></div>
•	Addresses salaries or terms of employment.<div style="clear:both"></div>
•	Attempts to allocate markets.<div style="clear:both"></div>
•	Includes information that could otherwise be construed to impose a restraint on trade and inhibit free and fair competition.<div style="clear:both"></div>
<div style="clear:both"></div><br/>
GETINVOLVED reserves the right to remove any content in violation of this policy or that is otherwise objectionable, as well as to take steps to block access by any person violating this policy.
<div style="clear:both"></div><br/><br/>
</div>
<script>
function showdisclaimer()
{
	$(".disclimer").css('display','block'); 
	return false;
}

function closeshowdisclaimer()
{
	$(".disclimer").css('display','none'); 
	return false;
}

</script>

<div class="footer_rights">
	Copyright © 2016 , <a href="<?=base_url()?>">Get Involved</a>.  <a href="javascript:" onclick="showdisclaimer()">Disclaimer</a>
</div>
</body>
</html>
