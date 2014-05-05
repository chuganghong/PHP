<?php
class HashNode
{
	public $key;
	public $value;
	public $nextNode;
	
	public function __construct($key,$value,$nextNode = Null)
	{
		$this->key = $key;
		$this->value = $value;
		$this->nextNode = $nextNode;
	}
}