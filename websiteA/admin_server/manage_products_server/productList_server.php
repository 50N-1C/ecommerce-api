<?php 

// Connect to the database using PDO
include("../../connection.php"); //change this to ../../connection.php

// Retrieve user data from the database
$query = $con->prepare("SELECT * FROM `product`;");
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

if (count($result) > 0) {
  foreach ($result as $product) {
    $p_ID = $product['id'];
    $p_name = $product['name'];
    $p_price = $product['price'];
    $p_description = $product['description'];
    $p_quantity = $product['quantity'];
    $p_categoryID = $product['categoryID'];

    echo "
    <tr>
        <td>{$p_ID}</td>
        <td>{$p_name}</td>
        <td>{$p_price}</td>
        <td>{$p_description}</td>
        <td>{$p_quantity}</td>
        <td>{$p_categoryID}</td>
     
    </tr>";


  }
} else {
  echo "no data";
}

?>





