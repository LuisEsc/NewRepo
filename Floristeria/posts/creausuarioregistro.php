<?php

require_once '../core/Connection.php';
require_once '../model/UsersModel.php';
require_once '../libs/Usuario.php';

$email = (isset($_GET['email'])) ? $_GET['email'] : null;
$password = (isset($_GET['password'])) ? md5($_GET['password']) : null;
$insertado = false;
if($email!=null && $password!=null){
    
    $insertado = UsersModel::insertToDb(new Usuario($email, $password));
    if($insertado == true){
        echo "Se ha creado el usuario correctamente";
    }
    if($insertado == false){
        echo "El usuario no se ha podido crear. Por favor, inténtelo de nuevo más tarde";
    }
}



