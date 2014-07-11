<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">
function test()
{
	var ch = $("#t1").checked;
	if(ch)
	{
		alert(23);
		var res = confirm("Yes or no?");
		if(!res)
		{
			alert("cancel");
			$("#t1").attr("checked", true);  
		}
	}
}
</script>
</head>
<body>
<form action="do.php" method="POST">
<input type="checkbox" name="type[]" value="1" onclick="test()" id="t1" />
<input type="checkbox" name="type[]" value="2"/>
<input type="submit" value="Submit" />
</form>
</body>
</html>