<?php

echo $_GET['myVar1'];
echo $_GET['myVar2'];

if (isset($_GET['action'])) 
{
     if (function_exists($_GET['action'])) 
     {
      	call_user_func($_GET['action']);
     } 
}

function printsMyNameFromTheDB()
{
	echo "Mohsin";
}

?>