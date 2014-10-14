<?php

require_once '../core/Connection.php';
require_once '../model/UsersModel.php';
require_once '../libs/Usuario.php';
session_start();
    
    $email = (isset($_REQUEST['login--email']) ? $_REQUEST['login--email'] : null);
    $password = (isset($_REQUEST['login--password']) ? md5($_REQUEST['login--password']) : null);
    
    if($email!=null && $password!=null){
        $user = UsersModel::isUser($email, $password);
        $_SESSION['user']=new Usuario($user);
        if($user!=null){
            
            header("Location: ../index.php");
        }
        else{
            header("Location: ".$_SERVER['HTTP_REFERER']);
        }
    }