<?php
/**
 *
 * @author uishaq
 */
include("salesforceBAL.php");
include("../../includes/custom/dal/opportunitiesDAL.php");

class OpportunitiesBAL extends SalesforceBAL
{
    private $opportunitiesDAL;

    function  __construct()
    {
        //validating session should initialize the sfClient property from parent class
        $this->validateSession();

        $this->opportunitiesDAL = new opportunitiesDAL($this->sfClient);
    }

    public function getOpportunities($queryString)
    {
        $opportunitiesData = "";

        $accounts = $this->opportunitiesDAL->selectOpportunities($queryString);

        $fields = array(
            "Id" => "ID",
            "Name" => "Name",
            "AccountId" => "Accound ID",
            "Type" => "Type",
            "LeadSource" => "Lead Source",
            "Amount" => "Amount",
            "CloseDate" => "Closing Date",
            "StageName" => "Stage Name",
            "last_modified_on" => "Last Modified On"
        );

        $opportunitiesData .= $this->getHeaderRow($fields);

        $opportunitiesData .= $this->getOpportunityDataRows($accounts);

        return $opportunitiesData;
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

    private function getOpportunityDataRows($opportunities)
    {
        $dataRows = "";
        $this->pagedRows = 0;

        foreach($opportunities->records as $opportunity)
        {
            $dataRows .= $this->getOpportunityDataRow($opportunity);
            $this->pagedRows++;
        }

        return $dataRows;
    }

    private function getOpportunityDataRow($opportunity)
    {
        $dRow = "<tr data-bitzer-pk-name='Id'";
        $dRow .= "data-bitzer-pk-value='";
        $dRow .= $opportunity->Id;
        $dRow .= "'>";

        $dRow .= "<td>";
        $dRow .= $opportunity->Id;
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $opportunity->fields->Name != "true" ? $opportunity->fields->Name : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $opportunity->fields->AccountId != "true" ? $opportunity->fields->AccountId : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $opportunity->fields->Type != "true" ? $opportunity->fields->Type : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $opportunity->fields->LeadSource != "true" ? $opportunity->fields->LeadSource : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $opportunity->fields->Amount != "true" ? $opportunity->fields->Amount : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $opportunity->fields->CloseDate != "true" ? $opportunity->fields->CloseDate : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $opportunity->fields->StageName != "true" ? $opportunity->fields->StageName : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $opportunity->fields->LastActivityDate != "true" ? $opportunity->fields->LastActivityDate : "2011-08-05";
        $dRow .= "</td>";

        return $dRow;
    }

    public function getTotalRecordsCount()
    {
        return $this->opportunitiesDAL->totalRecordsCount;
    }

    public function getPagedRows()
    {
        return $this->opportunitiesDAL->pagedRows;
    }

    public function paramExists($paramName)
    {
        return isset ($this->opportunitiesDAL->params[$paramName]);
    }

    public function getParamValue($paramName, $index = 0)
    {
        if($this->paramExists($paramName))
        {
            return $this->opportunitiesDAL->params[$paramName][$index];
        }
    }
}
?>