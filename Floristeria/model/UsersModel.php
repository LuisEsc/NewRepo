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
        $result = $con->query("SELECT count(email) as number FROM `usuarios` WHERE email = '".$email."'");
        $con->close();
        $res = mysqli_fetch_object($result);
        return (int)$res->number;
        //return $result->num_rows;
    }

}
