<?php
/**
 *
 * @author uishaq
 */
include("salesforceBAL.php");
include("../../includes/custom/dal/leadsDAL.php");

class LeadsBAL extends SalesforceBAL
{
    private $leadsDAL;

    function  __construct()
    {
        //validating session should initialize the sfClient property from parent class
        $this->validateSession();

        $this->leadsDAL = new LeadsDAL($this->sfClient);
    }

    public function getLeads($queryString)
    {
        $leadsData = "";

        $leads = $this->leadsDAL->selectLeads($queryString);

        $fields = array(
            "Id" => "ID",
            "Salutation" => "Salutation",
            "FirstName" => "First Name",
            "LastName" => "Last Name",
            "Title" => "Title",
            "Company" => "Company",
            "Phone" => "Phone",
            "Fax" => "Fax",
            "MobilePhone" => "Mobile",
            "Street" => "Street",
            "City" => "City",
            "PostalCode" => "Postal Code",
            "Country" => "Country",
            "LeadSource" => "Source",
            "Status" => "Status",
            "last_modified_on" => "Last Modified On"
        );

        $leadsData .= $this->getHeaderRow($fields);

        $leadsData .= $this->getLeadDataRows($leads);



        return $leadsData;
    }

    private function getHeaderRow($fields)
    {
        $hRow = "<tr>";

        foreach($fields as $field => $name)
        {
            $hRow .= "<th data-bitzer-field='" . $field . "'>" . $name . "</th>";
        }

        $hRow .= "</tr>";

        return $hRow;
    }

    private function getLeadDataRows($leads)
    {
        $dataRows = "";
        $this->pagedRows = 0;

        foreach($leads->records as $lead)
        {
            $dataRows .= $this->getLeadDataRow($lead);
            $this->pagedRows++;
        }

        return $dataRows;
    }

    private function getLeadDataRow($lead)
    {
        $dRow = "<tr data-bitzer-pk-name='Id'";
        $dRow .= "data-bitzer-pk-value='";
        $dRow .= $lead->Id;
        $dRow .= "'>";

        $dRow .= "<td>";
        $dRow .= $lead->Id;
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $lead->fields->Salutation != "true" ? $lead->fields->Salutation : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $lead->fields->FirstName != "true" ? $lead->fields->FirstName : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $lead->fields->LastName != "true" ? $lead->fields->LastName : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $lead->fields->Title != "true" ? $lead->fields->Title : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $lead->fields->Company != "true" ? $lead->fields->Company : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $lead->fields->Phone != "true" ? $lead->fields->Phone : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $lead->fields->Fax != "true" ? $lead->fields->Fax : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $lead->fields->MobilePhone != "true" ? $lead->fields->MobilePhone : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $lead->fields->Street != "true" ? $lead->fields->Street : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $lead->fields->City != "true" ? $lead->fields->City : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $lead->fields->PostalCode != "true" ? $lead->fields->PostalCode : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $lead->fields->Country != "true" ? $lead->fields->Country : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $lead->fields->LeadSource != "true" ? $lead->fields->LeadSource : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $lead->fields->Status != "true" ? $lead->fields->Status : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $lead->fields->LastActivityDate != "true" ? $lead->fields->LastActivityDate : "2011-08-05";
        $dRow .= "</td>";

        return $dRow;
    }

    public function getTotalRecordsCount()
    {
        return $this->leadsDAL->totalRecordsCount;
    }

    public function getPagedRows()
    {
        return $this->leadsDAL->pagedRows;
    }

    public function paramExists($paramName)
    {
        return isset ($this->leadsDAL->params[$paramName]);
    }

    public function getParamValue($paramName, $index = 0)
    {
        if($this->paramExists($paramName))
        {
            return $this->leadsDAL->params[$paramName][$index];
        }
    }
}
?>