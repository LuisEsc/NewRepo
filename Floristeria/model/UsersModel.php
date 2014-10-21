<?php

//require_once "./libs/Usuario.php";
class UsersModel {

    public static function isUser($email, $password) {
        $con = Connection::getConnection();
        $object = self::setQuery("SELECT * FROM `usuarios` WHERE `email` = '{$email}' AND `password` = '{$password}'", MYSQLI_STORE_RESULT);

        $obj = mysql_fetch_assoc($object);
        //$con->close();
        return $obj;
    }
    
    public static function getUserById($id){
        //echo "SELECT * FROM usuarios WHERE id = {$id}";
        $user = self::toObject(self::setQuery("SELECT * FROM floristeria.usuarios WHERE id = {$id}"));
        //print_r($user);
        //$array = mysqli_fetch_array($user);
        //Connection::getConnection()->close();
        return $user;
    }

    public static function insertToDb(Usuario $user) {
        $con = Connection::getConnection();
        $res = $con->query("INSERT INTO `usuarios` "
                . "(`id`, `dni`, `nombre`, `apellidos`, `email`, `password`, `telefono`, `direccion`, `localidad`, `codpostal`, `provincia`, `pais`) "
                . "VALUES (null, '{$user->dni}', '{$user->nombre}','{$user->apellidos}','{$user->email}','{$user->password}','{$user->telefono}','{$user->direccion}','{$user->localidad}','{$user->codpostal}','{$user->provincia}','{$user->pais}')", MYSQLI_USE_RESULT);
        $con->close();
        return $res;
    }

    public static function updateToDb(Usuario $user) {
        if ($user instanceof Usuario) {
            // entonces usuario
            $con = Connection::getConnection();

            if ($user->email != NULL) {
                $res = $con->query("UPDATE usuarios set dni = '{$user->dni}', nombre = '{$user->nombre}', apellidos = '{$user->apellidos}', password = '{$user->password}', telefono = '{$user->telefono}', direccion = '{$user->direccion}', localidad = '{$user->localidad}', codpostal = '{$user->codpostal}', provincia = '{$user->provincia}', pais = '{$user->pais}'  where email = '{$user->email}'");
                $con->close();
                return $res;
            } else {
                $con->close();
                return 0;
            }
        } else {
            $con->close();
            return 0;
        }
        //echo $res;
    }

    public static function deleteToDb($user) {
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

    public static function isActivated() {
        // me devuelve un objeto de la claase connection
        $con = Connection::getConnection();
    }
    
    private static function setQuery($str_query) {
        $con = Connection::getConnection();       
        $res = $con->query($str_query);
        //$con->close();
        return $res;
        
        
    }
    private static function toObject($result){
        $row = mysqli_fetch_object($result);
        $usuario = null;
        if($row!=null)
        $usuario = new Usuario(
                $row->email,
                $row->password,
                $row->nombre,
                $row->apellidos,
                $row->dni,
                $row->telefono,
                $row->direccion,
                $row->localidad,
                $row->codpostal,
                $row->provincia,
                $row->pais
                );
        
        return $usuario;
    }

}
