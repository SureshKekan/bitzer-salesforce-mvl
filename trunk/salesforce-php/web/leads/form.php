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
        <title>Leads - Bitzer</title>
    </head>
    <body>
            <form name="leads"
                     action="save.php"
		     method="POST"
                     enctype="multipart/form-data"
                     data-bitzer-data-url="data.php"
                     data-bitzer-desc="Salesforce Leads"
                     data-bitzer-online-only="true"
                     data-bitzer-pagination="true"
                     data-bitzer-read-only="true"
                     data-bitzer-sync-scheme="WEBAPP_SOFT"
                     data-bitzer-title="Leads"
                     data-bitzer-type="COMPONENT"
                     >

                    <input type="hidden" name="Id" value=""
                           data-bitzer-primary-key="true"
                           data-bitzer-type="string">

                    <table class="leadsForm" width="100%">

                        <tr>
                            <td>
                                <input
                                       type="text"
                                       name="Salutation"
                                       value=""
                                       data-bitzer-label="Salutation"
                                       data-bitzer-type="salutation"
                                       data-bitzer-help-text="Salutation"
                                       data-bitzer-display-group-name="LeadInfo"
                                       data-bitzer-display-group-order="1"
                                       data-bitzer-display-group-title="Lead Information"
                                />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input
                                       type="text"
                                       name="FirstName"
                                       value=""
                                       data-bitzer-label="First Name"
                                       data-bitzer-type="firstName"
                                       data-bitzer-help-text="First Name"
                                       data-bitzer-display-group-name="LeadInfo"
                                />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input
                                       type="text"
                                       name="LastName"
                                       value=""
                                       data-bitzer-label="Last Name"
                                       data-bitzer-type="lastName"
                                       data-bitzer-help-text="Last Name"
                                       data-bitzer-display-group-name="LeadInfo"
                                />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input
                                       type="text"
                                       name="Title"
                                       value=""
                                       data-bitzer-label="Title"
                                       data-bitzer-type="title"
                                       data-bitzer-help-text="Title"
                                       data-bitzer-display-group-name="LeadInfo"
                                />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input
                                       type="text"
                                       name="Company"
                                       value=""
                                       data-bitzer-label="Company"
                                       data-bitzer-type="string"
                                       data-bitzer-help-text="Company"
                                       data-bitzer-display-group-name="LeadInfo"
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
                                       data-bitzer-display-group-name="LeadInfo"
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
                                       data-bitzer-display-group-name="LeadInfo"
                                />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input
                                       type="text"
                                       name="MobilePhone"
                                       value=""
                                       data-bitzer-label="Mobile"
                                       data-bitzer-type="cell"
                                       data-bitzer-help-text="Mobile"
                                       data-bitzer-display-group-name="LeadInfo"
                                />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input
                                       type="text"
                                       name="Street"
                                       value=""
                                       data-bitzer-label="Street"
                                       data-bitzer-type="street"
                                       data-bitzer-help-text="Street"
                                       data-bitzer-display-group-name="LeadInfo"
                                />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input
                                       type="text"
                                       name="City"
                                       value=""
                                       data-bitzer-label="City"
                                       data-bitzer-type="city"
                                       data-bitzer-help-text="City"
                                       data-bitzer-display-group-name="LeadInfo"
                                />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input
                                       type="text"
                                       name="PostalCode"
                                       value=""
                                       data-bitzer-label="Postal Code"
                                       data-bitzer-type="zip"
                                       data-bitzer-help-text="Postal Code"
                                       data-bitzer-display-group-name="LeadInfo"
                                />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input
                                       type="text"
                                       name="Country"
                                       value=""
                                       data-bitzer-label="Country"
                                       data-bitzer-type="country"
                                       data-bitzer-help-text="Country"
                                       data-bitzer-display-group-name="LeadInfo"
                                />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input
                                       type="text"
                                       name="LeadSource"
                                       value=""
                                       data-bitzer-label="Source"
                                       data-bitzer-type="string"
                                       data-bitzer-help-text="Lead Source"
                                       data-bitzer-display-group-name="LeadInfo"
                                />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input
                                       type="text"
                                       name="Status"
                                       value=""
                                       data-bitzer-label="Status"
                                       data-bitzer-type="string"
                                       data-bitzer-help-text="Status"
                                       data-bitzer-display-group-name="LeadInfo"
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