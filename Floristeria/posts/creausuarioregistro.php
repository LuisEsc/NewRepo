<?php

require_once '../core/Connection.php';
require_once '../model/UsersModel.php';
require_once '../libs/Usuario.php';
session_start();
$email = (isset($_REQUEST['login_email'])) ? $_REQUEST['login_email'] : null;
//$password = (isset($_REQUEST['login_password']) && empty($_REQUEST['login_password'])) ? md5($_REQUEST['login_password']) : null;


if(isset($_REQUEST['login_password'])){
    if(!empty($_REQUEST['login_password'])){
        $password = md5($_REQUEST['login_password']);
        echo $password;
    }
    
}

    
    
if($email!=null && $password!=null){        
    $insertado = UsersModel::insertToDb(new Usuario($email, $password));    
    if($insertado==true){
       //echo "Se ha creado el usuario correctamente" ;
        $_SESSION['user']=new Usuario(UsersModel::isUser($email, $password));
        //header("Location: ../index.php");
    }
    else{
        //echo "no se ha insertado";
    }
   
}
else{
    echo "email o pass mal pasados";
}



