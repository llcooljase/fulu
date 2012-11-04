<?php

// some stuff to get it going
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
<title>Fulu Sent!</title>
<link href="css/home.css" rel="stylesheet" type="text/css">

<style type="text/css">
* {  font-size: 96%; }
label.error { float: none; color: red; padding-left: .5em; vertical-align: top; }
</style>

</head>
<body>
<?php

$healthy = array("'", "&#039;", "&#145;", "&#146");


// If something's empty, say this about it:
if(empty($_REQUEST['email']))
{$mes='Please enter email';
}
else if(empty($_REQUEST['terms']))
{$mes='Please select terms and conditions';
}
else if(empty($_REQUEST['message']))
{$mes='Please enter message';
}
else {$mes='';} // nothing's wrong :)



// define some variables for email

            $from = "newfulu@fulumail.com";
            $to = $_REQUEST['email'];
            $subject = "You have received a FULU!";
            $headers = "From: $from";
			
			
  //   LOLWUT       $message =  '<p>'.$_REQUEST['email'].'</p><p>'.$_REQUEST['video'].'</p>'.$_REQUEST['comment'];

  			if($_REQUEST['video']!='')
				{
						$content=$_REQUEST['video'];
				}
				else
				{
						$content=$_SESSION['fulumail'];
				}

			mysql_query("INSERT INTO fulus SET 
			name='".str_replace("'","",$_REQUEST['name'])."', 
			email='".$to."', 
			content='".$content."', 
			message='".str_replace("'","",$_REQUEST['message'])."',
			IP='".$_REQUEST['IP']."',
			fu='".$_REQUEST['Fu']."'
			") 
			
			or die(mysql_error());
			
			// remote_user doesn't always work
			$remote_user = $_REQUEST['remote_user'];
			if (!$remote_user){
				$remote_user = "no le gusta";
			}
			
			mysql_query("INSERT INTO users SET 
			language='".str_replace("'","",$_REQUEST['language'])."',
			remote_user='".str_replace("'","",$remote_user)."',
			remote_port='".str_replace("'","",$_REQUEST['remote_port'])."',
			IP='".str_replace("'","",$_REQUEST['IP'])."' 
			") 

			or die(mysql_error());

			$fuluidprev=mysql_insert_id();
			$fuluid = $fuluidprev + 472; //restarted it

$message='
<div style="font-size:23px; color:#c5c5c5; float:left; text-align:center; width:100%; margin-top:40px; font-family:NeoSans;">You\'ve received a FULU!
<br>
<br>
<a href="'.SITE.'fulu.php?id='.$fuluid.'">Click here to see it!</a></div>

<div style="width:700px; float:left; text-align:center; margin-top:80px; font-size:11px; line-height:16px;color:#b2b2b2; font-family:Calibri;"> All rights reserved. We are not a hate mail service.</div>';
			 
			 


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
            if($ok){ $mes= 'Mail sent successfully!';

			} else { $mes='Sorry, the mail couldn\'t send. Please try again later!'; }

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
   	  <p class="footertxt"> &#9400; fulumail.com. All rights reserved. We are not a hate mail service. <br>
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