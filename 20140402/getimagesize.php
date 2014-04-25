<?php
//getimagesize()
$pic = 'http://b.hiphotos.baidu.com/image/h%3D960%3Bcrop%3D0%2C0%2C1280%2C960/sign=0257d892f503918fc8d131cc610645e5/1e30e924b899a9012d78d4441f950a7b0208f577.jpg';
$info = getimagesize($pic);
var_dump($info);