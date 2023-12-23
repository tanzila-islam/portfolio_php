<?php
session_start();
require_once 'db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    $selectQuery = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($selectQuery);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($password == $row['password']) {
            // Authentication successful
            $_SESSION['user_id'] = $row['id'];
            header("Location: index.php");
            exit();
        } else {
            echo "Invalid password. <a href='login.php'>Try again</a>.";
        }
    } else {
        echo "User not found. <a href='register.php'>Register here</a>.";
    }
}
 ?>
