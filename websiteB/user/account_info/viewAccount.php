<?php
    session_start();
    // if (isset($_SESSION['username']) && isset($_SESSION['role'])) {
  
    // }else {
    //   exit();
    // }

    $username = $_SESSION['username'];

    $api_url="http://localhost/ecommerce/websiteA/user_server/account_Info_server/viewAccountServer.php";
    $data = '<?xml version="1.0" encoding="UTF-8"?>
            <user>
                <username>'.$username.'</username>
            </user>';
    
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $api_url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
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
        <title>Account Info</title>
    </head>
    <body>
        <h1 style = " text-align: center;">Account Info</h1>
        <table style="width:100%">
            <tr>
                <th>Name</th>
                <th>Email</th>
            </tr>
            <?php echo @$result ?>
        </table>
        <h3 style="text-align:center"><?php echo @$noUser?></h3>
    </body>
</html>
