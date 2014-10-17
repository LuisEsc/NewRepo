<?php
/*
 * 
 * 
 */

class BinaryImage {

    // Devuelve la imagen en base64
    public static function getBinary($path) {
        if (($data = file_get_contents($path)) != null) {
            if (($base64 = base64_encode($data)) != false) {
                return $base64;
            }
            return null;
        }
        return null;
    }

    // Devuelve los datos en formato binario.
    public static function getImage($base64) {
        if (($data = base64_decode($base64)) != false) {
            return $data;
        }
        return null;
    }

}
