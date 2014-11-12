<?php
require_once './core/init.php';

include_once './inc/f-header.php';
include_once './inc/f-cart.php';
include_once './inc/f-menu.php';
require_once './libs/Usuario.php';
require_once './model/OrderModel2.php';
require_once './libs/Order.php';
require_once './core/Session.php';

$category = array(0 => "Ramos", 1 => "Centros", 2 => "Bodas", 3 => "Plantas", 4 => "Funerarios");
error_reporting(0);
if (!isset($_SESSION['user'])) {
    header("Location: /floristeria/registro.php");
}
$id_pedido = null;
if (isset($_REQUEST['ip'])) {
    $id_pedido = $_REQUEST['ip'];
}
$total = 0;
$order = OrderModel::getOrderById($id_pedido);
$flowers = OrderModel2::getFlowersByOrderIdAndUserEmail($id_pedido, $_SESSION['user']->id);
if ($flowers == null) {
    echo "<script type='text/javascript'>window.location.href='/floristeria/mispedidos.html'</script>";
}
?>
<html>
    <head>
        <script src="/floristeria/js/jquery-1.7.1.min.js"></script>
        <script src="/floristeria/js/jquery.validate.js"></script>
        <script type="text/javascript">

            $(document).ready(function () {


            });
            function more(ip) {
                window.location.href = "/floristeria/visualizarPedido.php?ip=" + ip;
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
                                <thead>
                                    <tr>
                                        <th>Categoria</th>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Imagen</th>
                                        <th>Precio unitario</th>
                                        <th>Cantidad</th>
                                        <th>Importe</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($flowers != null)
                                        foreach ($flowers as $flower):
                                            ?>

                                            <tr>
                                                <td><?php echo $category[$flower['category']]; ?></td>
                                                <td><?php echo $flower['name']; ?></td>
                                                <td><?php echo $flower['description']; ?></td>
                                                <td><img width="70" height="70" src="data:<?php echo $flower['imagetype']; ?>;base64,<?php if ($flower != null) echo $flower['imgblop']; ?>" /></td>
                                                <td><?php echo round($flower['price'], 2); ?> €</td>
                                                <td><?php echo $flower['cantidad']; ?> </td>
                                                <td><?php
                                                    $subtotal = $flower['price'] * $flower['cantidad'];

                                                    $total+=$subtotal;
                                                    echo round($subtotal, 2)
                                                    ?>€</td>
                                                
                                            </tr>

                                        <?php endforeach; ?>
                                    <tr><td/><td/><td/><td/><td/><td style="font-size:25px;"><b>subtotal: </b></td><td style="font-size:25px;"><b><?php echo $total; ?> €</b></td></tr>
                                    <tr><td/><td/><td/><td/><td/><td style="font-size:25px;"><b>Gastos de Envío: </b></td><td style="font-size:25px;"><b><?php echo $order->gastosEnvio; ?> €</b></td></tr>
                                    <tr><td/><td/><td/><td/><td/><td style="font-size:25px;"><b>TOTAL: </b></td><td style="font-size:25px;"><b><?php echo $total + $order->gastosEnvio; ?> €</b></td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </li>
            </ol>
        </section>
        <?php
        include_once './inc/f-footer.php';
        ?>
</html>
