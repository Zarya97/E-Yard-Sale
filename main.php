<?php
// This is the main page.
// Users will be directed to this page when they first enter the webpage
// and after they logout. They have the option to either sign up or login
// by clicking on the specific button.

// If the user logs in, the page will redirect the user to this page with options buy and sell
// as the user is a valid user
session_start();
if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/yardsaledb.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}
else {
    header("Location: login.php");
    exit;
}
    $id = $_SESSION["user_id"];
    $stmt = "SELECT balance FROM user WHERE id = $id";
    $balance = $mysqli->query($stmt);
    $tbalance = $balance->fetch_array()[0] ?? '';
    
    ?>


<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.5">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="image/png" href="Logo.png">
    <style type="text/css">
    </style>
</head>
<div>
    <body class= "top">
        
        <h1>Home</h1>
        
        <?php if (isset($user)): ?>
            
            <h3>Hello <?= htmlspecialchars($user["username"] ?? '') ?> ! </h3>
            <div class="neonText" id="saleSign2">
                    SALE!!!
            </div>
            
            <body>
                <button onclick="window.location.href='logout.php';" style="background-color: dodgerblue;" id = "button">Log out</button>
            </body>
            
            <div id = "container">
                <button onclick= "window.location.href='buy.html';" style="background-color:green;" class = "buy" >Buy</button>
                <button onclick= "window.location.href='sell.html';" style="background-color:red;" class = "sell">Sell</button>
            </div>
            <div id = "totalbalance">
                <label style="color:black;">Total Balance: </label>
                <label style="color:black;">$<?php echo $tbalance ?></label>
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
</div>
</html>