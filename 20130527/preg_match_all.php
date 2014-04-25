<?php
/**
 *清除文本中的链接
 *@param string $str是包含超链接的字符串（文本）
 *@param integer $times 设定执行preg_match_all($pattern,$data,$match)的次数（对一次匹配不成功的情况做出补救）
 *@return string $str2 是去除超链接后的字符串
 */
function strip_link($str,$times)
{
	$pattern = '/<a[\s\S]*?href=[\'|"][\s\S]*?[\'|"][\S\s]*?>([\s\S]*?)<\/a>/i';  //匹配超链接的正则表达式
	if( !preg_match_all($pattern,$str,$match) )
	{
		for($i=0;$i<$times;$i++)
		{
			if( preg_match_all($pattern,$str,$match) )
			{
				break;
			}			
		}
	}
	if(count($match[0]))
	{
		$str2 = str_replace($match[0],$match[1],$str);
	}
	return $str2;
}




/*
$con = mysql_connect('localhost','root','') or die('Could not connect:' . mysql_error());
mysql_select_db('love',$con) or die('Could not use love:' . mysql_error());
mysql_query('SET NAMES UTF8');
$sql = "SELECT * FROM passage WHERE id=20";
$result = mysql_query($sql,$con) or die("\"$sql\" error:" . mysql_error());
$row = mysql_fetch_array($result);
$str = $row['content'];
echo $str;
$str = file_get_contents('http://www.hao123.com/');
$pattern = '/<a[\s\S]*?href=["|\'][\s\S]*?["|\']>([\S\s]*?)<\/a>/i';
preg_match_all($pattern,$str,$match);
var_dump($match);
echo '<hr>';
$str1 = str_replace($match[0],$match[1],$str);
//$str1 = preg_replace($pattern,$match[1],$str);
//$str1 = preg_replace($match[0],$match[1],$str);
//$str1 = preg_replace($pattern,'XML_OPTION_CASE_FOLDING',$str);
//$str1 = preg_replace($match[0],$match[1],$str);//Warning: preg_replace(): in  什么意思？
echo $str1;
*/

//测试
$str = file_get_contents('http://www.smilewind.com');
$str2 = strip_link($str,2);
echo $str2;


	
		