<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "login";
$conn = mysqli_connect($hostname, $dbUser, $dbPassword, $dbName);
if(!$conn) {
    die("Something went wrong;");
}

?>