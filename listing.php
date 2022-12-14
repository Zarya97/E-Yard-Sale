<?php
    session_start();
?>
<html>
    <body id="table">
        <head>
        <title>Listings</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
        <link rel="stylesheet" href="style.css">
        <link rel="shortcut icon" type="image/png" href="Logo.png">
        <style type="text/css">
        </style>
        </head>
        <table>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>ISBN</th>
                <th>Price</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
            if(!isset($_SESSION['user_id'])) {
                header("Location: login.php");
                exit;
            }
            

            $id = $_SESSION["user_id"];

            $mysqli = require __DIR__ . "/yardsaledb.php";
                
            $sql = "SELECT id,title,author,isbn,price FROM inventory
                    WHERE sellerid = {$id}";

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


                            <td> <a href='edit.php?id=<?php echo $row["id"] ?>' class="editbutton"> Edit </a> </td>
                            <td> <a href='delete.php?id=<?php echo $row["id"] ?>' class="deletebutton"> Delete </a> </td>
                        </tr>
                    <?php
                }
            }
            else {
                echo "<script>if(confirm('Press OK to add your first book!')){document.location.href='sell.html'};</script>";
            }
                
            ?>
        </table>
    </body>
</html>