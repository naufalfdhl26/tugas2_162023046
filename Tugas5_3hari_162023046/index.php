<?php
require 'config.php';
$msg = '';
$msgType = '';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Validasi format email dari sisi PHP 
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg = "Invalid email address.";
        $msgType = "error";
    } else {
        // Cek duplikat username atau email 
        $check = mysqli_query($conn, "SELECT * FROM users WHERE name='$name' OR email='$email'");
        if (mysqli_num_rows($check) > 0) {
            $msg = "This email or name is already registered. Please try another.";
            $msgType = "error";
        } else {
            // Insert Data
            $insert = mysqli_query($conn, "INSERT INTO users (name, email) VALUES ('$name', '$email')");
            if ($insert) {
                $msg = "User has been successfully inserted.";
                $msgType = "success";
            } else {
                $msg = "Failed to insert data.";
                $msgType = "error";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="card">
        <h2>Create Data</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" placeholder="Your Name" required>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" placeholder="Your email" required>
            </div>
            
            <?php if($msg != ''): ?>
                <div class="msg-<?= $msgType ?>"><?= $msg ?></div>
            <?php endif; ?>

            <button type="submit" name="submit" class="btn-submit">Insert</button>
        </form>
        <div class="nav-buttons">
            <a href="index.php">CREATE</a>
            <a href="read.php">READ</a>
        </div>
    </div>
</body>
</html>