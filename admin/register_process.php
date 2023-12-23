<?php
require_once 'db.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Check if the passwords match
    if ($password !== $confirmPassword) {
        echo "Passwords do not match. <a href='register.php'>Try again</a>.";
        exit();
    }

    // Check if the username is already taken
    $checkQuery = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        echo "Username already taken. <a href='register.php'>Try a different username</a>.";
        exit();
    }

    // Insert the user into the database
    $insertQuery = "INSERT INTO users (`email`,`username`, `password`,`name`) VALUES ('$email','$username', '$password','$name')";
    $result = $conn->query($insertQuery);

    if ($result) {
        echo "Registration successful. <a href='login.php'>Login here</a>.";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
