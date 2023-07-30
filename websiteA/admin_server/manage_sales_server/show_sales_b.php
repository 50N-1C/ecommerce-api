<?php

include("../../connection.php");

$sql = "SELECT id, name, description, price, quantity, sales FROM product WHERE sales > 0";
$result = $conn->query($sql);

header('Content-type: text/xml');
echo "<?xml version='1.0' encoding='UTF-8'?>";
echo "<products>";

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
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
  echo "<error>No products found.</error>";
}
echo "</products>";
$conn->close();
?>
