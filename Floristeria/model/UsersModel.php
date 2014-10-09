<?php
//require_once "libs/Usuario.php";
class UsersModel {

    public static function isUser($email, $password) {
        $con = Connection::getConnection();
        $object = $con->query("SELECT * FROM `usuarios` WHERE `email` = '{$email}' AND `password` = '{$password}'", MYSQLI_STORE_RESULT);
        $obj = mysqli_fetch_assoc($object);
        $con->close();
        return $obj;
    }

    public static function insertToDb(Usuario $user) {
        $con = Connection::getConnection();
        $res = $con->query("INSERT INTO `usuarios` "
                . "(`id`, `dni`, `nombre`, `apellidos`, `email`, `password`, `telefono`, `direccion`, `localidad`, `codpostal`, `provincia`, pais) "
                . "VALUES (null, '{$user->dni}', '{$user->nombre}','{$user->apellidos}','{$user->email}','{$user->password}','{$user->telefono}','{$user->direccion}','{$user->localidad}','{$user->codpostal}','{$user->provincia}','{$user->pais}')", MYSQLI_USE_RESULT);
        $con->close();
        return $res;
    }

    public static function updateToDb(Usuario $user) {
        $con = Connection::getConnection();
        $res = mysqli_query($link, $query);
        return true;
    }

    public static function deleteToDb(Usuario $user) {
        $con = Connection::getConnection();
        $res = mysqli_query($con, "DELETE FROM `usuarios` WHERE `email` = '{$user->email}'");
        return $res;
    }

    public static function mailExists($email) {
        $con = Connection::getConnection();
        $result = $con->query("SELECT count(email) as number FROM `usuarios` WHERE email = '" . $email . "'");
        $con->close();
        $res = mysqli_fetch_object($result);
        return (int) $res->number;
    }

}
