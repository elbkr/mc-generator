<?php
	// choose valid image
	$pic = intval($_GET['i']);
	if ($pic >= 1 && $pic <= 40) {
		$image = imagecreatefrompng('assets/'.$pic.'.png');
	} else {
		$image = imagecreatefrompng('assets/1.png');
		$pic = 1;
	}

	// add text to background
	imagesavealpha($image, true);
	imagettftext($image, 12, 0, 60,  28, ImageColorAllocate($image, 255, 255, 0), realpath('assets/font.ttf'), $_GET['h']);
	imagettftext($image, 12, 0, 60,  50, ImageColorAllocate($image, 255, 255, 255), realpath('assets/font.ttf'), $_GET['t']);

	// set header for download or display
	if (isset($_GET['d']) && $_GET['d'] == 1) {
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-image');
		header("Content-disposition: attachment; filename=achievement.png");
	} else {
		header('Content-type: image/png');
	}

	// print and destroy image
	ImagePNG($image);
	ImageDestroy($image);
?>
