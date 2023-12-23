<?php
session_start();
require_once 'db.php';
// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
$user_id = $_SESSION['user_id'];
$selectQuery = "SELECT * FROM settings WHERE id = $user_id";
$result = $conn->query($selectQuery);
$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
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
                    <li class="item active">Settins</li>
                </a>
                <a href="about.php">
                    <li class="item">About</li>
                </a>
            </ul>
        </div>
        <div class="section">
            <form action="setting_update.php" method="post" enctype="multipart/form-data">
                <label for="Facebook">Mobile</label>
                <input type="text" id="mobile" name="mobile" value="<?php isset($data['mobile']) ? print_r($data['mobile']) : "" ?>">
                <label for="Facebook">FaceBook URL</label>
                <input type="text" id="facebook" name="facebook" value="<?php isset($data['facebook']) ? print_r($data['facebook']) : "" ?>">
                <label for="YouTube">YouTube URL</label>
                <input type="text" id="youtube" name="youtube" value="<?php isset($data['youtube']) ? print_r($data['youtube']) : "" ?>">
                <label for="InstaGram">Insgaram URL</label>
                <input type="text" id="instagram" name="instagram" value="<?php isset($data['instagram']) ? print_r($data['instagram']) : "" ?>">
                <label for="InstaGram">Blog URL</label>
                <input type="text" id="blog" name="blog" value="<?php isset($data['blog']) ? print_r($data['blog']) : "" ?>">
                <label for="InstaGram">Twitter URL</label>
                <input type="text" id="twitter" name="twitter" value="<?php isset($data['twitter']) ? print_r($data['twitter']) : "" ?>">
                <button type="submit" class="btn">Save</button>
            </form>
        </div>
</body>

</html>