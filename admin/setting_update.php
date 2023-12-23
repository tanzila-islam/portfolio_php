<?php
session_start();
require_once 'db.php'; // Include your PostgreSQL database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_SESSION['user_id'];
    $youtube = $_POST['youtube'];
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $blog = $_POST['blog'];
    $twitter = $_POST['twitter'];
    $mobile = $_POST['mobile'];
    if (isset($mobile)){
        $insertQuery = "UPDATE settings SET `mobile`='$mobile' WHERE id='$id'";
        $conn->query($insertQuery);
    }
    if (isset($twitter)) {
        $insertQuery = "UPDATE settings SET `twitter`='$twitter' WHERE id='$id'";
        $conn->query($insertQuery);
    }
    if (isset($youtube)) {
        $insertQuery = "UPDATE settings SET `youtube`='$youtube' WHERE id='$id'";
        $conn->query($insertQuery);
    }
    if (isset($facebook)) {
        $insertQuery = "UPDATE settings SET `facebook`='$facebook' WHERE id='$id'";
        $conn->query($insertQuery);
    }
    if (isset($blog)) {
        $insertQuery = "UPDATE settings SET `blog`='$blog' WHERE id='$id'";
        $conn->query($insertQuery);
    }
    
    if (isset($instagram)) {
        $insertQuery = "UPDATE settings SET `instagram`='$instagram' WHERE id='$id'";
        $conn->query($insertQuery);
    }
    header("Location: settings.php");
}
