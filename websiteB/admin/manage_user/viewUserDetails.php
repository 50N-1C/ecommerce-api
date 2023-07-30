<?php 
    session_start();
    // if (isset($_SESSION['username']) && isset($_SESSION['role'])) {
  
    // }else {
    //   exit();
    // }
    
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        
        $username = $_POST["username"];
    
        $api_url="http://localhost/ecommerce/websiteA/admin_server/manage_user_server/userDetails_server.php";
        $header = array (
            'Content-Type: application/xml'
        );
        $data = '<?xml version="1.0" encoding="UTF-8"?>
                <user>
                    <username>'.$username.'</username>
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

        if ($response == "no data") {

            $notFound = "data not found ." ; 
            
        }else {
            $result = $response ;
        }


    }


?>

<!DOCTYPE html>
<html>
    <head>
        <title>View User Details</title>
    <style>
        table, th, td {
        border:1px solid black;
        text-align: center;
        }
    </style>
    </head>
    <body>
        
        <form style="text-align:center;" action="" method="POST">
        <h1>Enter Name of User</h1>
        <input type="text" name="username" placeholder="Enter name">
        <br><br>
        <input type="submit" value="View">
        
        </form>
        <br><br>
        <table style="width:100%">
        <!-- `id`, `name`, `email`, `role`, `password`, `date` -->
            <tr>
                <th>UserID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Password</th>
                <th>Creation Date</th>
            </tr>
            <?php echo @$result ?>
        </table>        
        <h2 style="color: red; text-align:center;"><?php echo @$notFound ; ?></h2>
    </body>
</html>