<?php
include('config.php');

function updatePasswordInDatabase($email, $newPassword) {
    // Connect to the database and update the password
    include('config.php');

    // ไม่ต้องทำการแปลงรหัสผ่าน ในที่นี้เป็นตัวอย่างเท่านั้น
    $sql = "UPDATE account SET password_account = '$newPassword' WHERE email_account = '$email'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        return true; // Update successful
    } else {
        return false; // Unable to update password
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset password</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script>
        function showAlert(message, redirectUrl) {
            alert(message);
            window.location.href = redirectUrl;
        }
    </script>
</head>
<body>
<div class="image"><img class="logo-followup" src="logofollowup.png" /></div>
<div class="container">
    <h1>Reset password</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // รับรหัสผ่านใหม่จากฟอร์ม
        $newPassword = $_POST['new_password'];

        // ตรวจสอบรหัสผ่านว่ามีความยาวเพียงพอหรือไม่ (คุณสามารถเพิ่มเงื่อนไขเพิ่มเติมตามความต้องการ)
        if (strlen($newPassword) >= 8) {
            // อัพเดตรหัสผ่านใหม่ในฐานข้อมูล (คุณควรใช้ PDO หรือ MySQLi)
            if (updatePasswordInDatabase($_GET['email'], $newPassword)) {
                echo '<script>showAlert("รหัสผ่านถูกอัพเดตเรียบร้อยแล้ว", "http://localhost/HomePage-Edit1-main/Login/form-login.php");</script>';
            } else {
                echo "ไม่สามารถอัพเดตรหัสผ่าน";
            }
        } else {
            echo "รหัสผ่านต้องมีความยาวอย่างน้อย 8 ตัวอักษร";
        }
    }
    ?>

    <form method="post">
        <label for="new_password">New password:</label>
        <input type="password" name="new_password" id="new_password" required>
        <br>
        <input type="submit" value="Reset password">
    </form>
</div>
</body>
</html>
