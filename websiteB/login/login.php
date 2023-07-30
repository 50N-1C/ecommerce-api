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

    


    //var_dump() ; 
    //echo $response[0];
    // $response['id']

    if ($response === "admin") {
        $_SESSION["username"] = $username;
        $_SESSION["role"]     = $response;
        echo "admin";
        header("location: ../admin/dashboard.php");
    }elseif ($response === "user") {
        $_SESSION["username"] = $username;
        $_SESSION["role"]     = $response;
        echo "user";
        header("location: ../user/product_cataloge/view_product.php");
    }
    
}




?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
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
        <form action="" method="POST">
            <h1>Login Page</h1>
            <input type="text" name="username" placeholder="Username">
            <br><br>
            <input type="password" name="password" placeholder="Password">
            <br><br>
            <input type="submit" value="Login">
            DO Not Have Account ?  <a href="http://localhost/ecommerce/websiteB/user/register/register.php" >Register Here</a>
        </form>
    </body>
</html>