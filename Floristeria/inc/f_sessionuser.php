<?php
$sessionStatus = UserSession::sessionStatus();
if(sessionStatus == true){
    ?> <button id="boton" >Cerrar sesion</button><?php
}
else{
    ?> <button id="boton"> NO CERRAR SESION </button><?php
}

