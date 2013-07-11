<?php

# Inspired by https://github.com/wes/phpimageresize/blob/master/function.resize.php
function resize($image,$opts=null,$cache=true){
	$imagePath = urldecode($image);

	$defaults = array(
			'cacheDir' => "./cache/",
			'uploadDir' => "./upload/",
			'w' => 100,
			'h' => 1000
			);

	$opts = array_merge($defaults, $opts);    

	$thumb = new Imagick();

	$target = $image ."-". $opts['w'] ."x". $opts['h'] .".png";
	if(file_exists($target)) {
//		error_log("\nCache Hit:  ". $target);
		$thumb->readImage( $target);
	} else {
		error_log("\nCache Miss: ". $target);
		$thumb->readImage( $image);
		$thumb->thumbnailImage($opts['w'],$opts['h'],true);
		if($cache)
			$thumb->writeImage($target);
	}

	$output = $thumb->getimageblob();
	$outputtype = $thumb->getFormat();

	$thumb->clear();
	$thumb->destroy();

	return array(
			'image' => $output,
			'type' => $outputtype
			);

}
?>
