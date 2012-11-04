<?php
$mes = 'we cool';
// Check to see everything's there!
// If something's empty, say this about it:
if(empty($_REQUEST['noun']))
{$mes='Please enter a title!';
}
else if(empty($_REQUEST['verb']))
{$mes='Please enter a verb!';
}
else if(empty($_REQUEST['message']))
{$mes='Please enter a message!';
}

else if(($_REQUEST['photo']) && ($_REQUEST['url']))
{$mes='You have both a picture and a URL! You sure have a bunch of stuff to tell the world, huh!';
}

else if(empty($_REQUEST['photo']) && empty($_REQUEST['url'])) 
{$mes='You didn\'t submit a picture! Good work!';
}

if($_REQUEST['photo']) {
  $filename = stripslashes($_FILES['file']['name']);
  $extension = getExtension($filename);
  $extension = strtolower($extension);
}

if ($_REQUEST['url']) {
	$url = $_REQUEST['url'];
	$extension = substr($url, -3);
}

if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) {
	  $mes='You didn\'t submit a file or a url that\'s either a .jpg, .jpeg, .png, or .gif. Please learn how to use your computer and try again!';
}

else { // All systems go!

// 1. Connect to database
session_start();
include_once('config.php');

//2. Sanitize
function cleanInput($input) {

  $search = array(
    '@<script[^>]*?>.*?</script>@si',   // Strip out javascript
    '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
    '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
    '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
  );

    $output = preg_replace($search, '', $input);
    return $output;
  }
  
function sanitize($input) {
    if (is_array($input)) {
        foreach($input as $var=>$val) {
            $output[$var] = sanitize($val);
        }
    }
    else {
        if (get_magic_quotes_gpc()) {
            $input = stripslashes($input);
        }
        $input  = cleanInput($input);
        $output = mysql_real_escape_string($input);
    }
    return $output;
}

// 3. Define things
$messagebad = $_REQUEST['message'];
$titlebad = $_REQUEST['noun']." ".$_REQUEST['verb'].".";
$urlbad = $_REQUEST['url'];
//$photobad = $_REQUEST['photo'];

$message = sanitize($messagebad);
$title = sanitize($titlebad);
$url = sanitize($urlbad);

// Picture part.
if((!empty($_FILES["photo"])) && ($_FILES['photo']['error'] == 0)) {
include 'photoupload.php';
}

mysql_query("INSERT INTO fulufeed SET 
 			title='".$name."',  
			message='".str_replace("'",$healthy,$_REQUEST['message'])."',
			url='".str_replace("'",$healthy,$_REQUEST['url'])."',
			picture='".$randomstring."',
			") 
			
			or die(mysql_error());
}
	?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Fulu Sent!</title>


<style type="text/css">
* {  font-size: 96%; }
label.error { float: none; color: red; padding-left: .5em; vertical-align: top; }</style>

</head>

<body>    
SUCCESS!
         
  
 <a href="javascript:history.go(-1)">Back</a><br>
            <?php
			if ($mes != 'we cool') {echo $mes;}
			else {

$success = array("Jive Turkey.", "YES!", "Aw yeah.");   
echo $success;
			}
?></aside>

</body>
</html>
