<?php 

if (! function_exists('flash')) 
{
	/**
	 * flash a new message using the session flash
	 * @param  [string] $message
	 * @return 
	 */
	function flash($message)
	{
		return session()->flash('message', $message);
	}
}


 ?>
