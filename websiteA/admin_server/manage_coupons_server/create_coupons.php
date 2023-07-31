<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        //connection with database
        include('../../connection.php');
        
        // Get the XML data from the request
        $xml_data = file_get_contents('php://input');
    
        // Parse the XML data into a SimpleXMLElement object
        $xml = new SimpleXMLElement($xml_data);
    
        // Get the value of the username element
        $Coupon_Code = $xml->Coupon;
        $sale = $xml->sale;
        $expire_date = $xml->expire_date;

        echo "your data is " .$username . " and password " . $password ; 
        
        $query = $con->prepare("INSERT INTO `coupons`(`couponCode`, `salePercent`, `expiryDate`) VALUES (?, ?, ?);"); 
        $query->execute(array($Coupon_Code, $sale, $expire_date)); 
        $check = $query->rowCount(); 
        //$result = $query->fetchAll(PDO::FETCH_ASSOC);

        if ($check > 0) {
            echo "done";
        }else {
            echo "failed";
        }

    }
?>