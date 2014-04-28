<?php
/**
 *@filename FileSessionHandler.php
 *@description 摘自php manual
 *@date 2014/04/28 23:09
 */
class FileSessionHandler
{
	private $savePath;
	
	public function open($savePath,$sessionName)
	{
		$this->savePath = $savePath;
		if(!is_dir($this->savePath))
		{
			mkdir($this->savePath,0777);
		}
		return true;
	}
	
	public function close()
	{
		return true;
	}
	
	public function read($id)
	{
		return (string)@file_get_contents("$this->savePath/sess_$id");
	}
	
	public function write($id,$data)
	{
		return file_put_contents("$this->savePath/sess_$id",$data) === false?false:true;
	}
	
	public function destroy($id)
	{
		$file = "$this->savePath/sess_$id";
		if(file_exists($file))
		{
			unlink($file);
		}
		return true;
	}
	
	public function gc($maxlifetime)
	{
		foreach( glob("$this->savePath/sess_*") as $file)
		{
			if( filemtime($file)+$maxfiletime<time() && file_exists($file))
			{
				unlink($file);
			}
		}
		return true;
	}
	
}

/*test*/
$handler = new FileSessionHandler();
session_set_save_handler(
	array($handler,'open'),
	array($handler,'close'),
	array($handler,'read'),
	array($handler,'write'),
	array($handler,'destroy'),
	array($handler,'gc')
);

//the following prevents unexcepted effects when using objects as save handlers
register_shutdown_function('session_write_close');
session_start();
//proceed to set and retrieve values by key from $_SESSION
$path = 'E:/Github/PHP/session/tmp';
$handler->open($path,'user');
/* $handler->write(1,array('substr'));
$handler->destroy(1); */
$_SESSION['name'] = array('substr');
var_dump($_SESSION['name']);