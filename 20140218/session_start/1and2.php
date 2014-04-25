<?php
/**
 *php阻止页面后退的方法
 *note:页1和页2都是1and2.php生成的临时页面。当用户的浏览器要读这个地址，你输出页2就是页2，不用担心用户
 *会回到页1去。
 */
session_start();
if (isset($_GET['p2'])) {
  $_SESSION['enteredPage2'] = true;
}
if (isset($_SESSION['enteredPage2'])) {
  //输出页面2.在页面2里，包含到页面3的链接如下
  echo "This is page 2. <a href=\"3.php\">Page3</a>这时候后退不到P1的～";
} else {
  //输出页面1，包含到页面2的链接如下
  echo "This is page 1. <a href=\"?p2=2\">Page2</a>";
}
?>