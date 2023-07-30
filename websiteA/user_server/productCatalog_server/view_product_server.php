<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
    //connection with database
    include('connection.php');
    
    // Get the XML data from the request
    $xml_data = file_get_contents('php://input');

    // Parse the XML data into a SimpleXMLElement object
    $xml = new SimpleXMLElement($xml_data);

    // Get the value of the username element
    $username = $xml->username;
    $password = $xml->password;

}

?>