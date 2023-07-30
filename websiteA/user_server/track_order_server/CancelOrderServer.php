<?php
include('../../connection.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $xml_data = file_get_contents('php://input');
        $xml = new SimpleXMLElement($xml_data);
        $orderID = $xml->orderID;

        $query = $con->prepare("UPDATE `orders` SET `staus` = 'Cancelled' WHERE `orderID` = ? AND `staus` != 'Delivered'"); 
        $query->execute(array($orderID));

        if($query->rowCount() > 0){
            echo "Order cancelled";
        }else{
            echo "Cannot cancel order";
        }
    }

?>
