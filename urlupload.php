<?php

function upload($filename) {

		//create random string
		 function random_string($l = 10){
   		 $c = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxwz0123456789";
	     for(;$l > 0;$l--) $s .= $c{rand(0,strlen($c))};
	     return str_shuffle($s);
		}
		
		$randomstring = random_string();
		
  // 2. check extension
  $ext = substr($filename, strrpos($filename, '.') + 1);
  $ext = strtolower($ext);
  
	  // declare arrays
	  $cool = array('jpg','jpeg','gif','png','bmp');
 	 if (in_array($ext, $cool)) {
		   include 'thumbnailurl.php';
		   $save_as = $randomstring.".".$ext;
		   thumbnailurl($filename, $save_as);
		   return $save_as;
	 }
	 else {
		$bad = 'bad';
		return $bad;
	 }
}
?>