<?php 
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_SESSION["username"]; 
    $oldPass  = $_POST["oldpass"];
    $newPass  = $_POST["newpass"];

    $api_url = "http://localhost/ecommerce/websiteA/user_server/account_Info_server/changePasswordServer.php";
        $header = array(
            'Content-Type: application/xml'
        );

        $data = '<?xml version="1.0" encoding="UTF-8"?>
                <user>
                    <username>'.$username.'</username>
                    <oldpass>'.$oldPass.'</oldpass>
                    <newpass>'.$newPass.'</newpass>
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
            $message = "Password Changed Successfully .";
        }elseif ($response == "wrong") {
            $message = "Your Old Password is Wrong .";
        }else {
            $message = "failed";
        }

        

}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Change Password</title>
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
            input[type=password] {
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
            <h1>Change Password</h1>
            <input type="password" name="oldpass" placeholder="Enter Old Password">
            <br><br>
            <input type="password" name="newpass" placeholder="Enter New Password">
            <br><br>
            <input type="submit" value="Change">
            <br><br><h3 style="color:green;"> <?php echo @$message ?></h3>
        </form>
    </body>
</html>