<?php
/*
Name :Mohammad Mahmudur  Rahman
Date: 2020/10/14
Subject : CIS-2288
Assignment: 04
This page is about creating an add album site  with album credentials
*/
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Music Album Processing Site</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="./css/customStyle.css" type="text/css" rel="stylesheet">
</head>
<body>
<div id="container">
    <?php include ('./layout/header.php');?><br>
    <form class="mainContent" action="process.php" method="post">
        <div class="form-group">
            <label for="Album">Album Title</label><br>
            <input type="text" class="form-control " id="album" placeholder="Enter title" name="title">
        </div>
        <div class="form-group">
            <label for="artist">Artist Name</label><br>
            <input type="text" class="form-control" id="artist" placeholder="Artist" name="artist">
        </div>
        <div class="form-group">
            <label for="publisher">Publisher</label><br>
            <input type="text" class="form-control" id="publisher" placeholder="Publisher" name="publisher">
        </div>
        <div class="form-group">
            <label for="Genre">Genre</label><br>
            <input type="text" class="form-control" id="publisher" placeholder="Genre" name="genre">
        </div>
        <div class="form-group">
            <label for="price">Price</label><br>
            <input type="text" class="form-control" id="price" placeholder="Price" name="price">
        </div>
        <div class="form-group">
            <label for="country">Country of release</label><br>
            <input type="text" class="form-control" id="country" placeholder="Country of release" name="country"><br><br>
        </div>
        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
    </form>
    <?php include ('./layout/footer.php'); ?>
</div>
</body>
</html>