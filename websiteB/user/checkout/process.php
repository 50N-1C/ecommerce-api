<?php
session_start();
$_SESSION["username"] = "test";
$username = $_SESSION["username"];
$price = $_SESSION["discounted"];

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $payment_method = $_POST["payment_method"];
    $visa_number = $_POST["visa_number"];
    $visa_expiration = $_POST["visa_expiration"];
    $visa_cvv = $_POST["visa_cvv"];
    
    if(isset($_POST["payment_method"])){
        $api_url="http://localhost/ecommerce/websiteA/user_server/checkout_server/process_server.php"; //change this to http://localhost/ecommerce/websiteA/user_server/checkout_server/process_server.php
        $header = array(
            'Content-Type: application/xml'
        );
        
        $orderID = ""; //We will insert the orderID here number by number
        for ($i=0; $i < 8; $i++) { 
            $orderID .= rand(0,9);
        }
        
    
        $data = '<?xml version="1.0" encoding="UTF-8"?>
        <product>
            <orderID>'.$orderID.'</orderID>
            <username>'.$username.'</username>
            <price>'.$price.'</price>
            <payment_method>'.$payment_method.'</payment_method>
            <visa_number>'.$visa_number.'</visa_number>
            <visa_expiration>'.$visa_expiration.'</visa_expiration>
            <visa_cvv>'.$visa_cvv.'</visa_cvv>
        </product>';

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $api_url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);

        $response = curl_exec($curl);

        curl_close($curl);

      //  echo $response ;

    if ($response) {
            echo $response; //in deployment remove this and make the user return to homepage
            //header("Location: #.php");
            // die("Edited Successfully");
    }else{
        echo "failed, please go back and try again";
      
    }
    }
}

?>