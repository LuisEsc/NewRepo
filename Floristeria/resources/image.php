<?php

$image = (isset($_GET['image'])) ? $_GET['image'] : null;
$type = (isset($_GET['type'])) ? $_GET['type'] : null;

abstract class ImageType {

    const Normal = 0;
    const Thumb = 1;

}

// El tipo enumerador en php
if ($image != null && ($type == ImageType::Normal || $type == ImageType::Thumb)) {
    include_once '../core/Connection.php';
    $connection = Connection::getConnection();
    
    
}