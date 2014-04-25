<?php
/**
 *@description 分页类
 */
class Page
{
	protected $page_str = '';
	//pre page
	public function pre_page()
	{
		$this->page_str .= '上一页';
		
	}
	
	//next page
	public function next_page()
	{
		$this->page_str .= '下一页';
	}
	
	//go to page
	public function go_page()
	{
		$str = <<<EOT
<select>
	<option>1</option>
	<option>2</option>
	<option>3</option>
</select>
EOT;
		$this->page_str .= $str;
	}
	
	//display()
	public function display_page()
	{
		//$this->page_str .= '';
		echo $this->page_str;
	}
}

//test
$p = new Page();
$p->pre_page();
$p->next_page();
$p->go_page();
$p->display_page();