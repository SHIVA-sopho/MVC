<?php

namespace Link\Models;
include_once 'connection.php';

 class Users {
 	
	public function Adduser($data = []) //or ($data) or ($data = array())
	{ 


		$con = Connection::connect();

		$username = $data['username'];
		$phno  = $data['phno'];
		$password = $data['password'];
		$adduser = "insert into users(name,phno,password) values('$username','$phno','$password')";
		$data1 = ['username'=>$username,"password" =>$password];
			if(self::ifuser($data1))
			{
				return false;
			}
       
		$result1 = $con->prepare($adduser); //conn is taken from connection.php
        $result1->execute();
		if($result1)
		{
			return true;
		}
		else
		{
			return false;

		}
	}

	public function ifuser($data)
	{
		$con = Connection::connect();
		$username = $data["username"];
		$pass = $data["password"];

		$ifuser = "select * from users where name = '$username' and password = '$pass'";

		$result2 = $con->prepare($ifuser);

		$result2->execute();
        
        $result2 = $result2->fetchALL();
		if(empty($result2))
		{
			
			return false;

		}
		else
		{
			echo "WELCOME ".$username;
			
			return true;
		}
	}


        public  function validate($data1 ){


          $msg = "account successfully created";
          $value = true;
         
          if(strlen($data1['username']) > 45 )
          {
            $msg = "invalid length of username (>3 && <45)";
            $value = false;

          }
          if(strlen($data1['phno']) != 10)
          {
            $msg = "please enter a vaid phone number";
            $value = false;
          }

          if($data1['password'] != $data1['cnfpwd'])
          {
            $msg = "passwords do not match";
            $value = false;
          }
        
          return ['value'=> $value, 'msg' => $msg];


     }
	
}

  ?>