<?php
/**
 *Test
 */
require('./HashTable.class.php');
require('./HashNode.class.php');


// test
$ht = new HashTable();
$key1 = 'key1';
$value1 = 'Hello';
$key2 = 'key12';
$value2 = 'world';
$ht->insert($key1,$value1);
$ht->insert($key2,$value2);
$ht->insert($key1,'aaaaaa');
$value1 = $ht->find($key1);
var_dump($value1);
$value2 = $ht->find($key2);
var_dump($value2);
$value2 = $ht->find($key1);
var_dump($value2);
// var_dump($ht->arr);