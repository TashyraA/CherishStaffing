<?php

$server = "localhost";
$dbuser = "root";
$dbpass = "";
$database = "cherish_file_upload";

$conn = mysqli_connect($server, $dbuser, $dbpass, $database);

if(!$conn){
    die("<script>alert('Connection Failed.')</script>");
}



?>

