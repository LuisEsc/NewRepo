<?php

require_once '../inc/Session.php';
require_once '../../core/Connection.php';
require_once '../../model/FlowersModel.php';
require_once '../../libs/Flower.php';
require_once '../libs/BinaryImage.php';
//require_once 'Imagick.php';

$id = $_REQUEST['id'];
$nombre = $_REQUEST['nombre'];
$precio = $_REQUEST['precio'];
$categoria = $_REQUEST['categoria'];
$file = $_FILES['files'];
$descripcion = $_REQUEST['editor1'];
$flower = null;
//$flor = FlowersModel::getFlowerById($id);
phpinfo();
$maximoTamanoFichero = 1572864;
print_r($file);
if (isset($_FILES['files']) && !empty($_FILES['files']) && $file['error'] != 4) {
    if ($file['error'] == 0) {
        if ($file['size'] <= $maximoTamanoFichero) {
            echo "id: " . $id;
            
            $image = new Imagick($file['tmp_name']);
            $image->cropThumbnailImage(150,200);
            $image->writeImage($file['tmp_name']);
            
            $flower = new Flower($id, $nombre, $precio, $descripcion, $file['name'], $file['type'], $categoria, mysql_escape_string(BinaryImage::getBinary($file['tmp_name'])));

            $actualizado = FlowersModel::update($flower);

            echo "se intenta actualizar la flor " . $flower->id;
            echo "<br/>insert: " . $actualizado;
        } else {
            echo "Tamaño incorrecto";
        }
    } else {
        echo "error: ";
        print_r($file);
        echo "hubo un error";
    }
}
if ($file['error'] == 4 && $id != null) {
    $flower = new Flower($id, $nombre, $precio, $descripcion, null, null, $categoria, null);
    $actualizado = FlowersModel::updateNoImg($flower);
    //print_r($nuevaFlor);
}
header("Location: ../flowers.php");     