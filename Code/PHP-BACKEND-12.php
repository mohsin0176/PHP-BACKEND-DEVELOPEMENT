<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
setupEnv();

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

class DatabaseInterface extends NewDatabaseInterface
{   

	private $con;

	$stmt->bind_result($id,$colorName);

	public function __construct()
	{
	$this->con=mysqli_connect(getenv('DB_IP'),getenv('DB_USER'),getenv('DB_PASSWORD'),getenv('DB_NAME'),getenv('DB_PORT'));
	}

	public function getAllColors()
	{
	$stmt=$this->con->prepare("SELECT *FROM color");
	$stmt->execute();
	$stmt->close();
	$this->con->close();

	}

	public function getColorById($id)
	
	{

	$stmt=$con->prepare("SELECT *FROM color WHERE id=?");
	$stmt->bind_param("i",$id);
	$stmt->execute();
	$stmt->bind_result($id,$colorName);

	while($stmt->fetch())
	{
		 $output[]=array(
		 	'id'=>$id,
		 	'color_name'=>$colorName;
		 );
	}
	
	$stmt->close();
	$this->con->close();
	}
}


class ColorController extends NewDatabaseInterface
{
	public function getAllColors()
	{
		$colors=$this->repo->getAllColors();
	}
	public function getColorById($id)
	{
		$color=$this->repo->getColorById($id);
	}
}


abstract class NewDataBaseInterface extends SQLRepo
{
	protected $repo;

	public function __construct()
	{
		$this->repo=new SQLRepo();
	}
}

class SQLRepo 
{

	public function __construct()
	{
		$this->con=mysqli_connect(getenv('DB_IP'),getenv('DB_USER'),getenv('DB_PASSWORD'),getenv('DB_NAME'),getenv('DB_PORT'));
	}

	public function getAllColors()
	{
	
	$stmt=$this->con->prepare("SELECT *FROM color");
	$stmt->execute();
	$stmt->bind_result($id,$colorName);
	$content=[];

	while($stmt->fetch())
	{
		array_push($content,$colorName); 
	}	 
	$stmt->close();
	$this->con->close();
	return $content;

	}

	public function getColorById($id,$name)
	{
		var_dump($name);
		$stmt=$this->con->prepare("SELECT *FROM color where id=?");
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$stmt->bind_result($id,$colorName);
		while ($stmt->fetch()) 
		{
			echo $id;
			echo $colorName;
		}
		$stmt->close();
		$this->con->close();
	}
}

?>