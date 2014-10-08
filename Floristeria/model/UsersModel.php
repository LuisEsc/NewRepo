<?php

class UsersModel {

    public static function isUser($email, $password) {
        $con = Connection::getConnection();
        $result = $con->query("SELECT * FROM `usuarios` WHERE `email` = '{$email}' AND `password` = '{$password}'");
        $con->close();
        return mysqli_fetch_object($result);
    }

    public static function insertToDb(Usuario $user) {
        return true;
    }

    public static function updateToDb(Usuario $user) {
        return true;
    }

    public static function mailExists($email) {
        $con = Connection::getConnection();
        $result = $con->query("SELECT * FROM `usuarios` WHERE `email` = '{$email}'");
        $con->close();
        return mysqli_num_rows($result);
    }

}
