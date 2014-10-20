<?php

class Order{

    public $id_pedido;

    public $id_cliente;

    public $precio_total;
    
    public $timestamp;
    
    public $array_flores;

    public function __construct($id_pedido, $id_cliente, $timestamp, $array_flores , $precio_total = 0.0){ 
        $this->id_pedido = $id_pedido;
        $this->id_cliente = $id_cliente;
        $this->timestamp = $timestamp;
        $this->precio_total = $precio_total;
        $this->array_flores = $array_flores;
        
    }
    

}
