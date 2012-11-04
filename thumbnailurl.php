<?php

function thumbnailurl($image_src, $save_as) {
	// *** Include the class
	include("resize-class.php");

	// *** 1) Initialise / load image
	$resizeObj = new resize($image_src);

	// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
	$resizeObj -> resizeImage(170, 170, 'crop');

	// *** 3) Save image
	$resizeObj -> saveImage('images/thumbs/'.$save_as, 100);
}
?>
