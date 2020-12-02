<?php

/**
 * 
 */
class ColorController extends DatabaseInterface
{
	
public function getAllColors()
{
	$colors=$this->repo->getAllColors();
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