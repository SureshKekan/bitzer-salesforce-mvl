<?php
/**
 *
 * @author uishaq
 */
include("salesforceBAL.php");
include("../../includes/custom/dal/productsDAL.php");

class ProductsBAL extends SalesforceBAL
{
    private $productsDAL;

    function  __construct()
    {
        //validating session should initialize the sfClient property from parent class
        $this->validateSession();

        $this->productsDAL = new ProductsDAL($this->sfClient);
    }

    public function getProducts($queryString)
    {
        $productsData = "";

        $products = $this->productsDAL->selectProducts($queryString);

        $fields = array(
            "Id" => "ID",
            "Name" => "Name",
            "ProductCode" => "Product Code",
            "Description" => "Description",
            "IsActive" => "Active",
            "last_modified_on" => "Last Modified On"
        );

        $productsData .= $this->getHeaderRow($fields);

        $productsData .= $this->getProductDataRows($products);

        return $productsData;
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

    private function getProductDataRows($products)
    {
        $dataRows = "";
        $this->pagedRows = 0;

        foreach($products->records as $product)
        {
            $dataRows .= $this->getProductDataRow($product);
            $this->pagedRows++;
        }

        return $dataRows;
    }

    private function getProductDataRow($product)
    {
        $dRow = "<tr data-bitzer-pk-name='Id'";
        $dRow .= "data-bitzer-pk-value='";
        $dRow .= $product->Id;
        $dRow .= "'>";

        $dRow .= "<td>";
        $dRow .= $product->Id;
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $product->fields->Name != "true" ? $product->fields->Name : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $product->fields->ProductCode != "true" ? $product->fields->ProductCode : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $product->fields->Description != "true" ? $product->fields->Description : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= $product->fields->IsActive != "true" ? $product->fields->IsActive : "";
        $dRow .= "</td>";

        $dRow .= "<td>";
        $dRow .= "2011-08-15";
        $dRow .= "</td>";

        return $dRow;
    }

    public function getTotalRecordsCount()
    {
        return $this->productsDAL->totalRecordsCount;
    }

    public function getPagedRows()
    {
        return $this->productsDAL->pagedRows;
    }

    public function paramExists($paramName)
    {
        return isset ($this->productsDAL->params[$paramName]);
    }

    public function getParamValue($paramName, $index = 0)
    {
        if($this->paramExists($paramName))
        {
            return $this->productsDAL->params[$paramName][$index];
        }
    }
}
?>