<?php
require_once './inc/Session.php';
require_once '../model/FlowersModel.php';
$category = array(0 => "Ramos", 1 => "Centros", 2 => "Bodas", 3 => "Plantas", 4 => "Funerarios");
?>
<html lang="es">
    <script type="text/javascript" src="../js/jquery-1.7.1.min.js"></script>

    <?php
    require_once './inc/header_struct.php';
    require_once '../core/Connection.php';
    require_once '../libs/Flower.php';
    require_once '../model/FlowersModel.php';
    ?>
    
    <script type="text/javascript">
        function eliminar(id){
            alert(id);
        }
    </script>

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Listado de flores</h1>
        
        <button onclick="window.location.href='agregarflor.php'">  <param  class="glyphicon glyphicon-plus"/> Agregar Nueva Flor</button>
        
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Categoria</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Pvp</th>
                        <th>Imagen</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $flowers = FlowersModel::getFlowers();
                    foreach ($flowers as $flower):
                        ?>
                        <tr>
                            <td><?php echo($category[$flower->category]) ?></td>
                            <td><?php echo($flower->name); ?></td>
                            <td><?php echo($flower->description); ?></td>
                            <td><?php echo($flower->price); ?></td>
                            <td><?php echo($flower->str_imgcodificada); ?></td>
                            <td>
                                <button onclick="agregarflor.php?id=<?php echo($flower->id) ?>" class="glyphicon glyphicon-pencil"></button>
                                <button onclick="eliminar(<?php echo($flower->id) ?>);" class="glyphicon glyphicon-remove"></button>
                            </td>
                            
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        



    </div>
</div>
</div>

</body>
</html>