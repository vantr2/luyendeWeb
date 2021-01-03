<?php
    session_start();
    if( isset($_SESSION['username']) && $_SESSION['username'] != NULL){
        unset($_SESSION['username']);
        unset($_SESSION['login_time']);
        header("location:login.php");
    }
?>
