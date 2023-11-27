<?php 
    session_start();
    include_once "config.php";

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (!empty($username) && !empty($password)) {
        $sql = "SELECT * FROM account WHERE username_account = '{$username}'"; 
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            if ($row) {
                $enc_pass = $row['password_account'];
                if (password_verify($password, $enc_pass)) {
                    // การตรวจสอบผ่าน
                    $_SESSION['username_account'] = $row['username_account'];
                    echo "success";
                } else {
                    echo "Username or Password is Incorrect!";
                }
            } else {
                echo "$username - This username not Exist!";
            }
        } else {
            echo "Error in SQL query: " . mysqli_error($conn);
        }
    } else {
        echo "All input fields are required!";
    }
?>
