<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
include'connector.php';
include'DatabaseInterface.php';

if (isset($_GET['action'])) 
{
	if (function_exists($_GET['action'])) 
	{
		call_user_func($_GET['action']);
	}
}

function getAllColors()
{

$ds=new DatabaseInterface();
$ds->getAllColors();

/* 
$con=getConnector();
$stmt=$con->prepare("select * from color");
$stmt->execute();
$stmt->bind_result($id,$colorname);	

while ($stmt->fetch()) 
{
	echo  $id."<br>";
	echo  $colorname."<br>";
}
$stmt->close();
$con->close();
*/
}


?>