<?php

if (isset($_GET['ProductID'])) {
    $ProductID = $_GET['ProductID']; 
    if (isset($_GET['ProductPrice'])) {
        $ProductPrice = $_GET['ProductPrice']; 
        $Productquantity = $_GET['quantity'];
        $api_url="http://localhost:80/e-commerce/websiteA/user_server/dashboard_server/cart/updateQuantity.php";

        
        $xml_data = '<?xml version="1.0" encoding="UTF-8"?>
        <search>
            <ProductID>'.$ProductID.'</ProductID>
            <ProductPrice>'.$ProductPrice.'</ProductPrice>
            <Productquantity>'.$Productquantity.'</Productquantity>
        </search>';

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $api_url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $xml_data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);


        $response = curl_exec($curl);

        curl_close($curl);

        //echo $response ;

        if ($response == "No data found") {
            $noproduct = "data not found";
            
        }else {
            $result = $response ;
        }

    }
}
else {
    echo "<center><h1>U didnt update anything</h1><br>
    <a href='#.php'>Go To view Products</a><center>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add to cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            margin: 20px 0;
            color: #333;
        }
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        th, td {
            text-align: center;
            border: 1px solid #ddd;
            padding: 12px;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        h3 {
            text-align: center;
            color: #dd4b39;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<body>

        

    
</body>
</html>