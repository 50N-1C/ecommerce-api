<?php 
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Coupon = $_POST["value"];
    $sale = $_POST["sale"];
    $expire_date = $_POST["expiry"];

    if (empty($Coupon)) {
        
        $error1 = "can not be empty .";

        if (empty($sale)) {

            $error2 = "can not be empty .";

            if (empty($expire_date)) {

                $error3 = "can not be empty .";
                
            }
        }
    }else {

        $api_url="http://localhost/xml/ecommerce-api-master/websiteA/admin_server/manage_coupons_server/create_coupons.php";
        $header = array(
            'Content-Type: application/xml'
        );

        $data = '<?xml version="1.0" encoding="UTF-8"?>
        <Coupon>
            <Coupon>'.$Coupon.'</Coupon>
            <sale>'.$sale.'</sale>
            <expire_date>'.$expire_date.'</expire_date>
        </Coupon>';

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $api_url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);

        $response = curl_exec($curl);

        curl_close($curl);

        //echo $response ;

        if ($response == "done") {
            die("
                        <h2 style='text-align: center; color: green;'>Coupon addedd successfully</h2>    
                        <br><br>
                        <h3 style='text-align: center;'>
                        <a href='index.html'>Go To index</a>
                        </h3>");
        }
        else {
            die("
                        <h2 style='text-align: center; color: reed;'>Coupon has not addedd</h2>    
                        <br><br>
                        <h3 style='text-align: center;'>
                        <a href='index.html'>Go To index</a>
                        </h3>");

        }

    }
}

?>
