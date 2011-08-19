<?php session_start();

if(empty ($_SESSION["username"]) || empty ($_SESSION["password"]))
{
    header("Location: ../../login.php");
}

?>
<html>
    <body>
        <table data-bitzer-view-name="leads-view"
               data-bitzer-title="Leads"
               data-bitzer-desc="Salesforce Leads"
               data-bitzer-component="leads"
               data-bitzer-view-style="SIMPLE"
               data-bitzer-sort-fields="FirstName, LastName"
               data-bitzer-title-color="#E39321"
               data-bitzer-search-on-start="true"
               width="100%" id="leads-view">
                 <tr>
              	    <th data-bitzer-field-1="Salutation"
                        data-bitzer-field-2="FirstName"
                        data-bitzer-field-3="LastName"></th>
                </tr>
        </table>
    </body>
</html>