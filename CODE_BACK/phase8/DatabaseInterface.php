<?php

class DatabaseInterface
{

private $con;
public function __construct()
{
	$this->con=mysqli_connect(getenv('DB_IP'),getenv('DB_NAME'),getenv('DB_USER'),getenv('DB_PASSWORD'),getenv('DB_PORT'));

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

public function getColorById($id,$colorname)
{
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

}

?>