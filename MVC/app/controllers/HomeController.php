<?php
namespace Link\Controllers;

class HomeController extends ViewController{

	public function get(){

		/*echo "<script language = 'javascript'>
		           alert('home contoller GET request works')
		           </script>";*/
    
		
		    $this->render('home.html');
	    
	}
}

  ?> 
