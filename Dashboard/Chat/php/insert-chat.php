<?php 
    session_start();
    if(isset($_SESSION['username_account'])){
        include_once "config.php";
        $outgoing_username_account = $_SESSION['username_account'];
        $incoming_username_account = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
                                        VALUES ('{$incoming_username_account}', '{$outgoing_username_account}', '{$message}')") or die();
        }
    }else{
        header("location: ../login.php");
    }
?>
