<?php

if (isset($_GET['orderID'])) {
    $orderID = $_GET['orderID'];
} else {
    $orderID = '1';
}

    $api_url="http://localhost/xml/ecommerce-api-master/websiteA/admin_server/manage_orders_server/check_order_server.php?orderID=$orderID";

    
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $api_url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($curl);

    curl_close($curl);

    //echo $response ;

    if ($response == "no data") {
        $noOrders = "data not found";
    }else {
        $result = $response ;
    }

?>

<html>
    <head>
        <style>
            table, th, td {
                text-align:center;
                border:1px solid black;
            }
    </style>
        <title>Order Details</title>
    </head>
    <body>
        <h1 style = " text-align: center;">Check Order</h1>
        <table style="width:100%">
            <tr>
                <th>Order ID</th>
                <th>Order Date</th>
                <th>Customer name</th>
                <th>Order Status</th>
                <th>Product name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Delivery Price</th>
                <th>Total Price</th>
                <th>Rating</th>
                <th>Review</th>
            </tr>
            <?php echo @$result ?>
        </table>
        <h3 style="text-align:center"><?php echo @$noOrders?></h3>
        <center><a href='viewOrders.php'>Go To viewOrders</a><center>
    </body>
</html>
