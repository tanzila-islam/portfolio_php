<?php
require_once 'db.php';
session_start();
// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
$user_id = $_SESSION['user_id'];
$selectQuery = "SELECT * FROM about WHERE id = $user_id";
$result = $conn->query($selectQuery);
$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <div class="header">
    <a href="index.php"><img src="./assets/images/Tanjila.png" width="80" height="24" /></a>
    <h1>WellCome To <?php echo ucwords($_SESSION['name']); ?></h1>
        <a href="logout.php">Logout</a>
    </div>
    <div class="container">
        <div>
            <ul class="nav">
                <a href="index.php">
                    <li class="item ">Profile</li>
                </a>
                <a href="settings.php">
                    <li class="item">Settins</li>
                </a>
                <a href="about.php">
                    <li class="item active">About</li>
                </a>
            </ul>
        </div>
        <div class="section">
            <form action="about_update.php" method="post" enctype="multipart/form-data">
                <label for="resume">Add Resume</label>
                <input type="text" id="resume" name="resume" value="<?php isset($data['resume']) ? print_r($data['resume']) : "" ?>">
                <button type="submit" class="btn">Save</button>
            </form>
        </div>
</body>

</html>