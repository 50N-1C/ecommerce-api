<?php
include("../../connection.php");

// Get the XML data from the request
$xml_data = file_get_contents('php://input');


libxml_use_internal_errors(true);
$xml = new SimpleXMLElement($xml_data);

$ProductID = $xml->ProductID;
$ProductPrice = $xml->ProductPrice;
    
 if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Check if the product is already in the cart
    if (isset($_SESSION['cart'][$ProductID])) {
        // If the product is already in the cart, update the quantity
        $_SESSION['cart'][$ProductID] += $ProductPrice;
    } else {
        // If the product is not in the cart, add it with the given quantity
        $_SESSION['cart'][$product_id] = $ProductPrice;

        echo "done";
        } else {
            echo "No products";
        }

?>
