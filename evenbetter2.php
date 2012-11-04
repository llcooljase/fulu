<?php
session_start();
error_reporting(0);
include_once('config.php');

$per_page = 8; 

$query=mysql_query("SELECT * FROM fulufeed");
//$rsd = mysql_query($query);
$count = mysql_num_rows($query);
$pages = ceil($count/$per_page)


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
	<title>Welcome to Fulu!</title>

    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    
    <link href="css/home.css" rel="stylesheet" type="text/css">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
<!--    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">-->
    <link href="assets/css/docs.css" rel="stylesheet">
    <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">

  <!-- Mmmmm, Google Web Fonts. That's a paddlin'. -->
<link href='http://fonts.googleapis.com/css?family=Merriweather:400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/reset2.css">
  <link rel="stylesheet" href="css/style2.css">
  
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

$.noConflict();

$(document).ready(function()
{

	/*
	function Display_Load()
	{
	    $("#loading").fadeIn(900,0);
		$("#loading").html("<img src='bigLoader.gif' />");
	}
	//Hide Loading Image
	function Hide_Load()
	{
		$("#loading").fadeOut('slow');
	};
	*/
	

   //Default Starting Page Results
   
	$("#pagination li:first").css({'color' : '#FF0084'}).css({'border' : 'none'});
	
	Display_Load();
	
	var pages = <?php echo $pages;?>;
	
	$("#content").load("pages.php?page=" + pages, Hide_Load());



	//Pagination Click
	$("#pagination li").click(function(){
			
		 $('html, body').animate({scrollTop: '50px'}, 800);	
		Display_Load();
		
		//CSS Styles
		$("#pagination li")
		.css({'color' : '#0063DC'});
		
		$(this)
		.css({'color' : '#FF0084'})
		.css({'border' : 'none'});

		//Loading Data
		var pageNum = this.id;
		var andSo = pages - pageNum + 1;
		
		$("#content").load("pages.php?page=" + andSo, Hide_Load());
	});
	

	
});

</script>

<!-- 5. Ratings system! For some reason, only likes 1.3.0 -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/
libs/jquery/1.3.0/jquery.min.js"></script>
<script type="text/javascript">

$(function() {
	$(".vote").click(function() {
		var id = $(this).attr("id");
		var name = $(this).attr("name");
		var dataString = 'id='+ id ;
		var parent = $(this);

		if (name=='up') {
			$(this).fadeIn(1000).html('<img src="images/luselected.png"/>');
			$.ajax({
				type: "POST",
				url: "up_vote.php",
				data: dataString,
				cache: false,

				success: function(html) {parent.removeClass('lu').addClass('luclicked').html(html);} 
			});
		}
		
		else if (name=='down') {
			$(this).fadeIn(1000).html('<img src="fuselected.png" />');
			$.ajax({
				type: "POST",
				url: "down_vote.php",
				data: dataString,
				cache: false,

				success: function(html) {
            parent.removeClass('fu').addClass('fuclicked').html(html);}
			});
		}
		
		return false;
		
	});
});

