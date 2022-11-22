
        <html>
        <head>
            <title>Update</title>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
            <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
            <link rel="stylesheet" href="style.css">
            <script src="/sell.js" defer></script>
            <style type="text/css">
                body {
                    background-image: url('Back.jpg');
                    background-size:cover;
                }
            </style>
        </head>
        <body>
            <h1>Update</h1>
        <?php
        $id = $_GET["id"];

        if (isset($_GET['id'])) {

            $mysqli = require __DIR__ . "/yardsaledb.php";
            
            
            $sql = "SELECT * FROM inventory WHERE id = $id";
                    
            $result = $mysqli->query($sql);

            if(mysqli_num_rows($result) > 0) {
                $info = mysqli_fetch_array($result);
                ?>
                <body>
                    <button onclick="window.location.href='main.php';" style="background-color: dodgerblue;" id = "button">Home</button>
                </body>
                <form action="sell.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <div>
                        <label for="title">Title</label>
                        <input type="text" value ="<?= $info['title']?>" id="title" name="title">
                    </div>
                    
                    <div>
                        <label for="author">Author</label>
                        <input type="text" value ="<?= $info['author']?>"id="author" name="author">
                    </div>

                    <div>
                        <label for="isbn">ISBN</label>
                        <input type="text" value ="<?= $info['isbn']?>"id="isbn" name="isbn">
                    </div>

                    <div>
                        <label for="price">Price</label>
                        <input type="text" value ="<?= $info['price']?>" price" name="price">
                    </div>
                    <div>
                        <button style="background-color:dodgerblue;" name="update">Update</button>
                    </div>
                </form>
                <?php
            }
        }

            ?>
                
        </body>
        </html>
        <?php
    
    //header("Location: listing.php");
    //exit;
?>
