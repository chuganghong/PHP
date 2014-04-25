<?php
/*
array (size=8)
  'align' => string '0' (length=1)
  'fontfamily' => string 'jdzyt' (length=5)
  'color' => string '16711680' (length=8)
  'layout' => string '0' (length=1)
  'bold' => string '0' (length=1)
  'italic' => string '0' (length=1)
  'fontSize' => string '30' (length=2)
  'text' => string '双击添加文字' (length=18)
var_dump($_POST);
*/
require('Cut.class.php');
require_once('FontPic.class.php');

//var_dump($_POST);EXIT;

$text = $_POST['text'];

$text_color = $_POST['color'];	//文字颜色
//var_dump($text_color);exit;

//echo $text;exit;

//echo $_POST['fontSize'];exit;
$cut = new Cut();
/*
	在这里花了很长时间。flash在很短的时间内发送了两次请求，
	两个请求的字号大小变量是不同的，而我起初认为其是相同的，
	故只接收到了一个字号，故在一次请求中，字号参数无值，影响了
	图片的生成。另外，再次暴露出我的调试能力不好。同事让我在传递过来的
	值后面加了一个数，就可以运行。虽然这种方法检测到的原因并非错误原因，
	但我却通过firebug查看反馈信息，知道了，导致错误的原因是，$_POST[index]
	中的index不正确
*/
if(isset($_POST['fontSize']))
{
	$size = intval($_POST['fontSize']);
}

if(isset($_POST['fontsize']))
{
	$size = intval($_POST['fontsize']);
}

$angle = 0;
$which = $_POST['layout'];
$layout = $_POST['align'];

$fontf = $_POST['fontfamily'];
switch($fontf)
{
	case 'msyh':	//微软雅黑
		$fontsiffix = 'msyh.ttf';
		break;
	case 'simhei':	//黑体（黑体常规)
		$fontsiffix = 'simhei.ttf';
		break;
	case '2013041510':	//华康少女文字
		$fontsiffix = 'DFGBSN5.ttc';
		break;
	default:	//默认字体是微软雅黑
		$fontsiffix = 'msyh.ttf';
		break;
		
}
// $fontfile = "c:/windows/fonts/msyhbd.ttf";
$fontfile = "c:/windows/fonts/" . $fontsiffix;

$font = new FontPic($cut,$text,$size,$fontfile,$angle,$which,$layout);

$name_text_color = 'text_color';
$value_text_color = $text_color;
$font->__set($name_text_color,$value_text_color);

//$font->drawPicsRow();//-----可以正常运行

//$font->drawPicsList();	//竖排

// $which = 1;
if($which==1)
{
	$font->drawPicsList();	//竖排
}
elseif($which==0)
{
	$font->drawPicsRow();	//横排
}

/**
 //下面的代码除了固定size等参数外，可以正常运行
 
if(isset($_POST['text']))
{
	$text = $_POST['text'];
}
else
{
	
	$text = '你好' . chr(13) . '吗' . chr(13) . '很好';
//$text = '你好' . chr(13) . '吗' . chr(13) . '很好' . chr(13) . '很好';
//$text = '你好吗';
}


$cut = new Cut();
$size = 90;
$angle = 0;
//$which = 0;
$layout = 0;
$fontfile = "c:/windows/fonts/msyhbd.ttf";

$font = new FontPic($cut,$text,$size,$fontfile,$angle,$which,$layout);
//$font->drawPicsRow();

//test
$arr1 = $font->__get('text_arr_row');

$arr2 = $font->__get('text_arr_list');
//Header('Content-Type:text/html;charset=utf-8');var_dump($arr2);
$arr1 = $font->getBgWHRow();
$arr2 = $font->getBgWHList();
//var_dump($arr1);
//var_dump($arr2);
if($which==0)
{
	$font->drawPicsRow();//-----可以正常运行
}
elseif($which==1)
{
	$font->drawPicsList();
}
*/
