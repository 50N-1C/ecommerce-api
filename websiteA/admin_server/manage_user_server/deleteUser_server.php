<?php 

if($_SERVER["REQUEST_METHOD"]==="POST"){
    include("../../connection.php");

    // Get the XML data from the request
    $xml_data = file_get_contents('php://input');

    // Parse the XML data into a SimpleXMLElement object
    $xml = new SimpleXMLElement($xml_data);

    // Get the value of the username element
    $userid = $xml->userid;

    $query = $con->prepare("DELETE FROM `users` WHERE `id`=? ;");
    $query->execute(array($userid));
    $result = $query->rowCount();

    if($result > 0){
        echo "The User Deleted Successfully ";
    }else{
        echo "User not Found";
    }
        
    
}

?>