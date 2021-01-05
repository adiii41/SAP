<!--
Name :Mohammad Mahmudur  Rahman
Date: 2020/10/14
Subject : CIS-2288
Assignment: 03
This page is about showing all the orders listed in file
-->

<?php
$page = "viewOrder";
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
    <header>
        <?php include("navPanel.php")?>
    </header>
    <?php
    $fileName = "../veggie-orders.txt";
    //Open for reading
    $fp = fopen($fileName, 'r');

    if (!file_exists($fileName) || !$fp) {

        echo "<p>File not found</p>";
    }else{
        //Lock the file for reading (LOCK_SH - Shared)
        flock($fp, LOCK_SH);

        if (filesize($fileName) == 0){
            echo "<h3 class='listingHeading mt-3 mb-3'>There is no pending order file !</h3>";
        }else{
            ?>
            <h1 class="listingHeading mt-3 mb-3"">Pending order listing file</h1>
            <table class='table-striped table-bordered table-hover'>
                <?php
                $tempOrderNo = 1;
                while (!feof($fp)){
                    $tempLine = fgets($fp);
                    if (strlen($tempLine)>0){
                        echo "<tr><td>".$tempOrderNo." - ".$tempLine."</td></tr>";
                    }
                    $tempOrderNo++;
                }
                ?>
            </table>

            <?php
            echo "<p><a href=\"./resetOrders.php\"><span class=\"btn btn-danger mt-4 mb-3\">Reset Order</span></a></p>";
        }
    }

    fclose($fp);
    ?>
</div>

</body>

</html>