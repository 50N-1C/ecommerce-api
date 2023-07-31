<?php
if (isset($_SESSION['cart'])) {
    $cartItems = simplexml_load_string($_SESSION['cart']);

    if ($cartItems !== false) {
        echo "<h2>Shopping Cart</h2>";

        foreach ($cartItems->item as $item) {
            $productID = $item->productID;
            $price = $item->price;
            $quantit = $item->quantit;
        }

        $sql = "SELECT * FROM product WHERE  productID = '$productID'";
        $stmt = $con->query($sql);

    
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) > 0) {
            foreach ($result as $product) {
                echo "<tr>
                        <td>{$productID}</td>
                        <td>{$product['name']}</td>
                        <td>{$price}*{$quantit}</td>
                        <td>{$quantit}</td>
                        <td><a href='remove.php?ProductID={$ProductID}'>remove </a><br>
                        <a href='updateQuantity.php?ProductID={$ProductID}'>update</a><br></td>
                    </tr>";
            }

            echo "</table>";
        } 
    }
    else {
        echo "Shopping Cart is empty.";
    }
} else {
echo "Shopping Cart is empty.";
}
?>