<?php
session_start();

if(isset($_GET['act']))
{
	if($_GET['act']=='delete')
	{
		$kk = $_GET['kk'];
		unset($_SESSION['v'][$kk]);
	}	
}
else
{
	if((isset($_POST['act']))&&($_POST['act']=='add'))
	{
		$v = $_POST['v'];
		$k = mt_rand();
		$k = MD5($k);
		$_SESSION['v'][$k] = $v;
	
	}
}

//var_dump($_SESSION['v']);	EXIT;
$html = <<<EOT
<script type="text/javascript">
function goto(kk)
{
	var url = "receive.php?act=delete&kk=" + kk;
	window.location.href = url;
}
</script>
EOT;

$html .= '<table>';
foreach($_SESSION['v'] as $kk=>$vv)
{
	$html .= '<tr>';
	$html .= '<td>' . $kk . '</td>';
	$html .= '<td>' . $vv . '</td>';
	$html .= '<td><a href="javascript:;" onclick=goto("' . $kk . '")>delete</a></td>';
	$html .= '</tr>';	
}
$html .= '</table>';
echo $html;
