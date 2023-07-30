<?php
if(isset($_GET['orderID'])){

    $api_url = "http://localhost/ecommerce/websiteA/user_server/track_order_server/CancelOrderServer.php";
    $header = array(
        'Content-Type: application/xml'
    );

    $data = '<?xml version="1.0" encoding="UTF-8"?>
            <order>
                <orderID>'.$_GET['orderID'].'</orderID>
            </order>';

    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $api_url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);

    $response = curl_exec($curl);

    curl_close($curl);

    if($response == "Order cancelled"){
        echo "Order has been cancelled successfully";
    }else{
        echo "Unable to cancel the order";
    }
}
?>
