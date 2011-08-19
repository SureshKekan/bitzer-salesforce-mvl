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
        <title>Opportunities - Bitzer</title>
    </head>
    <body>
            <form name="opportunities"
                     action="save.php"
		     method="POST"
                     enctype="multipart/form-data"
                     data-bitzer-data-url="data.php"
                     data-bitzer-desc="Salesforce Opportunities"
                     data-bitzer-online-only="true"
                     data-bitzer-pagination="true"
                     data-bitzer-read-only="true"
                     data-bitzer-sync-scheme="WEBAPP_SOFT"
                     data-bitzer-title="Opportunities"
                     data-bitzer-type="COMPONENT"
                     >

                    <input type="hidden" name="Id" value=""
                           data-bitzer-primary-key="true"
                           data-bitzer-type="string">

                    <table class="opportunitiesForm" width="100%">

                        <tr>
                            <td>
                                <input
                                       type="text"
                                       name="Name"
                                       value=""
                                       data-bitzer-label="Name"
                                       data-bitzer-type="string"
                                       data-bitzer-help-text="Name"
                                       data-bitzer-display-group-name="OpportunityInfo"
                                       data-bitzer-display-group-order="1"
                                       data-bitzer-display-group-title="Opportunity Information"
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
                                       data-bitzer-display-group-name="OpportunityInfo"
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
                                       data-bitzer-display-group-name="OpportunityInfo"
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
                                       data-bitzer-display-group-name="OpportunityInfo"
                                />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input
                                       type="text"
                                       name="Amount"
                                       value=""
                                       data-bitzer-label="Amount"
                                       data-bitzer-type="currency"
                                       data-bitzer-help-text="Amount"
                                       data-bitzer-display-group-name="OpportunityInfo"
                                />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input
                                       type="text"
                                       name="CloseDate"
                                       value=""
                                       data-bitzer-label="Close Date"
                                       data-bitzer-type="datetime"
                                       data-bitzer-help-text="Close Date"
                                       data-bitzer-display-group-name="OpportunityInfo"
                                />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input
                                       type="text"
                                       name="StageName"
                                       value=""
                                       data-bitzer-label="Stage Name"
                                       data-bitzer-type="string"
                                       data-bitzer-help-text="Stage Name"
                                       data-bitzer-display-group-name="OpportunityInfo"
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