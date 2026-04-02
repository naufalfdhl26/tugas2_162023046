<?php
require 'config.php';

// Proses Delete [cite: 72]
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM users WHERE id='$id'");
    header("Location: read.php");
}

$result = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Read Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="card">
        <h2>Read Data</h2>
        
        <div class="data-list">
            <?php while($row = mysqli_fetch_assoc($result)): ?>
            <div class="data-item">
                <div class="data-info">
                    <strong><?= $row['name'] ?></strong><br>
                    <span class="email"><?= $row['email'] ?></span>
                </div>
                <div class="action-btns">
                    <a href="update.php?id=<?= $row['id'] ?>" class="btn-edit">Edit</a>
                    <a href="read.php?delete=<?= $row['id'] ?>" class="btn-delete" onclick="return confirm('Are you sure?')">Delete</a>
                </div>
            </div>
            <?php endwhile; ?>
        </div>

        <div style="margin-top: 20px;" class="nav-buttons">
            <a href="index.php">CREATE</a>
            <a href="read.php">READ</a>
        </div>
    </div>
</body>
</html>