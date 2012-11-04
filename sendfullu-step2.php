<?php
include_once('sessions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Welcome to Fulumail</title>
<link href="css/home.css" rel="stylesheet" type="text/css">
<!--[if IE]>

    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

<!--[if lte IE 7]>

    <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE8.js"></script><![endif]-->

<!--[if lt IE 7]>

<link rel="stylesheet" type="text/css" media="all" href="css/ie6.css"/><![endif]-->
 <script src="http://code.jquery.com/jquery-latest.js"></script>
 <script type="text/javascript" src="http://jzaefferer.github.com/jquery-validation/jquery.validate.js"></script>
 	<script src="js/ajaxupload.js" type="text/javascript"></script>
	<script type="text/javascript">
	$(document).ready(function(){

	var thumb = $('img#thumb');	

	new AjaxUpload('imageUpload', {
		action: $('form#newHotnessForm').attr('action'),
		name: 'image',
		onSubmit: function(file, extension) {
			thumb.attr('src', '');
			$('div.previeimg').addClass('loading');
			//alert($('input[name="image"]').val());
		},
		onComplete: function(file, response) {
			thumb.load(function(){
				$('div.previeimg').removeClass('loading');
				thumb.unbind();
			});
			thumb.attr('src', response);

			
		}
	});
});

</script>

<script type="text/javascript">
function iframe( videolink)
{
var videoid=youtubeIDextract(videolink);
var url='http://www.youtube.com/embed/'+videoid;
var link= '<iframe src="'+ url +'" width="150" height="150" title="video" autoplay="false"></iframe>';
//alert(link)
return link
}

function youtubeIDextract(url)
{
var youtube_id;
youtube_id = url.replace(/^[^v]+v.(.{11}).*/,"$1");
return youtube_id;
}
</script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-29773185-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
  <script>
  $(document).ready(function(){
    $("#newHotnessForm").validate();

	$("#submit").click(function()
	{
	
	if($('div.preview').hasClass('loading'))
			{
				alert('Please wait your photo is not uploaded yet');
				return false;
			}
  	});	

  $("input[name='email']").change( function() {
	    $("#toemail").html($(this).val());
	
	});

	
		  $("input[name='video']").change( function() {
			  if($(this).val()){
				 
			$("#tovideo").html("Video:"+iframe($(this).val()));
			  }
		});

	
	$("textarea[name='comment']").change( function() {
	    $("#tomessage").html($(this).val());
	
	});
  });
  
  </script>
<script>

$(document).ready(function() {	

	//select all the a tag with name equal to modal
	$('a[name=modal]').click(function(e) {
		//Cancel the link behavior
		e.preventDefault();
		
		//Get the A tag
		var id = $(this).attr('href');
	
		//Get the screen height and width
		var maskHeight = $(document).height();
		var maskWidth = $(window).width();
	
		//Set heigth and width to mask to fill up the whole screen
		$('#mask').css({'width':maskWidth,'height':maskHeight});
		
		//transition effect		
		$('#mask').fadeIn(1000);	
		$('#mask').fadeTo("slow",0.8);	
	
		//Get the window height and width
		var winH = $(window).height();
		var winW = $(window).width();
              
		//Set the popup window to center
		$(id).css('top',  winH/2-$(id).height()/2);
		$(id).css('left', winW/2-$(id).width()/2);
	
		//transition effect
		$(id).fadeIn(2000); 
	
	});
	
	//if close button is clicked
	$('.window .close').click(function (e) {
		//Cancel the link behavior
		e.preventDefault();
		
		$('#mask').hide();
		$('.window').hide();
	});		
	
	//if mask is clicked
	$('#mask').click(function () {
		$(this).hide();
		$('.window').hide();
	});			
	
});

</script>




</head>
<body>
	<?php $email = $_GET['email']; ?>
	<div class="innermain">	
<header>
<aside class="placeholder">
	
    <article class="logocontent"> <figure><a href="home.html"><img src="images/logo.png"/></a></figure></article>
	<div class="clear"></div>
    
</aside>
</header>
	<aside class="placeholder">
    
    		<p class="devider"></p>
           <?php echo '<form id="newHotnessForm" enctype="multipart/form-data" action="sendemail.php" method="post" >'; ?>
    	 <aside class="form_inner">
<aside class="form_left">

<aside class="inputfirst">
<label class="lable">Name</label>
<input type="text" class="required name" value="" name="name">
</aside>
<aside class="msgbox">
<label class="lable">CONTENT</label>
<textarea  id="ccomment" name="comment" class="required textarea"> </textarea>
</aside>
<aside class="inputfirst">
<label class="lable">EMAIL</label>
<input type="text" class="required email" value="<?php echo $email; ?>" name="email">
</aside>
<aside class="inputsecond">
<label class="lable">

<a href="#" id="picture" onClick="$('#picturelink').show();$('#videolink').hide();">Picture</a>,

<a href="#" id="video" onClick="$('#videolink').show();$('#picturelink').hide();">Video</a></label>

<div id="picturelink" style="display:none;">
<input type="file" id="imageUpload" name="picture[]" class="inputbox filebox" >
</div>

<div id="videolink" style="display:none;">
<input type="text" name="video" id="video" class="inputbox filebox"  >
</div>
</aside>

<p class="preview" id="preview">
<a href="#dialog" name="modal" ><img src="images/preview.png" /></a></p>

<aside class="checkboxmain">
<input type="checkbox" class="required checkbox" name="terms">
<p class="checktext">By checking this box I have agreed to FuLu <a href="rights.html">Rights and Regulations</a> </p> 
<div id="boxes">

<div id="dialog" class="window">

<div class="recipent"><span>Email:</span><p id="toemail"></p></div>
<div class="msgto"><span>Message:</span><p id="tomessage"></p></div>
<div class="previeimg">
<img id="thumb" width="487px" height="192px" src="images/demo2.jpg" /> </div>
<div id="tovideo"></div>



<a href="#" class="close"/>Close it</a></div>
</div>
<p class="buttoncnt"><input type="submit" class="sbmit_btn" value="" id="submit" >
<input type="hidden" name="fulusession" value="<?php echo $_SESSION['fulumail'];?>">
</p>
</aside>
</aside>
</aside>
            </form>
       
    </aside>




<footer class="innerfooter">
<aside class="placeholder">
 <p class="pluck"><img src="images/fulu.png" /></p> 
    <aside class="follow"><aside class="socialnetworks"><a href="http://www.facebook.com/pages/FuLumailcom/291322157583448" class="fb" target="_blank"></a><a href="https://twitter.com/#!/fulumaster" class="tw" target="_blank"></a></aside>
    </aside>
   	  <p class="footertxt"> &#9400; fulumail.com. All rights reserved. We are not a hate mail service. <br>
<a href="rights.html">Rights and Regulations</a></p>
    </aside>

</footer>
 <div id="mask"></div>
</div>
	
	
</body>
</html>
