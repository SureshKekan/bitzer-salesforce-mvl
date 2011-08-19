<?php session_start();

if(empty ($_SESSION["username"]) || empty ($_SESSION["password"]))
{
    header("Location: ../../login.php");
}

?>
<html>
    <body>
        <table data-bitzer-view-name="accounts-view"
               data-bitzer-title="Accounts"
               data-bitzer-desc="Salesforce Accounts"
               data-bitzer-component="accounts"
               data-bitzer-view-style="FOUR_CELLS"
               data-bitzer-sort-fields="Name"
               data-bitzer-title-color="#236FBD"
               width="100%" id="accounts-view">
                 <tr>
              	    <th data-bitzer-field="Name"></th>
                    <th></th>
                    <th data-bitzer-field="Industry"
                        data-bitzer-show-label="true"></th>
                    <th data-bitzer-field="Type"
                        data-bitzer-show-label="true"></th>
                </tr>
        </table>
    </body>
</html>