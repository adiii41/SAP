<!--
Name :Mohammad Mahmudur  Rahman
Date: 2020/10/14
Subject : CIS-2288
Assignment: 03
This section of code is to process the calculation of entire project
-->

<?php


$page = "process";



$hasInputError = false;

$errorString = "";

//Declaring constants
define("SALES_TAX", .15);
define("UNIT_PRICE_POTATOES", 6);
define("UNIT_PRICE_CARROTS", 3.75);
define("UNIT_PRICE_CAULIFLOWER", 4);
define("DELIVERY_FEE", 5);

//Declaring variable
$potatoesQty = 0;
$carrotsQty = 0;
$cauliflowerQty = 0;

$errorString = "";

//Validating all the fields
if (empty($_GET['name'])){
    $hasInputError = true;
    $errorString = "<p class='alert-danger'>Name cannot be blank</p>";
}

if (empty($_GET['email'])){
    $hasInputError = true;
    $errorString .= "<p class='alert-danger'>Email is required</p>";
}

if (empty($_GET['phoneNumber'])){
    $hasInputError = true;
    $errorString .= "<p class='alert-danger'>Phone number is required</p>";
}

if (($_GET['potatoesQty']) == 0 && $_GET['carrotsQty'] == 0 && $_GET['cauliflowerQty'] == 0){
    $hasInputError = true;
    $errorString .= "<p class='alert-danger'>You have to select at least one item</p>";
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Process Order</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="./css/customStyle.css" type="text/css" rel="stylesheet">
</head>
<body>

<div id="container">
    <header>
        <?php include("navPanel.php")?>
    </header>
    <?php
    $fileName = "../veggie-orders.txt";

    //If there is no input error then perform following actions
    if (!$hasInputError){


        $name = $_GET['name'];
        $email = $_GET['email'];
        $phoneNumber = $_GET['phoneNumber'];

        $fp = fopen($fileName, "ab");


        $potatoesQty = $_GET['potatoesQty'];
        $carrotsQty = $_GET['carrotsQty'];
        $cauliflowerQty = $_GET['cauliflowerQty'];

        $totalTaxAmount = 0;

        $grandTotal = 0;

        $isFreeDelivery = false;

        $totalPrice = number_format(UNIT_PRICE_POTATOES * $potatoesQty + UNIT_PRICE_CARROTS * $carrotsQty + UNIT_PRICE_CAULIFLOWER * $cauliflowerQty, 2);

        $totalTaxAmount = number_format($totalPrice * SALES_TAX, 2);


        if ($totalPrice>50){
            $isFreeDelivery = true;
        }

        //Add delivery charge if applicable
        if ($isFreeDelivery){
            $grandTotal = number_format($totalPrice + $totalTaxAmount,2);
        }else{
            $grandTotal = number_format($totalPrice + $totalTaxAmount + DELIVERY_FEE, 2);
        }

        $orderedItems = "";
        //Store ordered items in local variables
        if ($potatoesQty>0){
            $orderedItems .= "Potatoes - ".$potatoesQty."\t";
        }
        if ($carrotsQty>0){
            $orderedItems .= "Carrots - ".$carrotsQty."\t";
        }
        if ($cauliflowerQty>0){
            $orderedItems .= "Cauliflower - ".$cauliflowerQty."\t";
        }



        if (!file_exists($fileName) || !$fp) {

            echo "File not found";
            echo "<p><a href='orderVegetables.php'>Try again</a></p>";

        }else{
            //lock the file
            flock($fp, LOCK_EX);

            //get current date
            date_default_timezone_set("Canada/Atlantic");
            $nowDate = date('g:ia\, F j\, Y');

            // write data from form
            // note that a \t is a tab character and a \r\n forces a new line in the next file
            fwrite($fp, "$name,\t$email,\t$phoneNumber,\t$orderedItems,\tTotal Price: $$totalPrice,\tTotal sales tax: $$totalTaxAmount,\tGrand total: $$grandTotal,\t$nowDate.\r\n");

            // unlock the file
            flock($fp, LOCK_UN);

            echo "<div class='card customCard'>";

            echo "<div class='card-body'>";

            echo "<h3>Thank you for shopping with us. You will be contacted next day.</h3>";
            echo $isFreeDelivery? "<h4>wow! Your order has been qualified for free delivery</h4>" : "<h3>Sorry! Your order is not qualified for free delivery, $5 delivery charge will be applied in total amount</h3>";

            echo "<h3 class=\"card-title\">Your order details:</h3>";

            echo "<p class=\"card-text\">Customer name: ".$name."</p>";
            echo "<p class=\"card-text\">Email: ".$email."</p>";
            echo "<p class=\"card-text\">Phone number: ".$phoneNumber."</p>";
            echo "<p class=\"card-text\">Order items and quantity: ".$orderedItems."</p>";
            echo "<p class=\"card-text\">Total price before tax: $".$totalPrice."</p>";
            echo "<p class=\"card-text\">Total sales tax: $".$totalTaxAmount."</p>";
            echo "<p class=\"card-text\">Total price after tax: $".number_format(($totalPrice + $totalTaxAmount),2)."</p>";
            echo "<p class=\"card-text\">Delivery fee: $".($isFreeDelivery? "N/A" : number_format(DELIVERY_FEE,2))."</p>";
            echo "<p class=\"card-text\">Grand total: $".$grandTotal."</p>\n";
            echo "<p class=\"card-text\">Order processed at: ".$nowDate."</p>";


            // close the file connection
            fclose($fp);
            echo "</div>";
            echo "</div>";
        }
    }
    else{
        echo "<div class='mt-3 mb-3'>".$errorString."</div>";
        echo "<p><a href='orderVegetables.php' class='btn btn-warning'>Go back to the order form</a></p>";
    }
    ?>

</body>
</html>