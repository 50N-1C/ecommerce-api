<?php 

// Connect to the database using PDO
include("../../connection.php");

// Retrieve user data from the database
$query = $con->prepare("SELECT Orders.OrderID, Orders.OrderDate, users.name AS CustomerUsername, Orders.staus, OrderItems.productID, OrderItems.quantity, OrderItems.subTotal, OrderItems.totalPrice, OrderItems.review, OrderItems.rating
            FROM Orders 
            INNER JOIN Users ON Orders.UserID = Users.ID
            INNER JOIN OrderItems ON Orders.OrderID = OrderItems.OrderID");
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

if (count($result) > 0) {
  foreach ($result as $order) {
    $orderID = $order['OrderID'];
    $Order_Date = $order['OrderDate'];
    $Customer_name = $order['CustomerUsername'];
    $Order_Status = $order['staus'];
    $Product_ID = $order['productID'];
    $Quantity = $order['quantity'];
    $Price = $order['subTotal'];
    $Delivery_Price = 50;
    $Total_Price = $order['totalPrice'];
    $Rating = $order['rating'];
    $koko = $Total_Price +  $Delivery_Price;
    echo "
    <tr>
        <td>{$orderID}</td>
        <td>{$Order_Date}</td>
        <td>{$Customer_name}</td>
        <td>{$Order_Status}</td>
        <td>{$Product_ID}</td>
        <td>{$Quantity}</td>
        <td>{$Price}</td>
        <td>{$Delivery_Price}</td>
        <td>{$koko}</td>
        <td>{$Rating}</td>
        <td>
            <a href='cancel_order.php?orderID={$orderID}'>Cancel</a><br>
            <a href='edit_order.php?orderID={$orderID}'>Edit</a><br>
            <a href='check_order.php?orderID={$orderID}'>Check</a><br>
        </td>
     
    </tr>";


  }
} else {
  echo "No Orders";
}

?>