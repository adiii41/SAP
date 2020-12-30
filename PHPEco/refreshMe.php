<!--
Name :Mohammad Mahmudur  Rahman
Date: 09/22/2020
Subject : CIS-2288
Assignment: 01
This Project is about recreating a website.
-->



<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="customStyle.css">
<head>
    <meta charset="UTF-8">
    <title>Refresh Me!</title>

</head>

<body>

<!-- Default time and date for a America / new York-->
<div id = container>
    <?php
    date_default_timezone_set("America/New_York");
    echo "Today is " .date('F j, Y. '). "The current time in New York City is " . date("h:i:s A");
    ?>

    <!-- Heading text-->
    <?php
    echo '<h2>Back to reality!</h2>';
    ?>

    <!-- Paragraph text-->
    <?php
    echo "<p1>This particular sections is a paragraph. It appears as  a paragraph it takes up the width  of the section<br> 
(block level) and there is a small amount of space above and below. paragraph can contain other 'inline'<br>
  elements like links and spans. They can not contain other block level elements like lists or images.</p1>";
    ?>

    <!-- Paragraph text-->
    <?php
    echo '<h2> My List</h2>';
    ?>

    <!-- Paragraph text-->
    <?php
    echo
    "<li> Keep the whitespace to a minimum. We all want learn clean code.</li>
<li> How you indent matters.</li>
<li> Please don't forget your comments.</li>";
    ?>
    <!-- Black bar-->
<div id = bar></div>

    <!-- Heading text-->
    <?php
    echo "<h2> Do's and Don'ts</h2>";
    ?>

    <!-- Paragraph text-->
    <?php
    echo "<p1> v. Don't forget to communicate with me. Communication is essential part of learning. Skype, email, <br>   Google, Hangout, telephone....<br>
iv. Do read your textbook. It's easy and important.<br>
iii. Do - Practice, practice, practice - then follow up me for help if required. You need to ask<br>   question when you don't understand things.<br>
ii. Do - Plan ahead! Do no0t leave the things until the last minute.<br>
i. Don't expect this course to be a <span class = w>w</span><span class = a>a</span><span class = lk>lk</span> in the park. It will take time, effort, and mental fitness to succeed!</p1>";
    ?>
    <!-- Mystery box-->
</div>
<div id = mysteryBox>4, 8, 15, 16, 23, 42</div>

</body>
</html>