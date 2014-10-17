<?php
require_once '../inc/Session.php';
require_once '../../core/Connection.php';
require_once '../../model/FlowersModel.php';
require_once '../../libs/Flower.php';
require_once '../libs/BinaryImage.php';

$nombre = $_REQUEST['nombre'];
$precio = $_REQUEST['precio'];
$categoria = $_REQUEST['categoria'];
$file = $_FILES['files'];
$descripcion = $_REQUEST['editor1'];

$maximoTamanoFichero = 1572864;


if($file['error']==0){
    if($file['size']<=$maximoTamanoFichero){
        $flower = new Flower(null, $nombre, $precio, $descripcion, $file['name'], $file['type'], $categoria, mysql_escape_string(BinaryImage::getBinary($file['tmp_name'])) );
        $insertado = FlowersModel::save($flower);
    }
    else{
        echo "Tamaño incorrecto";
    }
}
else{
    echo "hubo un error";
}
header("Location: ../flowers.php");



