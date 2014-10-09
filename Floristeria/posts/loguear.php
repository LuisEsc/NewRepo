<?php

require_once '../core/Connection.php';
require_once '../model/UsersModel.php';

    
    $email = (isset($_REQUEST['login--email']) ? $_REQUEST['login--email'] : null);
    $password = (isset($_REQUEST['login--password']) ? md5($_REQUEST['login--password']) : null);
    echo $email."...".$password;
    if($email!=null && $password!=null){
        $existe = UsersModel::isUser($email, $password);
        print_r($existe);
        if($existe!=null){
            header("Location: ../index.php");
        }
        else{
            echo ("no es correcto");
        }
    }