<?php
include('../../connection.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $xml_data = file_get_contents('php://input');
        $xml = new SimpleXMLElement($xml_data);
        $userid = $xml->userid;

        $query = $con->prepare("SELECT `orderID`, `OrderDate`, `totalAmount`, `staus` FROM `orders` WHERE `userID` = ?"); 
        $query->execute(array($userid)); 
        $orders = $query->fetchAll(PDO::FETCH_ASSOC); 

        $xml_response = '<?xml version="1.0" encoding="UTF-8"?><orders>';

        foreach($orders as $order){
            $xml_response .= '<order>';
            $xml_response .= '<orderID>'.$order['orderID'].'</orderID>';
            $xml_response .= '<OrderDate>'.$order['OrderDate'].'</OrderDate>';
            $xml_response .= '<totalAmount>'.$order['totalAmount'].'</totalAmount>';
            $xml_response .= '<staus>'.$order['staus'].'</staus>';
            $xml_response .= '</order>';
        }

        $xml_response .= '</orders>';

        echo $xml_response;
    }

?>
