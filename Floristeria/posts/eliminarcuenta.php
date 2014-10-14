<?php
require_once "../model/UsersModel.php";
require_once "../core/Connection.php";
require_once "../libs/Usuario.php";
session_start();

$email = (  isset($_POST['email']) ? $_POST['email'] : null );

$borrado = 0;

$borrado = UsersModel::deleteToDb($_SESSION['user']);

if($borrado==1){
    echo true;
    unset($_SESSION['user']);
    session_destroy();
}
else{
    echo false;
}

