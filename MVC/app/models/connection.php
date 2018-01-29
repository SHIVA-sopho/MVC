<?php

namespace Link\Models;

class Connection{



public  function connect(){
try{
	 $server = "";
 $database = "";
 $user = "";
 $pass = "";
	$conn = new \PDO("mysql:host=$server;dbname=$database", $user , $pass);
	$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	echo "connection failed". $e.getMessage();
}
return $conn;
}
}
