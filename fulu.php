<?php
session_start();
error_reporting(0);
include_once('config.php');

$fuluid=$_REQUEST['id'];


function getYouTubeIdFromURL($url)
{
  $url_string = parse_url($url, PHP_URL_QUERY);
  parse_str($url_string, $args);
  return isset($args['v']) ? $args['v'] : false;
}

$query=mysql_query("SELECT * FROM fulus WHERE id=".$fuluid);


?>

<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
$(".like").click(function()
{
var id=$(this).attr("id");
var name=$(this).attr("name");
var dataString = 'id='+ id + '&name='+ name;
$("#votebox"+id).slideDown("slow");
$("#flash"+id).fadeIn("slow");

$.ajax
({
id:$(this).attr("id"),
type: "POST",
url: "rating.php",
data: dataString,
cache: false,
success: function(html)
{
$("#flash"+id).fadeOut("slow");
$("#content"+id).html(html);
} 
});
});

$(".close"+id).click(function()
{
$("#votebox"+id).slideUp("slow");
});

});
</script>



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
    
    		<h2 class="innerheading">Your favorite FuLus</span></h2>
            
            <div class="favoritefulu">
            
            	<aside class="tabscontainer">
                <!--<aside class="tabcenter"> <input type="text" value="Search FuLu" class="searchpan" onFocus="if(this.value='Search FuLu'){this.value='';}" onBlur="if(this.value==''){this.value='Search FuLu's'}" /> <input type="submit" class="search" value="" /> </aside>-->
            	<aside class="tabsleft"> <a class="tabs active" href="fulus.php"><span>Most recent</span></a></aside>
                <aside class="tabsright"><a class="tabs tabs1" href="popular.php"><span>Most Popular</span></a></aside>
                </aside>
           		<aside class="topthumbs">
                		
<?php
while($data= mysql_fetch_array($query))
{

// sniffs out if it's a link
$content=$data['content'];
	preg_match('/[a-zA-Z]+:\/\/[0-9a-zA-Z;.\/?:@=_#&%~,+$]+/', $content, $matches);

// Figure out if Fu or Lu and assign red or blue
if ($data['fu']) {
	$redorblue = "red";
}

else {
	$redorblue = "blue";
}

//spill out message
$message = $data['message'];

// if youtube video
	if($matches[0])
	{
		$youtube_id = getYouTubeIdFromURL($data['content']);
					
		$matter='http://youtube.com/embed/'.$youtube_id;
		$content='<div class="iframe"><iframe src="'.$matter.'" width="131" height="131" autoplay="false"></iframe></div>';
		$youtube = true;
	} 
	
// if not youtube video	
	else {
			$youtube = false;	
			$string="";
			$fileCount=0;
			$filePath='images/preview/'; 
			$dir = opendir($filePath); 
			while ($file = readdir($dir)) { 
			  if (eregi($content,$file)) { # Look at only files with a .php extension
				$string = "$file";
				$fileCount++;
			  }
			}

			if ($fileCount > 0) {
				$content='<div class="content"><img src="'.$filePath.$string.'" width="131" height="131"></div>';
			}
			
			else {
			$content='<div class="content"><img class="stock" src="images/fulu.png" width="131" height="131"></div>';
			}

}
?>


<div class="thumbs <?php echo $redorblue;?>" id="demo">
<?php echo $content;?>
<div class="message"><p class="message_text"><?php echo $message;?></p></div>

<div class="bottom_fulu">
<p class="fuluname">FuLu to <?php echo $data['name'];?></p>
<p class="ld">
<a href="javascript: void(0);" class="like up" id="<?php echo $data['id']?>" name="up">Like   </a>
<a href="javascript: void(0);" class="like down" style="color:#A00;" id="<?php echo $data['id']?>" name="down">Dislike</a></p>

<div class="tofb"><a name="fb_share" share_url="www.fulumail.com/fulu.php?id=<?php echo $data['id']?>"></a> </div>
</div>

<!--None of this really shows up-->
<div id="votebox<?php echo $data['id'];?>" class="votebox">
	<span id='close<?php echo $data['id'];?>'><a href="#" class="close" title="Close This">X</a></span>
	<div style="height:13px">
	<div id="flash<?php echo $data['id'];?>" class="flash">Loading........</div>
	</div>
	<div id="content<?php echo $data['id'];?>">
</div>
</div>
</div>	

                    <?php
}	
						?>
                	
                </aside>
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
</body>
</html>
