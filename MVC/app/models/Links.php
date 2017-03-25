<?php
	namespace Link\Models;
    include_once 'connection.php';
	 class Links
	{

		public function AddLink($link)
		{
			$con = Connection::connect();
			
			$username = $_SESSION['username'];
			$query = "insert into links(name,links) values('$username','$link')";
			$result = $con->prepare($query);
			$result->execute();

			if($result)
			{
				return true;
			}
			else
			{
				return false;
			}	
		}
		public function GetLinks($username)
		{
			
			$con = Connection::connect();
			$query = "select links from links where name = '$username'";
			$result = $con->prepare($query);
			$result->execute();
			$links = $result->fetchAll();

            
			return $links;
                                             
		}

	} 
?>