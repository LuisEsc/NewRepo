<?php
require_once './core/init.php';
//require './core/Session.php';
$cart = Session::getArraySession();

$user = $_SESSION['user'];
$flowers = $_SESSION['flowers'];





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
                font-size: 60px;
                color: black;
            }
        </style>
    </head>

    <body>
        <h1>MUCHAS GRACIAS POR COMPRAR EN FLORISTER&Iacute;A ALBAHACA.</h1>
        <h3>Este es el resumen de su pedido:<br/></h3>
        <table width="500" border="1">
            <thead>
            <th width="1">Producto</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Importe</th>
        </thead>
        <tbody>
            <?php
            foreach ($cart as $flowers) {
                echo "<tr>";
                    echo "<td height='30'>" . $flowers['name'] . "</td>";
                    echo "<td height='30'>" . $flowers['cant'] . "</td>";
                    echo "<td height='30'>" . round($flowers['price'], 2, PHP_ROUND_HALF_UP) . " &euro;</td>";
                    echo "<td height='30'>" . round($flowers['cant'] * $flowers['price'], 2, PHP_ROUND_HALF_UP) . " &euro;</td>";
                echo "</tr>";
            }
            ?>


        </tbody>        
    </table>
    <h1 class="total"><b>Total:</b> <?php echo Session::getTotalPrice(); ?> &euro;</h1>                

</body>
</html>