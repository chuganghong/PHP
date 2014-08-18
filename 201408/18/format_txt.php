<?php
/**
 *格式化TXT文档，去掉空白行
 */
function format_txt($file)
{
	$txt = '';
	$fp = fopen($file,'rb');	
	while(($buffer=fgets($fp,8000))!==false)
	{
		if(ord($buffer)==13)
		{
			continue;
		}
		$txt .= $buffer;
		// echo $buffer . '-----' . ord($buffer) . '<br />';
		// echo ord($buffer) . '<br />';
	}
	fclose($fp);
	$nfp = fopen($file,'wb');
	fwrite($nfp,$txt,strlen($txt));
	fclose($nfp);
}
// ob_clean();
Header('Content-Type:text/html;charset=utf-8');
$file = 'php_exam_2.php';
$newfile = 'php_exam_11.php';
format_txt($file);
echo 2;
