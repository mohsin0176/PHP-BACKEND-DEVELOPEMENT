<?php
namespaces phase13\data;
abstract class DatabaseInterface
{

protected $repo;
public function __construct()
{
$this->repo=new SQLRepo();
}



}

?>