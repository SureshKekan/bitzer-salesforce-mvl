<?php session_start();

if(empty ($_SESSION["username"]) || empty ($_SESSION["password"]))
{
    header("Location: ../../login.php");
}

?>
<html>
    <body>
        <table data-bitzer-view-name="documents-view"
               data-bitzer-title="Documents"
               data-bitzer-desc="Salesforce Documents"
               data-bitzer-component="documents"
               data-bitzer-view-style="SIMPLE"
               data-bitzer-sort-fields="Name"
               data-bitzer-title-color="#A70000"
               width="100%" id="documents-view">
                 <tr>
              	    <th data-bitzer-field-1="Name"
                        data-bitzer-field-2="Type"></th>
                </tr>
        </table>
    </body>
</html>