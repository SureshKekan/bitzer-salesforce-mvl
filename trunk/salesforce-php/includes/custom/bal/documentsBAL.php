<?php
/**
 *
 * @author uishaq
 */
include("salesforceBAL.php");
include("../../includes/custom/dal/documentsDAL.php");

class DocumentsBAL extends SalesforceBAL
{
    private $documentsDAL;

    function  __construct()
    {
        //validating session should initialize the sfClient property from parent class
        $this->validateSession();

        $this->documentsDAL = new documentsDAL($this->sfClient);
    }

    public function getDocuments($queryString)
    {
        $documentsData = "";

        $documents = $this->documentsDAL->selectDocuments($queryString);

        $fields = array(
            "Id" => "ID",
            "Name" => "Name",
            "Type" => "Type",
            "Description" => "Description",
            "URL" => "URL",
            "AuthorId" => "Author ID",
            "last_modified_on" => "Last Modified On"
        );

        $documentsData .= $this->getHeaderRow($fields);

        $documentsData .= $this->getDocumentDataRows($documents);

        return $documentsData;
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

    private function getDocumentDataRows($documents)
    {
        $dataRows = "";
        $this->pagedRows = 0;

        foreach($documents->records as $document)
        {
            $dataRows .= $this->getDocumentDataRow($document);
            $this->pagedRows++;
        }

        return $dataRows;
    }

    private function getDocumentDataRow($document)
    {
        $dRow = "<tr data-bitzer-pk-name='Id'";
        $dRow .= "data-bitzer-pk-value='";
        $dRow .= $document->Id;
        $dRow .= "'>";

        $dRow .= "<td>";
        $dRow .= $document->Id;
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $document->fields->Name != "true" ? $document->fields->Name : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $document->fields->Type != "true" ? $document->fields->Type : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $document->fields->Description != "true" ? $document->fields->Description : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $document->fields->URL != "true" ? $document->fields->URL : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $document->fields->AuthorId!= "true" ? $document->fields->AuthorId : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= "2011-08-15";
        $dRow .= "</td>";

        return $dRow;
    }

    public function getTotalRecordsCount()
    {
        return $this->documentsDAL->totalRecordsCount;
    }

    public function getPagedRows()
    {
        return $this->documentsDAL->pagedRows;
    }

    public function paramExists($paramName)
    {
        return isset ($this->documentsDAL->params[$paramName]);
    }

    public function getParamValue($paramName, $index = 0)
    {
        if($this->paramExists($paramName))
        {
            return $this->documentsDAL->params[$paramName][$index];
        }
    }
}
?>