<?php 

// Connect to the database using PDO
include("../../connection.php");
$xml_data = file_get_contents('php://input');

// Parse the XML data into a SimpleXMLElement object
$xml = new SimpleXMLElement($xml_data);

// Get the value of the username element

$username = $xml->username;


// Retrieve user data from the database
$query = $con->prepare("SELECT `name`, `email` FROM `users` WHERE `name`=? ;");
$query->execute(array($username));
$result = $query->fetchAll(PDO::FETCH_ASSOC);

if (count($result) > 0) {
  foreach ($result as $user) {
    $username = $user['name'];
    $email = $user['email'];

    echo "
    <tr>
        <td>{$username}</td>
        <td>{$email}</td>
     
    </tr>";


  }
} else {
  echo "no data";
}

?>