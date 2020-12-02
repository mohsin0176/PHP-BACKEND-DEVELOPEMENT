<?php


if (isset($_GET['action'])) 
{
	if (function_exists($_GET['action'])) 
	{
		call_user_func($_GET['action']);
	}
}

function printsMyNameFromTheDB()
{
	echo "Victor";
}

?>