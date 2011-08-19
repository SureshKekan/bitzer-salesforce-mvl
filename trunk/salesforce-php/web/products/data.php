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
      <title>Salesforce Products Data - Bitzer</title>
      <!--<link rel="StyleSheet" href="assets/css/style.css" type="text/css" />-->

  </head>
  <body>

      <?php

            include("../../includes/custom/bal/productsBAL.php");

            $bal = new ProductsBAL();

            $productsData = $bal->getProducts($_SERVER["QUERY_STRING"]);
      ?>

       <table data-bitzer-data="true"
              data-bitzer-title="Products"
              data-bitzer-desc="Salesforce Products"
              data-bitzer-component="products"
              data-bitzer-record-count="<?php echo $bal->getTotalRecordsCount(); ?>"
              <?php
                if(!$bal->paramExists("recordCount") || $bal->getParamValue("recordCount") == "N")
                {
              ?>
              data-bitzer-number-of-rows="<?php echo $bal->getPagedRows(); ?>"
              data-bitzer-start-index="<?php if($bal->paramExists("startRow")) { echo $bal->getParamValue("startRow"); } else { echo "0"; } ?>"
              <?php
                }
              ?>
              width="100%">

           <?php
                echo $productsData;
           ?>
       </table>
  </body>
</html>