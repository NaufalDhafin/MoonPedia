<?php 
    date_default_timezone_set("Asia/Jakarta");
    $appname    = "MoonPedia";
    $urlname    = "http://localhost/moonpedia/";

    $confapp    = mysqli_connect("localhost", "root", "", "moonpedia");

    $time       = date("H:i:s d/m/y");
    $timee      = date("HisdmY");

    $permitted  = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    $randIntStr = substr(str_shuffle($permitted), 0, 3);
    $randIntstr = substr(str_shuffle($permitted), 0, 3);
    $randintStr = substr(str_shuffle($permitted), 0, 3);
    $randintstr = substr(str_shuffle($permitted), 0, 3);

    $userid     = "USR".$randintStr.$timee.$randintstr.random_int(000,999);
?>