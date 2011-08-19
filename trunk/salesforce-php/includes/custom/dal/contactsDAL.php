<?php
/**
 *
 * @author uishaq
 */
include("salesforceDAL.php");

class ContactsDAL extends SalesforceDAL
{
    function  __construct($sfClient)
    {
        $this->sfClient = $sfClient;
        $this->sfObject = "Contact";
    }

    public function selectContacts($queryString)
    {
        $this->query = "SELECT";

        $this->params = $this->getQueryStringValues($queryString);
            //params now contains QuesryString values as array

        if($this->params)
        {
            //check what columns to display
            if(isset ($this->params["column"]))
            {
                $this->query = $this->appendColumns($this->query, $this->params["column"], "catalogs");
            }
            else
            {
                $this->query .= " Id, Salutation, FirstName, LastName, Title, Phone, MailingStreet, AccountId, LeadSource, LastActivityDate";
                $this->query .= " FROM Contact";
            }


            //check what columns to filter based on value
            if(isset ($this->params["keyColumn"]) && isset ($this->params["keyValue"]))
            {
                $this->query = $this->appendConditions($this->query, $this->params["keyColumn"], $this->params["keyValue"]);
            }

            if(isset ($this->params["searchColumn"]) && isset ($this->params["searchValue"]))
            {
                $this->query = $this->appendSearching($this->query, $this->params["searchColumn"], $this->params["searchValue"]);
            }

            //set the totalRecordsCount property
            $this->getTotalCount();

            //check if sorting is required
            if(isset ($this->params["sortByColumn"]))
            {
                if(isset ($this->params["sortByOrder"]))
                {
                    $this->query = $this->appendSorting($this->query, $this->params["sortByColumn"], $this->params["sortByOrder"]);
                }
                else
                {
                    $this->query = $this->appendSorting($this->query, $this->params["sortByColumn"]);
                }
            }
        }

        $result = $this->runSelectQuery();

        //check for pagination
        if(isset ($this->params['startRow']) && isset ($this->params['numberOfRows']))
        {
            $result = $this->getPagedRows($result, $this->params['startRow'][0], $this->params['numberOfRows'][0]);
        }

        return $result;
    }
}
?>