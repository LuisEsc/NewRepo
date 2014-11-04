<?php

session_start();
if (isset($_GET['sign_off']))
    $sign = $_GET['sign_off'];
if (($sign == 'off') && (isset($_SESSION['admin']))) {
    echo $sign;
    $_SESSION['admin'] = null;
    unset($_SESSION['admin']);
    session_destroy();
}
session_start();
$admin = (isset($_SESSION['admin'])) ? $_SESSION['admin'] : null;

if ($admin == null) {

    echo "<script type='text/javascript'>window.location.href='login.php'</script>";
    //header('location: login.php');
}
