<?php
// config.php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'followup';

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    die("การเชื่อมต่อฐานข้อมูลล้มเหลว : " . mysqli_connect_error());
}

mysqli_set_charset($conn, 'utf8');
?>
