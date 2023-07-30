<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
    //connection with database
    include('../../connection.php');
    
    // Get the XML data from the request
    $xml_data = file_get_contents('php://input');

    // Parse the XML data into a SimpleXMLElement object
    $xml = new SimpleXMLElement($xml_data);

    // Get the value of the username element
    $username = $xml->username;
    $oldPass  = $xml->oldpass;
    $newPass  = $xml->newpass;

    $query = $con->prepare("SELECT `password` FROM `users` WHERE `name`=? ;");
    $result = $query->execute(array( $username)); 
    $check = $query->rowCount(); 
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    if ($check > 0) {
        foreach ($result as $user) {
            $pass = $user['password'];
        

            if ($oldPass == $pass) {
                
                $query = $con->prepare("UPDATE `users` SET `password`=? WHERE `name`=? ;");
                $result = $query->execute(array($newPass, $username)); 
                $check = $query->rowCount();

                if ($check > 0) {
                    echo "done";
                }

            }else {
                echo "wrong";
            }
        }

    }else {
        echo "failed";
    }


    
    
}

?>