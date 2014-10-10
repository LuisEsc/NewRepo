<?php

require_once '../core/Connection.php';
require_once '../model/UsersModel.php';
require_once '../libs/Usuario.php';

$email = (isset($_REQUEST['login_email'])) ? $_REQUEST['login_email'] : null;
$password = (isset($_REQUEST['login_password'])) ? md5($_REQUEST['login_password']) : null;



if($email!=null && $password!=null){        
    $insertado = UsersModel::insertToDb(new Usuario($email, $password));    
    if($insertado==true){
       //echo "Se ha creado el usuario correctamente" ;
        header("Location: ../index.php");
    }
    else{
        //echo "no se ha insertado";
    }
   
}
else{
    echo "email o pass mal pasados";
}



