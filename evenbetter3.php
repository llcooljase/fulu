<?php
session_start();
error_reporting(0);
include_once('config.php');

$per_page = 8; 

function get_rows ($table_and_query) { 
        $total = mysql_query("SELECT COUNT(*) FROM $table_and_query"); 
        $total = mysql_fetch_array($total); 
        return $total[0]; 
} 
$fulufeed = "fulufeed";
$count = get_rows($fulufeed);
$pages = ceil($count/$per_page);

$verbsuggest = array("rocks", "has a funny nose", "looks good", "smells bad", "is awesome", "is incredible", "is a genius", "partied too hard", "makes me laugh", "runs fast");
?>
<!--
 _                             _   
| |    o                      | | |
| |          _  _    _   __,  | | |
|/ \   |    / |/ |  |/  /  |  |/  |
|   |_/|_/    |  |_/|__/\_/|_/|__/o

-->
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
	<title>Welcome to Fulu!</title>

    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    
    <!-- Bootstrap ftw -->
    <link href="css/home.css" rel="stylesheet" type="text/css">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/docs.css" rel="stylesheet">
    <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">

    <!-- & Google Web Fonts ftw -->
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/reset2.css">
    <link rel="stylesheet" href="css/parallax.css">
  

<!-- 1. Load jQuery -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

<!-- 2. jQuery Watermark allows input forms to have text already in em. -->
<script type="text/javascript" src="js/jquery.watermark.js"></script>

<!-- 3. Script for file input button handling -->
<script>
var SITE = SITE || {};

SITE.fileInputs = function() {
  var $this = $(this),
      $val = $this.val(),
      valArray = $val.split('\\'),
      newVal = valArray[valArray.length-1],
      $button = $this.siblings('.button'),
      $fakeFile = $this.siblings('.file-holder');
  if(newVal !== '') {
    $button.text('Photo Chosen');
    if($fakeFile.length === 0) {
      $button.after('<span class="file-holder">' + newVal + '</span>');
    } else {
      $fakeFile.text(newVal);
    }
  }
};

$(document).ready(function() {
  $('.file-wrapper input[type=file]').bind('change focus click', SITE.fileInputs);
});

</script>

<!-- 4. To determine loading of fulus -->
<script type="text/javascript">

// Default
$(document).ready(function() {	

		var pages = <?php echo $pages;?>;
		$("#fulus").load("fulumachine.php?page=1&pages=<?php echo $pages;?>&sort=recent");
});
		
</script>

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
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#top_fulus">Top fulus</a></li>
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
        <h1>Who deserves a Fulu?</h1>
        <p class="gray">Join the conversation or start your own.</p>
</div>     
        
  <div class="row">
    <div class="span10">
    	<div class="fulu relative alsoshift20">
    
    <!--Bitch we're using HTML Purifier on this shit. Try to hack us. We dare you.-->
		<form class="well form-inline" enctype="multipart/form-data" action="fulu_upload.php" hackers="fuckyou" method="post">
		  <input type="text" class="input-noun" placeholder="This person/place/thing" name="noun">
		  <input type="text" class="input-verb" placeholder="<?php 
		  $i = rand(0,9);
		  echo $verbsuggest[$i];?>." name="verb">
        <fieldset>
        
			<div class="control-group">
            <div class="controls">
              <textarea class="input-message" id="textarea" rows="3" placeholder="Because..." name="message"></textarea>
            </div>
          </div>
          
          <div class="control-group put-in">       
            <div class="controls">
              <span class="file-wrapper">
			  <input type="file" name="photo" id="photo" />
			  <span class="button">Choose a Photo!</span>
			  </span>
            </div>
          </div>
          
          <div class="control-group">
            <div class="controls">
            <input type="text" class="input-url" placeholder="www.example.com" name="url">
            </div>
          </div>
          
          <div class="or">
          	<div class="or_text">
          <p>OR</p>
          </div>
          </div>
          
          <div class="sendalink">
          Send a link!
          </div>
          
            <button type="submit" class="send_fulu"></button>
        </fieldset>
      </form>   
                
      </div>
    </div>
    
      </div> 
      </div>
      
	</div>

 
	    </article>
	</section>

	<!-- Section #2 / Background Only -->
	<section id="second" class="story2" data-speed="4" data-type="background">
		<article>

    <div class="container">
    <div class="fulu_box">
    
    <div class="row">
    	<div class="offset1">
		    <div class="top_fulus">
    <span id="top_fulus"></span>
    <h1>TOP FULUS.</h1>
		    </div>
	    </div>
    </div>
    
<div class="for_traversal">    
    <div class="row">
    	<div class="offset1">
		    <div class="options">
			<a class="recent filter" >MOST RECENT</a>
            <script type="text/javascript">
				$(".recent").click(function() {
				$(this).parent().parent().parent().next().load("fulumachine.php?page=1&pages=<?php echo $pages;?>&sort=recent");
				});
			</script>
            <a class="trending filter">TRENDING NOW</a>
            <script type="text/javascript">
				$(".trending").click(function() {
				$(this).parent().parent().parent().next().load("fulumachine.php?page=1&pages=<?php echo $pages;?>&sort=trending");
				});
			</script>
		    </div>
	    </div>
    </div>
    
<div id="fulus"></div>
</div>

<div class="for_traversal">    
    <div class="row">
    	<div class="offset1">
<div id="prevnext">
<a class="prev" page="0">PREVIOUS</a>
<script>
				$(".prev").click(function() {
					var prevpage = parseInt($(this).attr("page"));
					if (prevpage == 0) {return false}
					var nextpage = prevpage + 2;
//					var sortMethod = $(this).attr("sortMethod");
					
 					$(this).attr("page",prevpage-1);
					$(this).nextAll('.next').attr("page",nextpage-1);
					$(this).parent().parent().parent().parent().prev().children().nextAll('#fulus').load("fulumachine.php?page="+prevpage+"&pages=<?php echo $pages;?>&sort=recent");
				});
</script>
<a class="next" page="2">NEXT</a>
<script>
				$(".next").click(function() {
					var nextpage = parseInt($(this).attr("page"));
					if (nextpage == <?php echo ($pages+1);?>) {return false}
					var prevpage = nextpage - 2;
//					var sortMethod = $(this).attr("sortMethod");
					
 					$(this).attr("page",nextpage+1);
					$(this).prevAll('.prev').attr("page",prevpage+1);
					$(this).parent().parent().parent().parent().prev().children().nextAll('#fulus').load("fulumachine.php?page="+nextpage+"&pages=<?php echo $pages;?>&sort=recent");
				});
</script>
</div>
		</div>
	</div>
</div>
<!--To preserve parallax scrolling--->
</div></div></article></section></div>
<!----------------------------------->

  <!--[if lt IE 7 ]>
    <script src="js/libs/dd_belatedpng.js"></script>
    <script>DD_belatedPNG.fix("img, .png_bg");
  <![endif]-->

</body>
</html>