<?php
include("../../connection.php");

// Get the XML data from the request
$xml_data = file_get_contents('php://input');

// Parse the XML data into a SimpleXMLElement object
libxml_use_internal_errors(true);
$xml = new SimpleXMLElement($xml_data);

// Check if XML parsing was successful and 'searched' property exists
    $searched = (string)$xml->searchq;

    // Use the $searched variable directly in the SQL query
    $sql = "SELECT * FROM product WHERE name = '$searched'";
    $stmt = $con->query($sql);
    

    // Check if the prepare operation was successful
    
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) > 0) {
            echo '<p style="text-align: center; margin: 10px; padding: 5px; background-color: #007bff; color: #fff; border-radius: 5px;">';
            echo "You searched for: " . $searched;
            echo '</p>';
           
            foreach ($result as $product) {
                $id = $product['id'];
                echo "<tr>";
                echo "<td>{$product['name']}</td>";
                echo "<td>{$product['price']}</td>";
                echo "<td>{$product['description']}</td>";
                echo "<td>{$product['quantity']}</td>";
                echo "<td><a href='checkout.php?ProductID={$id}'>buy</a><br></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No products";
        }

?>
