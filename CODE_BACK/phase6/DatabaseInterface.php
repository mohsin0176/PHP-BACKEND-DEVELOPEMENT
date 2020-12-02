<?php

class DatabaseInterface
{

private $con;
public function __construct()
{
	$this->con=mysqli_connect("localhost","root","","color_db");

}

public function getAllColors()
{
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
}
}

?>