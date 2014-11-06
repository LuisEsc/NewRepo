<?php

require_once '../core/Connection.php';
require_once '../model/UsersModel.php';
require_once '../libs/Usuario.php';
require_once '../core/Session.php';
session_start();
    
    $email = (isset($_REQUEST['login--email']) ? $_REQUEST['login--email'] : null);
    $password = (isset($_REQUEST['login--password']) ? md5($_REQUEST['login--password']) : null);
    
    if($email!=null && $password!=null){
        $user = UsersModel::isUser($email, $password);
        
        if($user!=null){
            $user->password = $password;
            $_SESSION['user']= $user;
            //echo "adkhlasd";
            //print_r($_SESSION['user']);
            echo "<script type='text/javascript'>window.location.href='../inicio.html'</script>";
        }
        else{
            echo "<script type='text/javascript'>window.location.href='../login.html'</script>";

        }
    }