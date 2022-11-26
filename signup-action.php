<?php
// This is a server-side validation to check if the input
// meets the database requirements

if (empty($_POST["name"])) {
    die("Name is required");
}

if (! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Please enter a valid email");
}

if (empty($_POST["schoolname"])) {
    die("School name is required");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}

// Hash the password for security
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/yardsaledb.php";

// Insert the user innput into the database
$sql = "INSERT INTO user (username, email, passwordhash, schoolname)
        VALUES (?, ?, ?, ?)";

$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("ssss",
                  $_POST["name"],
                  $_POST["email"],
                  $password_hash,
                  $_POST["schoolname"]);


// Check if the signup is successful
if ($stmt->execute()) {

    header("Location: successful-signup.html");
    exit;
}

// If sign up not successful a message will be displayed
// that the email already exists in the database
else {

    if ($mysqli->errno == 1062) {
        die("Email already taken");
    } 
    else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}