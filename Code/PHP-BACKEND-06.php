<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);



if (isset($_GET['action'])) /// Action is equal to function name
{						/// GET variable is passable through get_id in URL
  if(function_exists($_GET['action']))
  {
  	call_user_func($_GET['action']);
  }
}

function getAllColors()
{
	$ds=new DatabaseInterface();
	$ds->getAllColors();
}

class DatabaseInterface
{   

	private $con;

	public function __construct()
	{
		$this->con=mysqli_connect("localhost","root","","color_db");
	}

	public function getAlllColors()
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
}

?>