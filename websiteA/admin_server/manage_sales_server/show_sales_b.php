<?php

include("../../connection.php");

$sql = "SELECT id, name, description, price, quantity, sales FROM product WHERE sales > 0";
$stmt = $con->prepare($sql);
$stmt->execute();

header('Content-type: text/xml');
echo "<?xml version='1.0' encoding='UTF-8'?>";
echo "<products>";

if ($stmt->rowCount() > 0) {
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<product>";
        echo "<id>" . $row["id"] . "</id>";
        echo "<name>" . $row["name"] . "</name>";
        echo "<description>" . $row["description"] . "</description>";
        echo "<price>" . $row["price"] . "</price>";
        echo "<quantity>" . $row["quantity"] . "</quantity>";
        echo "<Sales>" . $row["sales"] . "</Sales>";
        echo "</product>";
    }
} else {
    echo "<product><error>No products found.</error></product>";
}
echo "</products>";

// Close the connection
closeConnection();
?>
