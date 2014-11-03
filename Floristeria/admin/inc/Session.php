<?php

session_start();
if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') == 'GET') {
    if (($sign = filter_input(INPUT_GET, 'sign_off', FILTER_DEFAULT)) != null) {
        
        
        if (($sign == 'off') && (isset($_SESSION['admin']))) {
            $_SESSION['admin']=null;
            unset($_SESSION['admin']);
            session_destroy();
        }
    }
}
$admin = (isset($_SESSION['admin'])) ? $_SESSION['admin'] : null;

if ($admin == null) {
    header('location: login.php');
}
