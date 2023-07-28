<?php

    $api_url="http://localhost/ecommerce/websiteA/admin_server/manage_user_server/userList_server.php";

    
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
        <title>View Users List</title>
    </head>
    <body>
        <h1 style = " text-align: center;">Users List</h1>
        <table style="width:100%">
            <tr>
                <th>ID</th>
                <th>Name</th>
            </tr>
            <?php echo @$result ?>
        </table>
        <h3 style="text-align:center"><?php echo @$noUser?></h3>
    </body>
</html>
