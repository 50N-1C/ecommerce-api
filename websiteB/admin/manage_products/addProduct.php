<?php 
session_start();
// if (isset($_SESSION['username']) && isset($_SESSION['role'])) {
  
// }else {
//   exit();
// }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $quantity    = $_POST["quantity"];
    $categoryID = $_POST["categoryID"];

    if (isset($_POST["name"]) && isset($_POST["description"]) && isset($_POST["price"]) && isset($_POST["categoryID"]) && isset($_POST["quantity"])) {

        $api_url="http://localhost/ecommerce/websiteA/admin_server/manage_products_server/addProduct_server.php"; //change this to http://localhost/ecommerce/websiteA/admin_server/manage_products_server/editProduct.php
        $header = array(
            'Content-Type: application/xml'
        );

        $data = '<?xml version="1.0" encoding="UTF-8"?>
        <product>
            <name>'.$name.'</name>
            <description>'.$description.'</description>
            <price>'.$price.'</price>
            <quantity>'.$quantity.'</quantity>
            <categoryID>'.$categoryID.'</categoryID>
        </product>';

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $api_url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);

        $response = curl_exec($curl);

        curl_close($curl);

        echo $response ;
        //$response == "done"
        // if ($response == "done") {
        //     header("Location: productList.php");
        //     die("Edited Successfully");
        // }else{
        //     echo "Something went wrong";
        // }

    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>ADD Products</title>
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
        <h1 style="text-align:center;">ADD Product</h1>

        <form style="text-align:center;" action="#" method="POST">
        <input type="text" name="name" placeholder="New Product Name" autocomplete="off" required>
        <input type="text" name="description" placeholder="New Product description" autocomplete="off" required>
        <input type="number" name="price" placeholder="New Product price" autocomplete="off" required></br></br>
        <input type="number" name="quantity" placeholder="New Product quantity" autocomplete="off" required></br></br>
        <input type="number" name="categoryID" placeholder="New Product CategoryID" autocomplete="off" required></br></br>
        <input type="submit" value="Add">
        <br><br>
        </form>
    </body>
</html>