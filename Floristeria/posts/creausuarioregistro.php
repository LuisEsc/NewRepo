<?php

require_once '../core/Connection.php';
require_once '../model/UsersModel.php';
require_once '../libs/Usuario.php';
session_start();
$email = (isset($_REQUEST['login_email'])) ? $_REQUEST['login_email'] : null;
//$password = (isset($_REQUEST['login_password']) && empty($_REQUEST['login_password'])) ? md5($_REQUEST['login_password']) : null;
$password = null;

if(isset($_REQUEST['login_password'])){
    if(!empty($_REQUEST['login_password'])){
        $password = md5($_REQUEST['login_password']);
        
    }
    
}

    
    
if($email!=null && $password!=null){        
    
    $insertado = UsersModel::insertToDb(new Usuario(null,$email, $password));    
    if($insertado==true){
       //echo "Se ha creado el usuario correctamente" ;
        $user = new Usuario(null,$email, $password);
        $_SESSION['user'] = $user;
        echo "<script type='text/javascript'>window.location.href='http://www.floristeriaalbahaca.es/floristeria/inicio.html'</script>";
    }
    else{
        //echo "no se ha insertado";
    }
   
}
else{
    echo "<script type='text/javascript'>window.location.href='http://www.floristeriaalbahaca.es/floristeria/login.html'</script>";
}



