<?php

/**
 * Description of PoblacionEnvio
 *
 * @author Esmonet Soluciones Informáticas
 */
class PoblacionEnvio {

    const PRECIO_KM = 0.50;
    const PRECIO_FIJO = 4.00;

    public $id;
    public $pob;
    public $km;
    public $coste;

    public function __construct($p, $km) {
        $this->id = $p;
        $this->pob = $p;
        $this->km = $km;
        $this->coste = $km;
        
       
    }

}
