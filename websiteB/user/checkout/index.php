<?php
session_start();

$price = $_SESSION['price'];
$_SESSION['discounted'] = $price;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        form {
            width: 500px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
        }

        label {
            display: block;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        input {
            width: 90%;
            padding: 10px;
            border: 1px solid #ccc;
        }

        #visa_details input {
            width: 50%;
        }

        #coupon , #visa_cvv{
            width: 90%;
            padding: 10px;
            margin-bottom: 10px;
        }
    </style>
    
</head>
<body>
    <h1>Checkout</h1>

    <form action="process.php" method="post" id="general">
        <div>
            <label for="payment_method">Payment Method</label>
            <select name="payment_method">
                <option value="cash">Cash</option>
                <option value="visa">Visa</option>
            </select>
        </div>

        <div id="visa_details">
            <label for="visa_number">Visa Number</label>
            <input type="text" name="visa_number" id="visa_number">

            <label for="visa_expiration">Visa Expiration</label>
            <input type="date" name="visa_expiration" id="visa_expiration">

            <label for="visa_cvv">Visa CVV</label>
            <input type="text" name="visa_cvv" id="visa_cvv">
        </div>

        <div>
            <input type="submit" value="Confirm Payment" form="general">
        </div>
    </form>
    <form action="coupon.php" method="post" id="coupon_form">
        
        <label for="coupon">Coupon</label>
        <input type="text" name="coupon" id="coupon">
        <input type="submit" value="Apply Coupon" form="coupon_form">
</form>

    <p>The total amount to be paid is $<?php echo $_SESSION['discounted'] ?>.</p>
</body>
</html>