<?php 
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $oldname  = $_SESSION["username"];
    $username = $_POST["username"];
    $email    = $_POST["email"];

    $api_url = "http://localhost/ecommerce/websiteA/user_server/account_Info_server/updateAccountServer.php";
        $header = array(
            'Content-Type: application/xml'
        );

        $data = '<?xml version="1.0" encoding="UTF-8"?>
                <user>
                    <oldname>'.$oldname.'</oldname>
                    <username>'.$username.'</username>
                    <email>'.$email.'</email>
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
            $_SESSION["username"] = $username ;
            
            header("location: viewAccount.php");
            exit();

        }else {
            $message = " failed . ";
        }

}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Update Account info</title>
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
            input[type=text], input[type=email] {
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
            <h1>Update Account Info</h1>
            <input type="text" name="username" placeholder="Enter New Username">
            <br><br>
            <input type="email" name="email" placeholder="Enter New Email">
            <br><br>
            <input type="submit" value="Update">
            <br><br><h3 style="color:green;"> <?php echo @$message ?></h3>
        </form>
    </body>
</html>