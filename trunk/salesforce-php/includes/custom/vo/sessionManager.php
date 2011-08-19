<?php
/**
 *
 * @author uishaq
 */
if (file_exists("../../includes/contrib"))
{
    $includePath = "../../includes/";
}
else if(file_exists("includes/contrib"))
{
    $includePath = "includes/";
}

require_once $includePath . 'contrib/developerforce/soapclient/SforcePartnerClient.php';

class SessionManager
{
    public static $sfClient;
    public static $sfWsdl;
    public static $includePath;

    private static $username;
    private static $password;

    protected function SessionManager()
    {
        
    }

    public static function getClient()
    {
        if(is_null(SessionManager::$sfClient))
        {
            SessionManager::setIncludePath();
            SessionManager::loadProperties();

            SessionManager::$sfWsdl = SessionManager::$includePath . "contrib/wsdl/partner.wsdl";
            
            SessionManager::$sfClient = new SforcePartnerClient();

            $soapClient = SessionManager::$sfClient->createConnection(SessionManager::$sfWsdl);

            $sfLoginResult = SessionManager::$sfClient->login(SessionManager::$username, SessionManager::$password);

            // Store SOAP client attributes for later use
            $_SESSION['sforceLocation'] = SessionManager::$sfClient->getLocation();
            $_SESSION['sforceSessionId'] = SessionManager::$sfClient->getSessionId();
        }

        return SessionManager::$sfClient;
    }

    protected static function setIncludePath()
    {
        if (file_exists("../../includes/contrib"))
        {
            SessionManager::$includePath = "../../includes/";
        }
        else if(file_exists("includes/contrib"))
        {
            SessionManager::$includePath = "includes/";
        }
    }

    private static function loadProperties()
    {
        $filePath = SessionManager::$includePath . "custom/";

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
                SessionManager::$username = trim($value);
            }
            elseif (strpos($line, "Password") !== false)
            {
                // if the current line contains 'password' then this value is for 'password'
                SessionManager::$password = trim($value);
            }
       	}

	fclose($fp);
    }
}
?>