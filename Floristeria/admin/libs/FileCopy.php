<?php

$status = (isset($_POST['status'])) ? $_POST['status'] : null;
$img = (isset($_FILES['imagefile'])) ? $_FILES['imagefile'] : null;

//print_r($img);
//header("Content-Type: image/jpeg");
//header("Content-Length: " . strlen($cnt));
echo FileCopy::readData(FileCopy::CopyToDB($img));

class FileCopy {

    public static function CopyToDB($file) {
        if (((int) ($file['error'])) == 0) {
            $data = base64_encode(file_get_contents($file['tmp_name']));
            return $data;
        }
        return null;
    }

    public static function readData($data) {
        return base64_decode($data);
    }   

}
