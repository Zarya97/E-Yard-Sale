<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/yardsaledb.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="stylesheet" href="style.css">
    <style type="text/css">
        body {
            background-image: url('Back.jpg');
            background-size:cover;
        }
    </style>
</head>
<body class= "top">
    
    <h1>Home</h1>
    
    <?php if (isset($user)): ?>
        
        <h3>Hello <?= htmlspecialchars($user["username"] ?? '') ?> ! </h3>
        
        <body>
            <button onclick="window.location.href='logout.php';" style="background-color: dodgerblue;" class = "button">Log out</button>
        </body>
        <div id = "container">
            <button onclick= "window.location.href='';" style="background-color:green;" class = "buy">Buy</button>
            <button onclick= "window.location.href='';" style="background-color:red;" class = "sell">Sell</button>
        </div>


        
    <?php else: ?>
        <div>
            <div>
                <button onclick= "window.location.href='login.php';" style="background-color:dodgerblue;" class = "button">Log in</button>
            </div>
            <div>
                <button onclick= "window.location.href='sign-up.html';" style="background-color:dodgerblue;" class = "button">Sign up</button>
            </div>
        </div>
        
    <?php endif; ?>
    
</body>
</html>