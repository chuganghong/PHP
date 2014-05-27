<?php
/**
 *@author ggh
 *@description 采集网页的title\keywords等
 */
class GetHtml
{
	protected $html;	//网页源码
	protected $title;	//网页标题
	protected $description;		//网页描述
	protected $keyWords;	//网页关键词
	
	
	
	
	public function __construct($url)
	{
		$html = file_get_contents($url);
		$this->html = $html;
	}
	
	public function __get($name)
	{
		return $this->$name;
	}
	
	
	public function getTitle()
	{
		$pattern = "#<title>(.*?)<\/title>#is";
		// var_dump($this->html);
		$num = preg_match($pattern,$this->html,$match);
		// var_dump($match);
		$this->title = ($num==1)?$match[1]:'';
		
	}
	
	public function getDescription()
	{
		$pattern = "##";
	}
	
	
	
	
}


//test
$url = 'http://www.nowamagic.net/librarys/veda/detail/1913';
$getHtml = new GetHtml($url);
$html = $getHtml->__get('html');

$title = $getHtml->getTitle();
