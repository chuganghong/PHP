<?php
$ch = curl_init();

curl_setopt($ch,CURLOPT_URL,'http://www.ifeng.com');
curl_setopt($ch,CURLOPT_HEADER,true);

curl_exec($ch);
curl_close($ch);