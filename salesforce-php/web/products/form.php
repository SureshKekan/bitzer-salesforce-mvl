<?php session_start();

if(empty ($_SESSION["username"]) || empty ($_SESSION["password"]))
{
    header("Location: ../../login.php");
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>Products - Bitzer</title>
    </head>
    <body>
            <form name="products"
                     action="save.php"
		     method="POST"
                     enctype="multipart/form-data"
                     data-bitzer-data-url="data.php"
                     data-bitzer-desc="Salesforce Products"
                     data-bitzer-online-only="true"
                     data-bitzer-pagination="true"
                     data-bitzer-read-only="true"
                     data-bitzer-sync-scheme="WEBAPP_SOFT"
                     data-bitzer-title="Products"
                     data-bitzer-type="COMPONENT"
                     >

                    <input type="hidden" name="Id" value=""
                           data-bitzer-primary-key="true"
                           data-bitzer-type="string">

                    <table class="productsForm" width="100%">

                        <tr>
                            <td>
                                <input
                                       type="text"
                                       name="Name"
                                       value=""
                                       data-bitzer-label="Name"
                                       data-bitzer-type="string"
                                       data-bitzer-help-text="Document Name"
                                       data-bitzer-display-group-name="ProductInfo"
                                       data-bitzer-display-group-order="1"
                                       data-bitzer-display-group-title="Product Information"
                                />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input
                                       type="text"
                                       name="ProductCode"
                                       value=""
                                       data-bitzer-label="Product Code"
                                       data-bitzer-type="string"
                                       data-bitzer-help-text="Product Code"
                                       data-bitzer-display-group-name="ProductInfo"
                                />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <textarea
                                       name="Description"
                                       cols="35"
                                       rows="6"
                                       data-bitzer-label="Description"
                                       data-bitzer-short-label="Desc"
                                       data-bitzer-help-text="Description"
                                       data-bitzer-display-group-name="ProductInfo"
                                 ></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input
                                       type="text"
                                       name="IsActive"
                                       value=""
                                       data-bitzer-label="Active"
                                       data-bitzer-type="string"
                                       data-bitzer-help-text="If product is active"
                                       data-bitzer-display-group-name="ProductInfo"
                                />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input
                                       readonly
                                       type="text"
                                       name="last_modified_on"
                                       value=""
                                       data-bitzer-label="Modified On"
                                       data-bitzer-help-text="The record was last modified on this date."
                                       data-bitzer-type="datetime"
                                       data-bitzer-read-only="true"
                               />
                            </td>

                        </tr>
             </table>
      </form>

    </body>
</html>