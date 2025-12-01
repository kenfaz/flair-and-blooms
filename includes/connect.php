<?php
// includes/connect.php
$host = 'localhost';
$user = 'root';
$pass = ''; // XAMPP default
$db   = 'flair_and_blooms';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
$conn->set_charset('utf8mb4');
?>
