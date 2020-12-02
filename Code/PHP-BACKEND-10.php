<?php

include_once 'PHP-BACKEND-09.php';
$ds=new ColorController();
$ds->setupEnv();

abstract class NewDatabaseInterface
{
	protected $con;
	public function __construct()
	{
		$this->con=mysqli_connect(getenv('DB_IP'),getenv('DB_USER'),getenv('DB_PASSWORD'),getenv('DB_NAME'),getenv('DB_PORT'));
	}
}

class ColorController extends DatabaseInterface
{
	function setupEnv()
		{
	$handle=fopen(".env","r");
	if ($hnadle) 
		{
		while(($line=fgets($handle)) !==false)
		{
			putenv(trim($line));
		}
		fclose($handle);
		}
}

?>