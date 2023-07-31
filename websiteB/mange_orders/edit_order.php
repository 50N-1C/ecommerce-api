<?php 
session_start();
if (isset($_GET['orderID'])) {
    $orderID = $_GET['orderID'];
} else {
    $orderID = '1';
}

// Check if the form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the selected orderStatus from the form
    if (isset($_POST['orderStatus'])) {
        $orderStatus = $_POST['orderStatus'];
    } else {
        $orderStatus = 'shipping';
    }
    //echo $orderStatus;
    //$orderID = $_POST["orderID"];

    if (empty($orderID)) {
        
        $error1 = "can not be empty .";
        if (empty($orderStatus)) {

            $error2 = "can not be empty .";
        }
    }else {

        $api_url="http://localhost/xml/ecommerce-api-master/websiteA/admin_server/manage_orders_server/edit_order.php?orderID=$orderID";
        $header = array(
            'Content-Type: application/xml'
        );

        $data = '<?xml version="1.0" encoding="UTF-8"?>
        <order>
            <orderID>'.$orderID.'</orderID>
            <orderStatus>'.$orderStatus.'</orderStatus>
        </order>';

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
                        <h2 style='text-align: center; color: green;'>status for Order with ID {$orderID} has been changed successfully</h2>    
                        <br><br>
                        <h3 style='text-align: center;'>
                        <a href='viewOrders.php'>Go To viewOrders</a>
                        </h3>");
        }

    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registration Admin page</title>
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
            input[type=text], input[type=password], input[type=email] {
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
        <h1 style="text-align:center;">Edit Order </h1>

        <form style="text-align:center;"   method="POST">
            <input type="hidden" name="orderID" value="<?php echo $orderID?>">
            <select name="orderStatus" id="orderStatus" required>
                <option value="shipping">shipping</option>
                <option value="Delivered">Delivered</option>
                <option value="Cancelled">Cancelled</option>
            </select>
            <input type="submit" value="edit order">
        </form>
        <center><a href='viewOrders.php'>Go To viewOrders</a><center>
    </body>
</html>