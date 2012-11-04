<?php

	// *** Include the class
	include("resize-class.php");

	// *** 1) Initialise / load image
	$resizeObj = new resize('http://img.bitpixels.com/getthumbnail?code=78873&size=200&url=http://www.fulumail.com/evenbetter3.php');

	// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
	$resizeObj -> resizeImage(170, 170, 'crop');

	// *** 3) Save image
	$resizeObj -> saveImage('images/thumbs/1234567890.jpg', 100);
?>
