<?php
/**
 *收集文章
 *获取标题和网址，
 */
abstract class AbstractGetPassage
{
	protected $urls;
	protected $titles;
	
	public function __construct()
	{
	}
	
	abstract function saveUrl($url);
	abstract function saveTitle($title);
	abstract function saveData();
	
	public function getHtml($url)
	{
		$html = file_get_contents($url);
		return $html;
	}
	
	public function getTitle($url)
	{
		
	}
	
}