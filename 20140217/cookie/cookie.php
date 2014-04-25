<?php
$value = 'something from somewhere';

setcookie('TestCookie',$value);
setcookie('TestCookie',$value,time()+3);
setcookie('TestCookie',$value,time()+3,'/~rasmus','localhost',1);

setcookie('mycookie','',time()-2);
var_dump($_COOKIE);
