<?php
session_start();
error_reporting(0);
include_once('config.php');

$per_page = 8; 

$query=mysql_query("SELECT * FROM fulu_fulus");
//$rsd = mysql_query($query);
$count = mysql_num_rows($query);
$pages = ceil($count/$per_page)


?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- include the Tooltip Tools -->

<link href="css/style.css" type="text/css" rel="stylesheet"/>

<link href="css/reset.css" type="text/css" rel="stylesheet"/>


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
	
	$("#content").load("pagination_data.php?page=1", Hide_Load());



	//Pagination Click
	$("#pagination li").click(function(){
			
		 $('html, body').animate({scrollTop: '50px'}, 800);	
		Display_Load();
		
		//CSS Styles
		$("#pagination li")
		.css({'border' : 'solid #dddddd 1px'})
		.css({'color' : '#0063DC'});
		
		$(this)
		.css({'color' : '#FF0084'})
		.css({'border' : 'none'});

		//Loading Data
		var pageNum = this.id;
		
		$("#content").load("pagination_data.php?page=" + pageNum, Hide_Load());
	});
	

	
});
</script>

	<script type="text/javascript" src="http://cdn.jquerytools.org/1.2.6/full/jquery.tools.min.js"></script>
    

<style type="text/css">

.tooltip {
	display:none;
	background:transparent url(black_arrow.png);
	font-size:12px;
	height:70px;
	width:160px;
	padding:25px;
	color:#fff;	
}

/* style the trigger elements */
#demo img {
	border:0;
	cursor:pointer;
	margin:0 8px;
}

/*This css contains code for the statis loading image in the right of the textbox */
body.faq .faqsearch .faqsearchinputbox input {
	font-size:16px;
	color:#6e6e6e;
	padding:10px;
	border:none;
	background:url(img/loading_static.gif) no-repeat right 50%;
	width:510px;
}
/*The css class below contains the animated loading image .this will be added on the dom later with Jquery*/
body.faq .faqsearch .faqsearchinputbox input.loading {
	background:url(img/loading_animate.gif) no-repeat right 50%;
}
</style>



<meta charset="utf-8" />
<title>Fulumail - Top Fulus</title>
<link href="css/home.css" rel="stylesheet" type="text/css">
<!--[if IE]>

    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

<!--[if lte IE 7]>

    <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE8.js"></script><![endif]-->

<!--[if lt IE 7]>

<link rel="stylesheet" type="text/css" media="all" href="css/ie6.css"/><![endif]-->

</head>

<body>
	
	<div class="innermain">	
<header>
<aside class="placeholder">
	
    <article class="logocontent"> <figure><a href="home.html"><img src="images/logo.png"/></a></figure></article>
	<div class="clear"></div>
    
</aside>
</header>
	<aside class="placeholder">
    
    		<h2 class="innerheading">Your favorite FuLu's</span></h2>
            
            <div class="favoritefulu">
            	<aside class="tabscontainer">
                <aside class="tabcenter"> <input type="text" name="query" id="faq_search_input" class="searchpan" />
				<input type="submit" class="search" value="" /> </aside>
                 <div id="searchresultdata" class="faq-articles"> </div>
            	<aside class="tabsleft"> <a class="tabs active" href="#"><span>Most recent</span></a></aside>
                <aside class="tabsright"><a class="tabs tabs1" href="popular.php"><span>Most Popular</span></a></aside>
                </aside>
				
                <aside class="topthumbs">

           		<div id="loading" ></div>
	<div id="content" ></div>
</aside>				
	
	<table width="800px">
	<tr><Td>
			<ul id="pagination">
				<?php
				//Show page links
				for($i=1; $i<=$pages; $i++)
				{
					echo '<li id="'.$i.'">'.$i.'</li>';
				}
				?>
	</ul>	
	</Td></tr></table>
            </div>
                
    	 
       <p class="devider"></p>
     
    </aside>




<footer class="innerfooter">
<aside class="placeholder">
 <p class="pluck"><img src="images/fulu.png" /></p> 
    <aside class="follow"><aside class="socialnetworks"><a href="http://www.facebook.com/pages/FuLumailcom/291322157583448" class="fb" target="_blank"></a><a href="https://twitter.com/#!/fulumaster" class="tw" target="_blank"></a></aside>
    </aside>
   	  <p class="footertxt"> &#9400; fulumail.com. All rights reserved. We are not a hate mail service. <br>
<a href="right.html">Rights and Regulations</a></p>
    </aside>
</footer>
</div>
<script>
jQuery.noConflict();
jQuery("#demo img[title]").tooltip();
jQuery("#demo iframe[title]").tooltip();

</script>

</body>
</html>
