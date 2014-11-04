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
        //print_r($user);
        if($user!=null){
            /*$usuario = new Usuario( $user->id,
                                    $user->email,
                                    $user->password,
                                    $user->nombre,
                                    $user->apellidos,
                                    $user->dni,
                                    $user->telefono,
                                    $user->direccion,
                                    $user->localidad,
                                    $user->codpostal,
                                    $user->provincia,
                                    $user->pais
                                    );*/
            //print_r($usuario->arrayToUser($user));
            
            //unset($_SESSION['user']);
            $_SESSION['user']= $user;
            echo "adkhlasd";
            //print_r($_SESSION['user']);
            echo "<script type='text/javascript'>window.location.href='../index.php'</script>";

            
            //header("Location: ../index.php");
        }
        else{
            echo "<script type='text/javascript'>window.location.href='../registro.php'</script>";

        }
    }