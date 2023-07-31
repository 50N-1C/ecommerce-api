<?php
include("../../connection.php");

    $sql = "SELECT * FROM product WHERE 1";
    $sql1 = $con->prepare($sql);
    $sql1->execute();
    $result = $sql1->fetchAll(PDO::FETCH_ASSOC);
    
    if (count($result) > 0) {
        foreach ($result as $product) {
            $id = $product['id'];
            echo "<tr>";
            echo "<td>{$product['name']}</td>";
            echo "<td>{$product['price']}</td>";
            echo "<td>{$product['description']}</td>";
            echo "<td>{$product['quantity']}</td>";
            echo "<td><a href='cart/add.php?ProductID={$id}&ProductPrice={$product['price']}'>buy</a><br>
                  <a href='cart/updateQuantity.php?ProductID={$id}&ProductPrice={$product['price']}&Productquantity={$product['quantity']}'>updateQuantity</a>
            <br></td>";
            
            echo "</tr>";
        }
        echo "</table>";
    }
    
     else {
        echo "No data found";
    }

    

?>