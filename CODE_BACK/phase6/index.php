<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

include'DatabaseInterface.php';

if (isset($_GET['action']) && isset($_GET['controller'])) 
{
	if (class_exists($_GET['controller'])) 
	{
		$ds=new $_GET['controller'];
		$s=$_GET['action'];
		$ds->$s();
		$ds->$_GET['action']();


	}
}

 


?>