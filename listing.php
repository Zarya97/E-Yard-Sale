<html>
    <body id="table">
        <title>Listings</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
        <link rel="stylesheet" href="style.css">
        <style type="text/css">
        </style>
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
            session_start();

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
                echo "No Results";
            }
                
            ?>
        </table>
    </body>
</html>