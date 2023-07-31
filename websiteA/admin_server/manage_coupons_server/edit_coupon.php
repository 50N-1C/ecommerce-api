<?php
/*
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        //connection with database
        include('../connection.php');
        
        // Get the XML data from the request
        $xml_data = file_get_contents('php://input');
    
        // Parse the XML data into a SimpleXMLElement object
        $xml = new SimpleXMLElement($xml_data);
    
        // Get the value of the username element
        $Coupon_ID = $xml->Coupon_ID;
        $Coupon_Code = $xml->Coupon;
        $sale = $xml->sale;
        $expire_date = $xml->expire_date;

        
        $query = $con->prepare("UPDATE `coupons` SET `couponCode` = ? and `salePercent` = ? and `expiryDate` = ?" where `coupons`.`CouponID` = '$CouponID'); 
        $query->execute(array($Coupon_Code, $sale, $expire_date)); 
        $check = $query->rowCount(); 
        //$result = $query->fetchAll(PDO::FETCH_ASSOC);

        if ($check > 0) {
            echo "done";
        }else {
            echo "failed";
        }

    }
*/


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    //connection with database
    include('../../connection.php');
    
    // Get the XML data from the request
    $xml_data = file_get_contents('php://input');

    // Parse the XML data into a SimpleXMLElement object
    $xml = new SimpleXMLElement($xml_data);

    // Get the value of the username element
    $Coupon_ID = $xml->Coupon_ID;
    $Coupon_Code = $xml->Coupon;
    $salePercent = $xml->salePercent;
    $expire_date = $xml->expire_date;

    $query = $con->prepare("UPDATE `coupons` SET `couponCode` = ?, `salePercent` = ?, `expiryDate` = ? WHERE `CouponID` = ?"); 
    $query->execute(array($Coupon_Code, $salePercent, $expire_date, $Coupon_ID)); 
    $check = $query->rowCount(); 

    if ($check > 0) {
        echo "done";
    } else {
        echo "failed";
    }
}

?>