<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "web1_pertemuan09";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Koneksi database gagal: " . htmlspecialchars($conn->connect_error));
}
$conn->set_charset("utf8mb4");
