<?php

$id = filter_input(INPUT_GET, 'ID', FILTER_VALIDATE_INT);
// Compruebo que el valor devuelto de la función sea diferente a false y a null 
if (($id != FALSE) && ($id != NULL)) {
    // Añado las librerias
    require_once '../core/Connection.php';
    require_once '../libs/Flower.php';
    require_once '../model/FlowersModel.php';

    $flower = FlowersModel::getFlowerById($id);
    print_r($flower);
}

abstract class ImageType {

    const Normal = 0;
    const Thumb = 1;

}
