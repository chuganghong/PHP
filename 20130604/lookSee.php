<?php
/**
 *Look and See
 */
/**
 *在字符串$str中统计$needle连续出现的个数
 *@param string $needle 单个字符
 *@param string $str 字符串
 *@retrun integer $count  在字符串$str中统计$needle连续出现的个数
 */

function getCount($needle,$str)
{
	$count = 0;
	for($i=0;$i<strlen($str);$i++)
	{
		if($str[$i]==$needle)
		{
			$count++;
		}
		else
		{
			break;
		}
	}
	return $count;
}
/**
 *根据初始字符串来获得下面的字符串
 *@param string $str 初始字符串
 *@param integer $n   输出多少行
 *@return void
 */
 
function lookSee($str,$n)
{
	$result[0] = $str;
	for($m=0;$m<$n;$m++)
	{
		$str3 = '';
		for($k=0;$k<strlen($result[$m]);$k++)
		{
			var_dump($str[$k]);
			$str1 = $str[$k];
			var_dump($str1);
			if(!$str2 = getCount($str1,$str))
			{
				break;
			}
			
			var_dump($str2);
			$str3 .= $str2 . $str1;
			//var_dump($str3);
		}
		$result[$m] = $str3;
	}
	return $result;
}

//test lookSee
$str = 1;
$n =3;
$result = lookSee($str,$n);
foreach($result as $value)
{
	echo $value . '<br />';
}
	