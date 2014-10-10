<?php

require_once '../core/Connection.php';
require_once '../model/UsersModel.php';

    
    $email = (isset($_REQUEST['login--email']) ? $_REQUEST['login--email'] : null);
    $password = (isset($_REQUEST['login--password']) ? md5($_REQUEST['login--password']) : null);
    
    if($email!=null && $password!=null){
        $existe = UsersModel::isUser($email, $password);
        if($existe!=null){
            
            header("Location: ../index.php");
        }
        else{
            header("Location: ".$_SERVER['HTTP_REFERER']);
        }
    }