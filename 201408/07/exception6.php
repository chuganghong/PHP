<?php
/**
 *重新抛出异常
 */
class customException extends Exception
{
	public function errorMessage()
	{
		$errorMsg = '<b>' . $this->getMessage() . '</b> is not a valid E-Mail address.';
		return $errorMsg;
	}
}

$email = 'someone@examplecom';

try
{
	try
	{
		/* if(strpos($email,'example') !== FALSE)
		{
			throw new Exception($email);
		} */
		if(filter_var($email,FILTER_VALIDATE_EMAIL) === FALSE)
		{
			throw new Exception($email);
		}
	}
	catch(Exception $e)
	{
		throw new customException($email);
	}
}
catch(customException $e)
{
	echo $e->errorMessage();
}