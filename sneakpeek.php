<?php
session_start();
error_reporting(0);
include_once('config.php');

$per_page = 8; 

$query=mysql_query("SELECT * FROM fulus");
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
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="assets/css/docs.css" rel="stylesheet">
    <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">

  <!-- Mmmmm, Google Web Fonts. That's a paddlin'. -->
  <link href='http://fonts.googleapis.com/css?family=Oleo+Script' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/reset2.css">
  <link rel="stylesheet" href="css/style2.css">
  
    <!-- Our Javascript, starting with jQuery -->
 
 <script type="text/javascript" src="js/jquery-1.3.2.js"></script>

<script type="text/javascript" src="js/jquery.watermark.js"></script>



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
	  
</script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

<script type="text/javascript">

$.noConflict();

$(document).ready(function()
{

/*			$(".close"+id).click(function()
			{
			
			$("#votebox"+id).slideUp("slow");
			
			});
*/		
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

	<script type="text/javascript" src="http://cdn.jquerytools.org/1.2.6/full/jquery.tools.min.js"></script>
 
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
              <li><a href="#about">About</a></li>
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
      
      <div class="text">
        <h1>Who deserves a Fulu?</h1>
        <p>Join the conversation or start your own.</p>
        <p><a class="btn btn-primary btn-large">Log in with Facebook &raquo;</a></p></div>
        <div class="input">
        
        </div>
      </div>
   </div>

 
	    </article>
	</section>

	<!-- Section #2 / Background Only -->
	<section id="second" class="story2" data-speed="4" data-type="background">
		<article>

    <div class="container">

      <!-- Content -->

     <div class="hero-unit fulufeed">
  <div class="span12">
    Level 1 of column
    <div class="row-fluid">
      <div class="span6 red">Level 2</div>
      <div class="span6 blue">Level 2</div>
    </div>
  </div>
      <div class="text">
        <h1>THE FEED</h1>
        <p>Below are all the feeds!<br>
</p>
 
        </div>
      <div class="fulu">
      
      </div>
        
        <div id="content">
        
<?php
error_reporting(0);

// Define variables
$per_page = 8; // 8 fulus/page, subject to change.

// How to get the page
if($_GET)
{$page=$_GET['page'];}

else {
	$page = 1;
}

// (Trust me this does it)
$start = $count - (($pages- $page+1)*$per_page);

if ($start < 0) {
	$plus = $per_page + $start;
	$start = 0;
}

else {$plus = $per_page;}
$sql = "select * from fulus limit $start,$plus";
$query = mysql_query($sql);

// get data
while($data= mysql_fetch_array($query))
{

//make 
//spill out message
$message = $data['message'];

echo $message;
}

?>

		</div>			
	
	
<!--			<ul id="pagination" class="page">
	</ul>	-->
        
    <!--  </div> -->
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