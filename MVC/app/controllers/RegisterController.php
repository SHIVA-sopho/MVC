<?php 
namespace Link\Controllers;
use Link\Models\Users;
class RegisterController extends ViewController{


  //for validation
     public function post(){
      session_start();
      
      if(isset($_SESSION['open']))
      {
        $username = $_SESSION['username'];
        $this->render('dashboard.html',["user"=>$username]);
      }

     	if(isset($_POST['RegBtn']))
     	{

               $username = $_POST['username'];
               $password = $_POST['password'];
               $cnfpwd = $_POST['cnfpwd'];
               $phno = $_POST['phno'];
               
               $data = ['username'=> $username , 'password' => $password, 'cnfpwd' => $cnfpwd , 'phno'=>$phno];
              $validate = Users::validate($data);
              $value = $validate['value'];
              $msg = $validate['msg'];

               if($value)
               {
               
               	$register = Users::Adduser($data);
               	if($register)
               	{
               		
                         //header("location:login.html");
                         
                         $this->render('login.html',["user" =>$username]);

               	}
               	else
               	{

               		echo "User already exists";
               		//$this->render('home.html');
               		//header("location:/");
                         $this->render('register.html');

               	}
               }
          } else {
            
            
     		echo "error".$msg;
               $this->render('register.html');
     	}

     }

     public function get()
        {
            session_start();
            if(isset($_SESSION['open']))
          {
               //header("location:dashboard.html"); 
               $this->render('dashboard.html');
               //echo " user already logged in ";

          } else
          {
               
                $this->render('register.html');
          }



        }
}
?>