<?php
require_once '../../core/Connection.php';
require_once '../../model/FlowersModel.php';
require_once '../../libs/Flower.php';
require_once '../libs/BinaryImage.php';

$nombre = $_REQUEST['nombre'];
$precio = $_REQUEST['precio'];
$categoria = $_REQUEST['categoria'];
$file = $_FILES['files'];
$descripcion = $_REQUEST['editor1'];

$maximoTamanoFichero = 3145728;

echo "insertaflor";

if($file['error']==0){
    if($file['size']<=$maximoTamanoFichero){
        
        $flower = new Flower(null, $nombre, $precio, $descripcion, $file['name'], $file['type'], $categoria, BinaryImage::getBinary($file['tmp_name']));
        //echo "<br/>".$flower->str_imgcodificada."<br/>";
        $insertado = FlowersModel::save($flower);  
        //echo "insertado: ".$insertado;
    }
}
else{
    echo "hubo un error";
}



