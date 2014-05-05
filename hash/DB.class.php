<?php
/**
 *@description 抄自书上的Key-Value形式的小型数据库代码
 *@date 2014/05/02 13:36
 */
define('DB_INSERT',1);
define('DB_REPLACE',2);
define('DB_STORE',3);

define('DB_BUCKET_SIZE',262144);
define('DB_KEY_SIZE',128);
define('DB_INDEX_SIZE',DB_KEY_SIZE + 12);

define('DB_KEY_EXISTS',1);
define('DB_FAILURE',-1);
define('DB_SUCCESS',0);

class DB
{
	private $idx_fp;
	private $dat_fp;
	private $closed;
	
	public function open($pathname)
	{
		$idx_path = $pathname . '.idx';
		$dat_path = $pathname . '.dat';
		
		if(!file_exists($idx_path))
		{
			$init = true;
			$mode = 'w + b';
		}
		else
		{
			$init = false;
			$mode = 'r + b';
		}
		
		$this->idx_fp = fopen($idx_path,$mode);
		if(!this->idx_fp)
		{
			return DB_FAILURE;
		}
	}
}