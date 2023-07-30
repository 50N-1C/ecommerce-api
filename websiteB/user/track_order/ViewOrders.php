<?php

session_start();
$api_url = "http://localhost/ecommerce/websiteA/user_server/track_order_server/ViewOrdersServer.php";
$header = array(
    'Content-Type: application/xml'
);

$data = '<?xml version="1.0" encoding="UTF-8"?>
        <user>
            <userid>2</userid>
        </user>';

$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, $api_url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, $header);

$response = curl_exec($curl);

curl_close($curl);

$xml = new SimpleXMLElement($response);

echo "<table border='1'>";
echo "<tr><th>Order ID</th><th>Order Date</th><th>Total Amount</th><th>Status</th></tr>";
foreach($xml->order as $order){
    echo "<tr>";
    echo "<td>".$order->orderID."</td>";
    echo "<td>".$order->OrderDate."</td>";
    echo "<td>".$order->totalAmount."</td>";
    echo "<td>".$order->staus."</td>";
    echo "<td><a href='CancelOrder.php?orderID=".$order->orderID."'>Cancel Order</a></td>";
    echo "</tr>";
}
echo "</table>";
?>
