<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        //connection with database
        include('../../connection.php');//change this to ../../connection.php
        
        // Get the XML data from the request
        $xml_data = file_get_contents('php://input');
    
        // Parse the XML data into a SimpleXMLElement object
        $xml = new SimpleXMLElement($xml_data);
        // Get the value of the username element
        $name    = $xml->name;
        $description = $xml->description;
        $price = $xml->price;
        $quantity    = $xml->quantity;
        $categoryID = $xml->categoryID;
        
        // $query = "Insert INTO `product` (`name`, `price`, `description`, `quantity`, `categoryID`) VALUES ('$name', '$price', '$description', '$quantity', '$categoryID');"; 
        // $stmt = $con->prepare($query);
        // $stmt->execute(); 
        // echo "done";
        
        $id = "";
        for ($i=0; $i < 4; $i++) { 
            $id .= rand(0,9);
        }
        

        $query = $con->prepare("INSERT INTO `product`(`id`, `name`, `price`, `description`, `quantity`, `categoryID`) VALUES (?, ?, ?, ?, ?, ?);");
        $query->execute(array($id, $name, $price, $description, $quantity, $categoryID));
        $result = $query->rowCount();

        if ($result > 0) {
            echo "done";
        }
    }
?>