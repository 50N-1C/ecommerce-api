<?php 


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        //connection with database
        include('../../connection.php');
        
        // Get the XML data from the request
        $xml_data = file_get_contents('php://input');
    
        // Parse the XML data into a SimpleXMLElement object
        $xml = new SimpleXMLElement($xml_data);
    
        // Get the value of the username element
        $userid = $xml->userid;
        $newName = $xml->newName;
        $newEmail = $xml->newEmail;
        $newRole = $xml->newRole;
        $newPassword = $xml->newPassword;

        $query = $con->prepare("UPDATE `users` SET `name`= ? ,`email`= ? ,`role`= ? ,`password`= ? WHERE `id` = ? ;");
        $result = $query->execute(array( $newName, $newEmail, $newRole, $newPassword, $userid)); 
        $check = $query->rowCount(); 
        

        if ($check > 0) {

            $query = $con->prepare("SELECT `id`, `name`, `email`, `role`, `password`, `date` FROM `users` WHERE `id`=? ;");
            $query->execute(array($userid));
            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $user) {
              //`id`, `name`, `email`, `role`, `password`, `date`
              
              $userID   = $user['id'];
              $username = $user['name'];
              $email    = $user['email'];
              $role     = $user['role'];
              $password = $user['password'];
              $date     = $user['date'];
        
              echo "
              <tr>
                  <td>{$userID}</td>
                  <td>{$username}</td>
                  <td>{$email}</td>
                  <td>{$role}</td>
                  <td>{$password}</td>
                  <td>{$date}</td>
        
              </tr>";
            }
        }else {
            echo "Edit Failed";
        }
}

?>