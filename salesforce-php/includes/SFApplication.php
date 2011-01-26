<?php
require_once("browser_detection.php");

 class SFApplication{
 	
	
	var $appRoot = null;
	
 	
 	function SFApplication($app_name)
 	{

			$this->appRoot = $app_name;
		
	}
 	
	function checkSession($url, $server_unique_key) {
	
		
		$user_unique_key = (isset($_SESSION['unique_key'])) ? $_SESSION['unique_key'] : '';

		if (!isset($_SESSION["authenticated_user_id"]) || !isset($_SESSION["sf_session_id"]) || $user_unique_key != $server_unique_key) {

			// User not logged in, redirect to login page
			
			$_SESSION["redirect_url"] = $this->appRoot."library.php";
				
			Header("Location: ".$this->appRoot."login.php");
			exit ();
		} else {
			
		}
		
	}
		
	
	
	function endSession(){
		session_destroy();
	}
	
	
	function nameValuePairToSimpleArray($array){
    
		$my_array=array();
    	while(list($name,$value)=each($array)){
        	$my_array[$value['name']]=$value['value'];
    	}
    	return $my_array;
	} 
 	
 }



?>
