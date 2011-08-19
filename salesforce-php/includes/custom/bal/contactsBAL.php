<?php
/**
 *
 * @author uishaq
 */
include("salesforceBAL.php");
include("../../includes/custom/dal/contactsDAL.php");

class ContactsBAL extends SalesforceBAL
{
    private $contactsDAL;

    function  __construct()
    {
        //validating session should initialize the sfClient property from parent class
        $this->validateSession();

        $this->contactsDAL = new ContactsDAL($this->sfClient);
    }

    public function getContacts($queryString)
    {
        $contactsData = "";

        $contacts = $this->contactsDAL->selectContacts($queryString);

        $fields = array(
            "Id" => "ID",
            "Salutation" => "Salutation",
            "FirstName" => "First Name",
            "LastName" => "Last Name",
            "Title" => "Title",
            "Phone" => "Phone",
            "MailingStreet" => "Mailing Street",
            "AccountId" => "Account ID",
            "LeadSource" => "Source",
            "last_modified_on" => "Last Modified On"
        );

        $contactsData .= $this->getHeaderRow($fields);

        $contactsData .= $this->getContactDataRows($contacts);



        return $contactsData;
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

    private function getContactDataRows($contacts)
    {
        $dataRows = "";
        $this->pagedRows = 0;

        foreach($contacts->records as $contact)
        {
            $dataRows .= $this->getContactDataRow($contact);
            $this->pagedRows++;
        }

        return $dataRows;
    }

    private function getContactDataRow($contact)
    {
        $dRow = "<tr data-bitzer-pk-name='Id'";
        $dRow .= "data-bitzer-pk-value='";
        $dRow .= $contact->Id;
        $dRow .= "'>";

        $dRow .= "<td>";
        $dRow .= $contact->Id;
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $contact->fields->Salutation != "true" ? $contact->fields->Salutation : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $contact->fields->FirstName != "true" ? $contact->fields->FirstName : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $contact->fields->LastName != "true" ? $contact->fields->LastName : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $contact->fields->Title != "true" ? $contact->fields->Title : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $contact->fields->Phone != "true" ? $contact->fields->Phone : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $contact->fields->MailingStreet != "true" ? $contact->fields->MailingStreet : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $contact->fields->AccountId != "true" ? $contact->fields->AccountId : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $contact->fields->LeadSource != "true" ? $contact->fields->LeadSource : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $contact->fields->LastActivityDate != "true" ? $contact->fields->LastActivityDate : "2011-08-05";
        $dRow .= "</td>";

        return $dRow;
    }

    public function getTotalRecordsCount()
    {
        return $this->contactsDAL->totalRecordsCount;
    }

    public function getPagedRows()
    {
        return $this->contactsDAL->pagedRows;
    }

    public function paramExists($paramName)
    {
        return isset ($this->contactsDAL->params[$paramName]);
    }

    public function getParamValue($paramName, $index = 0)
    {
        if($this->paramExists($paramName))
        {
            return $this->contactsDAL->params[$paramName][$index];
        }
    }
}
?>