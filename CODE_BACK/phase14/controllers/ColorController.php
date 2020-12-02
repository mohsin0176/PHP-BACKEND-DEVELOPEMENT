<?php

/**
 * 
 */

namespaces phase13\controllers;
use phase13\data\DatabaseInterface; 
use phase13\controllers\Controller;

class ColorController extends controller
{
	
public function getAllColors()
{
	$colors=$this->repo->getAllColors();
	$this->response(200,$colors);
	var_dump($colors);
/*
$con=$this->con;
$stmt=$this->con->prepare("select * from color");
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

public function getColorById($id,$colorname)
{
	$color=$this->repo->getColorById($id);
	var_dump($color);
	/*
	var_dump($colorname);
	$stmt=$this->con->prepare("select *from color where id=?");
	$stmt->bind_param("i",$id);

	$stmt->execute();
	$stmt->bind_result($id,$colorname);

	while ($stmt->fetch()) 
	{
		echo $id."<br>";
		echo $colorname."<br>";
	}
	$stmt->close();
	$this->con->close();
}
*/
}

?>