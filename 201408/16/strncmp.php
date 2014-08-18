<?php
/**
 *strncmp()
 *strcmp()
 */
$str1 = 'Hello world!';
$str2 = 'Hello earth!';
echo ord('w') . '<br />';
echo ord('e') . '<br />';
echo strncmp($str1,$str2,7) . '<br />';
echo strcmp($str1,$str2) . '<br />';