
<!--
Name :Mohammad Mahmudur  Rahman
Date: 2020/10/14
Subject : CIS-2288
Assignment: 03
This Project is about creating a webpage for ordering organic vegetables and build a dynamic page
-->
<?php
$page = "orderVeg";
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
    <div class="content mb-5">
        <header>
            <?php include("navPanel.php")?>
        </header>
        <!--Heading-->
        <h2>Welcome to Acme International</h2>
        <div class="row">
            <div class="col-lg-2 col-md-2 "></div>
            <div id="innerContainer">
                <!--Form elements-->
                <form action="processVeggies.php" method="GET">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="text" class="form-control" id="email" name="email"  placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="phoneNumber">Phone Number</label>
                        <input type="text" class="form-control" id="phoneNumber" placeholder="Phone number" name="phoneNumber">
                    </div>
                    <!--Potatoes-->
                    <div class="row mt-4">
                        <div class="col-lg-4">
                            <label class="form-check-label" for="potatoes">Potatoes(5 lb - $6.00 each)</label>
                        </div>
                        <div class="form-group col-lg-4">
                            <select class="custom-select" id="" name="potatoesQty">
                                <?php for ($i = 0; $i<=30; $i++)
                                    echo "<option value=$i>".$i."</option>";
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-4"></div>
                    </div>
                    <!--Carrots-->
                    <div class="row mt-2">
                        <div class="col-lg-4">
                            <label class="form-check-label" for="exampleCheck1">Carrots(3 lb - $3.75 each)</label>
                        </div>
                        <div class="form-group col-lg-4">
                            <select class="custom-select" id="" name="carrotsQty">
                                <?php for ($i = 0; $i<=30; $i++)
                                    echo "<option value=$i>".$i."</option>";
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-4"></div>
                    </div>
                    <!--Cauliflower   -->
                    <div class="row mt-2">
                        <div class="col-lg-4">
                            <label class="form-check-label" for="cauliflower">Cauliflower(1 - $4.00 each)</label>
                        </div>
                        <div class="form-group col-lg-4">
                            <select class="custom-select" id="" name="cauliflowerQty">
                                <?php for ($i = 0; $i<=30; $i++)
                                    echo "<option value=$i>".$i."</option>";
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-4"></div>
                    </div>
                    <button type="submit" >Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>