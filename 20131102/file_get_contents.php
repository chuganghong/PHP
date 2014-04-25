<?php
/**
 *查找页面上的所有链接
 */
$html = file_get_contents('http://www.jokeji.cn/');
 
$dom = new DOMDocument();
@$dom->loadHTML($html);
 
// grab all the on the page
$xpath = new DOMXPath($dom);
$hrefs = $xpath->evaluate("/html/body//a");
 
for ($i = 0; $i < $hrefs->length; $i++) {
       $href = $hrefs->item($i);
       $url = $href->getAttribute('href');
       echo $url.'<br />';
}