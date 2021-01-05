<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/bootstrap.css" rel="stylesheet">
    <title>Forecast</title>
    <style>
        .container-fluid {
            /* This class is used as is from bootstrap. No changes required. */
        }
        /* This class creates the blue boxes of the correct width for each day. */
        .bg-primary {
            width:500px;
            height: auto;
            min-height: 150px;
            padding:10px;
            margin-bottom:2px;
        }
        /* This sets the paragraphs away from the left margin */
        .bg-primary p {
            padding-left:90px;
        }
        /* This floats the image to the left and sets the size. */
        .forecastImage {
            margin-right: 10px;
            width: 80px;
            float:left;
        }
        h5 {
            background-color: yellow;
            width:500px;
            padding: 10px;
        }
    </style>
</head>
<body>
<?php

/*
 *
 * Name:      Mohammad Mahmudur  Rahman
 * Date:      2020/10/21
 * Subject:   CIS-2288
 * Test:      PHP Mid Term
 * Purpose:   This Project is about creating a page for showing five days weather of PEI
 *
 */


// Array for months
$monthArray = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

//Temperature codes for display
$degreeCodeCelsius = "&#8451;";
$degreeCodeFahrenheit = "&#8457;";

//Declaring variable for file path
$fileName = "forecastData/forecast.txt";

// Declaring two variables for adding high and low temperature
$totalHigh = 0;
$totalLow = 0;

// Validating whether file exists
if (!file_exists($fileName)) {
    // Printing message when file is not found along with current date
    echo "<h4>Forecast is unavailable. Our web team has ben notified.</h4>";
    echo '<P>Current as of '.date('m/d/Y').'</P>';
}else {
    //Validating whether file is not empty
    if (filesize($fileName) == 0) {
        //Printing message when file is empty along with  current date
        echo "<h4>Forecast is unavailable. Our web team has ben notified.</h4>";
        echo '<P>Current as of '.date('m/d/Y').'</P>';
    } else {

        // Converting file to an array
        $data = [];
        $file = fopen($fileName, 'r');
        while (($line = fgets($file)) != false){
            array_push($data, $line);
        }
    }
}
?>


<div class="container-fluid">
    <h3>5 Day Forecast for Charlottetown, PEI</h3>
    <div class='bg-primary'>

        <?php
        // Putting single line of array in string
        $data_of_monday = $data[0];

        // Remove all semicolon
        $monday_data =  explode(";", $data_of_monday);

        //Converting date int to month name
        $monthNum = $monday_data[2];
        $dateObj = DateTime::createFromFormat('!m', $monthNum);
        $monthName = $dateObj->format('F');

        //Make date and time array
        $date = $monday_data[0].", ".$monthName." ".$monday_data[1].",    ".$monday_data[3];

        // Printing date and time
        echo" <h4>$date</h4>";

        //Displaying partly cloudy image
        echo ' alt=" There is a weather image ">';

        //Printing Paragraph for weather details
        echo "<p>".$monday_data[7]."</p>";

        //Printing high and low temperature
        echo "<p>High: ".$monday_data[4].$degreeCodeCelsius. " Low: ".$monday_data[5].$degreeCodeCelsius."</p>";

        // Converting string to int and adding value in totalHigh
        $totalHigh += (int) $monday_data[4] ;

        // Converting string to int and adding value in totalLow
        $totalLow += (int) $monday_data[5] ;

        ?>
    </div>


    <div class='bg-primary'>
        <?php
        $data_of_tuesday = $data[1];
        $tuesday_data =  explode(";", $data_of_tuesday);
        $monthNum = $tuesday_data[2];
        $dateObj = DateTime::createFromFormat('!m', $monthNum);
        $monthName = $dateObj->format('F');
        $date = $tuesday_data[0].", ".$monthName." ".$tuesday_data[1].",    ".$tuesday_data[3];
        echo" <h4>$date</h4>";
        echo ' alt=" There is a weather image ">';
        echo "<p>".$tuesday_data[7]."</p>";
        echo "<p>High: ".$tuesday_data[4].$degreeCodeCelsius. " Low: ".$tuesday_data[5].$degreeCodeCelsius."</p>";
        $totalHigh += (int) $tuesday_data[4] ;
        $totalLow += (int) $tuesday_data[5] ;
        ?>
    </div>


    <div class='bg-primary'>
        <?php
        $data_of_wednesday = $data[2];
        $wednesday_data =  explode(";", $data_of_wednesday);
        $monthNum = $wednesday_data[2];
        $dateObj = DateTime::createFromFormat('!m', $monthNum);
        $monthName = $dateObj->format('F');
        $date = $wednesday_data[0].", ".$monthName." ".$wednesday_data[1].",    ".$wednesday_data[3];
        echo" <h4>$date</h4>";
        echo ' alt=" There is a weather image ">';
        echo "<p>".$wednesday_data[7]."</p>";
        echo "<p>High: ".$wednesday_data[4].$degreeCodeCelsius. " Low: ".$wednesday_data[5].$degreeCodeCelsius."</p>";
        $totalHigh += (int) $wednesday_data[4] ;
        $totalLow += (int) $wednesday_data[5] ;
        ?>
    </div>


    <div class='bg-primary'>
        <?php
        $data_of_thursday = $data[3];
        $thursday_data =  explode(";", $data_of_thursday);
        $monthNum = $thursday_data[2];
        $dateObj = DateTime::createFromFormat('!m', $monthNum);
        $monthName = $dateObj->format('F');
        $date = $thursday_data[0].", ".$monthName." ".$thursday_data[1].",    ".$thursday_data[3];
        echo" <h4>$date</h4>";
        echo ' alt=" There is a weather image ">';
        echo "<p>".$thursday_data[7]."</p>";
        echo "<p>High: ".$thursday_data[4].$degreeCodeCelsius. " Low: ".$thursday_data[5].$degreeCodeCelsius."</p>";
        $totalHigh += (int) $thursday_data[4] ;
        $totalLow += (int) $thursday_data[5] ;
        ?>
    </div>


    <div class='bg-primary'>
        <?php
        $data_of_friday = $data[4];
        $friday_data =  explode(";", $data_of_friday);
        $monthNum = $friday_data[2];
        $dateObj = DateTime::createFromFormat('!m', $monthNum);
        $monthName = $dateObj->format('F');
        $date = $friday_data[0].", ".$monthName." ".$friday_data[1].",    ".$friday_data[3];
        echo" <h4>".$date."</h4>";
        echo ' alt=" There is a weather image ">';
        echo "<p>".$friday_data[7]."</p>";
        echo "<p>High: ".$friday_data[4].$degreeCodeCelsius. " Low: ".$friday_data[5].$degreeCodeCelsius."</p>";
        $totalHigh += (int) $friday_data[4] ;
        $totalLow += (int) $friday_data[5] ;
        ?>
    </div>


    <?php
        //Calculating average of weekly high temperature
        $avgHigh = $totalHigh / 5;

    //Calculating average of weekly low temperature
        $avgLow = $totalLow / 5;

        //Displaying weekly average of high and low temperature
    echo '<h5>Weekly Temperature Averages: High: '.$avgHigh.$degreeCodeCelsius.' Low: '.$avgLow.$degreeCodeCelsius.'</h5>';

        //displaying the date
        echo '<P>Current as of '.date('m/d/Y').'</P>';
        ?>
</div>
