<?php
    session_start();
    include_once "config.php";

    $outgoing_username_account = $_SESSION['username_account']; // เปลี่ยน unique_id เป็น username_account
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

    $sql = "SELECT * FROM users WHERE NOT username_account = '{$outgoing_username_account}' AND (fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%') "; // เปลี่ยน unique_id เป็น username_account
    $output = "";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }else{
        $output .= 'No user found related to your search term';
    }
    echo $output;
?>
