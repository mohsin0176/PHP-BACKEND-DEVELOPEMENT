<?php

abstract class DatabaseInterface
{

private $con;
public function __construct()
{
	$this->con=mysqli_connect(getenv('DB_IP'),getenv('DB_NAME'),getenv('DB_USER'),getenv('DB_PASSWORD'),getenv('DB_PORT'));

}



}

?>