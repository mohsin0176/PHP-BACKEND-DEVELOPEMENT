<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);


class DatabaseInterface
{   

	private $con;

	public function __construct()
	{
		$this->con=mysqli_connect("localhost","root","","color_db");
	}

	public function getAllColors()
	{
	
	$stmt=$this->con->prepare("SELECT *FROM color");
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

if (isset($_GET['action']) && isset($_GET['controller']))
{								// set action and controller name in url
	if (class_exists($_GET['controller'])) 
	{
		$ds=new $_GET['controller'];
		$params=$_GET;
		unset($params['controller']);
		unset($params['action']);
		call_user_func_array(array($ds,$_GET['action']),$params);

		//$ds=new $_GET['controller'];
		//$ds->$_GET['action']();
	}
}


?>