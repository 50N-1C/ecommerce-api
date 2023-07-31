<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // API URL
    $api_url="http://localhost/ecommerce/websiteA/admin_server/manage_sales_server/add_sale_b.php";
    
    $header = array(
        'Content-Type: application/xml'
    );

    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $api_url);
    curl_setopt($curl, CURLOPT_HTTPGET, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);

    $response = curl_exec($curl);
    curl_close($curl);

    if ($response === FALSE) { 
        // Handle error 
        echo "An error occurred.";
    }
    else {
        $xml = new SimpleXMLElement($response);
        foreach ($xml->product as $product) {
            echo "Product ID: " . $product->id . " - Name: " . $product->name . 
            " - <form action='http://localhost/ecommerce/websiteB/admin/manage_sales/add_sale_to_product.php' method='post'>
            <input type='hidden' name='id' value='" . $product->id . "'>
            <input type='number' name='sale_amount' min='0' step='.01' required>
            <input type='submit' value='Add Sale'>
            </form><br>";
        }
    }
}
?>
