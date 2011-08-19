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
require_once $includePath . 'custom/vo/sessionManager.php';

class SalesforceBAL
{
    private $includePath;
    protected $sfClient;
    protected $sfLoginResult;
    protected $sfWsdl;

    public function validateSession()
    {
        $this->setIncludePath();

        //$this->sfClient = new SforcePartnerClient();
        $this->sfClient = SessionManager::getClient();
        
        //session reuse is not working for unknown reason
    }

    protected function setIncludePath()
    {
        if (file_exists("../../includes/contrib"))
        {
            $this->includePath = "../../includes/";
        }
        else if(file_exists("includes/contrib"))
        {
            $this->includePath = "includes/";
        }

        $this->sfWsdl = $this->includePath . "contrib/wsdl/partner.wsdl";
    }
}
?>