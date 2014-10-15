<?php

class Usuario {

    public $email;
    public $password;
    public $nombre;
    public $dni;
    public $apellidos;
    public $telefono;
    public $direccion;
    public $localidad;
    public $codpostal;
    public $provincia;
    public $pais;
    
    public static function arrayToUser($array){
        $this->email     = $array['email'];
        $this->password  = $array['password'];
        $this->nombre    = $array['nombre'];
        $this->dni       = $array['dni'];
        $this->apellidos = $array['apellidos'];
        $this->telefono  = $array['telefono'];
        $this->direccion = $array['direccion'];
        $this->localidad = $array['localidad'];
        $this->codpostal = $array['codpostal'];
        $this->provincia = $array['provincia'];
        $this->pais      = $array['pais'];
        return $this;
    }
    
    public function __construct($user) {
        $this->email     = $user['email'];
        $this->password  = $user['password'];
        $this->nombre    = $user['nombre'];
        $this->dni       = $user['dni'];
        $this->apellidos = $user['apellidos'];
        $this->telefono  = $user['telefono'];
        $this->direccion = $user['direccion'];
        $this->localidad = $user['localidad'];
        $this->codpostal = $user['codpostal'];
        $this->provincia = $user['provincia'];
        $this->pais      = $user['pais'];
    }

    public function actualizarDatos($email, $password, $nombre = "", $apellidos = "", $dni = "", $telefono = "", $direccion = "", $localidad = "", $codpostal = "", $provincia = "", $pais = "") {
        $this->email = email;
        $this->password = password;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->dni = $dni;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->localidad = $localidad;
        $this->codpostal = $codpostal;
        $this->provincia = $provincia;
        $this->pais = $pais;
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

