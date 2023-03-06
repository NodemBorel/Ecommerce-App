<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "phpecom";

$con = mysqli_connect($host, $username, $password, $database);

//check databse connection
if(!$con){
    die("Connection fail!".mysqli_connect_error());
}

?>