<?php 
    session_start();
    if (isset($_SESSION['username']) && isset($_SESSION['role'])) {
  
    }else {
      exit();
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //`id`, `name`, `email`, `role`, `password

        $userid        = $_POST["id"];
        $newName       = $_POST["name"];
        $newEmail      = $_POST["email"];
        $newRole       = $_POST["role"];
        $newPassword   = $_POST["password"];


        $api_url = "http://localhost/ecommerce/websiteA/admin_server/manage_user_server/editUserDetails_server.php";
        $header = array(
            'Content-Type: application/xml'
        );

        $data = '<?xml version="1.0" encoding="UTF-8"?>
                <user>
                    <userid>'.$userid.'</userid>
                    <newName>'.$newName.'</newName>
                    <newEmail>'.$newEmail.'</newEmail>
                    <newRole>'.$newRole.'</newRole>
                    <newPassword>'.$newPassword.'</newPassword>
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

        if ($response == "Edit Failed") {
            
            $error = "Edit Failed . ";
        
        }else {
            $result = $response ;
        }
    }

?>


<!DOCTYPE html>
<html>
    <head>
    <style>
        table, th, td {
        border:1px solid black;
        text-align: center;
        }
    </style>
    <title>Edit users</title>
    </head>
    <body>
        
        <article style="padding: 30px; background-color: #f6f8ff;">

            <br><br><br>
            <form style="text-align:center;" action="" method="POST">
                <h1>Edit User</h1>
                UserID To Edit : <br><input type="number" name="id" placeholder="Enter UserID">
                <br><br>
                <input type="text" name="name" placeholder="Edit username">
                <br><br>
                <input type="email" name="email" placeholder="Edit email">
                <br><br>
                <input type="text" name="role" placeholder="Edit role user/admin">
                <br><br>
                <input type="password" name="password" placeholder="Edit Password">
                <br><br>
                <input type="submit" value="Update">
            </form>
            <hr style="height: 5px;
           background: teal;
           margin: 20px 0;
           box-shadow: 0px 0px 4px 2px rgba(204,204,204,1);">
           <br><br>
           <table style="width:100%">
                <tr>
                    <th>UserID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Password</th>
                    <th>Date</th>
                </tr>
                <?php echo @$result ; ?>
            </table> 
            <h2 style="color: red;"><?php echo @$error ; ?></h2>
        </article>
    </body>
</html>