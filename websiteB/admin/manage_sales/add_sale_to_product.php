<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productID = $_POST["id"];
    $saleAmount = $_POST["sale_amount"];

    // API URL
    $api_url="http://localhost/ecommerce/websiteA/admin_server/manage_sales_server/add_sale_to_product_b.php";

    $header = array(
        'Content-Type: application/xml'
    );

    // Data for the POST request
    $xml_data = new SimpleXMLElement('<?xml version="1.0"?><product></product>');
    $xml_data->addChild('id', $productID);
    $xml_data->addChild('sale_amount', $saleAmount);

    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $api_url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $xml_data->asXML());
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);

    $response = curl_exec($curl);
    curl_close($curl);

    if ($response === FALSE) { 
        // Handle error 
        echo "An error occurred.";
    }
    else {
        echo $response;
    }
}
?>
