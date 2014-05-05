<?php
class HashTable
{
	private $buckets;
	private $size = 10;
	
	public function __construct()
	{
		$this->buckets = new SplFixedArray($this->size);
	}
	
	private function hashfunc($key)
	{
		$strlen = strlen($key);
		$hashval = 0;
		for($i=0;$i<$strlen;$i++)
		{
			$hashval += ord($key[$i]);
		}
		return $hashval % $this->size;
	}
	
	// insert
	public function insert($key,$value)
	{
		$index = $this->hashfunc($key);
		// 新建一个节点
		if($this->buckets[$index])
		{
			$newNode = new HashNode($key,$value,$this->buckets[$index]);
		}
		else
		{
			$newNode = new HashNode($key,$value,NULL);
		}
		// 保存新节点
		$this->buckets[$index] = $newNode;
	}
	
	// find
	public function find($key)
	{
		$index = $this->hashfunc($key);
		$current = $this->buckets[$index];
		// 遍历链表
		while(isset($current))
		{
			if($current->key == $key)
			{
				return $current->value;
			}
			$current = $current->nextNode;
		}
		return NULL;
	}
}


// test
require('HashNode.class.php');
$ht = new HashTable();
$ht->insert('key1','value1');
$ht->insert('key2','value2');
$ht->insert('key12','value12');
echo $ht->find('key1') . '<br />';
echo $ht->find('key2') . '<br />';
echo $ht->find('key12') . '<br />';