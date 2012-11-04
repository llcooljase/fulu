<?php
include 'upload.php';
	?>
<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="keywords" content="fulu, fulumail, anonymous, princeton, email, ash, egan, jason, adleberg, bobby, grogan" />
	<meta name="description" content="Mainstreaming Anonymous Emotions." />
	<meta name="robots" content="all" />
	<meta name="author" content="Jason Adleberg, jasonadleberg(at)gmail(dot)com" />
	<meta name="copyright" content="(c) 2012 Jason Adleberg">
	<title><?php if ($mes != 'we cool') {echo "Didn't work :/";}
	else {echo 'You got it dude';}?></title>

    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    
    <!-- Bootstrap ftw -->
    <link href="css/home.css" rel="stylesheet" type="text/css">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/docs.css" rel="stylesheet">
    <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">

    <!-- & Google Web Fonts ftw -->
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/reset2.css">
    <link rel="stylesheet" href="css/parallax.css">
  

<!-- 1. Load jQuery --><!--
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>-->
</head>
<!--

FOR SEARCHING -- PUT YOU IN LATER

<script type="text/javascript">
       $(document).ready(function() {					
       $("#faq_search_input").watermark("Search FuLu's");
				$("#faq_search_input").keyup(function()
				{
				var faq_search_input = $(this).val();
				var dataString = 'keyword='+ faq_search_input;
				if(faq_search_input.length>3)
				{
				$.ajax({
				type: "GET",
				url: "ajax-search.php",
				data: dataString,
				beforeSend:  function() {
				$('input#faq_search_input').addClass('loading');
				},
				success: function(server_response)
				{
				$('#searchresultdata').html(server_response).show();
				if ($('input#faq_search_input').hasClass("loading")) {
				 $("input#faq_search_input").removeClass("loading");
						} 
				}
				});
				}
				return false;
				});
				});
	  
</script>-->
 
</head>

<body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#"><img src="images/header_logo.png"></a>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="active"><a href="index.php">Home</a></li>
              <li><a href="index.php#top_fulus">Top fulus</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

  <div id="main" role="main">

	<!-- Section #1 / Intro -->
	<section id="first" class="story" data-speed="8" data-type="background">    	
		<div class="smashinglogo" data-type="sprite" data-offsetY="100" data-Xposition="50%" data-speed="-2"></div>		
		<article>


    <div class="container">

      <!-- Splash part -->

      <div class="hero-unit splash">
      
      <div class="text margin-bottom">
        <?php if ($mes != 'we cool') {echo "<h1>".$mes."</h1>";}
				  else {
					  $success = array('30dXrUm3o6g','kFBDn5PiL00','bVVsDIv98TA','m9rbsZZBqsk','xw2T1jx8kzo','NudDIgXkPLY');
					  $i = rand(0,6);
					  $j = $success[$i];?>
	<object style="height: 390px; width: 640px">
<param name="movie" value="https://www.youtube.com/v/<?php echo $j;?>?version=3&feature=player_embedded&autoplay=1">
<param name="allowFullScreen" value="true">
<param name="allowScriptAccess" value="always">
<embed src="https://www.youtube.com/v/<?php echo $j;?>?version=3&feature=player_embedded&autoplay=1" type="application/x-shockwave-flash" allowfullscreen="true" allowScriptAccess="always" width="425" height="344"></object>
				  <?php }
				  ?>
					  
        <p class="gray"><a href="javascript:history.go(-1)">Clic<?php echo $hm?>k me to go back!</a><br></p>
</div>     
        

      </div>
      
	</div>

 
	    </article>
	</section>

    


<!--To preserve parallax scrolling--->
</div>
<!----------------------------------->

  <!--[if lt IE 7 ]>
    <script src="js/libs/dd_belatedpng.js"></script>
    <script>DD_belatedPNG.fix("img, .png_bg");
  <![endif]-->

</body>
</html>   
