<html>
    <body>
        <title>Listings</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
        <link rel="stylesheet" href="style.css">
        <style type="text/css">
        body {
            background-image: url('Back.jpg');
            background-size:cover;
        }
        </style>
        <table>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>ISBN</th>
                <th>Price</th>
            </tr>
            <?php
            session_start();

            $id = $_SESSION["user_id"];

            $mysqli = require __DIR__ . "/yardsaledb.php";
                
            $sql = "SELECT title,author,isbn,price FROM inventory
                    WHERE sellerid = {$id}";

            $result = $mysqli->query($sql);
            $check = mysqli_num_rows($result);
            if ($check > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["title"] . "</td><td>" . $row["author"] . "</td><td>" . $row["isbn"] . "</td><td>" . $row["price"] . "</td></tr>";
                }
            }
            else {
                echo "No Results";
            }
                
            ?>
        </table>
    </body>
</html>