<?php
/**
 *
 * @author uishaq
 */
include("salesforceBAL.php");
include("../../includes/custom/dal/accountsDAL.php");

class AccountsBAL extends SalesforceBAL
{
    private $accountsDAL;

    function  __construct()
    {
        //validating session should initialize the sfClient property from parent class
        $this->validateSession();

        $this->accountsDAL = new AccountsDAL($this->sfClient);
    }

    public function getAccounts($queryString)
    {
        $accountsData = "";

        $accounts = $this->accountsDAL->selectAccounts($queryString);

        $fields = array(
            "Id" => "ID",
            "Name" => "Name",
            "Type" => "Type",
            "Industry" => "Industry",
            "Website" => "Website",
            "Phone" => "Phone",
            "Fax" => "Fax",
            "Description" => "Description",
            "last_modified_on" => "Last Modified On"
        );

        $accountsData .= $this->getHeaderRow($fields);

        $accountsData .= $this->getAccountDataRows($accounts);

        return $accountsData;
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

    private function getAccountDataRows($accounts)
    {
        $dataRows = "";
        $this->pagedRows = 0;

        foreach($accounts->records as $account)
        {
            $dataRows .= $this->getAccountDataRow($account);
            $this->pagedRows++;
        }

        return $dataRows;
    }

    private function getAccountDataRow($account)
    {
        $dRow = "<tr data-bitzer-pk-name='Id'";
        $dRow .= "data-bitzer-pk-value='";
        $dRow .= $account->Id;
        $dRow .= "'>";

        $dRow .= "<td>";
        $dRow .= $account->Id;
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $account->fields->Name != "true" ? $account->fields->Name : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $account->fields->Type != "true" ? $account->fields->Type : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $account->fields->Industry != "true" ? $account->fields->Industry : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $account->fields->Website != "true" ? $account->fields->Website : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $account->fields->Phone != "true" ? $account->fields->Phone : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $account->fields->Fax != "true" ? $account->fields->Fax : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $account->fields->Description != "true" ? $account->fields->Description : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $account->fields->LastActivityDate != "true" ? $account->fields->LastActivityDate : "2011-08-05";
        $dRow .= "</td>";

        return $dRow;
    }

    public function getTotalRecordsCount()
    {
        return $this->accountsDAL->totalRecordsCount;
    }

    public function getPagedRows()
    {
        return $this->accountsDAL->pagedRows;
    }

    public function paramExists($paramName)
    {
        return isset ($this->accountsDAL->params[$paramName]);
    }

    public function getParamValue($paramName, $index = 0)
    {
        if($this->paramExists($paramName))
        {
            return $this->accountsDAL->params[$paramName][$index];
        }
    }
}
?>