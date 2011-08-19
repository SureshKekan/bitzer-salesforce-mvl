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
        <title>Contacts - Bitzer</title>
    </head>
    <body>
            <form name="contacts"
                     action="save.php"
		     method="POST"
                     enctype="multipart/form-data"
                     data-bitzer-data-url="data.php"
                     data-bitzer-desc="Salesforce Contacts"
                     data-bitzer-online-only="true"
                     data-bitzer-pagination="true"
                     data-bitzer-read-only="true"
                     data-bitzer-sync-scheme="WEBAPP_SOFT"
                     data-bitzer-title="Contacts"
                     data-bitzer-type="CONTACT"
                     >

                    <input type="hidden" name="Id" value=""
                           data-bitzer-primary-key="true"
                           data-bitzer-type="string">

                    <table class="contactsForm" width="100%">

                        <tr>
                            <td>
                                <input
                                       type="text"
                                       name="Salutation"
                                       value=""
                                       data-bitzer-label="Salutation"
                                       data-bitzer-type="salutation"
                                       data-bitzer-help-text="Salutation"
                                       data-bitzer-display-group-name="ContactInfo"
                                       data-bitzer-display-group-order="1"
                                       data-bitzer-display-group-title="Contact Information"
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
                                       data-bitzer-display-group-name="ContactInfo"
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
                                       data-bitzer-display-group-name="ContactInfo"
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
                                       data-bitzer-display-group-name="ContactInfo"
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
                                />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input
                                       type="text"
                                       name="MailingStreet"
                                       value=""
                                       data-bitzer-label="Street"
                                       data-bitzer-type="street"
                                       data-bitzer-help-text="Mailing Street"
                                       data-bitzer-display-group-name="ContactInfo"
                                />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input
                                       type="text"
                                       name="AccountId"
                                       value=""
                                       data-bitzer-label="Account ID"
                                       data-bitzer-type="string"
                                       data-bitzer-help-text="Account ID"
                                       data-bitzer-display-group-name="ContactInfo"
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
                                       data-bitzer-display-group-name="ContactInfo"
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