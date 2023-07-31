<?php
// Include the cart functions file
include('cart_functions.php');

// Example usage:
addToCart(1, "Product 1", 10.99, 2);
addToCart(2, "Product 2", 15.49, 1);
viewCart();

// Example to remove a product and update quantity
removeFromCart(1);
updateCartQuantity(2, 3);
viewCart();
?>
