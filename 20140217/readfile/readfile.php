
<?php
/**
* 功能：随机显示图片
* Filename  : img.php
* Usage:
*             <img src=img.php>
*             <img src=img.php?folder=images2/>
**/
  
  if(isset($_GET['folder'])){
     $folder=$_GET['folder'];
  }else{
     $folder='/images/';	 
  }
  //存放图片文件的位置   E:\www\GitHub\PHPClassFunctions\20140217\readfile\readfile.php
  $path = $_SERVER['DOCUMENT_ROOT']."/GitHub/PHPClassFunctions/20140217/readfile/".$folder;
  
  $files=array();
  if ($handle=opendir($path)) {
      while(false !== ($file = readdir($handle))) {
                if ($file != "." && $file != "..") {
                if(substr($file,-3)=='gif' || substr($file,-3)=='jpg') $files[count($files)] = $file;
                }
      }
  }
  closedir($handle);
  
  //var_dump($files);exit;

  $random=rand(0,count($files)-1);
  //var_dump($random);exit;
  if(substr($files[$random],-3)=='gif') 
  {
	ob_clean();
	header("Content-type: image/gif");
  }
  elseif(substr($files[$random],-3)=='jpg') 
  {
	ob_clean();header("Content-type: image/jpeg");
  }
  readfile("$path/$files[$random]");
?>