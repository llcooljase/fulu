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

<?php

include("config.php");

if($_GET['page'])
{
$page=$_GET['page'];
$pages=$_GET['pages'];
$per_page = 8;

// (Trust me this does it)
$start = $count - (($pages - $page)*$per_page);

if ($start < 0) {
	$plus = $per_page + $start;
	$start = 0;
}

else {$plus = $per_page;}
$sql = "select * from fulufeed limit $start,$plus";
$query = mysql_query($sql);

/* 
*
*                    As you were.
*
*/
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
}

else {
	echo "<script>alert('You already voted!');</script>";
}
?>