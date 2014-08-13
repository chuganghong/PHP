<?php
/**
 *HashTable
 */
class HashTable
{
	private $size = 5;
	public $arr = array();
	
	// 哈希函数，原理是，字符串的ASCII值之和与数组的长度的取模运算
	public function _hash($key)
	{
		$sum = 0;
		for($i=0;$i<strlen($key);$i++)
		{
			$sum += ord($key[$i]);
			// var_dump($sum);
		}
		/* var_dump($sum);
		var_dump($this->size); */
		return $sum%$this->size;
	}
	
	// 插入
	public function insert($key,$value)
	{
		$hash = $this->_hash($key);
		if(isset($this->arr[$hash]))
		{
			$this->arr[$hash] = new HashNode($key,$value,$this->arr[$hash]);
		}
		else
		{
			$this->arr[$hash] = new HashNode($key,$value,Null);
		}		
	}
	
	// 查找
	public function find($key)
	{
		$hash = $this->_hash($key);
		$current = $this->arr[$hash];
		// var_dump($current);
		while(isset($current))
		{
			if($current->key==$key)
			{
				return $current->value;
			}
			$current = $current->nextNode;
		}
		return Null;
	}
}

