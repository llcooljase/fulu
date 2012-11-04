<?php

function upload($filename) {

  // 2. check extension
  $ext = substr($filename, strrpos($filename, '.') + 1);
  $ext = strtolower($ext);
  $blacklist = array("php", "phtml", "php3", "php4", "js", "shtml", "pl" ,"py");
  if (in_array($ext,$blacklist)) {
		  return "CONGRATULATIONS YOU WON THE INTERNET!";
	  }
	  // declare arrays
	  $cool = array('jpg','jpeg','gif','png','bmp');
	  	 // $cool_mime = array('image/jpg', 'image/jpeg', 'image/gif', 'image/png', 'image/bmp');
 	 if (in_array($ext, $cool) && ($_FILES["photo"]["size"] < 1000000)) {
		 
		 //create random string
		 function random_string($l = 10){
   		 $c = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxwz0123456789";
	     for(;$l > 0;$l--) $s .= $c{rand(0,strlen($c))};
	     return str_shuffle($s);
		}
		
		$randomstring = random_string();
		$picture_id = $randomstring.".".$ext;
    //Determine the path to which we want to save this file
      $newname = dirname(__FILE__).'/images/preview/'.$randomstring.".".$ext;
        //Attempt to move the uploaded file to it's new place
        if ((move_uploaded_file($_FILES['photo']['tmp_name'],$newname))) {
		   include 'thumbnail.php';
		   thumbnail($picture_id);
		   return $picture_id;
        } else {
           return "Error: A problem occurred during file upload!";
        }
  } else {
     return "Sorry, only picture files under 1Mb are accepted right now!";
  }
}