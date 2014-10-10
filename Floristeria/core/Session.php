<?php

/**
 * Description of Session
 *
 * @author Esmonet Soluciones Informáticas
 */
class Session {

    const _INSERT_ = 0;
    const _DELETE_ = 1;
    const _REMOVE_ = 2;

    public static function addFlower(Flower $flower = null, $cant = null) {
        self::sessionStart();
        //$cant = ($cant == null) ? 1 : $cant;
        if (self::containsFlower($flower)) {
            if (($index = self::getFlowerIndexSession($flower)) !== null) {
                if ($cant == null) {
                    $_SESSION['flowers'][$index]['cant'] += 1;
                } else {
                    $_SESSION['flowers'][$index]['cant'] = $cant;
                }
            } else {
                $cant = ($cant == null) ? 1 : $cant;

                $_SESSION['flowers'][] = array(
                    'id' => $flower->id,
                    'name' => $flower->name,
                    'price' => $flower->price,
                    'imagename' => $flower->image_name,
                    'imagetype' => $flower->image_type,
                    'cant' => $cant
                );
            }
            //print_r($_SESSION['flowers']);
        }
    }
    

    public static function removeFlower(Flower $flower = null) {
        self::sessionStart();
        if (self::containsFlower($flower) && isset($_SESSION['flowers'])) {
            if (($index = self::getFlowerIndexSession($flower)) !== null) {
                unset($_SESSION['flowers'][$index]);
            }
        }
    }

    public static function removeCard() {
        self::sessionStart();
        if (isset($_SESSION['flowers'])) {
            unset($_SESSION['flowers']);
        }
    }

    public static function getItemsCount() {
        self::sessionStart();
        $n = (isset($_SESSION['flowers'])) ? (int) count($_SESSION['flowers']) : 0;
        return $n;
    }

    public static function getTotalPrice() {
        self::sessionStart();
        $t = 0.00;
        if (isset($_SESSION['flowers'])) {
            foreach ($_SESSION['flowers'] as $flower) {
                $t += ($flower['cant'] * $flower['price']);
            }
        }
        return $t;
    }

    public static function getArraySession() {
        self::sessionStart();
        if (isset($_SESSION['flowers']) && (count($_SESSION['flowers']) > 0)) {
            return $_SESSION['flowers'];
        }
        return null;
    }

    public static function priceFormat($price) {
        return number_format(round($price, 2), 2, ",", ".");
    }

    private static function containsFlower(Flower $flower) {
        if ((!is_null($flower)) && ($flower instanceof Flower)) {
            return true;
        }
        return false;
    }

    private static function getFlowerIndexSession(Flower $flower) {
        $result = null;
        if (isset($_SESSION['flowers'])) {
            for ($i = 0; $i < count($_SESSION['flowers']); $i++) {
                if ($_SESSION['flowers'][$i]['id'] == $flower->id) {
                    $result = $i;
                }
            }
        }
        return $result;
    }

    private static function sessionStart() {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

}
