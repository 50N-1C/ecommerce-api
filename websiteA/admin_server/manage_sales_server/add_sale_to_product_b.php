<?php
include("../../connection.php");

// Get the XML data from the request
$xml_data = file_get_contents('php://input');

// Parse the XML data into a SimpleXMLElement object
$xml = new SimpleXMLElement($xml_data);

// Get the value of the id and sale_amount elements
$productID = intval($xml->id);
$saleAmount = floatval($xml->sale_amount);

$sql = "UPDATE product SET Sales = $saleAmount WHERE id = $productID";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " ;
}

$conn->close();
?>
