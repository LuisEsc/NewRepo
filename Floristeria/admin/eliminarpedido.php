<?php
require_once '../core/App.php';
require_once '../core/Session.php';
require_once '../core/Connection.php';
require_once '../core/WebPage.php';

require_once '../libs/Flower.php';
require_once '../libs/Category.php';
require_once '../model/FlowersModel.php';
require_once '../model/UsersModel.php';
require_once '../libs/PoblacionEnvio.php';
require_once '../libs/Usuario.php';
require_once '../libs/Slide.php';
require_once '../model/SliderModel.php';
require_once '../libs/Order.php';
require_once '../model/OrderModel.php';

$id_pedido = null;

if(isset($_REQUEST['ip'])){
    $id_pedido = $_REQUEST['ip'];
}
$order = null;

$order = OrderModel::getOrderById($id_pedido);
if($order!=null){
    OrderModel::OrderPrepared($id_pedido);
}
header("Location: pedidos.php");

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

