<?php

class DatabaseInterface
{
public function getAllColors()
{
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
}
}

?>