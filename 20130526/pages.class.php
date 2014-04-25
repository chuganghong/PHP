<?php
/**
 *分页，常用于显示列表
 *
 *
 *
 */
class page
{
	protected $current_page;   //当前页面号码	
	protected $url;			   //使用了此分页类的页面url前部分
	protected $sum;			   //数据可以分成的总页数
	
	/**
	 *构造函数
	 *@param integer $current_page 当前页面号码
	 *@param string $url 使用了此分页类的页面url前部分，格式如：some.php?p
	 *@param integer $sum 数据可以分成的总页数
	 *@return void
	 */
	
	function __construct($current_page,$url,$sum)
	{
		//暂时不知道要写什么
		$this->current_page = $current_page;
		$this->url = $url;
		$this->sum = $sum;
	}
	
	/**
	 *输出‘首页’
	 *@return string $str  输出‘首页’的HTML
	 */
	function show_first_page()
	{
		$str = '<a href="' . $this->url . '=1">首页</a>';
		return $str;
	}
	
	/**
	 *输出‘上一页’
	 @return string $str 输出‘上一页’的HMTL
	 */
	function show_pre_page()
	{
		if( $this->current_page==1 )
		{
			$str = '上一页';
		}
		else if( $this->current_page>1 )
		{
			$pre = $this->current_page-1;
			$str = '<a href="' . $this->url . '=' . $pre . '">上一页</a>';
		}
		return $str;
	}
	
	/**
	 *输出‘下一页’
	 @return string $str 输出‘下一页’的HMTL
	 */
	function show_next_page()
	{
		if( $this->current_page==$this->sum )
		{
			$str = '下一页';
		}
		else if( $this->current_page<$this->sum )
		{
			$next = $this->current_page + 1;
			$str = '<a href="' . $this->url . '=' . $next . '">下一页</a>';
		}
		return $str;
	}
	
	/**
	 *选择下拉列表中的一项时跳转到该项对应的页面
	 @return string $str 输出跳转到某一页的下拉列表HMTL
	 */
	function show_go_page()
	{
		$str = $this->js();
		$str .= '跳转到';
		//下拉选框
		//$str .= '<select id="mySelect" onchange="goTo(this.id)">';
		$str .= '<select id="mySelect" onchange="goTo()">';
		for($i=1;$i<=$this->sum;$i++)
		{
			if( $i==$this->current_page )
			{
				$str .= '<option value="' . $i . '" selected="selected">' . $i . '</option>';
			}
			else
			{
				$str .= '<option value="' . $i . '">' . $i . '</option>';
			}
		}
		$str .= '</select>';
		return $str;
	}
	
	/**
	 *执行链接到某一页操作的JS代码
	 @return string $str 输出打开链接的JS代码
	 */
	function js()
	{
		$str = <<<EOT
			<script type="text/javascript">			
			function goTo()
			{
				v = document.getElementById("mySelect").value;
				location.href="$this->url=" + v;
			}			
			</script>
EOT;
		return $str;
	}
	
	/**
	 *输出‘尾页’
	 *@return string $str 输出‘尾页’的HTML
	 */
	 function show_last_page()
	 {
		$str = '<a href="' . $this->url . '=' . $this->sum . '">尾页</a>';
		return $str;
	}
}
/**
 *测试分页类page
 */
//$data = file_get_contents('1.txt');
//$strlen = strlen($data);
//$length = 100;   //每页数据大小
//$sum = ceil($strlen/$length);   //总页数
/*
if( isset($_GET['page']) )
{
	$current_page = $_GET['page'];
}
else
{
	$current_page = 1;
}
$url = 'pages.class.php?page';


$page = new page($current_page,$url,$sum);
echo $page->show_pre_page();
echo ' ';
echo $page->show_go_page();
echo ' ';
echo $page->show_next_page();
*/

				