<?php
$host = "localhost";
$user = "root";
$pass = "hoanganh20132";
$db = "hospital_db";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");
?>
