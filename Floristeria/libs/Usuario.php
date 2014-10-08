<?php
class Usuario{
    
    private $email;
    private $password;
    private $nombre;
    private $dni;
    private $apellidos;
    private $telefono;
    private $direccion;
    private $localidad;
    private $codpostal;
    private $provincia;
    private $pais;
    
    
    public function __construct($email, $password) {
        $this->email = $email;
        $this->password = $password;        
    }
    
    public function actualizarDatos($nombre = "", $apellidos = "", $dni = "", 
                                    $telefono = 0, $direccion = "", $localidad = "",
                                    $codpostal = "", $provincia = "", $pais = ""){
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
