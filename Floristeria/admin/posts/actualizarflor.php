<?php

require_once '../inc/Session.php';
require_once '../../core/Connection.php';
require_once '../../model/FlowersModel.php';
require_once '../../libs/Flower.php';
require_once '../libs/BinaryImage.php';

$id=null;
if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
}
$nombre = $_REQUEST['nombre'];
$precio = $_REQUEST['precio'];
$categoria = $_REQUEST['categoria'];
$file = $_FILES['files'];
$descripcion = $_REQUEST['editor1'];

$maximoTamanoFichero = 1572864;


if($file['error']==0){
    if($file['size']<=$maximoTamanoFichero){
        $flower = new Flower($id, $nombre, $precio, $descripcion, $file['name'], $file['type'], $categoria, mysql_escape_string(BinaryImage::getBinary($file['tmp_name'])) );
        $actualizado = FlowersModel::update($flower);
        
        echo "se intenta actualizar la flor ".$flower->id;
        echo "<br/>insert: ".$actualizado;
        
    }
    else{
        echo "Tamaño incorrecto";
    }
}
else{
    echo "hubo un error";
}

header("Location: ../flowers.php");     