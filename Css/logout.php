<?php
    session_start();
    if(isset($_SESSION['name']))
    unset($_SESSION['name']);
    unset($_SESSION['password']);
    unset($_SESSION['No']);
    header("location:index.php");
?>

