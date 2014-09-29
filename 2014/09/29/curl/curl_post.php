<?php
/**
 *CURL POST
 *Notice:curl中的URL必须是完整的绝对URL
 */
$url = 'http://localhost/2014/09/29/curl/request.php';
$ch = curl_init();
$data = array('time'=>strtotime('yesterday'));
/* 
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);
 */


curl_setopt($ch,CURLOPT_URL,$url);
// curl_setopt($ch,CURLOPT_HEADER,1);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
// curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$data);


/* 
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
 */
$res = curl_exec($ch);

var_dump($res);