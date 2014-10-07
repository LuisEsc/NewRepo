<?php

/**
 * Description of Flower
 *
 * @author Esmonet
 */
class Flower {

    //  Identificador de la flor
    public $id;
    // Nombre de la flor
    public $name;
    // preccio de la flor
    public $price;
    //descripción de la flor
    public $description;
    // imagen de la flor
    public $image_name;
    // thumbnail de la flor
    public $image_type;
    // categoria a la que pertenece la flor
    public $category = null;

    public function __construct($id, $name, $price, $description, $image_name, $image_type, $category) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->image_name = $image_name;
        $this->image_type = $image_type;
        $this->category = $category;
    }

    private function tabContext() {
        
    }

}
