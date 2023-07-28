<?php 
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email    = $_POST["email"];
    $password = $_POST["password"];

    if (empty($username)) {
        
        $error1 = "can not be empty .";

        if (empty($email)) {

            $error2 = "can not be empty .";

            if (empty($password)) {

                $error3 = "can not be empty .";
                
            }
        }
    }else {

        $api_url="http://localhost/ecommerce/websiteA/admin_server/register_server/registerServer.php";
        $header = array(
            'Content-Type: application/xml'
        );

        $data = '<?xml version="1.0" encoding="UTF-8"?>
        <user>
            <username>'.$username.'</username>
            <email>'.$email.'</email>
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

        if ($response == "done") {
            die("
                        <h2 style='text-align: center; color: green;'>SignUp successfully</h2>    
                        <br><br>
                        <h3 style='text-align: center;'>
                        <a href='login.php'>Go To Login</a>
                        </h3>");
        }

    }
}

?>

