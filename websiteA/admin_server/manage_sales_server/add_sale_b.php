<?php

include("../../connection.php");



$sql = "SELECT id, name FROM product";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $xml_products = new SimpleXMLElement('<?xml version="1.0"?><products></products>');
    while($row = $result->fetch_assoc()) {
        $xml_product = $xml_products->addChild('product');
        $xml_product->addChild('id', $row['id']);
        $xml_product->addChild('name', $row['name']);
    }
    Header('Content-type: text/xml');
    print($xml_products->asXML());
} else {
    echo "No products found.";
}
$conn->close();
?>
