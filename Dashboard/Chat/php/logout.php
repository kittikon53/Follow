<?php
    session_start();
    if(isset($_SESSION['username_account'])){
        include_once "config.php";
        $logout_username_account = mysqli_real_escape_string($conn, $_GET['logout_username_account']); // เปลี่ยน logout_id เป็น logout_username_account
        if(isset($logout_username_account)){
            $status = "Offline now";
            $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE username_account='{$logout_username_account}'"); // เปลี่ยน unique_id เป็น username_account
            if($sql){
                session_unset();
                session_destroy();
                header("location: ../login.php");
            }
        }else{
            header("location: ../users.php");
        }
    }else{  
        header("location: ../login.php");
    }
?>
