<?php
require_once './inc/Session.php';
require_once '../model/FlowersModel.php';
require_once '../model/OrderModel.php';
require_once '../libs/Order.php';
require_once '../core/Connection.php';
require_once '../libs/Flower.php';
require_once '../model/UsersModel.php';
require_once '../libs/Usuario.php';

//$category = array(0 => "Ramos", 1 => "Centros", 2 => "Bodas", 3 => "Plantas", 4 => "Funerarios");

$id_pedido = null;

if (isset($_REQUEST['id_pedido'])) {
    $id_pedido = $_REQUEST['id_pedido'];
}
?>
<html lang="es">
    <script type="text/javascript" src="../js/jquery-1.7.1.min.js"></script>

    <?php
    require_once './inc/header_struct.php';
    ?>

    
    <script type="text/javascript">
        function more(ip){
            window.location.href = "visualizarPedido.php?ip="+ip;
        }
    </script>
    
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Listado de Pedidos</h1>        

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>E-mail de Cliente</th>
                        <th>Fecha y Hora</th>
                        <th>Num. flores</th>
                        <th>precio_total</th>
                        <th>Funciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $orders = OrderModel::getOrders();
                        foreach ($orders as $order):?>
                    
                        <tr>
                            <td><?php $user = UsersModel::getUserById($order->id_cliente);  echo $user->email; ?></td>
                            <td><?php echo $order->timestamp;    ?></td>
                            <td><?php $array = $order->array_flores; echo sizeof($array); ?></td>
                            <td><?php echo $order->precio_total; ?> €</td>
                            <td><button onclick="more(<?php echo($order->id_pedido) ?>);" class="glyphicon glyphicon-info-sign"> </button></td>
                            
                        </tr>

                        <?php endforeach;     Connection::getConnection()->close();?>
                </tbody>
            </table>
        </div>




    </div>
</div>
</div>

</body>
</html>