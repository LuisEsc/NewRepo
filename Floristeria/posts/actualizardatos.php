
<?php

    //error_reporting(0);
    session_start();
    //error_reporting(1);
    require_once "../libs/Usuario.php";
    require_once "../model/UsersModel.php";
    require_once "../core/Connection.php";
    require_once "../core/Session.php";


    $nombre = (isset($_REQUEST['txt-nombre']) ? $_REQUEST['txt-nombre'] : null);
    $apellidos = (isset($_REQUEST['txt-apellidos']) ? $_REQUEST['txt-apellidos'] : null);
    $dni = (isset($_REQUEST['txt-dni']) ? $_REQUEST['txt-dni'] : null);
    $telefono = (isset($_REQUEST['txt-telefono']) ? $_REQUEST['txt-telefono'] : null);
    $localidad = (isset($_REQUEST['txt-localidad']) ? $_REQUEST['txt-localidad'] : null);
    $provincia = (isset($_REQUEST['txt-provincia']) ? $_REQUEST['txt-provincia'] : null);
    $codpostal = (isset($_REQUEST['txt-codpostal']) ? $_REQUEST['txt-codpostal'] : null);
    $direccion = (isset($_REQUEST['txt-direccion']) ? $_REQUEST['txt-direccion'] : null);
    $pais = (isset($_REQUEST['txt-pais']) ? $_REQUEST['txt-pais'] : null);
    $email = (isset($_REQUEST['txt-email']) ? $_REQUEST['txt-email'] : null);
    $password = null;
    $password2 = null;

    if (isset($_REQUEST['txt-pass'])) {
        if (empty($_REQUEST['txt-pass'])) {
            $password = null;
        } else {
            $password = md5($_REQUEST['txt-pass']);
        }
    } else {
        $password = null;
    }

    if (isset($_REQUEST['txt-pass2'])) {
        if (empty($_REQUEST['txt-pass2'])) {
            $password = null;
        } else {
            $password2 = md5($_REQUEST['txt-pass2']);
        }
    } else {
        $password = null;
    }
    
    if ($password==null || $password2==null || $password!=$password2) {
        $usuario = UsersModel::isUser($_SESSION['user']->email, $_SESSION['user']->password);
        $password = $usuario->password;
    }
    
    if ($email != null) {
        $usuario = UsersModel::isUser($_SESSION['user']->email, $_SESSION['user']->password);
        $user = new Usuario($usuario->id, $email, $password, $nombre, $apellidos, $dni, $telefono, $direccion, $localidad, $codpostal, $provincia, $pais);
        
        
        //print_r($user);
        $actualizado = UsersModel::updateToDb($user);

        if ($actualizado) {
            $user = UsersModel::isUser($email,$password);
            if($user!=null)
            $_SESSION['user'] = $user;
        } else {
            echo "<br />no actualizado";
        }
    }
    echo "<script type='text/javascript'>window.location.href='../panelcontrolusuario.php'</script>";
    //header_remove();
    //header("Location:  ../panelcontrolusuario.php");
    