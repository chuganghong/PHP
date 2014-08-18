<?php
/**
 *fstat($handle)
 */
$fp = fopen('somefile.txt','r');

$fstat = fstat($fp);

fclose($fp);

var_dump($fstat);
print_r($fstat);
$res1 = array_slice($fstat,13);
var_dump($res1);