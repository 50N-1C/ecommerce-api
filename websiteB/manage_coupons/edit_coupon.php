<?php 
session_start();

if (isset($_GET['Coupon_ID'])) {
    $Coupon_ID = $_GET['Coupon_ID'];
} 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $CouponCode = $_POST["CouponCode"];
    $ExpiryDate = $_POST["ExpiryDate"];
    $salePercent = $_POST["salePercent"];


echo $Coupon_ID . $CouponCode . $salePercent . $ExpiryDate; 
    if (empty($Coupon_ID)) {
        
        $error1 = "can not be empty .";
		echo "<center><h1>whasssapp bro, where is ocouponID</h1></center";
		exit();
    }else {

        $api_url="http://localhost/xml/ecommerce-api-master/websiteA/admin_server/manage_coupons_server/edit_coupon.php?Coupon_ID=$Coupon_ID";
        $header = array(
            'Content-Type: application/xml'
        );

        $data = '<?xml version="1.0" encoding="UTF-8"?>
        <coupon>
            <couponID>'.$Coupon_ID.'</couponID>
            <CouponCode>'.$CouponCode.'</CouponCode>
            <salePercent>'.$salePercent.'</salePercent>
            <ExpiryDate>'.$ExpiryDate.'</ExpiryDate>
        </coupon>';

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $api_url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);

        $response = curl_exec($curl);

        curl_close($curl);

        echo $response ;

        if ($response == "done") {
            die("
                        <h2 style='text-align: center; color: green;'>coupon with ID {$orderID} has been Deleted successfully</h2>    
                        <br><br>
                        <h3 style='text-align: center;'>
                        <a href='view_coupon.php'>Go To view coupon</a>
                        </h3>");
        }

    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Coupon</title>
    <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f2f2f2;
            }
            form {
                max-width: 400px;
                margin: 0 auto;
                padding: 20px;
                background-color: #fff;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0,0,0,0.2);
            }
            h1 {
                text-align: center;
                color: #333;
            }
            input[type=text], input[type=password] {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }
            input[type=submit] {
                background-color: #4CAF50;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                width: 100%;
            }
            input[type=submit]:hover {
                background-color: #45a049;
            }
        </style>
</head>
<body>
<form method="post">

    </br><label for="CouponCode">New Coupon Code:</label>
    <input type="text" id="CouponCode" name="CouponCode" required></br></br>

    <label for="salePercent">NEW Discount %:</label>
    <input type="number" id="salePercent" name="salePercent" required><br><br>

    <label for="expiry">NEW Expiry Date:</label>
    <input type="date" placeholder="Format : 2023-07-25" name="ExpiryDate" required><br></br>
    
    <input type="submit" value="Update"></br></br>
    </form>
        <center><a href="view_coupons.php">Back coupons list</a></center>
</body>
</html>