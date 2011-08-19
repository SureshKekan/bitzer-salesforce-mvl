<?php session_start();

if(empty ($_SESSION["username"]) || empty ($_SESSION["password"]))
{
    header("Location: ../../login.php");
}

?>
<html>
    <body>
        <table data-bitzer-view-name="opportunities-view"
               data-bitzer-title="Opportunities"
               data-bitzer-desc="Salesforce Opportunities"
               data-bitzer-component="opportunities"
               data-bitzer-view-style="FOUR_CELLS"
               data-bitzer-sort-fields="Name"
               data-bitzer-title-color="#E0C31B"
               width="100%" id="opportunities-view" >
                 <tr>
              	    <th data-bitzer-field="Name"></th>
                    <th data-bitzer-field="Amount"></th>
                    <th data-bitzer-field="StageName"
                        data-bitzer-show-label="true"></th>
                    <th data-bitzer-field="LeadSource"
                        data-bitzer-show-label="true"></th>
                </tr>
        </table>
    </body>
</html>