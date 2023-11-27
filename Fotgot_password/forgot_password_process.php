<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    $sql = "SELECT email_account FROM account WHERE email_account = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // ส่งลิงก์รีเซ็ตรหัสผ่านไปยังอีเมลของผู้ใช้
        // ในส่วนนี้คุณสามารถใช้ไลบรารีส่งอีเมล เช่น PHPMailer
        echo "ส่งลิงก์รีเซ็ตรหัสผ่านไปยังอีเมลของคุณ: " . $email;

        // สามารถเรียกฟังก์ชัน resetPassword และส่งอีเมลไปยังผู้ใช้ในนี่
        resetPassword($email);
    } else {
        echo "ไม่พบบัญชีผู้ใช้ที่เกี่ยวข้องกับอีเมลนี้";
    }
}

mysqli_close($conn);

function resetPassword($email) {
    // นำผู้ใช้ไปยังหน้าเปลี่ยนรหัสผ่าน (ในตัวอย่างนี้ใช้ newpassword.php)
    header("Location: newpassword.php?email=" . $email);
}
?>
