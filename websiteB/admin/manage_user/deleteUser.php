<?php 
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['role'])) {
  
}else {
  exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $userid = $_POST['id'];

    $api_url = "http://localhost/ecommerce/websiteA/admin_server/manage_user_server/deleteUser_server.php";
    $header = array(
        'Content-Type: application/xml'
    );

    $data = '<?xml version="1.0" encoding="UTF-8"?>
            <user>
                <userid>'.$userid.'</userid>
            </user>';

    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $api_url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);

    $response = curl_exec($curl);

    curl_close($curl);

    $result = $response ;


}

?>



<!DOCTYPE html>
<html>
    <head>
        <title>Delete username</title>
    </head>
    <body>
        
        <form style="text-align:center;" action="" method="POST">
        <h1>Delete user</h1>
        UserID To Delete :<br><br>
        <input type="number" name="id" placeholder="Enter UserID">
        <br><br>
        <input type="submit" value="Delete">
        <h4 style="color: green;"><?php echo @$result ; ?></h4>
        </form>
    </body>
</html>