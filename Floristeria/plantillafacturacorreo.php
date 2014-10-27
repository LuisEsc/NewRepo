<?php
require_once './core/init.php';

$cart = Session::getArraySession();
$user = $_SESSION['user'];
$order = null;
$flowers = $_SESSION['flowers'];
error_reporting(0);

if ($cart != null) {
    //$flowers = OrderModel::getQuantity($order->id_pedido);
}
?>
<html>
    <head>
        <link href="css/styles.css" rel="stylesheet" type="text/css" media="all">
        <link href="css/custom-style.css" rel="stylesheet" type="text/css" media="all">
        <link rel="stylesheet" type="text/css" href="css/component.css">
        <link rel="stylesheet" type="text/css" href="css/cookietool.css">

        <style type="text/css">
            h1 {
                color: #00cc00;
            }
            th{
                text-align: center;
            }
            td{
                text-align: center;
                vertical-align: middle;
            }
            .total{
                font-size: 40px;
                color: black;
            }
        </style>
    </head>
    <body>
        <h1>MUCHAS GRACIAS POR COMPRAR EN FLORISTER&Iacute;A ALBAHACA.</h1>
        <h3>Este es el resumen de su pedido:<br/></h3>
        <table width="500" border="1" cellpadding="15" cellspacing="50">
            <thead>
                <th width="1">Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Importe</th>
        </thead>
        <tbody>
            <?php foreach ($cart as $flowers): ?>
            <tr>
                <td height="30"><?php echo $flowers['name']; ?></td>
                <td height="30"><?php echo $flowers['cant']; ?></td>
                <td height="30"><?php echo round($flowers['price'], 2, PHP_ROUND_HALF_UP); ?> &euro;</td>
                <td height="30"><?php echo round($flowers['cant'] * $flowers['price'], 2, PHP_ROUND_HALF_UP); ?> &euro;</td>
            </tr>
            <?php endforeach; ?>
            
                
        </tbody>
        
    </table>
        <p class="total"><b>Total:</b> <?php echo Session::getTotalPrice(); ?> &euro;</p>                
                
</body>
</html>
