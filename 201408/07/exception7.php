<?php
/**
 *Top Level Exception Handler
 */
function exception_handler($exception)
{
	echo 'Uncaught exception: ' , $exception->getMessage(), "<br />";
}


function checkNumber($number)
{
	if($number>1)
	{
		throw new Exception('Value must be 1 or below.');
	}
}

set_exception_handler('exception_handler');

// throw new Exception('Uncaught Exception');
echo 'Not Executed<br />';

checkNumber(2);