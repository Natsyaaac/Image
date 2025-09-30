<?php
// file: koneksi.php
$host = "localhost";
$user = "root";
$pass = ""; // Kosongkan jika tidak ada password
$db = "website";
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
 die("Koneksi gagal: " . $conn->connect_error);
}
?>