<html>
    <body id="table">
        <title>Search</title>
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
                <th>Buy</th>
            </tr>
            <?php
            session_start();
            $mysqli = require __DIR__ . "/yardsaledb.php";
            $id = $_SESSION["user_id"];

            
            $search = $_POST["search"];

                
            if (empty($_POST["search"])) {
                $sql = "SELECT id,title,author,isbn,price FROM inventory WHERE sellerid != '$id'";
            }
            else {
                $sql = "SELECT id,title,author,isbn,price FROM inventory
                        WHERE isbn LIKE '%$search%' OR title LIKE '%$search%' AND sellerid != '$id'";
            }

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


                            <td> <a href='transaction.php?id=<?php echo $row["id"] ?>' class="buybutton"> Buy </a> </td>
                     </tr>
                    <?php
                }
            }
            else {
                echo "<script>if(confirm('We are out of stock.\\nPlease check back soon!')){document.location.href='main.php'};</script>";
            }
                
            ?>
        </table>
        <button onclick="window.location.href='main.php';" style="background-color: dodgerblue;" id = "button">Home</button>
    </body>
</html>