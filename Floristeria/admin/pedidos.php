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
$tipo = null;

if (isset($_REQUEST['tipo'])) {
    $tipo = $_REQUEST['tipo'];
}

if (isset($_REQUEST['id_pedido'])) {
    $id_pedido = $_REQUEST['id_pedido'];
}
$orders = OrderModel::getOrders();
?>
<html lang="es">
    <script type="text/javascript" src="../js/jquery-1.7.1.min.js"></script>

    <?php
    require_once './inc/header_struct.php';
    ?>


    <script type="text/javascript">
        function more(ip) {
            window.location.href = "visualizarPedido.php?ip=" + ip;
        }
        function filtrar() {
            var ip = $("#bool_preparado").val();
            if (ip != -1) {
                window.location.href = "pedidos.php?tipo=" + ip;
            }
            else {
                window.location.href = "pedidos.php";
            }
        }
        function preparar(ip) {
            if (ip != -1) {
                window.location.href = "eliminarpedido.php?ip=" + ip;
            }
            else {
                window.location.href = "eliminarpedido.php";
            }
        }
    </script>

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Listado de Pedidos</h1>        

        <div class="table-responsive">
            <select class="form-control" onchange="filtrar();" name="bool_preparado" id="bool_preparado" >
                <option <?php echo "selected='selected'"; ?> value="-1">Mostrar todas</option>
                <option <?php if ($tipo != null && $tipo == 0) echo "selected='selected'"; ?> value="0">Sin Preparar</option>
                <option <?php if ($tipo != null && $tipo == 1) echo "selected='selected'"; ?> value="1">Preparados</option>
            </select>
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
                    
                    foreach ($orders as $order):
                           $sum = OrderModel::getTotalQuantity($order->id_pedido);
                           $sumQuantity = $sum[0];

                        if ($tipo == $order->preparado || $tipo == null) {
                            ?>
                            <tr>
                                <td><?php
                                    $user = UsersModel::getUserById($order->id_cliente);
                                    echo $user->email;
                                    ?></td>
                                <td><?php echo $order->timestamp; ?></td>
                                <td><?php
                                    $array = $order->array_flores;
                                    echo $sumQuantity;
                                    ?></td>
                                <td><?php echo $order->precio_total; ?> €</td>
                                <td><button title="informacion del pedido" onclick="more(<?php echo($order->id_pedido) ?>);" class="glyphicon glyphicon-info-sign"> </button>
                                    <?php if ($order->preparado == 0) { ?>
                                        <button title="Marcar como preparado" onclick="preparar(<?php echo $order->id_pedido; ?>);" class="glyphicon glyphicon-ok"> </button></td>
                                    <?php } ?>

                            </tr>

                        <?php }endforeach; ?>
                </tbody>
            </table>
        </div>




    </div>
</div>
</div>

</body>
</html>