<?php

function getConnector()
{
	return mysqli_connect("localhost","root","","color_db");
}

?>