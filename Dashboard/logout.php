<?php
session_start();

// ทำลายเซสชัน
session_destroy();

// ส่งผู้ใช้ออกจากระบบไปยังหน้า Login
header('Location: ../index.html');
?>
