<?php 
if(!$_GET['page'] && !$_GET['id'])
{echo "<script>alert('Hmmm seems we broke the internet. Please email us at aaegan@princeton.edu with the heading \'You broke the internet.\'');</script>";}

else {?>
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

				success: function(html) {
					parent.removeClass('lu').addClass('luclicked');
					parent.prev().removeClass('fu').addClass('votedlu').html(html);
					//parent.parent().parent().parent().parent().nextAll('.vote_count').children().html(html);
					} 
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
            parent.removeClass('fu').addClass('fuclicked');
			parent.next().removeClass('lu').addClass('votedfu').html(html);
			//parent.parent().parent().parent().parent().nextAll('.vote_count').children().next().html(html);
			}
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

			//$(this).fadeIn(200).html('<img src="dot.gif" />');
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

$page=$_GET['page'];
$pages=$_GET['pages'];
$id = $_GET['id'];
$per_page = 8;
$sort=$_GET['sort'];
$i = 1;

// (Trust me this does it)
$start = ($page-1)*$per_page;
if (!$_GET['id']) {
if ($sort == 'recent') {$sql = "select * from fulufeed ORDER BY id DESC limit $start,$per_page";}
else {$sql = "select * from fulufeed ORDER BY up DESC limit $start,$per_page";}
$query = mysql_query($sql);
}

else {
	if ($sort == 'recent') {$sql = "select * from fulufeed ORDER BY id DESC limit $id,1";}
	else {$sql = "select * from fulufeed ORDER BY up DESC limit $id,1";}
$query = mysql_query($sql);
}

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

//picture
$picture =  $data['picture'];

//spill out ID
$id = $data['id'];

$up = $data['up'];
$down = $data['down'];

$titlelink = 'images/preview/'.$picture;
if ($url) {
	$titlelink = $url;
	$beginning = substr($url, 0, 3);
	$beginning = strtolower($beginning);
	if ($beginning == 'www') {
		$titlelink = "http://".$titlelink;
	}
}

$realid = ($pages - $page)*8 + $i;
$fblink = "www.fulumail.com/index.php?id=".$realid;
$urlformatted = urlencode(utf8_encode($fblink));
?>
<div class="relative">
	<div class="row"> 
        <div class="span10 offset1"> 
           <div class="fulu relative">
               <div class="fulu_picture"><?php
			    if ($picture == 'bad') {
					echo '<img style:"height: 170px; width:170px;" class="resize_me" src="http://img.bitpixels.com/getthumbnail?code=78873&size=200&url='.$titlelink.'" height="170" width="170"/>';
				}
				else {
					echo '<img src="images/thumbs/'.$picture.'" />';
				}
				?></div>
					<div class="fulu_title"><a href="<?php echo $titlelink;?>"><?php echo $title;?></a></div>	
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
                <div class="vote_count">
                	<div class="count_lu"><?php echo $up;?></div>
                    <div class="count_fu"><?php echo $down;?></div>
                </div>
</div><!--relative-->

<?php
$i++;
}	
}

?>