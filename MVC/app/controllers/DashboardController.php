<?php

namespace Link\Controllers;
use  Link\Models\Links;

 class DashboardController extends ViewController{

	public function post()
	{


		session_start();
		if(!($_SESSION['open']))
		{
			$this->render('home.html');
		}
		else
		{


		    if(isset($_POST['AddBtn']))
		    {



        
		    	$link = $_POST['link'];
		    	$username = $_SESSION['username'];
		    	$addlink = Links::AddLink($link , $username);
		    	

		    	if($addlink)
		    	{


		    		
		    		//echo "link added";
		    		$this->render('dashboard.html');
		    	}
		    	else
		    	{

		    		
		            $this->render('dashboard.html');      

		    	}	
		    }

		    
		    

		}
	}

	public function get()
	{
                
			    session_start();
		    	$username = $_SESSION['username'];
		    	$linkdata = Links::GetLinks(
		    		$username);
		    	
		    	$this->render('dashboard.html',["links"=>$linkdata]);

		    
			
        
	}
	
}

 ?>