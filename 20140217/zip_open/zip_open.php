<?php
/**
 *php解压文件代码实现php在线解压
 *可以使用，不难，但是很难记住
 */
$zip = zip_open("index.zip");
  if ($zip) {
   while ($zip_entry = zip_read($zip)) {
  // var_dump($zip_entry);
   $fp = fopen(zip_entry_name($zip_entry), "w");
   if (zip_entry_open($zip, $zip_entry, "r")) {
   $buf = zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
   fwrite($fp,"$buf");
   zip_entry_close($zip_entry);
   fclose($fp);
 }
}
zip_close($zip);
}
?>