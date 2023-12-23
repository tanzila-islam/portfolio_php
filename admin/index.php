<?php
session_start();
require_once 'db.php';
// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
$user_id = $_SESSION['user_id'];
$selectQuery = "SELECT * FROM users WHERE id = $user_id";
$result = $conn->query($selectQuery);
$data = $result->fetch_assoc();
$_SESSION['name'] = $data['name']
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <div class="header">
        <a href="/"><img src="./assets/images/Tanjila.png" width="80" height="24" /></a>
        <h1>WellCome To <?php echo ucwords($data['name']); ?></h1>
        <a href="logout.php">Logout</a>
    </div>
    <div class="container">
        <div>
            <ul class="nav">
                <a href="index.php">
                    <li class="item active">Profile</li>
                </a>
                <a href="settings.php">
                    <li class="item">Settins</li>
                </a>
                <a href="about.php">
                    <li class="item">About</li>
                </a>
            </ul>
        </div>
        <div class="section">
            <form action="profile_update.php" method="POST" enctype="multipart/form-data">
                <div class="image-input-container">
                    <input type="file" name="image" id="imageUpload" accept="image/*" class="hidden">
                    <label for="imageUpload" class="image-upload-label">
                        <img src="<?php print_r($data['image']);?>" alt="Upload Image">
                    </label>
                </div>
                <label for="Change Name">Change Name</label>
                <input type="text" id="name" name="name" required value="<?php echo $data['name']?>">
                <label for="Change Name">Change Email</label>
                <input type="email" id="email" name="email" required value="<?php echo $data['email']?>">
                <label for="Change Username">Change Username</label>
                <input type="text" id="username" name="username" required value="<?php echo $data['username']?>">
                <label for="Change Password">Change Password</label>
                <input type="password" id="password" name="password" required value="<?php print_r($data['password'])?>">
                <button value="submit" class="btn">Save</button>
            </form>
        </div>
    </div>
</body>

</html>