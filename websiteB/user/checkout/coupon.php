<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $couponCode = $_POST["coupon"];
    if(isset($_POST["coupon"])){
        $api_url="http://localhost/ecommerce/websiteA/user_server/checkout_server/coupon_server.php"; //change this to http://localhost/ecommerce/websiteA/user_server/checkout_server/coupon_server.php
        $header = array(
            'Content-Type: application/xml'
        );

        $data = '<?xml version="1.0" encoding="UTF-8"?>
        <product>
            <couponCode>'.$couponCode.'</couponCode>
        </product>';

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $api_url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);

        $response = curl_exec($curl);

        curl_close($curl);

      //  echo $response ;

        if ($response) {
            $sale = $response;
            $_SESSION['discounted'] = $_SESSION['discounted'] - ($_SESSION['discounted']*$sale/100);
            header("Location: index.php");
            die("success");
        }else{
            echo "Something went wrong";
        }
    }else{
        echo "please enter a coupon";
    }
}
?>