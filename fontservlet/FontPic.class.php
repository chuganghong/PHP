<?php
/**
 *flash文字图片
 *@update 横排换行
 *首个非空白行的行距，只需敲击一次enter，而其他空白行的行距，需敲击二次enter
 *第一次为换行，第二次为行距
 *v1.1
 */
class FontPic
{
	const SEPARATOR = '~';
	const MARGIN_LINE = 5;	//行距
	const MARGIN_WIDTH = 10;	//比最宽文本长的长度，方便居中等效果
	const MARGIN_BOTTOM = 30;	//底部高度
	
	const MARGIN_HEIGHT = 20;	//比最高文本高的长度，方便居中等效果	
	const MARGIN_LINEH = 10;	//竖排打印单元之间的行距
	const MARGIN_RIGHT = 5;	//竖排画布右边长度
	/**
	 *竖排定位的时候，一个竖排打印单元的尾字符不知何故只能显示部分，故设置此
	 *值调整一个竖排打印单元的首字符的左下角Y坐标（注意，是首字符的左下角的Y坐标）
	*/
	const LISTYUNKNOWN = 5;	
	
	const TEXT_COLOR_DEFAULT = '0#0#0';	//默认的文字颜色
	
	
	private $text;
	private $size;	//字号
	private $fontfile;	//字体
	private $angle;	//文本角度
	
	private $img;	//用于创建图片的资源
	
	private $wh_arr;	//存储文本width和height的数组，每个单元形如array('width'=>$width,'height'=>$height)
	
	private $text_arr_row;	//存储所有横排打印单元的数组
	
	// private $text_arr_row_bg;	//没有用到。存储所有横排打印单元的数组，计算画布height和width使用
	private $text_arr_list;	//存储所有竖排打印单元的数组
	private $text_first_list;	//存储所有竖排打印单元的第一个字符的数组
	
	private $which;		//0--横排，1--竖排	
	private $layout;	//0--左对齐，1--中，2--右
	
	private $cut;		//切割字符串的类
	
	private $text_color;	//文字颜色
	
