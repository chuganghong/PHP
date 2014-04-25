<?php
$color1 = 16711680;
$color2 = dechex($color1);
var_dump($color2);
$rgb = hColor2RGB($color2);
var_dump($rgb);
	/**
	 * 十六进制转 RGB
     * @param string $hexColor 十六颜色 ,如：#ff00ff
     * @return array RGB数组
     */
    function hColor2RGB($hexColor)
    {
        $color = str_replace('#', '', $hexColor);
		if (strlen($color) > 3)
		{
			$rgb = array(
				'r' => hexdec(substr($color, 0, 2)),
				'g' => hexdec(substr($color, 2, 2)),
				'b' => hexdec(substr($color, 4, 2))
				);
		} 
		else 
		{
			$color = str_replace('#', '', $hexColor);
			$r = substr($color, 0, 1) . substr($color, 0, 1);
			$g = substr($color, 1, 1) . substr($color, 1, 1);
			$b = substr($color, 2, 1) . substr($color, 2, 1);
			$rgb = array(
				'r' => hexdec($r),
				'g' => hexdec($g),
				'b' => hexdec($b)
				);
		}
		return $rgb;
	}