<?php
session_start();
$open_connect = 1;
require('config.php');

if (isset($_POST['username_account']) && isset($_POST['password_account'])) {
    $username_account = htmlspecialchars(mysqli_real_escape_string($connect, $_POST['username_account']));
    $password_account = htmlspecialchars(mysqli_real_escape_string($connect, $_POST['password_account']));
    $query_check_account = "SELECT * FROM account WHERE username_account = '$username_account'";
    $call_back_check_account = mysqli_query($connect, $query_check_account);

    if (mysqli_num_rows($call_back_check_account) == 1) {
        $result_check_account = mysqli_fetch_assoc($call_back_check_account);
        $stored_password = $result_check_account['password_account'];
        $count = $result_check_account['login_count_account'];
        $ban = $result_check_account['ban_account'];

        if ($result_check_account['lock_account'] == 1) {
            echo '<h1>บัญชีนี้ถูกระงับชั่วคราว</h1>';
            echo "<h2>ระงับบัญชีนี้เป็นเวลา $time_ban_account นาที เพราะผู้ใช้กรอกรหัสผ่านผิดจำนวน $count ครั้ง</h2>";
            echo "<h2>บัญชีนี้จะถูกปลดจากการระงับเมื่อถึงเวลา $ban</h2>";
            echo '<a href="form-login.php">กลับไปยังหน้าเข้าสู่ระบบ</a>';
        } elseif ($password_account == $stored_password) {
            $query_reset_login_count_account = "UPDATE account SET login_count_account = 0 WHERE username_account = '$username_account'";
            $call_back_reset = mysqli_query($connect, $query_reset_login_count_account);

            $_SESSION['id_account'] = $result_check_account['id_account'];
            $_SESSION['role_account'] = $result_check_account['role_account'];

            if ($result_check_account['role_account'] == 'admin') {
                header('Location: /HomePage-Edit1-main/role/admin.php');
                exit();
            } elseif ($result_check_account['role_account'] == 'user') {
                header('Location: \HomePage-Edit1-main\Dashboard\dashboard.html');
                exit();
            }
        } else {
            echo '<h1>รหัสผ่านไม่ถูกต้อง</h1>';
            echo '<a href="form-login.php">กลับไปยังหน้าเข้าสู่ระบบ</a>';
        }
    } else {
        echo '<h1>ไม่มีชื่อผู้ใช้นี้ในระบบ</h1>';
        echo '<a href="form-login.php">กลับไปยังหน้าเข้าสู่ระบบ</a>';
    }
} else {
    echo '<h1>กรุณากรอกข้อมูล</h1>';
    echo '<a href="form-login.php">กลับไปยังหน้าเข้าสู่ระบบ</a>';
}
?>
