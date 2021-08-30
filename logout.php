<?php
    session_start();
    unset($_SESSION['user_id']);
    unset($_SESSION['admin_id']);
    unset($_SESSION['name']);
    session_destroy();
    header("location:index.php");
?>