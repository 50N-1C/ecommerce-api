<?php
include("../../connection.php");

// Get the XML data from the request
$xml_data = file_get_contents('php://input');


libxml_use_internal_errors(true);
$xml = new SimpleXMLElement($xml_data);

$ProductID = $xml->ProductID;
$ProductPrice = $xml->ProductPrice;
$Productquantity = $xml->Productquantity;
    
     if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] = $quantity;
    } else {
        echo "No products";
    }

?>
