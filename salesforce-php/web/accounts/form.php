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
        <title>Accounts - Bitzer</title>
    </head>
    <body>
            <form name="accounts"
                     action="save.php"
		     method="POST"
                     enctype="multipart/form-data"
                     data-bitzer-data-url="data.php"
                     data-bitzer-desc="Salesforce Accounts"
                     data-bitzer-online-only="true"
                     data-bitzer-pagination="true"
                     data-bitzer-read-only="true"
                     data-bitzer-sync-scheme="WEBAPP_SOFT"
                     data-bitzer-title="Accounts"
                     data-bitzer-type="COMPONENT"
                     data-bitzer-detail-table-id="account-details">

                    <input type="hidden" name="Id" value=""
                           data-bitzer-primary-key="true"
                           data-bitzer-type="string">

                    <table class="accountsForm" width="100%">

                        <tr>
                            <td>
                                <input
                                       type="text"
                                       name="Name"
                                       value=""
                                       data-bitzer-label="Name"
                                       data-bitzer-type="string"
                                       data-bitzer-help-text="Name"
                                       data-bitzer-display-group-name="AccountInfo"
                                       data-bitzer-display-group-order="1"
                                       data-bitzer-display-group-title="Account Information"
                                />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input
                                       type="text"
                                       name="Type"
                                       value=""
                                       data-bitzer-label="Type"
                                       data-bitzer-type="string"
                                       data-bitzer-help-text="Type"
                                       data-bitzer-display-group-name="AccountInfo"
                                />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input
                                       type="text"
                                       name="Industry"
                                       value=""
                                       data-bitzer-label="Industry"
                                       data-bitzer-type="string"
                                       data-bitzer-help-text="Industry"
                                       data-bitzer-display-group-name="AccountInfo"
                                />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input
                                       type="text"
                                       name="Website"
                                       value=""
                                       data-bitzer-label="Website"
                                       data-bitzer-type="url"
                                       data-bitzer-help-text="Website"
                                       data-bitzer-display-group-name="AccountInfo"
                                />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input
                                       type="text"
                                       name="Phone"
                                       value=""
                                       data-bitzer-label="Phone"
                                       data-bitzer-type="tel"
                                       data-bitzer-help-text="Phone"
                                       data-bitzer-display-group-name="ContactInfo"
                                       data-bitzer-display-group-order="2"
                                       data-bitzer-display-group-title="Contact Information"
                                />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input
                                       type="text"
                                       name="Fax"
                                       value=""
                                       data-bitzer-label="Fax"
                                       data-bitzer-type="fax"
                                       data-bitzer-help-text="Fax"
                                       data-bitzer-display-group-name="ContactInfo"
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
                                       data-bitzer-display-group-name="AccountInfo"
                                 ></textarea>
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

        <table id="account-details"
               data-bitzer-detail-section-title="Related Information">
            <tr data-bitzer-component="contacts">
                <td data-bitzer-master-field="Id"
                    data-bitzer-detail-field="AccountId">
                </td>
            </tr>
            <tr data-bitzer-component="opportunities">
                <td data-bitzer-master-field="Id"
                    data-bitzer-detail-field="AccountId">
                </td>
            </tr>
        </table>

    </body>
</html>