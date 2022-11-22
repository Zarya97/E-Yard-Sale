<?php

    $mysqli = require __DIR__ . "/yardsaledb.php";
    session_start();
    if(isset($_POST['sellsubmit'])) {
        if (empty($_POST["title"])) {
            die("Title is required");
        }
        if (empty($_POST["author"])) {
            die("Author is required");
        }
        if (empty($_POST["isbn"])) {
            die("ISBN is required");
        }
        if (empty($_POST["price"])) {
            die("Price is required");
        }

        $id = $_SESSION["user_id"];
        
        $sql = "INSERT INTO inventory (sellerid, title, author, isbn, price)
                VALUES (?, ?, ?, ?, ?)";

        $stmt = $mysqli->stmt_init();


        if ( ! $stmt->prepare($sql)) {
            echo $id;
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

        // If sign up not successful a message will be displayed
        // that the email already exists in the database
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