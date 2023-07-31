<?php

// Connect to the database using PDO
include("../../connection.php");
if (isset($_GET['orderID'])) {
    $orderID = $_GET['orderID'];
} else {
    $orderID = '1';
}

// Retrieve user data from the database
$query = $con->prepare("SELECT orders.orderID, orders.orderDate, users.name AS CustomerUsername, orders.staus, orders.totalAmount
                  FROM orders 
                  INNER JOIN users ON orders.userID = users.id
                  WHERE orders.orderID = :orderID");
$query->bindValue(':orderID', $orderID, PDO::PARAM_INT); // Bind the parameter here
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

$query2 = $con->prepare("SELECT product.name AS Product_name, orderitems.quantity, orderitems.subtotal, OrderItems.totalPrice, orderitems.review, orderitems.rating
                            FROM orderitems
                            INNER JOIN product ON orderitems.productID = product.id
                            WHERE orderitems.orderID = :orderID");
$query2->bindValue(':orderID', $orderID, PDO::PARAM_INT); // Bind the parameter here
$query2->execute();
$result2 = $query2->fetchAll(PDO::FETCH_ASSOC);

if (count($result2) > 0) {
  foreach ($result2 as $order2) {
    $Product_name = $order2['Product_name'];
    $Review = $order2['review'];
    $Quantity = $order2['quantity'];
    $Rating = $order2['rating'];
    $Price = $order2['subtotal'];
    $Delivery_Price = 50;
    $Total_Price = $order2['totalPrice']+$Delivery_Price;
;

  }
  if (count($result) > 0){
  foreach ($result as $order) {
    $orderID = $order['orderID'];
    $Order_Date = $order['orderDate'];
    $Customer_name = $order['CustomerUsername'];
    $Order_Status = $order['staus'];
    
    }
    

    echo "
    <tr>
        <td>{$orderID}</td>
        <td>{$Order_Date}</td>
        <td>{$Customer_name}</td>
        <td>{$Order_Status}</td>
        <td>{$Product_name}</td>
        <td>{$Quantity}</td>
        <td>{$Price}</td>
        <td>{$Delivery_Price}</td>
        <td>{$Total_Price}</td>
        <td>{$Rating}</td>
        <td>{$Review}</td>
    </tr>";


  }
} else {
  echo "No Orders";
}

?>