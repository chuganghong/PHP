<?php
/**
 *array_slice($arr,$start,$length)
 */

 $arr = array('substr','strtotime',2,3,'microtime');
 $arr2 = array_slice($arr,0,3);
 var_dump($arr2);
 $arr3 = array_slice($arr,3);
 var_dump($arr3);
 $arr4 = array();
 $arr5 = array();
 $arr6 = array(2);
 $arr7 = array_merge($arr4,$arr5,$arr6);
 var_dump($arr7);