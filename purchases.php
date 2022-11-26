<?php
    session_start();
?>
<html>
    <body id="table">
        <title>Purchased</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
        <link rel="stylesheet" href="style.css">
        <link rel="shortcut icon" type="image/png" href="Logo.png">
        <style type="text/css">
        </style>
        <table>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>ISBN</th>
                <th>Price</th>
                <th>Date</th>
            </tr>
            <?php
            $mysqli = require __DIR__ . "/yardsaledb.php";
            $id = $_SESSION["user_id"];


                
            $sql = "SELECT title,author,isbn,price,purchaseddate FROM purchased WHERE buyerid = '$id'";

            $result = $mysqli->query($sql);
            $check = mysqli_num_rows($result);
            if ($check > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                            <td><?php echo $row["title"] ?></td>
                            <td><?php echo $row["author"] ?></td>
                            <td><?php echo $row["isbn"] ?></td>
                            <td><?php echo $row["price"] ?></td>
                            <td><?php echo $row["purchaseddate"] ?></td>
                     </tr>
                    <?php
                }
            }
            else {
                echo "<script>if(confirm('You have no recent orders!')){document.location.href='main.php'};</script>";
            }
                
            ?>
        </table>
        <button onclick="window.location.href='main.php';" style="background-color: dodgerblue;" id = "button">Home</button>
    </body>
</html>