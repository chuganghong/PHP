<?php
class Fruit {
	private $name = "水果";
	private $color = "颜色";
	
	public function setName($name){
		$this->name = $name;
	}
	
	public function setColor($color){
		$this->color = $color;
	}
	
	function showColor(){
		return $this->color.'的'.$this->name."<br />";
	}
	
	function __destruct(){
		echo "被吃掉了（对象被回收） <br />"; 
	}
	function __clone(){
		$this->name = "克隆水果"; 
	}
}

Header('Content-Type:text/html;charset=utf-8');
$apple = new Fruit();
$apple->setName("大苹果");
$apple->setColor("红色");
echo $apple->showColor();

$clone_apple = clone $apple;
$clone_apple->setColor("青色");

echo $clone_apple->showColor();
?>
