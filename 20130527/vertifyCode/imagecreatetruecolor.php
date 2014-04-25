<?php
//验证码
$width = 130;
$height = 40;
$im = imagecreatetruecolor($width,$height);

$color1 = imagecolorallocate($im,50,30,150);
$color2 = imagecolorallocate($im,80,120,rand(0,250));

imagefill($im,0,0,$color1);
imageline($im,0,0,$width,$height,$color2);

imagestring($im,5,50,50,'Hello',$color2);

$char = $_GET['code'];
for($i=0;$i<strlen($char);$i++)
{
	$character4 = $char[$i];
	$font = 'c:\windows\Fonts\arial.ttf';

	// Add some shadow to the text
	$width2 = 20 + $i*20;
	imagettftext($im, 20, rand(0,90), $width2, $height/2, $color2, $font, $character4);
}

/*
for($m=0;$m<4;$m++)
{
	$chracter1 = chr(rand(97,122));
	$character2 = chr(rand(65,90));
	$character3 = rand(0,1) ? $character1:$character2;
	//imagestring($im,5,rand(0,$width),rand(0,$height),$character3,$color2);
	
	putenv('GDFONTPATH=C:\WINDWOS\Fonts');
	$font = 'c:\windows\Fonts\arial.ttf';

	// Add some shadow to the text
	imagettftext($im, 15, 0, rand(20,60), $height/2, $color2, $font, $character3);

	// Add the text
	//imagettftext($im, 20, 0, 10, 20, $black, $font, $character3);


}
*/
/*	
while($i<100)
{
	//imageline($im,rand(0,500),rand(0,500),rand(0,500),rand(0,500),$color2);
	//$i++;
}
*/
ob_clean();
Header('Content-Type:image/jpeg');
imagejpeg($im);

imagedestroy($im);
