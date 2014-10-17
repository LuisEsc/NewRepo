<?php

$id = filter_input(INPUT_GET, 'ID', FILTER_VALIDATE_INT);


// Compruebo que el valor devuelto de la función sea diferente a false y a null 
if (($id != FALSE) && ($id != NULL)) {
    // Añado las librerías
    require_once '../core/Connection.php';
    require_once '../libs/Flower.php';
    require_once '../model/FlowersModel.php';


    if (($flower = FlowersModel::getFlowerById($id)) != null) {
        header("Content-Type: image/jpeg");
    }
    print_r($flower);
    header("Content-Type: image/jpeg");
    header("Content-Length: " . strlen($cnt));
}

abstract class ImageType {

    const Normal = 0;
    const Thumb = 1;

}
