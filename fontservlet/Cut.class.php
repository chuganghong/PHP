<?php
class Cut
{
	private $start;	//截取字符串时的开始位置
	
	public function __construct()
	{
		$this->start = 0;
	}
	
	public function __set($name,$value)
	{
		$this->$name = $value;
	}
	/**
	 *检测字符串组成状况
     *@param string $str
     *@return 1--纯英文；2--纯中文；3--中英文混合;4--空格
    */
	public function check_str($str = '')
	{
		if(trim($str)=='')
		{
			return 4;
		}
	
		$m = mb_strlen($str,'utf-8');
		$s = strlen($str);	
		if($s==$m)
		{
			return 1;
		}
	
		if($s%$m==0&&$s%3==0)
		{
			return 2;
		}	
		return 3;	
	}
	
	/**
	 *取出一个长度的字符
	 *@param string $str 目标字符串
	 *@param integer $start 开始位置
	 *@param integer $length 长度
	 *@param string $encoding 字符编码
	 *@return string $res 取出的一个长度的字符串
	 */
	 public function get_one($str,$start,$length = 1,$encoding = 'utf-8')
	 {
		$res = mb_substr($str,$start,$length,$encoding);
		return $res;
	 }
	 
	 /**
	  *纯英文切割
	  *@param string $str 目标字符串
	  *@return array $arr	被切割后字符串单元组成的数组
	  */
	  public function cut_en($str)
	  {
		 $arr = explode(' ',$str);
		 return $arr;
	  }
	  
	  /**
	   *纯中文切割
	   *@param string $str 目标字符串
	   */
	  public function cut_zh($str,$encoding='utf-8')
	  {
	      $arr = array();
		  $len = mb_strlen($str,$encoding);
		  $start = 0;
		  while( $one = mb_substr($str,$start,1,$encoding) )
		  {
			 $arr[] = $one;
			 $start++;			 
		  }
		  return $arr;			  
	  }
	  
	  /**
	   *中英文混合切割
	   *@param string $str 目标字符串
	   *@return array $arr 由分割后的字符单元组成的数组，每个元素或者是一个汉字，
	   *@或者是一个英文单词
	   */
	  public function cut_zh_en($str,$encoding='utf-8')
	  {
		 //var_dump($str);
		 //echo '<hr />';
		 $arr = array();
		 $one_en = '';		 
		 while( $one=$this->fetch_one($str) )
		 {			
			//var_dump($one);
			//var_dump(ord($one));
			
			$msg = $this->check_str($one);			
			if($msg==1)                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
			{
				$one_en .= $one;
			}
			else
			{				
				//echo time() . '<br />';
				if(!empty($one_en))
				{
					$arr[] = $this->strip_one($one_en);
				}
				$one_en = '';	
				
				$arr[] = $this->strip_one($one);
			}
		 }
		 /*第一版Cut类丢失了结尾的英语单词，就是缺少这一句*/
		 if(!empty($one_en))
		 {
			$arr[] = $this->strip_one($one_en);
		 }
		
		//var_dump($arr);
		 return $arr;		 
	  }
	  
	  /**
	   *中英文混合切割中对一个字符的处理：
	   *若是英文，存储，并且处理下一个字符；
	   *若是中文，记录下这个中文的位置
	   */
	   public function fetch_one($str)
	   {			
			//var_dump($str);
			$start = $this->start;
			$one = $this->get_one($str,$start,$length = 1,$encoding = 'utf-8');
			//$res = $this->check_str($one);			
			$this->start = $this->start + 1;
			
			return $one;			
	   }

	   /**
	    *过滤字符串
		*/
	   public function strip_one($str)
	   {
			/*
			//var_dump($str);
			$str1 = trim($str);
			//var_dump($str1);
			$str2 = trim($str1,chr(13));
			return $str2;
			*/
			return $str;
	   }
}

/*
//test
ob_clean();
Header('Content-Type:text/html;charset=utf-8');
$cut = new Cut();
$str = '你好';

$arr = $cut->cut_zh_en($str);
var_dump($arr);
//var_dump(trim('你'));
*/


