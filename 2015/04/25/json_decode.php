<?php
//将json字符串转为数组
Header('Content-Type:text/html;charset=utf-8');
$json = <<<EOT
{"OrderId":1145889,"OrderNo":"8511145889906","UserId":786881,"UserName":"褚刚","UserPhone":"13697432844","UserRemark":"褚刚","Products":[{"SysProductId":193552,"ProductId":996856,"SalesCount":4,"SellPrice":0.01,"ProductName":"测试：二选二 免+免","Items":[{"OrderPackageDetailId":1033411,"ItemId":58879,"ItemName":"免预约餐","ItemCount":1,"ProviderId":5809,"ProviderName":"免预约供应商","ContractPrice":10.00,"ProductItemType":2,"StartDate":"2015-04-15","EndDate":"2015-04-23","ItemDescription":null,"ItemRemark":null,"ItemDeductionRemark":"[\r\n {\r\n \"ProviderId\": 5809,\r\n \"Date\": \"2015-04-25\",\r\n \"NewRoomCount\": 9862,\r\n \"OldRoomCount\": 9866,\r\n \"ItemId\": 58879,\r\n \"RoomType\": \"添加房\",\r\n \"ContractPrice\": 10.00\r\n }\r\n]"}]}]}
EOT;
$json = str_replace("\r\n","",$json);
echo $json;
var_dump(json_decode($json,true));
$arr = json_decode($json,true);


show($arr);


function show($mix)
{
	if(is_array($mix))
	{
		foreach($mix as $v)
		{
			show($v);
		}
	}
	else
	{
		var_dump($mix);
	}
}

