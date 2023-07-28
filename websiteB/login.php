<?php 

session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $api_url = "http://localhost/ecommerce/websiteA/loginServer.php";
    $header = array(
        'Content-Type: application/xml'
    );

    $data = '<?xml version="1.0" encoding="UTF-8"?>
            <user>
                <username>'.$username.'</username>
                <password>'.$password.'</password>
            </user>';

    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $api_url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);

    $response = curl_exec($curl);

    curl_close($curl);

    //echo $response ; 

    if ($response === "admin") {
        $_SESSION["username"] = $username;
        $_SESSION["role"]     = $response;
        echo "admin";
        header("location: admin/dashboard.html");
    }elseif ($response === "user") {
        $_SESSION["username"] = $username;
        $_SESSION["role"]     = $response;
        echo "user";
        //header("location: index.html");
    }
    
}




?>
