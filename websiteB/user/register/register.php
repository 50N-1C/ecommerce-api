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

        $api_url="http://localhost/ecommerce/websiteA/user_server/register_user/register_server.php";
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
                        <a href='http://localhost/ecommerce/websiteB/login/login.php'>Go To Login</a>
                        </h3>");
                        
        }elseif ($response == "failed") {
            echo $response ;
        }

    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Registration page</title>
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
        <h1 style="text-align:center;">Registration Page</h1>

        <form style="text-align:center;" action="" method="POST">
        <input type="text" name="username" placeholder="Username" autocomplete="off">
        
        <p style="color: red;" ><?php echo @$error1 ;?></p>
        <input type="email" name="email" placeholder="email" autocomplete="off">
        
        <p style="color: red;" ><?php echo @$error2 ;?></p>
        <input type="password" name="password" placeholder="New Password" autocomplete="new-password">
        
        <p style="color: red;" ><?php echo @$error3 ;?></p>
        <input type="submit" value="register">
        <br><br>
        Have an Account ?  <a href="http://localhost/ecommerce/websiteB/login/login.php" >Login Here</a>
        </form>
    </body>
</html>

