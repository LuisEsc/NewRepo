<?php

require_once './core/init.php';

$cart = Session::getArraySession();
//print_r($cart);

if ($cart != null) {
    $order = new Order(null, 62, date("D-d/M/Y -- g:i:s"), null, Session::getTotalPrice());
    $flowers = array();
    $i = 0;
    foreach ($cart as $indice => $valor) {
        $flowers[] = array(null, $valor['id'], $valor['name'], $valor['price']);
        $i++;
    }
    $order->setFlowerArray($flowers);
    echo"<br/>";
    //print_r($flowers);

    OrderModel::saveOrder($order);
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

