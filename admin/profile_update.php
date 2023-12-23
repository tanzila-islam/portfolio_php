<?php
session_start();
require_once 'db.php'; // Include your PostgreSQL database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_SESSION['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username= $_POST['username'];
    $password= $_POST['password'];

    if (isset($name)){
        $insertQuery = "UPDATE users SET `name`='$name' WHERE id='$id'";
        $result = $conn->query($insertQuery);
    }
    if (isset($email)){
        $insertQuery = "UPDATE users SET `email`='$email' WHERE id='$id'";
        $result = $conn->query($insertQuery);
    }
    if (isset($username)){
        $insertQuery = "UPDATE users SET `username`='$username' WHERE id='$id'";
        $result = $conn->query($insertQuery);
    }
    if (isset($password)){
        $insertQuery = "UPDATE users SET `password`='$password' WHERE id='$id'";
        $result = $conn->query($insertQuery);
    }
    if (isset($_FILES['image'])) {
        $uploadDir = './uploads/';
        $uploadFile = $uploadDir . basename($_FILES['image']['name']);
        
        // Move the uploaded file to the desired directory
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
            // Insert the image path into the database
            $imagePath = $uploadFile;
            $insertQuery = "UPDATE users SET `image`='$imagePath' where id='$id'";
            $result = $conn->query($insertQuery);
        } else {
            echo "Error uploading file.";
        }
    }
    header("Location: index.php");
}
?>
