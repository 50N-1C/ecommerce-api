<?php
    session_start();
    // if (isset($_SESSION['username']) && isset($_SESSION['role'])) {
    
    // }else {
    // exit();
    // }

    $api_url="http://localhost/ecommerce/websiteA/admin_server/manage_products_server/productList_server.php"; //change this to: "http://localhost/ecommerce/websiteA/admin_server/manage_products_server/productList_server.php"

   
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $api_url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($curl);

    curl_close($curl);

    //echo $response ;

    if ($response == "no data") {
        $noUser = "data not found";
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
        <title>View Products List</title>
    </head>
    <body>
        <h1 style = " text-align: center;">Products List</h1>
        <table style="width:100%">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>CategoryID</th>
            </tr>
            <?php echo @$result ?>
        </table>
        <h3 style="text-align:center"><?php echo @$noUser?></h3>
        <a href="index.php">Products Options</a>
        <h1 style = " text-align: center;">Feh error fe el data base en el id not auto increament</h1>
    </body>
</html>





