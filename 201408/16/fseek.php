<?php
/**
 *fseek($handle,$offset,$whence)
 */

$fp = fopen('somefile.txt','r');

// read some data
$data = fgets($fp,4096);

var_dump($data);

fseek($fp,1);

$data2 = fgets($fp,4096);

var_dump($data2);

fclose($fp);