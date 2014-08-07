<?php
/**
 *多个异常
 */
class customException extends Exception
{
	public function errorMessage()
	{
		// error message
		$errorMsg = 'Error on line ' . $this->getLine() . ' in ' . $this->getFile() . ' : <b>' . $this->getMessage() . '</b> is not a valid E-Mail address';
		return $errorMsg;
	}
}

$email = 'someone@examplecom';

try
{
	if(filter_var($email,FILTER_VALIDATE_EMAIL) === FALSE)
	{
		throw new customException($email);
	}
	if(strpos($email,'example') !== FALSE)
	{
		throw new Exception($email . ' is an example e-mail');
	}	
}

catch(customException $e)
{
	echo $e->errorMessage();
}

catch(Exception $e)
{
	echo $e->getMessage();
}
