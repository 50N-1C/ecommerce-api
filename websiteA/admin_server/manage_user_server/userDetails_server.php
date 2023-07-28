<?php 

// Connect to the database using PDO
include("../../connection.php");

// Retrieve user data from the database
$query = $con->prepare("SELECT * FROM `users` WHERE `name`=? ;");
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

if (count($result) > 0) {
  foreach ($result as $user) {
    $userID = $user['id'];
    $username = $user['name'];

    echo "
    <tr>
        <td>{$userID}</td>
        <td>{$username}</td>
     
    </tr>";


  }
} else {
  echo "no data";
}

?>