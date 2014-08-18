<?php
/**
 *pack()
 */

function save($data)
{
	$file = 'data.txt';
	$fp = fopen($file,'wb');
	fwrite($fp,$data,1);
	fclose($fp);
}


$bin = pack('L', 0x00000000);
var_dump($bin);
$orignal = unpack('L',$bin);
var_dump($orignal);

save($bin);

