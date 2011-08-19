<?php session_start();

if(empty ($_SESSION["username"]) || empty ($_SESSION["password"]))
{
    header("Location: ../../login.php");
}

?>
<html>
    <body>
        <table data-bitzer-view-name="products-view"
               data-bitzer-title="Products"
               data-bitzer-desc="Salesforce Products"
               data-bitzer-component="products"
               data-bitzer-view-style="SIMPLE"
               data-bitzer-sort-fields="Name"
               data-bitzer-title-color="#0A6800"
               width="100%" id="products-view">
                 <tr>
              	    <th data-bitzer-field="Name"></th>
                </tr>
        </table>
    </body>
</html>