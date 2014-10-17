<?php

// Obtengo el ID
$id = filter_input(INPUT_GET, 'ID', FILTER_VALIDATE_INT);

// Compruebo que el valor devuelto de la función sea diferente a false y a null 
if (($id != FALSE) && ($id != NULL)) {
    // Añado las librerías
    require_once '../core/Connection.php';
    require_once '../libs/Flower.php';
    require_once '../model/FlowersModel.php';

    // Compruebo que el valor no sea nulo 
    if (($flower = FlowersModel::getFlowerById($id)) != null) {
        require_once '../admin/libs/BinaryImage.php';

        header("Content-Type: {$flower->image_type}");
        
        echo(BinaryImage::getImage($flower->str_imgcodificada));
    }
}