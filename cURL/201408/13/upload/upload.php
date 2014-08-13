<?php
/**
 *忘记了的函数
 *move_uploaded_filef($tmp_name,$dest_name)
 *strrchr($haystack,$needle)
 */
print_r($_POST);
print_r($_FILES);//$_FILES才包含上传的文件的数据
echo '<hr>';
var_dump($_POST);
var_dump($_FILES);
$file = $_FILES['file'];
// var_dump(strrchr($file['name'],'.'));exit;
if(move_uploaded_file($file['tmp_name'],'./' . time() . strrchr($file['name'],'.')))
{
	echo 'Success';
}
else
{
	echo 'Failure';
}