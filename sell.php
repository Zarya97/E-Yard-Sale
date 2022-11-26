<?php

    $mysqli = require __DIR__ . "/yardsaledb.php";
    session_start();

    if(!isset($_POST['update'])) {
        $id = $_SESSION["user_id"];
        
        $sql = "INSERT INTO inventory (sellerid, title, author, isbn, price)
                VALUES (?, ?, ?, ?, ?)";

        $stmt = $mysqli->stmt_init();


        if ( ! $stmt->prepare($sql)) {
            die("SQL error: " . $mysqli->error);
        }



        $stmt->bind_param("sssss",
                        $id,
                        $_POST["title"],
                        $_POST["author"],
                        $_POST["isbn"],
                        $_POST["price"]);



        if ($stmt->execute()) {

            header("Location: sell.html");
            exit;
        }
        else {
            die($mysqli->error . " " . $mysqli->errno);
        }
    }
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $isbn = $_POST['isbn'];
        $price = $_POST['price'];
        $sql = "UPDATE inventory SET title='$title', author='$author', isbn='$isbn', price='$price' WHERE id = '$id' ";
                    
        $result = $mysqli->query($sql);
        header("Location: listing.php");
        exit;
    }
?>