<?php

$nombre = (isset($_REQUEST['txt-nombre'])? $_REQUEST['txt-nombre'] : "");
$apellidos = (isset($_REQUEST['txt-apellidos'])? $_REQUEST['txt-apellidos'] : "");
$dni = (isset($_REQUEST['txt-dni'])? $_REQUEST['txt-dni'] : "");
$telefono = (isset($_REQUEST['txt-telefono'])? $_REQUEST['txt-telefono'] : "");
$localidad = (isset($_REQUEST['txt-localidad'])? $_REQUEST['txt-localidad'] : "");
$provincia = (isset($_REQUEST['txt-provincia'])? $_REQUEST['txt-provincia'] : "");
$codpostal = (isset($_REQUEST['txt-codpostal'])? $_REQUEST['txt-codpostal'] : "");
$direccion = (isset($_REQUEST['txt-direccion'])? $_REQUEST['txt-direccion'] : "");
$pais = (isset($_REQUEST['txt-pais'])? $_REQUEST['txt-pais'] : "");
$email = (isset($_REQUEST['txt-email'])? $_REQUEST['txt-email'] : "");
$password = (isset($_REQUEST['txt-pass'])? md5($_REQUEST['txt-pass']) : "");
$password2 = (isset($_REQUEST['txt-pass2'])? md5($_REQUEST['txt-pass2']) : "");

echo $nombre."//".$apellidos."//".$dni."//".$telefono."/"
        . "/".$localidad."//".$provincia."//".$codpostal."/"
        . "/".$direccion."//".$pais."//".$email."//".$password."//".$password2;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

