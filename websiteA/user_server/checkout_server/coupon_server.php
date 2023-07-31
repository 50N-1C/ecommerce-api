<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
    //connection with database
    include('../../connection.php');//change this to ../../connection.php
    
    // Get the XML data from the request
    $xml_data = file_get_contents('php://input');

    // Parse the XML data into a SimpleXMLElement object
    $xml = new SimpleXMLElement($xml_data);
    // Get the value of the couponCode element
    $couponCode    = $xml->couponCode;

    // $query = "SELECT * FROM coupons WHERE couponCode = '$couponCode';"; 
    // $stmt = $con->prepare($query);
    // $result = $stmt->execute(); 
    $query = $con->prepare("SELECT * FROM coupons WHERE couponCode = '$couponCode';");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    if ($result) {
        foreach ($result as $row) {
            echo $row['salePercent'];
        }
    }  else{
        echo "failed";
    }  
}