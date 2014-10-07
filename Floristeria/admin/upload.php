<?php

        const MAX_FILE_SIZE = 2; // tamaño máximo de MB



$image = (isset($_FILES['image'])) ? $_FILES['image'] : null;

if (($image !== NULL) && ($image['error'] == UPLOAD_ERR_OK)) {

    if (($_FILES['image']['size'] / 1024) / 1024 <= MAX_FILE_SIZE && ($image['type'] == "image/jpeg") || ($image['type'] == "image/png")) {

        $img = new ImageProcessing();
        $data = $img->base64_encode_image($_FILES['image']['tmp_name'], $_FILES['image']['size']);
        $p = $img->base64_decode_image($data);
        echo $p;
        //$img->image_view($p, $_FILES['image']['type']);
    
    }
}

// Requiere Libreria PHP IMAGICK




class Utils {
     public static function getOld(){
        
    } 

}

class ImageProcessing {

    private $imagefile;
    
    

    public function __construct() {
        
    }

    public function base64_encode_image($filename, $size) {
        $pointer = fopen($filename, 'rb');
        $str_content = fread($pointer, $size);
        return (string) ($pointer == false || $str_content == false) ? null : base64_encode($str_content);
    }

    public function base64_decode_image($string) {
        return (string) base64_decode($string);
    }

    public function image_view($data, $type) {
        header("Content-Type: {$type}");
        echo (string) $data;
    }
    
    
    
}