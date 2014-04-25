<?php
// Filenme:mb_strlen()
$str = '你a';
$length = mb_strlen($str,'utf-8');
var_dump($length);
$len = strlen($str);
var_dump($len);