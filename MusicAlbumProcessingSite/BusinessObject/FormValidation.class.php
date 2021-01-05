<?php
/*
Name :Mohammad Mahmudur  Rahman
Date: 2020/11/01
Subject : CIS-2288
Assignment: 04
This class is for validating methods
*/

class FormValidation
{
    static private $errorText;

    /**
     * @return mixed
     */
    public static function getErrorText()
    {
        return self::$errorText;
    }
    //Check if the the field is empty
    public static function isEmpty($input){
        if (empty($input) || $input == ""){
            self::$errorText = "cannot be empty!";
            return true;
        }else{
            return false;
        }
    }
    //Check if the price is valid
    public static function isValidPrice($price){
        if (empty($price) || !is_numeric($price) || $price<0) {
            self::$errorText = "Please enter a valid price";
            return false;
        }else{
            return true;
        }
    }
}