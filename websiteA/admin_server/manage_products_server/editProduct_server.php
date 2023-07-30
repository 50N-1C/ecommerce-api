<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        //connection with database
        include('../connection.php');//change this to ../../connection.php
        
        // Get the XML data from the request
        $xml_data = file_get_contents('php://input');
    
        // Parse the XML data into a SimpleXMLElement object
        $xml = new SimpleXMLElement($xml_data);
    
        // Get the value of the username element
        $id = $xml->id;
        $name    = $xml->name;
        $description = $xml->description;
        $price = $xml->price;
        $quantity    = $xml->quantity;
        $categoryID = $xml->categoryID;
        
        $query = "UPDATE `product` SET `name` = '$name', `price` = '$price', `description` = '$description', `quantity` = '$quantity', `categoryID` = '$categoryID' WHERE `product`.`id` = '$id';"; 
        $stmt = $con->prepare($query);
        $stmt->execute(); 
        echo "done";

    }
?>