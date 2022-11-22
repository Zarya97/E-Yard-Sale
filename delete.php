<?php

if (isset($_GET["id"])) {

    $mysqli = require __DIR__ . "/yardsaledb.php";

    $id = $_GET["id"];
    
    $sql = "DELETE FROM inventory WHERE id = $id";
            
    $result = $mysqli->query($sql);
}
header("Location: listing.php");
exit;
?>