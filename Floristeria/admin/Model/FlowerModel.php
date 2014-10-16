<?php

/**
 * Description of FlowerModel
 *
 * @author Esmonet Soluciones Informáticas
 */
require_once '../core/Connection.php';

class FlowerModel {

    // Guarda la flor en la base de datos
    public static function save(Flower $flower) {
        $sql = "INSERT INTO table_name (id, title, description)";
        $sql .= "VALUES (null , {$this->flower->title}}, {$this->flower})";
    }

    // Actualiza la flor en la base de datos
    public static function update(Flower $flower) {
        
        $sql = "UPDATE flowers SET ContactName='Alfred Schmidt', City='Hamburg' WHERE CustomerName='Alfreds Futterkiste';";
    }

    // Elimina la flor de la base de datos
    public function delete(Flower $flower) {
        $sql = "DELETE FROM flowers WHERE id=1;";
    }

}
