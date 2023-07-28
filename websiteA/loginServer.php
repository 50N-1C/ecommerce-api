<?php
    

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        //connection with database
        include('connection.php');
        
        // Get the XML data from the request
        $xml_data = file_get_contents('php://input');
    
        // Parse the XML data into a SimpleXMLElement object
        $xml = new SimpleXMLElement($xml_data);
    
        // Get the value of the username element
        $username = $xml->username;
        $password = $xml->password;

        //echo "your username is " .$username . " and password " . $password ; 
        
        $query = $con->prepare("SELECT `name`, `role`, `password` FROM `users` WHERE `name` = ? AND `password` = ?"); 
        $query->execute(array($username, $password)); 
        $check = $query->rowCount(); 
        $result = $query->fetchAll(PDO::FETCH_ASSOC); 
 
        if ($check > 0) {  
            foreach($result as $item) { 
                $role = $item["role"]; 
            } 
 
            if ($role === "admin") { 
                $_SESSION["role"] = $role; 
                
                //header("location: adminPanal.php"); 
                
                echo "admin"; 

            } elseif ($role === "user") { 
                $_SESSION["role"] = $role; 
                
                //header("location: index.html"); 
                
                echo "user"; 
            } 
        } else { 
            echo "Invalid username/password"; 
        } 




    }else{
        echo "failed";
    }

?>