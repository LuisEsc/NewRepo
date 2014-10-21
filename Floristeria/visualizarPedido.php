<?php
require_once './core/init.php';

include_once './inc/f-header.php';
include_once './inc/f-cart.php';
include_once './inc/f-menu.php';
require_once './libs/Usuario.php';
require_once './model/OrderModel.php';
require_once './libs/Order.php';
require_once './core/Session.php';

$category = array(0 => "Ramos", 1 => "Centros", 2 => "Bodas", 3 => "Plantas", 4 => "Funerarios");

if (!isset($_SESSION['user'])) {
    header("Location: ./registro.php");
}
$id_pedido = null;
if (isset($_REQUEST['ip'])) {
    $id_pedido = $_REQUEST['ip'];
}
$flowers = OrderModel::getFlowersByOrderIdAndUserId($id_pedido, $_SESSION['user']->email);

if ($flowers == null) {
    header("Location: mispedidos.php");
}
?>
<html>
    <head>
        <script src="js/jquery-1.7.1.min.js"></script>
        <script src="js/jquery.validate.js"></script>
        <script type="text/javascript">

            $(document).ready(function () {


            });
            function more(ip) {
                window.location.href = "visualizarPedido.php?ip=" + ip;
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
                                        <th>Precio</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
if ($flowers != null)
    foreach ($flowers as $flower):
        ?>

                                            <tr>
                                                <td><?php echo $category[$flower->category]; ?></td>
                                                <td><?php echo $flower->name; ?></td>
                                                <td><?php echo $flower->description; ?></td>
                                                <td><img width="70" height="70" src="data:<?php echo $flower->image_type; ?>;base64,<?php if ($flower != null) echo $flower->str_imgcodificada; ?>" /></td>
                                                <td><?php echo round($flower->price, 2, PHP_ROUND_HALF_UP); ?> €</td>
                                            </tr>

    <?php endforeach; ?>

                                    <tr><td/><td/><td/><td/><td><b>TOTAL: <?php echo round(OrderModel::getOrderById($id_pedido)->precio_total, 2, PHP_ROUND_HALF_UP); ?> €</b></td></tr>
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
