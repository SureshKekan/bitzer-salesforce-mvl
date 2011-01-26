<?php
session_start();
require_once 'config.php';
require_once ('../service/soapclient/SforcePartnerClient.php');
require_once ('../service/soapclient/SforceEnterpriseClient.php');

$logged_in = false;
$username 	= $_REQUEST['username'];
$password_token	= $_REQUEST['password']; // password should be password + security token
$password_token = $password_token.$salesforce_api_key;


try {

	$mySforceConnection = new SforceEnterpriseClient();
	$mySforceConnection->createConnection("../service/soapclient/enterprise.wsdl.xml");

	// Simple example of session management - first call will do
	// login, refresh will use session ID and location cached in
	// PHP session
	if (isset($_SESSION['enterpriseSessionId'])) {

		$location = $_SESSION['enterpriseLocation'];
		$sessionId = $_SESSION['enterpriseSessionId'];

		$mySforceConnection->setEndpoint($location);
		$mySforceConnection->setSessionHeader($sessionId);

		$logged_in = true;

	} else {
			
		$mySforceConnection->login($username, $password_token);
			
		$_SESSION['enterpriseLocation'] = $mySforceConnection->getLocation();
		$_SESSION['enterpriseSessionId'] = $mySforceConnection->getSessionId();

		$logged_in = true;

	}

} catch (Exception $e) {
	$logged_in = false;

}

if($logged_in === true)
{
	$_SESSION["status"] = "loginsuccess";
	$body .= 'loginsuccess';
	$redirect_url = $_SESSION["redirect_url"];

	$_SESSION["authenticated_user_id"] = $_REQUEST["username"];
	$_SESSION["sf_session_id"] = $_SESSION['enterpriseSessionId'];
	$_SESSION["unique_key"] = $server_unique_key;
	$_SESSION["sfusername"] = $username;
	$_SESSION["password_token"] = $password_token;
	
	if ($redirect_url == "")
	{
		$redirect_url = BASE_URL."library.php";
	}

	$url = 'Location: '.$redirect_url;
}
else
{
	 $_SESSION["status"] = "loginfailed";
	 $body .= 'loginfailed';
     $url = "Location:".BASE_URL."login.php";	
}
header($url);
?>
