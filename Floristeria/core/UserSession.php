<?php

class UserSession {

    public static function init(Usuario $usuario) {
        self::sessionStart();
        
    }

    private static function sessionStart() {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

}
