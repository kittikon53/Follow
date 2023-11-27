<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reset_password'])) {
    // ตรวจสอบความถูกต้องของข้อมูลรหัสผ่านใหม่และยืนยันรหัสผ่าน
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password === $confirm_password) {
        include('config.php');

        $user_id = $_SESSION['user_id'];
        $new_password_hash = password_hash($new_password, PASSWORD_BCRYPT);
        $sql = "UPDATE users SET password = '$new_password_hash' WHERE id = $user_id";

        if (mysqli_query($conn, $sql)) {
            echo "รหัสผ่านถูกอัปเดตแล้ว";
        } else {
            echo "เกิดข้อผิดพลาดในการอัปเดตรหัสผ่าน: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    } else {
        echo "รหัสผ่านใหม่และการยืนยันรหัสผ่านไม่ตรงกัน";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome Page</title>
    <link rel="stylesheet" type="text/css" href="style.css"> <!-- เรียกใช้ไฟล์ CSS -->
</head>
<body>
<div class="icon-font-awesome"><img class="vector" src="home.png" /></div>
<div class="image"><img class="logo-followup" src="logofollowup.png" /></div>
    <div class="container">
        <h2>Welcome, User!</h2>
        <p>You have successfully logged in.</p>

        <p><a href="logout.php">Logout</a></p>
    </div>
</body>
</html>
