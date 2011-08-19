<?php session_start();

if(empty ($_SESSION["username"]) || empty ($_SESSION["password"]))
{
    header("Location: ../../login.php");
}

?>
<html>
    <body>
        <table data-bitzer-view-name="contacts-view"
               data-bitzer-title="Contacts"
               data-bitzer-desc="Salesforce Contacts"
               data-bitzer-component="contacts"
               data-bitzer-view-style="SIMPLE"
               data-bitzer-sort-fields="FirstName, LastName"
               data-bitzer-title-color="#57328E"
               width="100%" id="contacts-view">
                 <tr>
              	    <th data-bitzer-field-1="Salutation"
                        data-bitzer-field-2="FirstName"
                        data-bitzer-field-3="LastName"></th>
                </tr>
        </table>
    </body>
</html>