<?php
require_once '../../core/Connection.php';
require_once '../Model/FlowerModel.php';
require_once '../../libs/Flower.php';
require_once '../libs/BinaryImage.php';

$nombre = $_REQUEST['nombre'];
$precio = $_REQUEST['precio'];
$categoria = $_REQUEST['categoria'];
$file = $_FILES['files'];
$descripcion = $_REQUEST['editor1'];

$maximoTamanoFichero = 3145728;

if($file['error']==0){
    if($file['size']<=$maximoTamanoFichero){
        
        $flower = new Flower("", $nombre, $precio, $descripcion, $file['tmp_name'], $file['type'], $categoria, BinaryImage::getBase64($file['tmp_name']));
        $insertado = FlowerModel::save($flower);
                
    }
}
else{
    echo "hubo un error";
}



