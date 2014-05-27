<!DOCTYPE html>
<head>
<title></title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js">
</script>
</head>
<body>
<p>
	<input type="text"  id="kwd1" />
	<input type="text"  id="kwd2" />
</p>
<p>
	<input onclick="set('h')" type="text" value="2" name="" class="h"/>
	<input type="text" value="2" class="h" />
</p>
<p onclick="test()">Click</p>
</body>
</html>
<script>
function test()
{
	var str = $("input");
	
	$.each(str,function(i){
		alert(str.text());
	});
}

function set(obj)
{
	var vs = document.getElementsByClassName(obj);
	
	alert(va[0]);
	alert(va[1]);
	$("#kwd1").val(vs[0].value);
	$("#kwd2").val(vs[1].value);
	return false;	
}
</script>
