<?php

/**
 * Description of Connection
 *
 * @author Esmonet Soluciones Informáticas
 */
class Connection {

    const _HOST_ = "192.168.1.50";
    const _USER_ = "luis";
    const _PASS_ = "eguzki";
    const _DB_ = "floristeria";

    private static $connection = null;

    public static function getConnection() {
        if (self::$connection == null) {
            self::newConnection();
        }
        return self::$connection;
    }

    private function newConnection() {
        self::$connection = mysqli_connect(self::_HOST_, self::_USER_, self::_PASS_, self::_DB_);
        if ((mysqli_connect_errno() != 0) && (!$this->connection)) {
            printf("No se ha podido conectar con mysql Errorcode %s\n", mysqli_connect_error());
            exit();
        }
        mysqli_set_charset(self::$connection, 'utf8');
    }

}