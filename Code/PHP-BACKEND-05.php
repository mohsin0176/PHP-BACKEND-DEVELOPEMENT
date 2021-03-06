<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
include'connector.php';


if (isset($_GET['action'])) /// Action is equal to function name
{
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
	public function getAlllColors()
	{
	$con=getConnector();
	$stmt=$con->prepare("SELECT *FROM color");
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
	$con->close();

	}
}

?>