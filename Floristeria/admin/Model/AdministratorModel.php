<?php

/**
 * Description of AdministratorModel
 *
 * @author Esmonet
 */
require_once '../core/Connection.php';
class AdministratorModel {

    public static function getAdmin($email, $password) {
        
        
        $con = Connection::getConnection();
        
        $result = $con->query("SELECT * FROM `administrator` WHERE `email` = '{$email}' AND `password` = '{$password}'");
        //$con->close();
        //print_r($result);
        return mysqli_fetch_assoc($result);
    }

}
