<?php
    session_start();
    include_once "config.php";
    $outgoing_username_account = $_SESSION['username_account']; // เปลี่ยน unique_id เป็น username_account
    $sql = "SELECT * FROM users WHERE NOT username_account = '{$outgoing_username_account}' ORDER BY user_id DESC"; // เปลี่ยน unique_id เป็น username_account
    $query = mysqli_query($conn, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    echo $output;
?>
