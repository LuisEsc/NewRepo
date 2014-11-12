<?php
require_once './inc/Session.php';
require_once '../model/FlowersModel.php';
    require_once '../core/Connection.php';
    require_once '../libs/Flower.php';

$category = array(0 => "Ramos", 1 => "Centros", 2 => "Bodas", 3 => "Plantas", 4 => "Funerarios", 5=>"Extras");

$cat = null;

if (isset($_REQUEST['cat'])) {
    $cat = $_REQUEST['cat'];
    echo "<br/>categoria:".$cat."<br />";
}
?>
<html lang="es">
    <script type="text/javascript" src="../js/jquery-1.7.1.min.js"></script>

    <?php
    require_once './inc/header_struct.php';
    ?>

    <script type="text/javascript">
        function eliminar(id) {
            window.location.href = "posts/eliminarflor.php?id="+id;
        }
        function cambioCategoria() {
            var categoriaSeleccionada = $("#categoria").val();
            if (categoriaSeleccionada == -1) {
                window.location.href = "flowers.php";
            }
            else{
                window.location.href = "flowers.php?cat="+categoriaSeleccionada;
            }
        }
    </script>

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Listado de flores</h1>   Seleccione una categoría para filtrar los resultados:
        <select class="form-control" onchange="cambioCategoria();" name="categoria" id="categoria" >
            <option  <?php if ($cat != null && $cat==-1) echo "selected='selected'"; ?> value="-1">Mostrar todas</option>
            <?php foreach ($category as $key => $value): ?>
                <option <?php if ($cat != null && $key == $cat && $cat!=-1) echo "selected='selected'"; ?> value="<?php echo($key); ?>"><?php echo($value); ?></option>
            <?php endforeach; ?>
        </select>
        <br/><br/>

        <button onclick="window.location.href = 'agregarflor.php'">  <param class="glyphicon glyphicon-plus"/> Agregar Nueva Flor</button>

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
                    if ($cat != null)
                        $flowers = FlowersModel::getFlowersByCategory($cat);
                    else
                        $flowers = FlowersModel::getFlowers();
                    foreach ($flowers as $flower):
                        ?>
                        <tr>
                            <td><?php echo($category[$flower->category]) ?></td>
                            <td><?php echo($flower->name); ?></td>
                            <td><?php echo($flower->description); ?></td>
                            <td><?php echo($flower->price); ?></td>
                            <td><img width="50" height="50" src="data:<?php echo $flower->image_type; ?>;base64,<?php if ($flower != null) echo $flower->str_imgcodificada; ?>" /></td>
                            <td>
                                <button onclick="window.location.href = 'agregarflor.php?id=<?php echo $flower->id ?>'" class="glyphicon glyphicon-pencil"></button>
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