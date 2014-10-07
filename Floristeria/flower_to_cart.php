<?php

require_once './core/init.php';

$id = (isset($_GET['id']) && is_numeric($_GET['id'])) ? (integer) $_GET['id'] : null;

$mode = (isset($_GET['mode']) && is_string($_GET['mode'])) ? (string) $_GET['mode'] : null;
$cant = (isset($_GET['cant']) && is_numeric($_GET['cant'])) ? (integer) $_GET['cant'] : null;
$type = (isset($_GET['type']) && is_string($_GET['type'])) ? (string) $_GET['type'] : 'sync';

if ($id !== null && $mode !== null) {
    switch ($mode) {
        case Session::_INSERT_:
            Session::addFlower(FlowersModel::getFlowerById($id), $cant);
            break;
        case Session::_DELETE_:
            Session::removeFlower(FlowersModel::getFlowerById($id));
            break;
        case Session::_REMOVE_:
            Session::removeCard();
            break;
        default:
            break;
    }

    header('Location:' . getSessionReferer());
}

function getSessionReferer() {
    $referer = "";
    // isset determina si una variable está definida y no es NULL.
    if (isset($_SESSION['referrer'])) {
        $referer = $_SESSION['referrer'];
    } elseif (isset($_SERVER['HTTP_REFERER'])) {
        $referer = $_SERVER['HTTP_REFERER'];
    } else {
        $url = 'http';
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
            $url .= 's';
        }
        $referer = $url . '://' . $_SERVER['SERVER_NAME'];
    }
    return $referer;
}

