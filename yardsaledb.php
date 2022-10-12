<?php
// This file connects the database "yardsale" using PHP
// Use root account and the name of the database
$host = "localhost";
$dbname = "yardsale";
$username = "root";
$password = "Nashville2022@";

// make a new object to connect the database
$mysqli = new mysqli($host, $username, $password, $dbname);


// check if the database is connected
if ($mysqli->connect_errno) {
    die("connecttion" . $mysqli->connect_errno);
}
return $mysqli;