$(function() {
	$(".flag").click(function() {
		var id = $(this).attr("id");
		var dataString = 'id='+ id ;
		var parent = $(this);

			$(this).fadeIn(200).html('<img src="dot.gif" />');
			$.ajax({
				type: "POST",
				url: "flag.php",
				data: dataString,
				cache: false,

				success: function(html) {
            parent.removeClass('btnflag').addClass('flagclicked').html(html);}
			});
		
		return false;
		
	});
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
    
		<form class="well form-inline" enctype="multipart/form-data" action="fulusent2.php" method="post">
		  <input type="text" class="input-name" placeholder="This person/place/thing" name="title">
		  <input type="text" class="input-verb" placeholder="rocks." name="verb">
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
          
          <input type="hidden" name="IP" value="<?php echo $_SERVER['REMOTE_ADDR'];?>">
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
    
    <div class="row">
    	<div class="offset1">
		    <div class="options">
			<a href="" class="sort" name="popular">MOST POPULAR</a>
            <a href="" class="sort" name="recent">MOST RECENT</a>
		    </div>
	    </div>
    </div>
    
    <?php

// How to get the page
/*if($_GET)
{$page=$_GET['page'];}

// (Trust me this does it)
$start = $count - (($pages- $page+1)*$per_page);

if ($start < 0) {
	$plus = $per_page + $start;
	$start = 0;
}

else {$plus = $per_page;} */
$sql = "select * from fulufeed limit 0,5";
$query = mysql_query($sql);

// get data
while($data= mysql_fetch_array($query))
{

// Return only first name
$title = $data['title'];
$titleformatted = urlencode(utf8_encode($title));

//spill out message
$message = $data['message'];

//spill out url
$url = $data['url'];
$urlformatted = urlencode(utf8_encode($url));

//spill out ID
$id = $data['id'];

$up = $data['up'];
$down = $data['down'];
?>
<div class="relative">
	<div class="row"> 
        <div class="span10 offset1"> 
           <div class="fulu relative">
               
<?php				
				if ($url) {
					 echo '<div class="fulu_picture"><iframe src="'.$url.'"></iframe></div>
			    <div class="fulu_title"><a href="'.$url.'">'.$title.'</a></div>';
				}
				
				else {
					echo '<div class="fulu_picture"><img src="images/grain.png"></div>
					<div class="fulu_title">'.$title.'</div>';
				}
?>				
                <div class="fulu_text"><?php echo $message;?></div> 
                <div class="fulu_buttons"> 
                	<a class="btntwitter" onclick="var sTop = window.screen.height/2-(218); var sLeft = window.screen.width/2-(313);window.open('https://twitter.com/intent/tweet?original_referer=http%3A%2F%2Fwww.fulumail.com&source=tweetbutton&text=<?php echo $title." ".$urlformatted;?>','sharer','toolbar=0,status=0,width=626,height=436,top='+sTop+',left='+sLeft);return false;"></a>
                    <a class="btnfacebook" onclick="var sTop = window.screen.height/2-(218); var sLeft = window.screen.width/2-(313);window.open(this.href,'sharer','toolbar=0,status=0,width=626,height=436,top='+sTop+',left='+sLeft);return false;" href="http://www.facebook.com/sharer.php?u=<?php echo $urlformatted;?>&t=<?php echo $titleformatted;?>"></a>
					<a class="btnflag flag"  id="<?php echo $id;?>" href=""></a> 
       			</div> 
				<div class="fuluvote">
					<a href="" class="vote fu" id="<?php echo $id;?>" name="down"></a>
					<a href="" class="vote lu" id="<?php echo $id;?>" name="up"></a>
				</div>

      	    </div><!--fulu relative-->
		</div> <!--span10 offset1-->
    </div> <!--row-->
</div><!--relative-->

<?php
}
	
	?>
  <!--  <div class="row"> 
        <div class="span10 offset1"> 
           <div class="fulu relative"> 
                <div class="shadow"><div class="fulu_picture"><img src="images/grain.png"></div></div> 
                <div class="fulu_title">Look at how this clown puts his shirt on!</div> 
                <div class="fulu_text">This lol.
                </div> 
				<div class="up">
					<a href="" class="vote btnonestar" id="'.$id.'" name="up">'.$up.'</a>
				</div>
				<div class="down">
					<a href="" class="vote btntwostars" id="'.$id.'" name="down">'.$down.'</a>
				</div>
                <div class="fulu_buttons"> 
                	<a class="btntwitter" href=""></a> 
                    <a class="btnfacebook" href=""></a>
                    <a class="btnflag" href=""></a>
       			</div> 
      </div> 
	</div> 
    </div> -->

    
    </div>
   </div>

		</article>
	</section>


	
  </div> <!-- // End of #main -->




  <!--[if lt IE 7 ]>
    <script src="js/libs/dd_belatedpng.js"></script>
    <script>DD_belatedPNG.fix("img, .png_bg");
  <![endif]-->

</body>
</html>