<?php

require_once './core/init.php';

$cart = Session::getArraySession();
//print_r($cart);

/* ($cart != null) {
    $order = new Order(null, $_SESSION['user']->id, date("D-d/M/Y -- g:i:s"), null, Session::getTotalPrice());
    $flowers = array();
    $i = 0;
    foreach ($cart as $indice => $valor) {
        $flowers[] = array(null, $valor['id'], $valor['name'], $valor['price'], $valor['cant']);
        $i++;
    }
    $order->setFlowerArray($flowers);
    echo"<br/>";
    //print_r($flowers);

    OrderModel::saveOrder($order);
    
    
}*/
mail("alejandrobiergeserrano@gmail.com", "alejandrobiergeserrano@gmail.com", "alejandrobiergeserrano@gmail.com","alejandrobiergeserrano@gmail.com","alejandrobiergeserrano@gmail.com");

header("Location: carrito.php");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//echo phpinfo();
