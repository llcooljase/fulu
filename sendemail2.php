<?php
//include_once('sessions.php');
session_start();
include_once('config.php');
if(isset($_FILES['image']))
{
$file=explode('.',$_FILES['image']['name']);
$filename=$file[0];
$filenext=$file[1];

$newfile=$_SESSION['fulumail'].'.'.$filenext;

move_uploaded_file($_FILES['image']['tmp_name'],'images/preview/'.$newfile);
echo 'images/preview/'.$newfile;

}
else{
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Welcome to Fulumail</title>
<link href="css/home.css" rel="stylesheet" type="text/css">

<style type="text/css">
* {  font-size: 96%; }
label.error { float: none; color: red; padding-left: .5em; vertical-align: top; }
</style>

</head>
<body>
<?php

if(empty($_REQUEST['email']))
{$mes='Please enter email';
}
else if(empty($_REQUEST['terms']))
{$mes='Please select terms and conditions';
}
else if(empty($_REQUEST['comment']))
{$mes='Please enter comment';
}
else {$mes='';}


            $from = "newfulu@fulumail.com";
            $to = $_REQUEST['email'];
            $subject = "You have received a FULU!";
  //          $message =  '<p>'.$_REQUEST['email'].'</p><p>'.$_REQUEST['video'].'</p>'.$_REQUEST['comment'];

  			if($_REQUEST['video']!='')
				{
						$content=$_REQUEST['video'];
				}
				else
				{
						$content=$_SESSION['fulumail'];
				}

			
			mysql_query("INSERT INTO fulu_fulus SET name='".str_replace("'","",$_REQUEST['name'])."',email='".$_REQUEST['email']."', content='".$content."', descr='".str_replace("'","",$_REQUEST['comment'])."', time='".date("Y-m-d")."'") or die(mysql_error());

			$fuluid=mysql_insert_id();
//			$message = '<p><a href="'.SITE.'fulu.php?id='.$fuluid.'">Please See Your fulu here</a></p>';

$message='<div style="background:url(http://www.fulumail.com/images/news_bk.jpg)#0e0e0e top center no-repeat; float:none; margin:0 auto; height:500px;">
<div style="width:700px; height:auto; float:none; margin:auto;">
<div style="width:700px; float:left; margin-top:15px;">
<div style="float:left; width:207px; height:63px; background:url(http://www.fulumail.com/images/news_logo.png)"></div>
</div>
<div style="font-size:23px; color:#c5c5c5; float:left; text-align:center; width:100%; margin-top:40px; font-family:NeoSans;">You have received a FULU </div>
<div style="width:700px; float:left; margin-top:30px;">

<div style="float:none; margin:auto; border:none; width:470px; height:73px; font-size:26px; color:#fdfdfd; font-family:NeoSans;  text-align:center; line-height:73px; cursor:pointer; background:url(http://www.fulumail.com/images/see_fubtn.png)"><a href="'.SITE.'fulu.php?id='.$fuluid.'">You have received a Fulu</a></div></div>

<div style="width:700px; float:left; margin-top:130px;"></div>

<div style="width:700px; float:left; text-align:center; margin-top:80px; font-size:11px; line-height:16px;color:#b2b2b2; font-family:Calibri;"><!--Copyrights fulumail.com.--> All right reserved. We are not a hate mail service. Our goal is not to achieve a form of cyber bullying or anything of the type but rather a forum to mainstream anonymous emotions </div>
</div>
</div>
';
			 
            $headers = "From: $from";

            // boundary
            $semi_rand = md5(time());
            $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

            // headers for attachment
            $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";

            // multipart boundary
            $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"iso-8859-1\"\n"."Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n";
            $message .= "--{$mime_boundary}--";
            $returnpath = "-f" . $from;

			
            $ok = @mail($to, $subject, $message, $headers, $returnpath);
            if($ok){ $mes= 'Mail Sent Successfully';

			} else { $mes='Error. Please Try Later'; }

	?>
    
	<div class="innermain">	
<header>
<aside class="placeholder">
	
    <article class="logocontent"> <figure><a href="home.html"><img src="images/logo.png"/></a></figure></article>
	<div class="clear"></div>
    
</aside>
</header>
	<aside class="placeholder">
    
    		<p class="devider"></p>
          <label class="lable">
  
 <a href="javascript:history.go(-1)">Back</a><br>
            <?php
			echo $mes;
			?></label>
       
    </aside>




<footer class="innerfooter">
<aside class="placeholder">
   	  <p class="footertxt">Copyright fulumail.com. All rights reserved. We are not a hate mail service. <br>
Our goal is not to achieve a form of cyber bullying or anything of the type but rather a forum to mainstream anonymous emotions
<br>
<a href="right.html">Rights and Regulations</a></p>
<aside class="socialnetworks"><a href="http://facebook.com" class="fb"></a><a href="http://facebook.com" class="tw"></a></aside>
    </aside>

</footer>
</div>
</body>
</html>
<?php
}
	?>