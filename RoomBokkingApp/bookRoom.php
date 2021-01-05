<!--
Name :Mohammad Mahmudur  Rahman
Date: 09/22/2020
Subject : CIS-2288
Assignment: 01
This Project is about recreating a website.
-->

<?php
require_once ('Util.php');
?>

<?php
//Define constant
define("UNIT_RENTAL_COST", 100);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Room booking Application</title>
    <link href="./css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="./css/customStyle.css" type="text/css" rel="stylesheet">
</head>
<body>
<div id="bookingForm">
    <h1>Booking Form</h1>
    <img src="./image/cottage.png" class="mb-4 img-fluid">
    <div class="mainContent">
        <form action="processBooking.php" method="post">

            <p class="alert-info"><?php echo 'Unit rental cost is $' .UNIT_RENTAL_COST."/night"?></p>
            <!--Text box for first name-->
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" class="form-control" id="fName" name="fName" placeholder="Enter First name">
            </div>
            <!--Text box  for last name-->
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" class="form-control" id="lName" name="lName" placeholder="Enter Last name">
            </div>
            <!-- Text box  for postal code-->
            <div class="form-group">
                <label for="postalCode">Postal Code</label>
                <input type="text" class="form-control" id="postalCode" name="postalCode"
                       placeholder="Enter your postal code">
            </div>
            <!--Text box for no of adults-->
            <div class="form-group">
                <label for="adults">Number of adults</label>
                <input type="text" class="form-control" id="adults" name="adults" placeholder="Number of adults">
            </div>

            <!--Text box for children-->
            <div class="form-group">
                <label for="children">Number of children</label>
                <input type="text" class="form-control" id="children" name="children" placeholder="Number of children">
            </div>
            <!--Text box for address-->
            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" rows="4" name="address"
                          placeholder="Enter your address please..."></textarea>
            </div>
            <!--Checkbox for pets-->
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="pet" name="pet">
                <label class="form-check-label" for="pet">If you have pet $50 will be charged extra</label>
            </div>

            <!--Select night-->
            <div class="input-group mb-3 mt-2">
                <select class="custom-select" id="" name="noOfNights">
                    <option value="">Select how many nights you would like to stay</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                </select>
                <div class="input-group-append">
                    <label class="input-group-text" for="inputGroupSelect02">Options</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
</body>

</html>