<?php
require_once './inc/Session.php';
require_once '../libs/Flower.php';
require_once '../model/FlowersModel.php';
require_once '../core/Connection.php';
require_once '../resources/image.php';

$category = array(0 => "Ramos", 1 => "Centros", 2 => "Bodas", 3 => "Plantas", 4 => "Funerarios");
$flower = null;

if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) {
    $flower = FlowersModel::getFlowerById($_REQUEST['id']);
}

?>
<html lang="es">
    <script type="text/javascript" src="../js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="ckeditor.js"></script>

    <?php
    require_once './inc/header_struct.php';
    ?>
    <script type="text/javascript">
        function insertarFlor(){
            $("#form").attr("action", "posts/insertarflor.php");
            
            $("#form").submit();
        }
        function actualizarFlor(id){
            $("#form").attr("action", "posts/actualizarflor.php");
            
            $("#form").submit();
        }
            $("#ejemplo_archivo_1").change(function(){
                
            });
        
    </script>

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Añadir nueva flor</h1>
        <form id="form" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nombre">Nombre de la Flor:</label>
                <input type="nombre-flor" class="form-control" id="nombre" name="nombre" value="<?php if($flower!=null) echo $flower->name;?>"/>
            </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="text" class="form-control" id="precio" name="precio" value="<?php if($flower!=null) echo $flower->price; ?>"/>
            </div>
            <div class="form-group">
                <label for="categoria">Sección:</label>
                <select class="form-control" name="categoria" id="categoria" >
                    <?php foreach ($category as $key => $value): ?>
                        <option <?php if($flower!=null && $key== (int) $flower->category) echo " selected='selected'"; ?> value="<?php echo($key); ?>"><?php echo($value); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="ejemplo_archivo_1">Adjuntar una imagen:</label>
                <input  type="file" id="ejemplo_archivo_1" accept="image/png, image/jpeg, image/jpg" name="files"/><img id="img-flor" width="200" height="200" src="data:<?php echo $flower->image_type ?>;base64,<?php if($flower!=null) echo $flower->str_imgcodificada; ?>"/>
                <p class="help-block">Ejemplo de texto de ayuda.</p>
            </div>
            <div class="form-group">
                <label>Descripción:</label>
                <textarea id="editor1" name="editor1" style="width:400px; height:200px"><?php if($flower!=null) echo $flower->description; ?></textarea>
            </div>
            <input type="button" id="btn_insertar"  onclick="<?php if($flower!=null) echo "actualizarFlor(".$flower->id.");"; else echo "insertarFlor();" ?>" class="btn btn-default"  value="<?php if ($flower!=null) echo "Guardar cambios"; else echo "Insertar nueva flor"; ?>"/>
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
                enviarporajax(nombre, precio, categoria, imagen, descripcion);
            })

            function enviarporajax(nombre, precio, categoria, imagen, descripcion) {

            }

        </script>



    </div>
</div>
</div>

</body>
</html>