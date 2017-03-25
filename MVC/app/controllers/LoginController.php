<?php
    namespace Link\Controllers;
    
    use  Link\Models\Users;

     class LoginController extends ViewController{

    	public function post()
    	{
        
    		
    		    if(isset($_POST['LoginBtn']))
    		    {
    			    $username = $_POST['username'];
    			    $password = $_POST['password'];

    			    $data = ['username'=> $username , 'password' => $password];

    			    $ifuser = Users::ifuser($data);
    			    if($ifuser)
    			    {
                        session_start();
                        $_SESSION['username'] = $username;
                        $_SESSION['open'] = true;

                        //header("location:dashboard.html");
                        $this->render('dashboard.html');  

    			    }
                    else
                    {
                        $this->render('login.html');
                    }
    		    }

    		    else
    		    {
    		    	//echo "soory some error occured";
    		    	//header("location:login.html");
                    $this->render('login.html');
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
    			//header("location:login.html");
    			// echo "some thing went wrong";
                $this->render('login.html');
    		}



        }
    }
  ?>
