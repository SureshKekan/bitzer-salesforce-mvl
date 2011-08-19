<?php
/**
 *
 * @author uishaq
 */

require_once 'includes/contrib/developerforce/soapclient/SforcePartnerClient.php';
include("salesforceBAL.php");

class LoginBAL extends SalesforceBAL
{
    private $username;
    private $password;

    public function  __construct()
    {
        $this->sfClient = new SforcePartnerClient();

        $this->setIncludePath();
        
        $soapClient = $this->sfClient->createConnection($this->sfWsdl);
    }

    public function checkCredentials($username, $password)
    {
        $loginResponse = $this->login($username, $password);

        return $loginResponse;
    }
    
    public function login($username, $password)
    {
        $loginResult = 0;

        try
        {
            $this->sfLoginResult = $this->sfClient->login($username, $password);

            $loginResult = 1;
        }
        catch(Exception $loginEx)
        {
            return $loginResult;
        }

        return $loginResult;
    }

    public function logout()
    {
        if(!empty($_SESSION['sforceLocation']) && !empty($_SESSION['sforceSessionId']))
        {
            $this->sfLoginResult = $this->sfClient->logout();
        }
    }

    public function setProperties($username, $password)
    {
        if (file_exists("includes/custom"))
        {
            $filePath="includes/custom/";
        }
        else if (file_exists("../includes/custom"))
        {
            $filePath="../includes/custom/";
        }
        else if (file_exists("../../includes/custom"))
        {
            $filePath="../../includes/custom/";
        }

        $fp = fopen($filePath."login.properties", "w") or die ("Could not open ".$filePath."login.properties file");

        fwrite($fp, "Username=" . $username);
        fwrite($fp, "\nPassword=" . $password);

        fclose($fp);
    }

    private function loadProperties()
    {
        if (file_exists("includes/custom"))
        {
            $filePath="includes/custom/";
        }
        else if (file_exists("../includes/custom"))
        {
            $filePath="../includes/custom/";
        }
        else if (file_exists("../../includes/custom"))
        {
            $filePath="../../includes/custom/";
        }

        $fp = fopen($filePath."login.properties", "r") or die ("Could not open ".$filePath."login.properties file");

        // iterate through all the lines
	while ($line = fgets($fp))
	{
            // getting the value of the property
            $valueIndex = stripos($line, "=");
            $value = substr($line, $valueIndex +1);


            if (strpos($line, "Username") !== false)
            {
                // if the current line contains 'username' then this value is for 'username'
		$this->username = trim($value);
            }
            elseif (strpos($line, "Password") !== false)
            {
                // if the current line contains 'password' then this value is for 'password'
		$this->password = trim($value);
            }
       	}

	fclose($fp);
    }
}
?>