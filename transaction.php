<?php
    session_start();
    if(isset($_GET['id'])) {
        $itemid = $_GET['id'];
        $mysqli = require __DIR__ . "/yardsaledb.php";
        $id = $_SESSION["user_id"];
        $balance = "SELECT balance FROM user WHERE id = $id";
        $balance = $mysqli->query($balance);
        $tbalance = $balance->fetch_array()[0] ?? '';
        
        $stmt = "SELECT sellerid,price FROM inventory WHERE id = $itemid";
        $result = $mysqli->query($stmt);
        $row = $result->fetch_assoc();
        $sellerid = $row['sellerid'];
        $price =  $row['price'];
        if ($tbalance > $price) {
            $trans = "INSERT INTO transactions (buyer, seller, itemid, price) VALUES ($id,$sellerid,$itemid,$price)";
            $result = $mysqli->query($trans);

            $deleteinv = "DELETE FROM inventory WHERE id = $itemid";
            $result = $mysqli->query($deleteinv);

            $finalbalance = $tbalance-$price;
            $updatebalance = "UPDATE user SET balance='$finalbalance' WHERE id = '$id'";
            $result = $mysqli->query($updatebalance);

            $updateseller = "SELECT balance FROM user WHERE id = '$sellerid'";
            $balance = $mysqli->query($updateseller);
            $sellerbalance = $balance->fetch_array()[0] ?? '';
            $finalbalance = $sellerbalance + $price;
            $updateseller = "UPDATE user SET balance='$finalbalance' WHERE id = '$sellerid'";
            $result = $mysqli->query($updateseller);

            header("Location: buy.html");
            exit;

        }
        else {
        echo "<script>if(confirm('Oops! It looks like you do not have enough credits\\nTotal Credit: $$tbalance')){document.location.href='buy.html'};</script>";
        }
        
        
    }
?>