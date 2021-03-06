<?php

class Order{
    
    public $preparado;
    
    public $id_pedido;

    public $id_cliente;

    public $precio_total = 0.0;
    
    public $timestamp;
    
    public $array_flores = array();
    
    public $gastosEnvio = 0.0;
    
    public $comentario;
    
    public $pagado = 0;

    public function __construct($id_pedido, $id_cliente, $timestamp, $array_flores , $precio_total = 0.0, $preparado = 0, $gastosEnvio=0.0,$comentario = "", $pagado = 0){ 
        $this->id_pedido = $id_pedido;
        $this->id_cliente = $id_cliente;
        $this->timestamp = $timestamp;
        $this->precio_total = $precio_total;
        $this->array_flores = $array_flores;
        $this->preparado = $preparado;
        $this->gastosEnvio = $gastosEnvio;
        $this->comentario = $comentario;
        $this->pagado = $pagado;
        
    }
    
    public function setPreparado(){
        $this->preparado = 1;
    }
    
    public function setFlowerArray($array_flores){
        $this->array_flores = $array_flores;
    }
    
    public function getFlowerArray(){
        return $this->array_flores;
    }

}
