<?php
// koneksi.php
$servername = "localhost";
$username = "root";
$password = "";
$database = "pertemuan2azzahra";

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
