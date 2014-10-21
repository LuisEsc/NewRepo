<?php
require_once './core/init.php';
require_once './core/UserSession.php';
if(isset($_SESSION['user'])){
    unset($_SESSION['user']);
    header("Location: index.php");
}
else{
    header("Location: registro.php");
}
    