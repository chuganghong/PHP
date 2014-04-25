<?php
/**
 *从网友中提取关键字
 */
$meta = get_meta_tags('http://www.jokeji.cn/');
$keywords = $meta['keywords'];
// Split keywords
$keywords = explode(',', $keywords );
// Trim them
$keywords = array_map( 'trim', $keywords );
// Remove empty values
$keywords = array_filter( $keywords );
 
print_r( $keywords );