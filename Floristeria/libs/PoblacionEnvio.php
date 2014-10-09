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

    public function __construct($id, $p, $km) {
        $this->id = $id;
        $this->pob = $p;
        $this->km = $km;
    }

}
