<?php

class Security {

	public $mode;
 	
	public function __construct(){
        
		if (isset( $_SESSION['Appstrike-mode'] )){
			
			$this -> mode = $_SESSION['Appstrike-mode'];
		
		} else {
			
			$_SESSION['Appstrike-mode'] = 'low';
			$this -> mode = $_SESSION['Appstrike-mode'];	
		
		}
    }

    public function set_low_mode(){
    	
    	$_SESSION['Appstrike-mode'] = 'low';
    	$this -> mode = $_SESSION['Appstrike-mode'];

    }

    public function set_high_mode(){
    	
    	$_SESSION['Appstrike-mode'] = 'high';	
		$this -> mode = $_SESSION['Appstrike-mode'];
		    
    }

}