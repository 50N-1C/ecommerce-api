<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
    //connection with database
    include('../../connection.php');
    
    // Get the XML data from the request
    $xml_data = file_get_contents('php://input');

    // Parse the XML data into a SimpleXMLElement object
    $xml = new SimpleXMLElement($xml_data);

    // Get the value of the username element
    $oldname  = $xml->oldname;
    $username = $xml->username;
    $email    = $xml->email;

    $query = $con->prepare("UPDATE `users` SET `name`= ? ,`email`= ? WHERE `name` = ? ;");
    $result = $query->execute(array( $username, $email, $oldname)); 
    $check = $query->rowCount(); 

    if ($check > 0) {
        
        echo "done";
    }else {
        echo "failed";
    }
    
}

?>