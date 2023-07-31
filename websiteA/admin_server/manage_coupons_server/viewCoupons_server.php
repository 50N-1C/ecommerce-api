<?php 

// Connect to the database using PDO
include("../../connection.php");

// Retrieve user data from the database
$query = $con->prepare("SELECT * FROM `coupons`");
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

if (count($result) > 0) {
  foreach ($result as $coupon) {
    $Coupon_ID = $coupon['couponID'];
    $Coupon_Code = $coupon['couponCode'];
    $sale_Percent = $coupon['salePercent'];
    $Coupon_Date = $coupon['date'];
    $Coupon_expiryDate = $coupon['expiryDate'];
    echo "
    <tr>
        <td>{$Coupon_ID}</td>
        <td>{$Coupon_Code}</td>
        <td>{$sale_Percent}</td>
        <td>{$Coupon_Date}</td>
        <td>{$Coupon_expiryDate}</td>
        <td>
            <a href='Delete_coupon.php?Coupon_ID={$Coupon_ID}'>Cancel</a><br>
            <a href='edit_coupon.php?Coupon_ID={$Coupon_ID}'>Edit</a><br>
        </td>
     
    </tr>";


  }
} else {
  echo "No Orders";
}

?>