<?php
require_once './inc/Session.php';
require_once '../model/FlowersModel.php';
require_once '../model/OrderModel.php';
require_once '../libs/Order.php';
require_once '../core/Connection.php';
require_once '../libs/Flower.php';

$category = array(0 => "Ramos", 1 => "Centros", 2 => "Bodas", 3 => "Plantas", 4 => "Funerarios");

$id_pedido = null;

if (isset($_REQUEST['ip'])) {
    $id_pedido = $_REQUEST['ip'];
}
else{
    header("Location: pedidos.php");
}
?>
<html lang="es">
    <script type="text/javascript" src="../js/jquery-1.7.1.min.js"></script>

    <?php
    require_once './inc/header_struct.php';
    ?>

    
    
    
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
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $flowers = OrderModel::getFlowersByOrderId($id_pedido);
                        foreach ($flowers as $flower):?>
                    
                        <tr>
                            <td><?php echo $category[$flower->category];    ?></td>
                            <td><?php echo $flower->name;   ?></td>
                            <td><?php echo $flower->description;    ?></td>
                            <td><img width="70" height="70" src="data:<?php echo $flower->image_type; ?>;base64,<?php if ($flower != null) echo $flower->str_imgcodificada; ?>" /></td>
                            <td><?php echo round($flower->price,2, PHP_ROUND_HALF_UP); ?> €</td>
                        </tr>

                        <?php endforeach;?>
                        
                        <tr><td/><td/><td/><td/><td><b>TOTAL: <?php echo round(OrderModel::getOrderById($id_pedido)->precio_total,2 ,PHP_ROUND_HALF_UP); ?> €</b></td></tr>
                </tbody>
            </table>
        </div>




    </div>
</div>
</div>

</body>
</html>