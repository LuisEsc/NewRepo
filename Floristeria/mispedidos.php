<?php
include_once './core/init.php';

include_once './inc/f-header.php';
include_once './inc/f-cart.php';
include_once './inc/f-menu.php';
require_once './libs/Usuario.php';
require_once './model/OrderModel.php';
require_once './libs/Order.php';
require_once './core/Session.php';
if (!isset($_SESSION['user'])) {
    header("Location: ./registro.php");
}




?>
<html>
    <head>
        <script src="js/jquery-1.7.1.min.js"></script>
        <script src="js/jquery.validate.js"></script>
        <script type="text/javascript">

            $(document).ready(function () {


            });
            function more(ip){
                window.location.href= "visualizarPedido.php?ip="+ip;
            }


        </script>
    </head>
    <body>

        <section  id="columns" class="container_9 clearfix col1" >
            <ol id="checkoutSteps" class="opc">
                <li class="section allow active" id="opc-login">
                    <div class="step-title">
                        <h2>PEDIDOS</h2>
                        <a href="#">Edit</a> </div>
                    <div  class="step a-item" >
                        <h3>Mis Pedidos</h3>
                        <div >
                            <table class="table table-striped">
                                    <tr>
                                        <th>Fecha y Hora</th>
                                        <th>Num. flores</th>
                                        <th>precio_total</th>
                                        <th>Funciones</th>
                                    </tr>
                                    <?php
                                    $orders = OrderModel::getOrdersByUserId($_SESSION['user']->id);
                                    foreach ($orders as $order):
                                        $sumQuant = OrderModel::getTotalQuantity($order->id_pedido);
                                        $sumQuantity = $sumQuant[0];
                                        ?>

                                        <tr>
                                            <td><?php echo $order->timestamp; ?></td>
                                            <td><?php
                                                $array = $order->array_flores;
                                                echo $sumQuantity;
                                                ?></td>
                                            <td><?php echo round($order->precio_total, 2, PHP_ROUND_HALF_UP); ?> €</td>
                                            <td><button onclick="more(<?php echo($order->id_pedido) ?>);" />Details </button></td>

                                        </tr>

                                    <?php endforeach;
                                    ?>
                            </table>
                        </div>
                    </div>
                </li>
            </ol>
        </section>
        <?php
        include_once './inc/f-footer.php';
        Connection::getConnection()->close();
        ?>
</html>
