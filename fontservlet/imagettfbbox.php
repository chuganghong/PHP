<?php
// Filename:imagettfbbox.php
$size = 10;
$angle = 0;
$font = "c:/windows/fonts/msyhbd.ttf";
$text = '你STR STR';
$arr1 = getTextWH($size,$angle,$font,$text);
//var_dump($arr1);

$width = 103;
$height = 42;
$img = imagecreate($width,$height);

$black = imagecolorallocate($img, 0, 0, 0);
$yellow = imagecolorallocate($img, 255, 255, 0);

$start_x = 30;
$start_y = 12;
imagettftext($img, $size, 0, $start_x, $start_y, $yellow, $font, $text);

$start_x = 0;
$start_y = 42;
$size = 20;
imagettftext($img, $size, 0, $start_x, $start_y, $yellow, $font, $text);


ob_clean();
Header('Content-Type:image/png');
imagepng($img);


$size = 20;
$arr1 = getTextWH($size,$angle,$font,$text);
//var_dump($arr1);




function getTextWH($size,$angle,$font,$text)
{
	$arr = imagettfbbox($size,$angle,$font,$text);
	return $arr;
}