<?php
session_start();

require_once '../includes/config.php';
require_once('../includes/SFApplication.php');
$app = new SFApplication(BASE_URL);
$app->checkSession('library.php', $server_unique_key);

require_once ('../service/soapclient/SforcePartnerClient.php');
require_once ('../service/soapclient/SforceEnterpriseClient.php');


$mySforceConnection = new SforceEnterpriseClient();
$mySforceConnection->createConnection("../service/soapclient/enterprise.wsdl.xml");

if (isset($_SESSION['enterpriseSessionId'])) {
	$location = $_SESSION['enterpriseLocation'];
	$sessionId = $_SESSION['enterpriseSessionId'];

	$mySforceConnection->setEndpoint($location);
	$mySforceConnection->setSessionHeader($sessionId);

} else {
	$mySforceConnection->login($_SESSION['sfusername'], $_SESSION['password_token']);

	$_SESSION['enterpriseLocation'] = $mySforceConnection->getLocation();
	$_SESSION['enterpriseSessionId'] = $mySforceConnection->getSessionId();

}

$query = "SELECT Id,Title, FirstName, LastName,Email,Department, Phone from Contact";
$response = $mySforceConnection->query($query);

                
?>
<html>
    <body> 

         <table data-bitzer-data="true"
              data-bitzer-component="Contacts">
         <tr>
             <th data-bitzer-field="expenseItemID" data-bitzer-key-order="1">Contact ID</th>
             <th data-bitzer-field="title">Title</th>
             <th data-bitzer-field="firstname">First Name</th>
             <th data-bitzer-field="lastname">Last Name</th>
             <th data-bitzer-field="email">Email</th>
             <th data-bitzer-field="department">Department</th>
             <th data-bitzer-field="phone">Phone</th>
         </tr>

   <?php
  foreach ($response->records as $record) {
       
        echo "<tr>";
        echo "<td>".$record->Id."</td>";
         echo "<td>".$record->Title."</td>";
        echo "<td>".$record->FirstName."</td>";
        echo "<td>".$record->LastName."</td>";
        echo "<td>".$record->Email."</td>";
         echo "<td>".$record->Department."</td>";
        echo "<td>".$record->Phone."</td>";
        echo "</tr>";

    }
     
  
?>
</table>
</body>
</html>
