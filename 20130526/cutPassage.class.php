<?php
/**
 *文章自动分页或分段
 */
class cutPassage
{
	protected $data;    //数据
	protected $length;  //每部分数据的大小
	protected $cut_params;    //切割数据的分界符
	protected $content;     //存储经过切割后的数据的数组
	
	/**
	 *构造函数，
	 *@param string $data 切割对象
	 *@param string $length 计划将数据切割成的每一部分的大小
	 *@param array $cut_params 切割数据的分界符，例如$cut_params = array('。”','。','！','？','）');
	 */
	function __construct($data,$length,$cut_params)
	{
		$this->data = $data;
		$this->length = $length;
		$this->cut_params = $cut_params;
	}
	
	/**
	 *计算数据可以分成的总页数
	 *@return integer $sum   数据可以分成的总页数
	 */
	function sum_pages()
	{
		//$sum = ceil(strlen($this->data)/$this->length);//有问题，计算的总页数不准
		$sum = count($this->content);
		return $sum;
	}
	
	/**
	 *在一段字符串查找最后的切割数据的分界符的位置
	 *@param string $str 查找对象
	 @return mix $pos或NULL，若查找到了，返回（最后出现的位置+1）；若没有找到，返回NULL
	 */
	function find_last($str)
	{
		foreach($this->cut_params as $v)
		{
			if( $pos2=strrpos($str,$v) )
			{
				$l = strlen($v);
				$pos = $pos2 + $l;    //将结果封装起来，提供给其他方法直接使用
				return $pos;
			}
		}
		return;
	}
	
	/**
	 *切割内容，调用了类方法find_last($str)
	 *@return array $content  存储经过切割后的数据，是数组
	 */
	 function cut()
	 {
		$start = 0;
		$dataSize = strlen($this->data);
		var_dump($dataSize);  //test
		while( $start<$dataSize )
		{
			$str1 = substr($this->data,$start,$this->length);
			$pos = $this->find_last($str1);
			if($pos)
			{
				$str2 = substr($this->data,$start,$pos);
				//var_dump($str2);  //test
				$content[] = $str2;
				$start = $start + $pos;
				//var_dump($start);   //test
			}
			else
			{
				$content[] = $str1;
				//var_dump($str1);   //test
				//return $content;
				break;
			}
		}
		$this->content = $content;
		return $this->content;
	}
}

//测试切割文章类cutPassage.class.php
Header('Content-Type:text/html;charset=utf-8');
require_once('pages.class.php');
$data = file_get_contents('2.txt');
//$data = iconv('gb2312','utf-8//IGNORE',$data);
$length = 1500;
$cut_params = array('。”','。','！','？','）','；');
$cut = new cutPassage($data,$length,$cut_params);
$content = $cut->cut();
var_dump(count($content));  //test
$sum = $cut->sum_pages();
var_dump($sum);  //test
//var_dump($content);
echo '<hr>';
foreach( $content as $v )
{
	//echo $v;
	//echo '<hr>';
}
echo '<hr>';
if( !isset($_GET['page']) )
{
	
	$current_page = 1;
}
else if($_GET['page']<1)  //防止用户在url中输入负数时显示出错信息
{
	$current_page = 1;
}
else if($_GET['page']>$sum)//防止用户在url中输入超出最大页数的数时显示出错信息
{
	$current_page=$sum;
	var_dump($current_page);  //test
}
else
{
	$current_page = $_GET['page'];
}
echo $content[$current_page-1];
echo '<br />';
$url = 'cutPassage.class.php?page';

$pages = new page($current_page,$url,$sum);
echo $pages->show_first_page();
echo ' ';
echo $pages->show_pre_page();
echo ' ';
echo $pages->show_go_page();
echo ' ';
echo $pages->show_next_page();
echo ' ';
echo $pages->show_last_page();

	
	