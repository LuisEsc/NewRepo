<?php
require_once '../core/App.php';
require_once '../core/Session.php';
require_once '../core/Connection.php';
require_once '../core/WebPage.php';
require_once '../libs/Flower.php';
require_once '../model/FlowersModel.php';
require_once '../model/OrderModel2.php';
session_start();

$order = $_SESSION['order'];
Ordermodel2::delete($order);

include_once '../inc/f-header.php';
include_once '../inc/f-cart.php';
include_once '../inc/f-menu.php';
?>
<style type="text/css">
        
        .ancho{            
            width: auto;
            overflow: hidden;
        }
        
    </style>

<div class="slider-home-page">
    <link rel="stylesheet" href="css/iview.css" />
    <link rel="stylesheet" href="css/skin/style.css" />
    <script type="text/javascript" src="js/raphael-min.js"></script> 
    <script type="text/javascript" src="js/jquery.easing.js"></script> 
    <script src="js/iview.js"></script> 
<div class="width-carousel recommend-block">
    <div class="container_9">
        <h3>EL PEDIDO NO SE PUDO REALIZAR, INTÉNTALO DE NUEVO MÁS TARDE </h3>
    </div>
</div>

        <?php
//echo $_SESSION['email'];
        include_once '../inc/f-footer.php';
//$index->footerCreate();
