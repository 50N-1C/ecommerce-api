<?php 
    if(isset($_POST['productID']))
    {
        include("../../connection.php");

        $query = $con->prepare("DELETE FROM `wishlist` WHERE `productID`=? ;");
        $query->execute(array($_POST['productID']));
        
        header("location: http://localhost/ecommerce/websiteB/user/whishlist/wishlist.php");
    }
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        

        // Connect to the database using PDO
        include("../../connection.php");
        $xml_data = file_get_contents('php://input');

        // Parse the XML data into a SimpleXMLElement object
        $xml = new SimpleXMLElement($xml_data);

        // Get the value of the username element

        $username = $xml->username;


        // Retrieve user data from the database
        $query = $con->prepare("SELECT `id` FROM `users` WHERE `name`=? ;");
        $query->execute(array($username));
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) > 0) {
            foreach ($result as $user) {
                $userID = $user['id'];
            }    
            $query = $con->prepare("SELECT `id`, `productID`, `userID`, `addedDate` FROM `wishlist` WHERE `userID`=? ;");
            $query->execute(array($userID));
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
                
            if (count($result) > 0) {
                foreach ($result as $wishlist) {
                    
                    $productID = $wishlist['productID'];

                    $query = $con->prepare("SELECT `name`, `price`, `description`, `sales` FROM `product` WHERE `id`=? ;");
                    $query->execute(array($productID));
                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                        
                    foreach ($result as $product) {
                        echo "<tr> 
                            <td>".$product['name']."</td>
                            <td>".$product['price']."</td>
                            <td>".$product['description']."</td>
                            <td>".$product['sales']."</td>
                            <td>
                            <form action='http://localhost/ecommerce/websiteA/user_server/wishlist_server/wishlistServer.php' method='POST'>
                            <input type='hidden' name='productID' value='".$productID."'>
                            <input type='submit' value='Delete from Wishlist'>
                            </form>
                            </td>
                            </tr>";
                        }
                        
                    }
                    
                }else {
                    echo "<td><h2>no data</h2></td>";
                }

            
        }

    }

    
?>