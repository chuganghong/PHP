<?php
/**
 *$http_response_header
 *stream_get_meta_data
 */
$url = 'http://www.baidu.com';
$html = file_get_contents($url);
print_r($http_response_header);
$fp = fopen($url,'r');
print_r(stream_get_meta_data($fp));