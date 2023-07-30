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
        $email    = $xml->email;
        $password = $xml->password;

        //echo "your username is " .$username . " and password " . $password ; 
        
        $query = $con->prepare("INSERT INTO `users`(`name`, `email`, `role`, `password`) VALUES (?, ?, 'user', ?);"); 
        $query->execute(array($username, $email, $password)); 
        $check = $query->rowCount(); 
        //$result = $query->fetchAll(PDO::FETCH_ASSOC);

        if ($check > 0) {
            echo "done";
        }else {
            echo "failed";
        }

    }
?>