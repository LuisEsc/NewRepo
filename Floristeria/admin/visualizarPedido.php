<?php
require_once './inc/Session.php';
require_once '../model/FlowersModel.php';
require_once '../model/OrderModel.php';
require_once '../model/OrderModel2.php';
require_once '../libs/Order.php';
require_once '../core/Connection.php';
require_once '../libs/Flower.php';
require_once '../libs/Usuario.php';
require_once '../model/UsersModel.php';

error_reporting(0);

$category = array(0 => "Ramos", 1 => "Centros", 2 => "Bodas", 3 => "Plantas", 4 => "Funerarios", 5=>"Extras");

$total = 0;

$id_pedido = null;

if (isset($_REQUEST['ip'])) {
    $id_pedido = $_REQUEST['ip'];
} else {
    header("Location: pedidos.php");
}

$user_id = OrderModel2::getUserIdByOrderId($id_pedido);
//

print_r($user);
$order = OrderModel::getOrderById($id_pedido);
$flowers = OrderModel2::getFlowersByOrderId($id_pedido);
?>
<html lang="es">
    <script type="text/javascript" src="../js/jquery-1.7.1.min.js"></script>

    <?php
    require_once './inc/header_struct.php';
    $user = UsersModel::getUserById($user_id);
    ?>

    <style type="text/css">
        .datos{
            font-size: 20px;
        }

    </style>


    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Detalles del pedido</h1>        

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Categoria</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Imagen</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Importe</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($flowers as $flower): ?>

                        <tr>
                            <td><?php echo $category[$flower['category']]; ?></td>
                            <td><?php echo $flower['name']; ?></td>
                            <td><?php echo $flower['description']; ?></td>
                            <td><img width="70" height="70" src="data:<?php echo $flower['imagetype']; ?>;base64,<?php if ($flower != null) echo $flower['imgblop']; ?>" /></td>
                            <td><?php echo round($flower['price'], 2); ?> €</td>
                            <td><?php echo $flower['cantidad']; ?></td>
                            <td><?php $subtotal = round($flower['cantidad'] * $flower['price'], 2);
                    $total+= $subtotal;
                    echo $subtotal . " &euro;"; ?></td>
                        </tr>

                    <?php endforeach; ?>

                    <tr><td/><td/><td/><td/><td/><td/><td><b>Subtotal: <?php echo round($total, 2); ?> &euro;</b></td></tr>
                    <tr><td/><td/><td/><td/><td/><td/><td><b>Gastos de Envio: <?php echo round($order->gastosEnvio, 2); ?> &euro;</b></td></tr>
                    <tr><td/><td/><td/><td/><td/><td/><td><b>TOTAL: <?php echo round($total + $order->gastosEnvio, 2); ?> &euro;</b></td></tr>

                </tbody>
            </table>
            <?php if(!empty($order->comentario)){ ?>
            
            <h1 class="page-header">COMENTARIO DEL CLIENTE</h1>
            
                <ul>
                    <li class="datos"><?php echo $order->comentario; ?></li>
                </ul>
           
            <?php } ?>
            <br/><br/>
            <h1 class="page-header">DATOS DEL CLIENTE</h1>
            <div >
                <ul>

                    <li class="datos">E-mail: <?php echo $user->email; ?></li>
                    <li class="datos">Nombre: <?php echo $user->nombre; ?></li>
                    <li class="datos">Apellidos: <?php echo $user->apellidos; ?></li>
                    <li class="datos">Teléfono: <?php echo $user->telefono; ?></li>
                    <li class="datos">Dirección: <?php echo $user->direccion; ?></li>
                    <li class="datos">Localidad: <?php echo $user->localidad; ?></li>
                    <li class="datos">Código Postal: <?php echo $user->codpostal; ?></li>
                    <li class="datos">Provincia: <?php echo $user->provincia; ?></li>

                </ul>
            </div>




        </div>
    </div>
</div>

</body>
</html>