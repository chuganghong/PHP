<?php
/**
 *采集youku的swf地址
 */
$url = 'http://v.youku.com/v_show/id_XNzE1NTg5NzA4.html?f=20678940';
$html = file_get_contents($url);
// echo htmlspecialchars($html);
//<input type="text" class="form_input form_input_s" id="link2" value="http://player.youku.com/player.php/sid/XNzA3Mzk3MDA4/v.swf" >
$pattern = '#<input[^>]*?id="link2"[^>]*?>#';
preg_match_all($pattern,$html,$match);
var_dump($match);
$input_html = $match[0][0];
$pattern2 = '#value="(.*?)"#ms';
preg_match_all($pattern2,$input_html,$match2);
var_dump($match2);


//get title
// <span id="subtitle">星映话-《X战警：逆转未来》</span>
$pattern3 = '#<span[^>]*?id="subtitle">(.*?)<\/span>#is';
preg_match_all($pattern3,$html,$match3);
var_dump($match3);