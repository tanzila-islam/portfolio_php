<?php
session_start();
require_once 'db.php'; // Include your PostgreSQL database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_SESSION['user_id'];
    $resume = $_POST['resume'];
    if (isset($resume)){
        $insertQuery = "UPDATE about SET `resume`='$resume' WHERE id='$id'";
        $conn->query($insertQuery);
    }
    header("Location: about.php");
}
