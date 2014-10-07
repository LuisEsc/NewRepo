<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FlowerModel
 *
 * @author Esmonet
 */
class FlowerModel {

    private $flower = null;

    public function __construct(Flower $flower) {
        $this->flower = $flower;
    }

    // Guarda la flor en la base de datos
    public function save() {
        $sql = "INSERT INTO table_name (id, title, description)";
        $sql .= "VALUES (null , {$this->flower->title}}, {$this->flower})";
    }

    // Actualiza la flor en la base de datos
    public function update() {
        $sql = "UPDATE flowers SET ContactName='Alfred Schmidt', City='Hamburg' WHERE CustomerName='Alfreds Futterkiste';";
    }

    // Elimina la flor de la base de datos
    public function delete() {
        $sql = "DELETE FROM flowers WHERE id=1;";
    }
    
}
