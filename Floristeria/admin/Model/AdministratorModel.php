<?php

/**
 * Description of AdministratorModel
 *
 * @author Esmonet
 */
class AdministratorModel {

    public static function getAdmin($email, $password) {
        require_once '../core/Connection.php';
        $con = Connection::getConnection();
        $result = $con->query("SELECT * FROM `administrator` WHERE `email` = '{$email}' AND `password` = '{$password}'");
        $con->close();
        return mysqli_fetch_object($result);
    }

}
