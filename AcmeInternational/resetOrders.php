<!--
Name :Mohammad Mahmudur  Rahman
Date: 2020/10/14
Subject : CIS-2288
Assignment: 03
This page is about resetting the orders file and give the user confirmation that the file has been cleared.
-->

<?php
$page = "resetOrder";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acme International</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="./css/customStyle.css" type="text/css" rel="stylesheet">
</head>
<body>

<div id="container">
    <?php include ("navPanel.php");?>
    <div class="">
        <?php
        $fileName = "../veggie-orders.txt";

        if (!file_exists($fileName)) {
            echo "<p>File not found</p>";
        }else{
            if (filesize($fileName) == 0){
                echo "<h2 class='mt-4'>There is no listing order file to delete</h2>";
            }else{
                $fp = fopen($fileName, 'w');
                fclose($fp);
                echo "<h2>The listing order file has been cleared</h2>";
                echo "<p class='listingHeading mb-3'><a href='./orderVegetables.php' class='btn btn-primary'>Continue shopping</a></p>";
            }
        }
        ?>
    </div>
</body>
</html>