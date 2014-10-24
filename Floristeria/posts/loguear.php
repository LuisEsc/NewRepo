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
            $usuario = new Usuario($email,$password);
            print_r($usuario->arrayToUser($user));
            $_SESSION['user']=$usuario->arrayToUser($user);
            header("Location: ../index.php");
        }
        else{
            header("Location: ".$_SERVER['HTTP_REFERER']);
        }
    }