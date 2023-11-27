<?php
session_start();
$open_connect = 1;
require('connect.php');

if(!isset($_SESSION['id_account']) || $_SESSION['role_account'] != 'admin'){ //ถ้าไม่มีเซสชัน id_account หรือเซสชัน role_account จะถูกส่งไปหน้า login
    die(header('Location: form-login.php'));
}elseif (isset($_GET['Logout'])){ //ถ้ามีการกดปุ่มออกจากระบบให้ทำการทำลายเซสขันและส่งไปหน้า login
    session_destroy();
    die(header('Location: form-login.php'));
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="your-stylesheet.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale-1.0">
    <title>ADMIN</title>
</head>
<body>
    <h1>ยินดีต้อนรับ ADMIN</h1>
    <a href="\HomePage-Edit1-main\Login\form-login.php">ออกจากระบบ</a>
</body>
</html>