	private $pre_text_wh;	//上一个打印单元的width和height
	
	
	public function __construct($cut,$text,$size,$fontfile,$angle,$which,$layout=0)
	{
		$this->cut = $cut;	//切割字符串的类
		$this->text = $text;
		$this->size = $size;
		$this->fontfile = $fontfile;
		$this->angle = $angle;
		$this->which = $which;
		$this->layout = $layout;
		
		$this->get_text_arr_row($text);	//获取横排打印单元，同时也存储了竖排打印单元
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
	 *获取横排打印单元-------OK
	 *@param string $str 要替换的字符串
	 *@param integer $ascii 特殊字符的Ascii码
	 */
	public function get_text_arr_row($str,$ascii = '13')
	{
		$res = $this->display_enter($str,$ascii);
		
		$this->text_arr_row = $this->cut_text_enter($res);
	}
	
	/**
	 *将字符串中不能打印也不能保存的特殊字符替换成其他字符--OK
	 *@param string $str 要替换的字符串
	 *@param integer $ascii 特殊字符的Ascii码
	 *@return string $res 被替换后的字符串
	 */
	public function display_enter($str,$ascii)
	{
		$res = str_replace(chr($ascii),self::SEPARATOR,$str);
		
		return $res;
	}
	
	/**
	 *在字符中插入换行符chr(10)--竖排List使用
	 *@param array $arr 存储一个enter单元的数组
	 *@param integer $ascii 字符的asicc码
	 *@return string $str enter单元转换成的竖排打印单元
	 */
	public function getListUnit($arr,$ascii)
	{
		//var_dump($arr);
		$str = '';
		foreach($arr as $v)
		{
			$str .= trim($v) . chr($ascii);
		}
		//var_dump($str);
		return $str;
	}
	
	/**
	 *对横排打印单元进行处理，将空的横排打印单元加进默认文字
	 */
	public function add_default_text($arr)
	{
		foreach($arr as $k=>$v)
		{
			if(empty($v))
			{
				$arr[$k] = '@'; //@~
				// $arr[$k] = chr(13);
			}
		}
		return $arr;
	}
	
	
	/**
	 *根据enter字符分割字符串-----OK
	 *@param string $str
	 *@return array $res 由每一行字符串组成的数组，同时产生了存储竖排打印单元和横排打印单元的数组
	 */
	public function cut_text_enter($str)
	{
		var_dump($str);//exit;
		$arr = explode(self::SEPARATOR,$str);
		//var_dump($arr);exit;
		
		// $arr = $this->add_default_text($arr);
		
		//var_dump($arr);exit;//@~
		//echo '<hr>';
		
		$res = array(); //存储横排打印单元，即一个enter单元
		$res2 = array();	//存储竖排打印单元，即一个enter单元经过处理后得到的字符串
		foreach($arr as $v)
		{
			//var_dump($v);
			$v2 = trim($v);
			//var_dump($v2);
			$res[] = $v2;
			$this->cut->__set('start',0);
			$v3 = $this->cut->cut_zh_en($v2);	//一个enter单元经过中英文混合字符切割之后得到的数组
			//var_dump($v3);
			$res3[] = $v3[0];			
			$res2[] = $this->getListUnit($v3,10);	//enter单元转换成的竖排打印单元			
			
		}
		//var_dump($res);exit;
		$this->text_arr_list = $res2;	//将竖排打印单元存储进数组
		$this->text_first_list = $res3;	//将竖排打印单元的第一个字符存储起来
		return $res;
	}
	
	/**
	 *计算并返回一个包围着 TrueType 文本范围的虚拟方框的像素大小----OK
	 *@param integer $size 字号
	 *@param integer $angle text 将被度量的角度大小
	 *@param string $font 字体
	 *@param string $text 字符串
	 *@return array $arr $arr['width']--宽，$arr['height']--高
	 */
	public function getTextWH($text)
	{
		$size = $this->size;
		$angle = $this->angle;
		$font = $this->fontfile;
		
		//var_dump($text);
		
		$arr = imagettfbbox($size,$angle,$font,$text);		
		$width = abs($arr[2]-$arr[0]);
		$height = abs($arr[7]-$arr[1]);
		$arr = array('width'=>$width,'height'=>$height);
		//var_dump($arr);
		return $arr;
	}
	
	/**
	 *获取所有打印单元的width和height
	 *@param array $arr 所有的打印单元
	 */
	public function get_wh_arr($arr)
	{
		$res = array();
		foreach($arr as $v)
		{
			//var_dump($v);			
			$res[] = $this->getTextWH($v);
		}
		return $res;
	}
	
	/**
	 *计算竖排画布的width和height
	 *@return array $res $res['width']--宽，$res['height']--高
	 */
	public function getBgWHList()
	{
		$sum_width = 0;
		$arr2 = $this->text_arr_list;
		$arr = $this->get_wh_arr($arr2); //存储文本width和height的数组，每个单元形如array('width'=>$width,'height'=>$height)
		//var_dump($arr);exit;
		$num = count($arr);
		foreach($arr as $v)
		{
			$height[] = $v['height'];
			$sum_width += $v['width'];
		}
		
		$max_height = max($height);
		//var_dump($max_height);
		$hei = $max_height + self::MARGIN_HEIGHT;
		$wid = $sum_width + ($num-1)*self::MARGIN_LINEH + self::MARGIN_RIGHT;
		
		$res = array('width'=>$wid,'height'=>$hei);
		$this->wh_arr = $res;	//用了它，下面的return略显多余
		//var_dump($res);exit;
		return $res;
	}
	
	/**
	 *计算横排画布的width和height--------OK
	 *@return array $res $res['width']--宽，$res['height']--高
	 */
	public function getBgWHRow()
	{
		$sum_height = 0;
		$arr2 = $this->text_arr_row;	//~@
		// var_dump($arr2);
		$arr3 = $this->add_default_text($arr2);
		// var_dump($arr3);exit;
		$arr = $this->get_wh_arr($arr3); //存储文本width和height的数组，每个单元形如array('width'=>$width,'height'=>$height)
		$num = count($arr);
		//var_dump($arr);
		foreach($arr as $v)
		{
			$width[] = $v['width'];
			$sum_height += $v['height'];
		}
		$max_width = max($width);
		$wid = $max_width + self::MARGIN_WIDTH;
		$hei = $sum_height + ($num-1)*self::MARGIN_LINE + self::MARGIN_BOTTOM;
		// $hei = $sum_height + ($num-1)*self::MARGIN_LINE + 50;
		
		$res = array('width'=>$wid,'height'=>$hei);
		$this->wh_arr = $res;	//用了它，下面的return略显多余
		//var_dump($res);
		return $res;
	}
	
	/**
	 *计算竖排每一个打印单元的定位坐标--居上（横排中的居左）
	 *@param integer $textHei 一个竖排打印单元的height
	 *@return integer $yListTop 竖排打印单元的居上Y坐标
	 */
	public function getYListTop($textHei)
	{
		//$yListTop = $textHei;
		$yListTop = 0;
		//var_dump(yListTop);exit;
		return $yListTop;
	}
	
	/**
	 *计算竖排每一个打印单元的定位坐标--居中（横排中的居中）
	 *@param array $bgHei 画布的height 
	 *@param integer $textHei 一个竖排打印单元的height
	 *@return integer $yListMid 竖排打印单元的居中Y坐标
	 */
	public function getYListMid($bgHei,$textHei)
	{
		$yListMid = ($bgHei-$textHei)/2;
		return $yListMid;
	}
	
	/**
	 *计算竖排每一个打印单元的定位坐标--居下（横排中的居右）
	 *@param array $bgHei 画布的height 
	 *@param integer $textHei 一个竖排打印单元的height
	 *@return integer $yListMid 竖排打印单元的居中Y坐标
	 */
	public function getYListBottom($bgHei,$textHei)
	{
		$yListBottom = $bgHei-$textHei;
		return $yListBottom;
	}
	
	/**
	 *竖排，获取打印单元及对应的坐标---
	 *@param array $text_arr 存储打印单元的数组
	 *@param integer $which 0--上（左）对齐，1--中，2--下（右）
	 *@return array $res 打印单元及对应的坐标数组
	 */
	public function getTextXYList($text_arr,$which)
	{
		$x = 0;
		$WH = array();	//存储每个打印单元的width和height的数组		
		foreach($text_arr as $k=>$text)
		{			
			//var_dump($text);
			if($k >= 1)
			{
				$text2 = $text_arr[$k-1];
				$textWH2 = $this->getTextWH($text2);	//获得一个打印单元的width和height
			}
			
			$textWH = $this->getTextWH($text);	//获得一个打印单元的width和height
			
			if($k==0)
			{
				//$x += $textWH['width'];
				$x = 0;
			}
			else
			{
				// $x += self::MARGIN_LINEH + $textWH['width'];
				$x += self::MARGIN_LINEH + $textWH2['width'];
			}
			
			$y = $textWH['height'];
			//var_dump($y);
			
			$WH[] = array('x'=>$x,'y'=>$y);//y并非打印单元的y坐标，而是该单元的height	
		}
		$res = array('text'=>$text_arr,'xy'=>$WH);
		// var_dump($res);exit;
		return $res;
	}
	
	
	/**
	 *计算横排每一个打印单元的定位坐标--居左
	 */
	public function getXRowLeft()
	{
		$xRowLeft = 0;
		return $xRowLeft;
	}
	
	/**
	 *计算横排每一个打印单元的定位坐标--居中
	 *
	 */
	public function getXRowMid($bgWid,$textWid)  
	{
		//var_dump($bgWid,$textWid);exit;
		$xRowMid = ($bgWid-$textWid)/2;
		//var_dump($xRowMid);exit;
		return $xRowMid;
	}
	
	/**
	 *计算横排每一个打印单元的定位坐标--居右
	 *@param integer $bgWid 画布的width
	 *@param integer $textWid 该打印单元的width
	 */
	public function getXRowRight($bgWid,$textWid)
	{
		$xRowRight = $bgWid-$textWid;
		//var_dump($xRowRight);
		return $xRowRight;
	}
	
	/**
	 *计算竖排每一个打印单元的定位坐标Y--
	 *align：0--上（左）对齐，1--中，2--下（右）
	 *@param integer $layout 
	 *@param array $bgWH 包含画布的width和height的数组
	 *@param integer $textHei 该打印单元的height
	 *@return integer $y Y坐标值
	 */
	public function getYList($layout,$bgWH,$textHei)
	{
		switch($layout)
		{
			case 0:
				$y = $this->getYListTop($textHei);
				break;
			case 1:
				$bgHei = $bgWH['height'];
				$y = $this->getYListMid($bgHei,$textHei);
				break;
			case 2:
				$bgHei = $bgWH['height'];
				$y = $this->getYListBottom($bgHei,$textHei);
				break;			
		}
		//var_dump($y);exit;
		return $y;
	}
	
	/**
	 *计算横排每一个打印单元的定位坐标X--
	 *align：0--左对齐，1--中，2--右
	 *@param integer $layout 
	 *@param array $bgWH 包含画布的width和height的数组
	 *@param integer $textWid 该打印单元的width
	 *@return integer $x X坐标值
	 */
	public function getXRow($layout,$bgWH,$textWid)
	{
		switch($layout)
		{
			case 0:
				$x = $this->getXRowLeft();
				break;
			case 1:
				$bgWid = $bgWH['width'];
				$x = $this->getXRowMid($bgWid,$textWid);
				break;
			case 2:
				$bgWid = $bgWH['width'];
				$x = $this->getXRowRight($bgWid,$textWid);
				break;			
		}
		//var_dump($x);
		return $x;
	}
	
	
	/**
	 *横排，获取打印单元及对应的坐标---OK
	 *@param array $text_arr 存储打印单元的数组
	 *@param integer $which 0--左对齐，1--中，2--右
	 *@return array $res 打印单元及对应的坐标数组
	 */
	public function getTextXYRowTest($text_arr,$which)	//~@
	{
		$y = 0;
		$i = 0;	//统计连贯的空白行的数量
		$WH = array();	//存储每个打印单元的width和height的数组
		//var_dump($text_arr);exit;//test
		foreach($text_arr as $k=>$text)
		{			
			//var_dump($text);
			
			/**
			 *这里，理解起来有些困难。
			 *我没有将空白从待打印的字符里清除。
			 *但是，没有关系，因为在画到图片上时，画空白是无效操作
			 */
			$textWH = $this->getTextWH($text); 
			//var_dump($textWH);EXIT;//~@
			if(empty($text))	//若是空白行
			{
				$i++;
				$text = '@';
				$this->pre_text_wh = $this->getTextWH($text);	//获得一个打印单元的width和height
			}
			else			//	若非空白行
			{
				
				$pre_h = $this->pre_text_wh['height'];
				$p_height = $pre_h * $i;
				$i = 0;
				
				if($k==0)
				{
					$y += $textWH['height'] + $p_height;
				}
				else
				{
					$y += self::MARGIN_LINE + $textWH['height'] + + $p_height;
				}				
			}
			
			
			
			$x = $textWH['width'];
			
			$WH[] = array('x'=>$x,'y'=>$y);//x并非打印单元的x坐标，而是该单元的width	
		}
		$res = array('text'=>$text_arr,'xy'=>$WH);
		// var_dump($res);exit;
		return $res;
	}
	
	/**
	 *横排，获取打印单元及对应的坐标---OK
	 *@param array $text_arr 存储打印单元的数组
	 *@param integer $which 0--左对齐，1--中，2--右
	 *@return array $res 打印单元及对应的坐标数组
	 */
	public function getTextXYRow($text_arr,$which)	//~@
	{
		$y = 0;
		$WH = array();	//存储每个打印单元的width和height的数组
		//var_dump($text_arr);exit;//test
		foreach($text_arr as $k=>$text)
		{			
			//var_dump($text);
			$textWH = $this->getTextWH($text);	//获得一个打印单元的width和height
			if($k==0)
			{
				$y += $textWH['height'];
			}
			else
			{
				$y += self::MARGIN_LINE + $textWH['height'];
			}
			
			$x = $textWH['width'];
			
			$WH[] = array('x'=>$x,'y'=>$y);//x并非打印单元的x坐标，而是该单元的width	
		}
		$res = array('text'=>$text_arr,'xy'=>$WH);
		//var_dump($res);exit;
		return $res;
	}
	
	/**
	 *创建图片资源
	 *@param integer $width 画布width
	 *@param integer $height 画布height
	 */
	public function createImg($width,$height)
	{
		$this->img = $img = imagecreate($width, $height);
		//$this->img = $img = imagecreate(1024, 768);
		//给图片分配颜色
		$back = imagecolorallocatealpha($img, 255, 255, 255,127);
		//$back = imagecolorallocate($img, 0, 255, 255);	//test
	}
	
	/**
	 *打印所有的打印单元--竖排
	 *@param array $text_info 包含打印单元及其对应坐标信息的数组
	 */
	public function drawPicsList()
	{
		$text_arr = $this->text_arr_list;
		
		//var_dump($text_arr);exit;
		
		$layout = $this->layout;	//居中、居左等
		//var_dump($layout);
		$text_info = $this->getTextXYList($text_arr,$layout);	//竖排，获取打印单元及对应的坐标
		//var_dump($text_info);//exit;
		$this->getBgWHList();	//获取画布的width和height
		//var_dump($this->wh_arr);exit;
		$width = $this->wh_arr['width'];
		$height = $this->wh_arr['height'];
		
		/*
		$width = 1000;
		$height = 800;
		*/
		$this->createImg($width,$height);
		$img = $this->img;	
		
		$texts = $text_info['text'];
		
		$xy3 = $text_info['xy'];
		//var_dump($xy3);
		$bgWH = $this->wh_arr;
		foreach($xy3 as $k=>$v)
		{
			// $v['x'] = $this->getXRow($layout,$bgWH,$v['x']);	
			$add = $this->text_first_list[$k];
			$xy_add = $this->getTextWH($add);
			$y_add = $xy_add['height'];
			$xy3[$k]['y'] = $y_add + $this->getYList($layout,$bgWH,$v['y'])-self::LISTYUNKNOWN;	
		}
		$xy2 = $xy3;
		//var_dump($texts);
		//var_dump($xy2);exit;
		foreach($texts as $k=>$text)
		{			
			$xy = $xy2[$k];	
			//var_dump($xy);
			//var_dump($text);exit;
			
			$this->drawPicRow($text,$xy,$img);			
		}
		
		
		//发送头信息
		ob_clean();
		header('Content-Type: image/png');
		//输出图片
		imagepng($img); 
	}
	
	
	/**
	 *打印所有的打印单元--横排
	 *@param array $text_info 包含打印单元及其对应坐标信息的数组
	 */
	public function drawPicsRow()
	{
		$text_arr = $this->text_arr_row;	//~@	
		
		$layout = $this->layout;	//居中、居左等
		//var_dump($layout);exit;
		$text_info = $this->getTextXYRowTest($text_arr,$layout);	//横排，获取打印单元及对应的坐标
		//var_dump($text_info);
		$this->getBgWHRow();	//获取画布的width和height
		$width = $this->wh_arr['width'];
		$height = $this->wh_arr['height'];		
		
		$this->createImg($width,$height);
		$img = $this->img;	
		
		$texts = $text_info['text'];
		
		
		$xy3 = $text_info['xy'];
		
		$bgWH = $this->wh_arr;
		foreach($xy3 as $k=>$v)
		{
			// $v['x'] = $this->getXRow($layout,$bgWH,$v['x']);	
			$xy3[$k]['x'] = $this->getXRow($layout,$bgWH,$v['x']);	
		}
		$xy2 = $xy3;
		//var_dump($texts);
		//var_dump($xy2);exit;
		foreach($texts as $k=>$text)
		{			
			$xy = $xy2[$k];	
			//var_dump($xy);
			//var_dump($text);
			//var_dump($text);//exit;
			//var_dump(ord($text));
			
			//var_dump($text);
			$this->drawPicRow($text,$xy,$img);			
		}
		
		
		//exit;
		//发送头信息
		ob_clean();
		header('Content-Type: image/png');
		//输出图片
		imagepng($img); 
		
	}
	
	
	/**
	 *打印一个打印单元--横排
	 */
	public function drawPicRow($text,$xy,$img)
	{
		// $yellow = imagecolorallocate($img, 255, 255, 0);
		
		//若没有设置文字颜色，就使用默认颜色。默认颜色值是TEXT_COLOR_DEFAULT
		//var_dump($this->text_color);exit;
		// $this->text_color = 13382400;
		if($text == '@')	//@~		横排换行效果，行距
		{
			$tcolor = array();
			$tcolor = array(
				'r' => 255,
				'g' => 255,
				'b' => 255);
		}
		else
		{
			if(empty($this->text_color))
			{			
				$rgb = explode('#',self::TEXT_COLOR_DEFAULT);			
				$tcolor = array();			
				$tcolor['r'] = $rgb[0];
				$tcolor['g'] = $rgb[1];
				$tcolor['b'] = $rgb[2];
			}			
			else
			{
				$tcolor = array();
				$tcolor = $this->decColor2RGB($this->text_color);
			}
		}
		/*
		 *注意这里的if condition，这是一个严重的错误，每个if condition组合起来，
		 *应该囊括所有的情况
		 
		if(empty($this->text_color))
		{
			//$tcolor = array(0,0,0);
			$rgb = explode('#',self::TEXT_COLOR_DEFAULT);			
			$tcolor = array();			
			$tcolor['r'] = $rgb[0];
			$tcolor['g'] = $rgb[1];
			$tcolor['b'] = $rgb[2];
		}
		elseif($text == '@')
		{
			$tcolor = array();
			$tcolor = array(
				'r' => 0,
				'g' => 255,
				'b' => 0);
		}
		else
		{
			$tcolor = array();
			$tcolor = $this->decColor2RGB($this->text_color);
		}
		*/
		
		//var_dump($tcolor);exit;
		
		$r = $tcolor['r'];
		$g = $tcolor['g'];
		$b = $tcolor['b'];
		// if($tcolor['r']==$tcolor['g']==$tcolor['b']==255)
		// Parse error: syntax error, unexpected '==' (T_IS_EQUAL) in E:\www\printlife\bin-debug\builder\fontservlet\FontPic.class.php on line 625
		if( ($tcolor['r']==255) && ($tcolor['g']==255) && ($tcolor['b']==255) )
		{
			$black = imagecolorallocatealpha($img, 255, 255, 255,127);
			//$black = imagecolorallocate($img, $r, $g, $b);	//文字颜色
		}
		else
		{
			$black = imagecolorallocate($img, $r, $g, $b);	//文字颜色
		}
			
		// $black = imagecolorallocate($img, 255, 255, 0);	//文字颜色
		
		
		
		//将ttf文字写到图片中
		$size = $this->size;
		$angle = $this->angle;
		$x = $xy['x'];
		$y = $xy['y'];		
		$fontfile = $this->fontfile;	
		
		//var_dump($tcolor);
		
		//var_dump($text);exit;
		imagettftext($img, $size, $angle, $x, $y, $black, $fontfile, $text);
		//imagettftext($img, $size, 0, 80, 490, $yellow, $fontfile, $text);		
	}
	
	/**
	 * flash传递过来的颜色转为RGB颜色，即十进制转为RGB
	 * @param integer $decColor 十进制颜色，如：16711680
	 * @return array RGB数组
	 */
	public function decColor2RGB($decColor)
	{
		//将十进制转为十六进制
		$hexColor = dechex($decColor);
		$rgb = $this->hColor2RGB($hexColor);		
		return $rgb;
	}
	
	/**
	 * 十六进制转 RGB
     * @param string $hexColor 十六颜色 ,如：#ff00ff
     * @return array RGB数组
     */
    function hColor2RGB($hexColor)
    {
        $color = str_replace('#', '', $hexColor);
		if (strlen($color) > 3)
		{
			$rgb = array(
				'r' => hexdec(substr($color, 0, 2)),
				'g' => hexdec(substr($color, 2, 2)),
				'b' => hexdec(substr($color, 4, 2))
				);
		} 
		else 
		{
			$color = str_replace('#', '', $hexColor);
			$r = substr($color, 0, 1) . substr($color, 0, 1);
			$g = substr($color, 1, 1) . substr($color, 1, 1);
			$b = substr($color, 2, 1) . substr($color, 2, 1);
			$rgb = array(
				'r' => hexdec($r),
				'g' => hexdec($g),
				'b' => hexdec($b)
				);
		}
		return $rgb;
	}
}














/*
//test

//Header('Content-Type:text/html;charset=utf-8');

require('Cut.class.php');
// $text = '你好' . chr(13) .  chr(13) . '吗' . chr(13) . '很好';
$text = chr(13) . '吗' . chr(13) . chr(13) . '很好' . chr(13) . '很好';
//$text = '你好吗';


$cut = new Cut();
$size = 30;
$angle = 0;
$which = 0;
$layout = 0;
$fontfile = "c:/windows/fonts/msyhbd.ttf";

$font = new FontPic($cut,$text,$size,$fontfile,$angle,$which,$layout);
//$font->drawPicsRow();

//test
//$arr1 = $font->__get('text_arr_row');

$arr2 = $font->__get('text_arr_list');

//var_dump($arr1);
//var_dump($arr2);

//Header('Content-Type:text/html;charset=utf-8');var_dump($arr2);
$arr1 = $font->getBgWHRow();
$arr2 = $font->getBgWHList();

$font->drawPicsRow();//-----可以正常运行
// $font->drawPicsList();

*/



