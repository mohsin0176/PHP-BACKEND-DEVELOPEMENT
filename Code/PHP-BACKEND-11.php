<?php

interface IRepository
{
   public function getAllColors();
   public function getColorById($id);
}

class SQLRepo implements IRepository
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

abstract class NewDataBaseInterface
{
	protected $repo;

	public function __construct()
	{
		$this->repo=new SQLRepo();
	}
}

class ColorController extends NewDataBaseInterface
{
$colors=$this->repo->getAllColors();
}


?>