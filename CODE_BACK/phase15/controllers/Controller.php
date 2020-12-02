<?php

namespace App\Controllers;
use App\Data\DatabaseInterface;

abstract class Controller
{
	protected $repo;
	public function __construct()
	{
		$this->repo=new SQLRepo();
	}
	protected $repo;
	protected function response($code,$msg)
	{
		http_response_code($code);
		echo json_encode($msg);
	}
}


?>