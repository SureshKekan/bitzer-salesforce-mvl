<?php

class UserAgent {

	var $products;
	var $agent;
	
	function UserAgent() {
		
		$agent = $_SERVER['HTTP_USER_AGENT'];

		$this->products = $this->parseUserAgent($agent);
	}

function parseUserAgent($agent)
  {

    $userAgent = array();
    $products = array();
	

    $pattern  = "([^/[:space:]]*)" . "(/([^[:space:]]*))?"
      ."([[:space:]]*\[[a-zA-Z][a-zA-Z]\])?" . "[[:space:]]*"
      ."(\\((([^()]|(\\([^()]*\\)))*)\\))?" . "[[:space:]]*";

    while( strlen($agent) > 0 )
      {
        if ($l = ereg($pattern, $agent, $a))
          {
            // product, version, comment
            array_push($products, array("product" => $a[1],    // Product
                                        "version" => $a[3],    // Version
                                        "comment" => $a[6]));  // Comment
            $agent = substr($agent, $l);
          }
        else
          {
            $agent = "";
          }
      }
	  return $products;
  }
  
  function getProduct($productName) {
  	
  	// Directly catch these
    foreach($this->products as $product)
      {
	  	if ($product["product"] == $productName) {
			return $product;
		}	
        
       }
	  return '';

    }
	
	function getBitzerFramework() {
		return $this->getProduct("BitzerFramework"); 
	}
	
	function getBitzerApp() {
		return $this->products[2];
	}
	
	function isBitzer() {
		if ($this->getBitzerFramework())
			return true;
		else
			return false;
	}
}

/*
$userAgent = new UserAgent();
$isBitzer = $userAgent->isBitzer();
if ($isBitzer) {
	$bitzerFramework = $userAgent->getBitzerFramework();
	$bitzerApp = $userAgent->getBitzerApp();
}*/
 
?>