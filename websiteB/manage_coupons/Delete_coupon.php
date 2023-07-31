<?php
session_start();

if (isset($_GET['Coupon_ID'])) {
    $Coupon_ID = $_GET['Coupon_ID'];
}
if ($Coupon_ID === '') {
    $error1 = "Coupon_ID cannot be empty.";
} else {
    $api_url = "http://localhost/xml/ecommerce-api-master/websiteA/admin_server/manage_coupons_server/delete_coupon.php?Coupon_ID=$Coupon_ID";
    $header = array(
        'Content-Type: application/xml'
    );

    $data = '<?xml version="1.0" encoding="UTF-8"?>
    <coupon>
        <couponID>' . $Coupon_ID . '</couponID>
    </coupon>';

    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $api_url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);

    $response = curl_exec($curl);

    curl_close($curl);

    if ($response == "done") {
        die("
            <h2 style='text-align: center; color: green;'>Coupon with ID {$Coupon_ID} has been deleted successfully</h2>    
            <br><br>
            <h3 style='text-align: center;'>
            <a href='view_coupon.php'>Go To view coupon</a>
            </h3>");
    } else {
        die("
            <h2 style='text-align: center; color: red;'>Coupon with ID {$Coupon_ID} could not be deleted</h2>    
            <br><br>
            <h3 style='text-align: center;'>
            <a href='view_coupon.php'>Go To view coupon</a>
            </h3>");
    }
}
?>