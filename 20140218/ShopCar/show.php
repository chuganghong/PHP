<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title></title>
</head>
<body>
<table>
<tr><td>商品编号</td><td>商品名称</td><td>价格</td><td>数量</td></tr>
<?php
require 'Shopcar.class.php';
session_start();
$shopcar=unserialize($_SESSION['shopcar']);
print_r($shopcar);
$productList=$shopcar->productList;
foreach ($productList as $product){
?>
<tr><td>1</td><td><label ><?php echo $product['name']?></label></td><td><label name='price'><?php echo $product['price']?></label>
</td><td><input name='num' type='text' value='<?php echo $product['num']?>' /></td></tr>
<?php }?>
</table>
</body>
</html> 