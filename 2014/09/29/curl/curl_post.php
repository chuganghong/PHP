<?php
/**
 *CURL POST
 *Notice:curl中的URL必须是完整的绝对URL
 */
$url = 'https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token=z-l10nbfGp5OYFtEr7sDba4tGiXJE6PIBOjwyVMntFxytF0SXVL4r6Mle1ok9g7UqPR1irCAS7WmY2cTKlNQvg';
$ch = curl_init();
$json = '{"expire_seconds": 1800, "action_name": "QR_SCENE", "action_info": {"scene": {"scene_id": 123}}}';
// $data = json_decode($json,true);
$data = $json;
// var_dump($data);

curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);



curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_HEADER,1);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$data);


/* 
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
 */
$res = curl_exec($ch);

var_dump($res);
?>
<img src="https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=gQFL8DoAAAAAAAAAASxodHRwOi8vd2VpeGluLnFxLmNvbS9xL01IVzhyTm5taUEteF9MVVdnbHY4AAIEzvc0VAMECAcAAA==" />