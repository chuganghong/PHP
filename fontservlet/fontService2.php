<?php
/* $arr = explode(' ',$_POST['text']);
var_dump($arr);exit; */
$msg2 = $_POST['text'];
echo $msg2;exit;

$msg = nl2br($msg2,false);
$conn = mysql_connect('localhost','root','') or die('Can not connect:' . mysql_error());
mysql_select_db('diy',$conn) or die('Error:' . mysql_error());
$sql = "INSERT INTO test VALUES ('$msg')";
mysql_query('SET NAMES UTF8');
mysql_query($sql) or die('Error:' . mysql_error());
$js = '<script type="text/javascript">alert("' . $_POST['text'] . '");</script>';
var_dump($_POST);EXIT;
$msg = $_POST['text'];
$fp = fopen('text.txt','a+');
fwrite($fp,$msg);
fclose($fp);
echo $js;
exit;
var_dump($_POST['text']);
exit;
echo htmlspecialchars($_POST['text']);exit;
// var_dump($_REQUEST['text']);EXIT;
if(isset($_POST['text']))
{
	$text = $_POST["text"];
}
else
{
	$text = '你好';
}
if ($text != "")
{
    $text = explode("\r\n", $text);
    $text_temp = "";
    $t = 0;
    foreach ($text as $key => $value)
    {
        $text_split = str_split($value, 50);
        foreach ($text_split as $key_split => $value_split)
        {
            $text_temp[$t] = $value_split;
            $t++;
        }
    }
    $text = $text_temp;

    $text_count = count($text);

    $fontname = "FZJLJT.FON";
    $im = imagecreate(800, $text_count * 100);
    $white = ImageColorAllocate($im, 255, 255, 255);
    $black = ImageColorAllocate($im, 0, 0, 0);
    $red = ImageColorAllocate($im, 255, 0, 0);

    for ($n = 0; $n < $text_count; $n++)
    {
        $value = $text[$n];
        $value_length = strlen($value);
        $value_count = 0;
        for ($i = 0; $i < $value_length; $i++)
        {
            if (ord($value{$i}) > 127)
            {
                $value_count++;
            }
        }
        if ($value_count % 2 != 0)
        {
            //$text[$n] = substr($value, 0, $value_length - 1);
            //$text[$n + 1] = substr($value, -1, 1) . $text[$n + 1];
            $text[$n] = $value . substr($text[$n + 1], 0, 1);
            $text[$n + 1] = substr($text[$n + 1], 1, strlen($text[$n + 1]) - 1);
        }
    }
    $text = implode("\r\n", $text);
    for ($n = 0; $n <= 1; $n++)
    {
        ImageTTFText($im, 48, 0, 0, 80, $black, $fontname, iconv("GBK", "UTF-8", $text));
    }
    $dir = "images/";
    if (is_dir($dir))
    {
        if ($dh = opendir($dir))
        {
            while (($file = readdir($dh)) !== false)
            {
                if (filetype($dir . $file) == "file")
                {
                    unlink($dir . $file);//删除文件
                }
            }
            closedir($dh);
        }
    }
    $file_name = $dir . md5($text) . ".png";
    ImagePng($im, $file_name);
    ImageDestroy($im);
}
else
{
    $file_name = "nihao.png";
}
// $src = '<img src="http://localhost/printlife/bin-debug/builder/fontservlet/' . $file_name . '" />';
Header('Content-Type:image/png;charset=utf-8');
$src = file_get_contents($file_name);
echo $src;
?>