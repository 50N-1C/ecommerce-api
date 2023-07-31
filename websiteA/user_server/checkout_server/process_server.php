<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
    //connection with database
    include('../../connection.php');//change this to ../../connection.php
    
    // Get the XML data from the request
    $xml_data = file_get_contents('php://input');

    // Parse the XML data into a SimpleXMLElement object
    $xml = new SimpleXMLElement($xml_data);
    // Get the values
    $orderID = $xml->orderID;
    $username = $xml->username;
    $price = $xml->price;
    $payment_method = $xml->payment_method;
    $visa_number = $xml->visa_number;
    $visa_expiration = $xml->visa_expiration;
    $visa_cvv = $xml->visa_cvv;

    $query = $con->prepare("SELECT `id` FROM `users` WHERE `name` = '$username';");
    $userid = $query->execute();
   
    $query = $con->prepare("INSERT INTO `orders` (`userID`, `totalAmount`) VALUES ('$userid', '$price');");
    $query->execute();
    if ($payment_method === "visa") {
        $query = $con->prepare("INSERT INTO `creditcard` (`userID`, `cardNumber`, `cvv`, `expiryDate`) VALUES ('$userid', '$visa_number', '$visa_cvv', '$visa_expiration');");
        $query->execute();
    }

    echo "done";
    /////NOW WE NEED TO FIND A WAY TO INSERT THIS ORDER INTO ORDERITEMS
}