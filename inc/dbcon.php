<?php

$dbname = "campus_drive";
$dbhost = "localhost";
$dbpassword = "Totalchild6471!";
$dbusername = "root";
// $dbname = "campus_drive";
// $dbhost = "localhost";
// $dbpassword = "id21413362_Totalchild6471!";
// $dbusername = "id21413362_root";

$conn = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);

if(!$conn){
    die("Connection Failed:  ".mysqli_connect_error());
}
?>