<?php
/**
 *功能：使用php记录用户通过搜索引擎进网站的关键词
 *目的：获取搜索引擎名称和进入网站的关键词
 *思路：A.获取引导用户进入目标网站的页面的URL
 *		B.从该URL中获取需要的信息：URL中的主机名和关键词
 *		C.将主机名转化为对应的搜索引擎名称
 *时间：2014/02/14 10:06		
 */
$rfr = $_SERVER['HTTP_REFERER'];
//var_dump($rfr);exit;
//if(!$rfr) $rfr='http://'.$_SERVER['HTTP_HOST'];
if($rfr)
{
 $p=parse_url($rfr);
 var_dump($p);exit;
 parse_str($p['query'],$pa);
 $p['host']=strtolower($p['host']);
 $arr_sd_key=array(
     'baidu.com'=>'word',
     'google.com'=>'q',
     'sina.com.cn'=>'word',
     'sohu.com'=>'word',
     'msn.com'=>'q',
     'bing.com'=>'q',
     '163.com'=>'q',
     'yahoo.com'=>'p'
     );
 $keyword='';
 $sengine=$p['host'];
 foreach($arr_sd_key as $se=>$kwd)
 {
  if(strpos($p['host'],$se)!==false)
  {
   $keyword=$pa[$kwd];
   $sengine=$se;
   break;
  }
 }
 //$sql="insert into visit_log(domain,key_word,ct)";
}