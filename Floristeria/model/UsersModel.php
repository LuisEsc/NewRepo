<?php

class UsersModel {

    public static function isUser($email, $password) {
        $con = Connection::getConnection();
        $result = $con->query("SELECT * FROM `usuarios` WHERE `email` = '{$email}' AND `password` = '{$password}'");
        $con->close();
        return mysqli_fetch_object($result);
    }

}
