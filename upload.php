<?php
session_start();

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

else if(($_FILES["photo"]["size"] > 1) && (!empty($_REQUEST['url'])))
{$mes='You have both a picture and a URL! You sure have a bunch of stuff to tell the world, huh!';
}

else if(($_FILES["photo"]["size"] < 1) && (empty($_REQUEST['url']))) 
{$mes='You didn\'t submit a picture or link! Good work!';
}


if (!empty($_REQUEST['url'])) {
	include 'urlupload.php';
	$filename = $_REQUEST['url'];
	$output = upload($filename);
	$picture = $output;
}

// Picture part.
if((!empty($_FILES["photo"])) && ($_FILES['photo']['error'] == 0)) {
	include 'photoupload.php';
	$filename = basename($_FILES['photo']['name']);
	$output = upload($filename);
	$nogood = array('CONGRATULATIONS YOU WON THE INTERNET!', 'Error: A problem occurred during file upload!', 'Error: A problem occurred during file upload!','Sorry, only picture files under 1Mb are accepted right now!');

if (in_array($output, $nogood)) {
	$mes = $output;
}
else {
	$picture = $output;
	}
}

if ($mes == 'we cool') { // All systems go!

// 1. Connect to database
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
$titlebad = $_REQUEST['noun']." ".$_REQUEST['verb'];
$urlbad = $_REQUEST['url'];

$message = sanitize($messagebad);
$title = sanitize($titlebad);
$url = sanitize($urlbad);

mysql_query("INSERT INTO fulufeed SET 
 			title='".$title."',  
			message='".$message."',
			url='".$url."',
			picture='".$picture."'
			") 
			
			or die(mysql_error());
}
?>