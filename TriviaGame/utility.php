<?php
/*
Name :Mohammad Mahmudur  Rahman
Date: 2020/11/15
Subject : CIS-2288
Assignment: 05
This php file is for reusable validation function that protects against Cross-site scripting (XSS)
*/


function test_input($data)
{
    //Strip unnecessary characters (extra space, tab, newline) from the user input data (with the PHP trim() function)//Remove backslashes (\) from the user input data (with the PHP stripslashes() function)
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}