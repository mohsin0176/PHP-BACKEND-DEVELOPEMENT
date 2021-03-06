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
	echo json_encode($output);
	$stmt->close();
	$con->close();

}


function createColor()
 {
 	if ($_GET['color']) 
 	{
 	$con=getConnector();
 	$stmt=$con->prepare("INSERT INTO color(color_name) VALUES(?)");
 	$stmt->bind_param("s",$_GET['color']);
 	$stmt->execute();
 	$stmt->close();
 	$con->close();
 	}
 }

 function getColorById()
	
	{

if (isset($_GET['id'])) 
{
	$con=getConnector();
	$stmt=$con->prepare("SELECT *FROM color WHERE id=?");
	$stmt->bind_param("i",$_GET['id']);
	$stmt->execute();
	$stmt->bind_result($id,$colorName);

	while($stmt->fetch())
	{
		 $output[]=array(
		 	'id'=>$id,
		 	'color_name'=>$colorName;
		 );
	}
	echo json_encode($output);
	$stmt->close();
	$con->close();
}


	
	}


?>