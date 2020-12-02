<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

setupEnv();
include'DatabaseInterface.php';
include'ColorController.php';
include'SQLRepo.php';

if (isset($_GET['action']) && isset($_GET['controller']) && $_GET['url']) 
{
	echo $route=$_GET['url'];
	if (class_exists($_GET['controller'])) 
	{   

		$x="phase13\\controllers\\ColorController\\".$_GET['colors'];
		$ds=new $_GET['controller'];
		$params=$_GET;
		unset($params['controller']);
		unset($params['action']);
		call_user_func_array(array($ds,$_GET['action']), $params);

	}
}

 
function setupEnv()
{
	$handle=fopen(".env", "r");
	if ($handle) 
	{
		while (($line=fgets($handle))!==false) 
		{
			putenv(trim($line));
		}
		fclose($handle);
	}
}

?>