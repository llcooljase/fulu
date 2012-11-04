<?php

$id = 3;

// 1. if it exists
if((!empty($_FILES["photo"])) && ($_FILES['photo']['error'] == 0)) {
	
  // 2. check extension
  $filename = basename($_FILES['photo']['name']);
  $ext = substr($filename, strrpos($filename, '.') + 1);
  $ext = strtolower($ext);
  $blacklist = array("php", "phtml", "php3", "php4", "js", "shtml", "pl" ,"py");
  if (in_array($ext,$blacklist)) {
		  echo "Kk one sec dropping tables";
	  }
	  // declare arrays
	  $cool = array('jpg','jpeg','gif','png','bmp');
	  	 // $cool_mime = array('image/jpg', 'image/jpeg', 'image/gif', 'image/png', 'image/bmp');
 	 if (in_array($ext, $cool)/* && ($_FILES["photo"]["size"] < 1000000)*/) {
		
    //Determine the path to which we want to save this file
      $newname = dirname(__FILE__).'/images/preview/'.$id.".".$ext;
        //Attempt to move the uploaded file to it's new place
        if ((move_uploaded_file($_FILES['photo']['tmp_name'],$newname))) {
           echo "It's done! The file has been saved as: ".$newname;
        } else {
           echo "Error: A problem occurred during file upload!";
        }
  } else {
     echo "Sorry, only picture files under 1Mb are accepted right now!";
  }
} else {
 echo "Error: No file uploaded";
}
 
if ($width > 1000 || $height > 1000)
{
echo "Maximum width and height exceeded. Please upload images below 1000x1000 px size";
exit();
}
 
function image_resize($src, $dst, $width, $height, $crop=0){

  if(!list($w, $h) = getimagesize($src)) return "Unsupported picture type!";

  $type = strtolower(substr(strrchr($src,"."),1));
  if($type == 'jpeg') $type = 'jpg';
  switch($type){
    case 'bmp': $img = imagecreatefromwbmp($src); break;
    case 'gif': $img = imagecreatefromgif($src); break;
    case 'jpg': $img = imagecreatefromjpeg($src); break;
    case 'png': $img = imagecreatefrompng($src); break;
    default : return "Unsupported picture type!";
  }

  // resize
  if($crop){
    if($w < $width or $h < $height) return "Picture is too small!";
    $ratio = max($width/$w, $height/$h);
    $h = $height / $ratio;
    $x = ($w - $width / $ratio) / 2;
    $w = $width / $ratio;
  }
  else{
    if($w < $width and $h < $height) return "Picture is too small!";
    $ratio = min($width/$w, $height/$h);
    $width = $w * $ratio;
    $height = $h * $ratio;
    $x = 0;
  }

  $new = imagecreatetruecolor($width, $height);

  // preserve transparency
  if($type == "gif" or $type == "png"){
    imagecolortransparent($new, imagecolorallocatealpha($new, 0, 0, 0, 127));
    imagealphablending($new, false);
    imagesavealpha($new, true);
  }

  imagecopyresampled($new, $img, 0, 0, $x, 0, $width, $height, $w, $h);

  switch($type){
    case 'bmp': imagewbmp($new, $dst); break;
    case 'gif': imagegif($new, $dst); break;
    case 'jpg': imagejpeg($new, $dst); break;
    case 'png': imagepng($new, $dst); break;
  }
  return true;
}
?>