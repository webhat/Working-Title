<?php

# Inspired by https://github.com/wes/phpimageresize/blob/master/function.resize.php
function resize($image,$opts=null){
	$imagePath = urldecode($image);

	$defaults = array(
			'cacheDir' => "./cache/",
			'uploadDir' => "./upload/",
			'w' => 100,
			'h' => 600
			);

	$opts = array_merge($defaults, $opts);    

	$thumb = new Imagick();

	$target = $image ."-". $opts['w'] ."x". $opts['h'] .".png";
	if(file_exists($target)) {
		$thumb->readImage( $target);
	} else {
		$thumb->readImage( $image);
		$thumb->thumbnailImage($opts['w'],$opts['h'],true);
		$thumb->writeImage($target);
	}

	$output = $thumb->getimageblob();
	$outputtype = $thumb->getFormat();

	$thumb->clear();
	$thumb->destroy();


	/*
	$thumb = PhpThumbFactory::create($image);
	$thumb->resize( $opts['w'], $opts['h']);
	$thumb->show();
	*/


	return array(
			'image' => $output,
			'type' => $outputtype
			);

}
?>