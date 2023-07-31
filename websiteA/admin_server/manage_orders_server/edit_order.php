<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        //connection with database
        include('../../connection.php');
        
        // Get the XML data from the request
        $xml_data = file_get_contents('php://input');
    
        // Parse the XML data into a SimpleXMLElement object
        $xml = new SimpleXMLElement($xml_data);
    
        // Get the value of the username element
        //var_dump($xml_data);
        $orderID = $xml->orderID;
        $orderStatus = $xml->orderStatus;

        $query = $con->prepare("UPDATE `orders` SET `staus` = ? WHERE `orderID` = ?");
        $query->execute(array($orderStatus, $orderID));

        $check = $query->rowCount();

        echo $orderStatus; 
        if ($check > 0) {
            echo "done";
        } else {
            echo "failed";
        }
    }
?>