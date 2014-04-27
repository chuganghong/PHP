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
		$arr = explode(chr(10),$str);			
		$res = array();
		foreach($arr as $v)
		{		
			$pattern = '#(\S++)(\s+?)([\S\s]++)#';
			preg_match_all($pattern,$v,$match);		
			$res[$match[1][0]] = $match[3][0];
			
		
		}			
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
				$info .= "'" . $k . "':" . "'" . $v . "'" . chr(10);
			}
			else
			{
				$info .= "'" . $k . "':" . "'" . $v . "'," . chr(10);
			}
		
		}
		$info .= '}' . chr(10);
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
Accept text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8
Accept-Encoding gzip,deflate,sdch
Accept-Language zh-CN,zh;q=0.8,en;q=0.6
Cache-Control max-age=0
Connection keep-alive
Cookie bid="S2bsJtblOa0"; ll="118281"; viewed="1200840_1867455_1968704_10561367_1786120"; __utma=30149280.1560064197.1396532637.1398359268.1398488110.26; __utmb=30149280.2.10.1398488110; __utmc=30149280; __utmz=30149280.1398488110.26.13.utmcsr=douban.com|utmccn=(referral)|utmcmd=referral|utmcct=/; __utma=223695111.718571462.1396532637.1398359268.1398488110.17; __utmb=223695111.2.10.1398488110; __utmc=223695111; __utmz=223695111.1398488110.17.6.utmcsr=douban.com|utmccn=(referral)|utmcmd=referral|utmcct=/
Host movie.douban.com
Referer http://movie.douban.com/tag/%E5%8A%A8%E4%BD%9C
User-Agent Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36
EOT;


$class = new RequestInfo('2.py',3);
$arr = $class->get_request_info($str);



$res = $class->ouput_request_info($arr,3);


file_put_contents('a.txt',$res);
