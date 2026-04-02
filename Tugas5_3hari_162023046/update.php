<?php
require 'config.php';
$msg = '';
$msgType = '';

if (!isset($_GET['id'])) {
    header("Location: read.php");
}

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");
$data = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg = "Invalid email address.";
        $msgType = "error";
    } else {
        // Cek duplikat tapi abaikan data punya user ini sendiri
        $check = mysqli_query($conn, "SELECT * FROM users WHERE (name='$name' OR email='$email') AND id != '$id'");
        if (mysqli_num_rows($check) > 0) {
            $msg = "This email or name is already registered.";
            $msgType = "error";
        } else {
            mysqli_query($conn, "UPDATE users SET name='$name', email='$email' WHERE id='$id'");
            header("Location: read.php"); // Pindah ke read.php jika sukses
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="card">
        <h2>Update User</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" value="<?= $data['name'] ?>" required>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" value="<?= $data['email'] ?>" required>
            </div>
            
            <?php if($msg != ''): ?>
                <div class="msg-<?= $msgType ?>"><?= $msg ?></div>
            <?php endif; ?>

            <button type="submit" name="update" class="btn-submit">Update</button>
        </form>
        <div class="nav-buttons">
            <a href="index.php">CREATE</a>
            <a href="read.php">READ</a>
        </div>
    </div>
</body>
</html>