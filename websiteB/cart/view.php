<?php

    $api_url="/e-commerce/websiteA/user_server/dashboard_server/cart/view.php";

    
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $api_url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($curl);

    curl_close($curl);

    //echo $response ;

    if ($response == "No data found") {
        $noproduct = "data not found";
        
    }else {
        $result = $response ;
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
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
        <h1 style = " text-align: center;">Cart List</h1>
        <table style="width:100%">
            <tr>
                <th>productID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>action</th>
            </tr>
            <?php echo @$result ?>
        </table>
        <h3 style="text-align:center"><?php echo @$nocart?></h3>
    
</body>
</html>