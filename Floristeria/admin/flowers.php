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
        function editar(id) {
            alert(id);
        }
        function eliminar(id) {
            alert(id);
        }
    </script>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Listado de flores</h1>

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
                                <button onclick="editar(<?php echo($flower->id) ?>);" class="glyphicon glyphicon-pencil"></button>
                                <button onclick="eliminar(<?php echo($flower->id) ?>);" class="glyphicon glyphicon-remove"></button>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                    </select>
                    </div>
                <div class="form-group">
                    <label for="ejemplo_archivo_1">Adjuntar una imagen:</label>
                    <input type="file" id="ejemplo_archivo_1">
                    <p class="help-block">Ejemplo de texto de ayuda.</p>
                </div>
                <div class="form-group">
                    <label>Descripción:</label>
                    <textarea id="input" style="width:400px; height:200px"></textarea>
                </div>
                <button type="submit" class="btn btn-default">Guardar</button>
                </form>
                <script type="text/javascript">


                    var editor = new TINY.editor.edit('editor', {
                        id: 'input',
                        width: 800,
                        height: 200,
                        cssclass: 'te',
                        controlclass: 'tecontrol',
                        rowclass: 'teheader',
                        dividerclass: 'tedivider',
                        controls: ['bold', 'italic', 'underline', 'strikethrough', '|', 'subscript', 'superscript', '|',
                            'orderedlist', 'unorderedlist', '|', 'outdent', 'indent', '|', 'leftalign',
                            'centeralign', 'rightalign', 'blockjustify', '|', 'unformat', '|', 'undo', 'redo', 'n',
                            'font', 'size', 'style', '|', 'image', 'hr', 'link', 'unlink', '|', 'cut', 'copy', 'paste', 'print'],
                        footer: false,
                        fonts: ['Verdana', 'Arial', 'Georgia', 'Trebuchet MS'],
                        xhtml: false,
                        cssfile: 'style.css',
                        bodyid: 'editor',
                        footerclass: 'tefooter',
                        toggle: {text: 'show source', activetext: 'show wysiwyg', cssclass: 'toggle'},
                        resize: {cssclass: 'resize'}
                    });
                    function mirarContenido() {
                        console.log($('#editor'));
                    }
                </script>
                <button onclick="mirarContenido();">Mirar</button>
                <script type="text/javascript">

                </script>
        </div>
    </div>
</div>
</tbody>
</table>
</div>




</div>
</div>
</div>

</body>
</html>