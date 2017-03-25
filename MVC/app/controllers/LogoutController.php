<?php 
namespace Link\Controllers;

 class LogoutController extends ViewController{

    public function post()
    {
           session_start();
        if(isset($_SESSION['username']))
        {
            $this->render('dashboard.html'); 
        }
        else
        {
            
            $this->render('login.html');
        }   
    	
    }

    public function get()
    {
       session_start();
       if($_SESSION['open'])
       {
        
            session_destroy();
            $this->render('login.html');
       
        }
        else
        {
            $this->render('home.html');
        }

    }


}

?>