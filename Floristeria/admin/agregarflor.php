<?php
require_once './inc/Session.php';
$category = array(0 => "Ramos", 1 => "Centros", 2 => "Bodas", 3 => "Plantas", 4 => "Funerarios");
?>
<html lang="es">
    <script type="text/javascript" src="../js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="ckeditor.js"></script>

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
        <h1 class="page-header">Añadir nueva flor</h1>
        <form id="form" method="post" action="posts/insertarflor.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nombre">Nombre de la Flor:</label>
                <input type="nombre-flor" class="form-control" id="nombre" name="nombre" value="<?php if(isset($_REQUEST['id'])) {echo FlowersModel::getFlowerById($_REQUEST['id'])->name;}?>"/>
            </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="text" class="form-control" id="precio" name="precio" value="<?php if(isset($_REQUEST['id'])) {echo FlowersModel::getFlowerById($_REQUEST['id'])->price;}?>"/>
            </div>
            <div class="form-group">
                <label for="categoria">Sección:</label>
                <select class="form-control" name="categoria" id="categoria" value="<?php if(isset($_REQUEST['id'])) {echo $category[FlowersModel::getFlowerById($_REQUEST['id'])->category];}?>">
                    <?php foreach ($category as $key => $value): ?>
                        <option value="<?php echo($key); ?>"><?php echo($value); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="ejemplo_archivo_1">Adjuntar una imagen:</label>
                <input type="file" id="ejemplo_archivo_1" name="files">
                <p class="help-block">Ejemplo de texto de ayuda.</p>
            </div>
            <div class="form-group">
                <label>Descripción:</label>
                <textarea id="editor1" name="editor1" style="width:400px; height:200px"><?php if(isset($_REQUEST['id'])) {echo FlowersModel::getFlowerById($_REQUEST['id'])->description;}?></textarea>
            </div>
            <button id="btn_insertar"  class="btn btn-default" ><?php if(isset($_REQUEST['id'])) echo "Guardar cambios"; else echo "Insertar nueva flor"; ?></button>
            <img name="img_load" id="img-load" src=""/>
        </form>

        <script type="text/javascript">
            var editor = CKEDITOR.replace('editor1');

            $("#btn_insertar").click(function () {
                var nombre, precio, categoria, descripcion, imagen;

                nombre = $("#nombre").val();
                precio = $("#precio").val();
                categoria = $("#categoria").val();
                imagen = $("#ejemplo_archivo_1");
                descripcion = editor.getData();
                enviarporajax(nombre,precio,categoria,imagen,descripcion);
            })

            function enviarporajax(nombre,precio,categoria,imagen,descripcion) {
                
            }

        </script>



    </div>
</div>
</div>

</body>
</html>