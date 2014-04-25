<?php
/**
 *@filename: get_request_info.pyp
 *@description 整理访问网页的request information
 *@date 2014/04/25 11:21
 *@v1.0
 *@author ggh
 */
class RequestInfo
{
	private $filename;	//保存信息的文件名
	private $i;		//格式化信息中的request_headeri中的i
	
	public function __construct($filename,$i)
	{
		$this->filename = $filename;
		$this->i = $i;
	}
	
	public function __get($name)
	{
		return $this->$name;
	}
	
	public function __set($name,$value)
	{
		$this->$name = $value;
	}
	
	/**
	 *保存数据
	 */
	public function save_info()
	{
	}
	
	/**
	 *保存多条数据
	 *@param array $str_arr 存储经过格式化的字符串的数组
	 */
	public function save_many_info($str_arr)
	{
		foreach($str_arr as $str)
		{
			$str2 = $this->ouput_request_info($arr,$i);
			$this->save_one_info($str);
		}
	}
	
	/**
	 *保存一条数据
	 *@param string $str 经过格式化的字符串
	 */
	public function save_one_info($str)
	{
		$filename = $this->filename;
		$this->save_to_file($str,$filename);
	}
	/**
	 *@param string $str不规则的request info
	 *@return array $arr 规则的request info
	*/
	function get_request_info($str)
	{
		$arr = explode(chr(13),$str);
	// var_dump($arr);
		$res = array();
		foreach($arr as $v)
		{
		// $arr2 = explode('  ',$v);
			$pattern = '#(\S++)(\s+?)([\S\s]++)#';
			preg_match_all($pattern,$v,$match);
		// var_dump($match);
		// $res[] = array($match[1][0] => $match[3][0]);
			$res[$match[1][0]] = $match[3][0];
		
		}
	// var_dump($res);
		return $res;
	}

	/**
	*整理成python所需要的格式
	*@param array $arr 存储request info的数组
	*/
	function ouput_request_info($arr,$i)
	{
		$max_num = count($arr);
		$num = 0;
		$info = 'req_header' . $i . ' = {';
		foreach($arr as $k=>$v)
		{
			$num++;
			if($num==$max_num)
			{
				$info .= '\'' . $k . '\':' . '\'' . $v . '\'' . chr(13);
			}
			else
			{
				$info .= '\'' . $k . '\':' . '\'' . $v . '\',' . chr(13);
			}
		
		}
		$info .= '}' . chr(13);
		return $info;
	}

	/**
	 *将格式化的信息存储到文件中
	 *@param string $str 字符串信息
	 *@param string $filename 文件名
	 */
	function save_to_file($str,$filename)
	{
		$fp = fopen($filename,'a+');
		$str .= chr(13) . chr(13);
		fwrite($fp,$str);	
		fclose($fp);
	}
}
$str = <<<EOT
Accept	image/png,image/*;q=0.8,*/*;q=0.5
Accept-Encoding	gzip, deflate
Accept-Language	zh-cn,zh;q=0.8,en-us;q=0.5,en;q=0.3
Connection	keep-alive
Cookie	bid="BLn+omNAXcQ"; ll="130294"; __utma=30149280.754383318.1398390202.1398390202.1398390202.1; __utmb=30149280.3.10.1398390202; __utmc=30149280; __utmz=30149280.1398390202.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none)
Host	img3.douban.com
Referer	http://movie.douban.com/subject/1295644/?qq-pf-to=pcqq.temporaryc2c
User-Agent	Mozilla/5.0 (Windows NT 5.1; rv:28.0) Gecko/20100101 Firefox/28.0
EOT;

$arr = get_request_info($str);


// var_dump($arr);exit;
$i = 2;
$info = ouput_request_info($arr,$i);
$fp = fopen('info.py','a+');
fwrite($fp,$info);
fclose($fp);
