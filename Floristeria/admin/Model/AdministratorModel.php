<?php

/**
 * Description of AdministratorModel
 *
 * @author Esmonet
 */
class AdministratorModel {

    public static function getAdmin($username, $password) {
        require_once '../core/Connection.php';
        $con = Connection::getConnection();
        $result = $con->query("SELECT * FROM `administrator` WHERE `username` = '{$username}' AND `password` = '{$password}'");
        $con->close();
        return mysqli_fetch_object($result);
    }

}
