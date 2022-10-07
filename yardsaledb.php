<?php

$host = "localhost";
$dbname = "yardsale";
$username = "root";
$password = "Nashville2022@";

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_errno) {
    die("connecttion" . $mysqli->connect_errno);
}
return $mysqli;
