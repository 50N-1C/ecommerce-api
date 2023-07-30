<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
  //connection with database
  include('../../connection.php');
  
  // Get the XML data from the request
  $xml_data = file_get_contents('php://input');

  // Parse the XML data into a SimpleXMLElement object
  $xml = new SimpleXMLElement($xml_data);

  // Get the value of the username element
  $username = $xml->username;

  // Retrieve user data from the database
  $query = $con->prepare("SELECT `id`, `name`, `email`, `role`, `password`, `date` FROM `users` WHERE `name`=? ;");
  $query->execute(array($username));
  $result = $query->fetchAll(PDO::FETCH_ASSOC);

  if (count($result) > 0) {
    foreach ($result as $user) {
      //`id`, `name`, `email`, `role`, `password`, `date`
      
      $userID   = $user['id'];
      $username = $user['name'];
      $email    = $user['email'];
      $role     = $user['role'];
      $password = $user['password'];
      $date     = $user['date'];

      echo "
      <tr>
          <td>{$userID}</td>
          <td>{$username}</td>
          <td>{$email}</td>
          <td>{$role}</td>
          <td>{$password}</td>
          <td>{$date}</td>

      </tr>";


    }
  } else {
    echo "no data";
  }
}
?>