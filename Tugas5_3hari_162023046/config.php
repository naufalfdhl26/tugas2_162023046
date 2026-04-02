<?php
$host = "localhost";
$user = "root"; 
$pass = "BASDAT2024";     
$db   = "crud_db";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>