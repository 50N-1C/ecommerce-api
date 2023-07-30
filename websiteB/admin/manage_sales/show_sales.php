<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    // API URL
    $api_url="http://localhost/ecommerce/websiteA/admin_server/manage_sales_server/show_sales_b.php";

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

        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Sales</th>
                </tr>";
                
        foreach ($xml->product as $product) {
            echo "<tr>";
            echo "<td>" . $product->id . "</td>";
            echo "<td>" . $product->name . "</td>";
            echo "<td>" . $product->description . "</td>";
            echo "<td>" . $product->price . "</td>";
            echo "<td>" . $product->quantity . "</td>";
            echo "<td>" . $product->Sales . "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    }
}
?>
