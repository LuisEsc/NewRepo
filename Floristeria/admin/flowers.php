<?php
include_once './inc/Session.php';
$category = array(0 => "Ramos", 1 => "Centros", 2 => "Bodas", 3 => "Plantas", 4 => "Funerarios");
?>
<html lang="es">
    <?php
    require_once './inc/header_struct.php';
    require_once '../core/Connection.php';
    require_once '../libs/Flower.php';
    require_once './Model/FlowerModel.php';
    ?>
    <link type="text/css" rel="stylesheet" href="css/tiny.css" media="all">
    <script type="text/javascript" src="js/tinyeditor.js"></script>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Añadir nueva flor</h1>
        <form id="for" role="form">
            <div class="form-group">
                <label for="email">Nombre de la Flor:</label>
                <input type="email" class="form-control" id="email">
            </div>
            <div class="form-group">
                <label for="pwd">Precio:</label>
                <input type="text" class="form-control" id="pwd">
            </div>
            <div class="form-group">
                <label for="pwd">Sección:</label>
                <select class="form-control">
                    <?php foreach ($category as $key => $value): ?>
                        <option value="<?php echo($key); ?>"><?php echo($value); ?></option>
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
            new TINY.editor.edit('editor', {
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
                xhtml: true,
                cssfile: 'style.css',
                bodyid: 'editor',
                footerclass: 'tefooter',
                toggle: {text: 'show source', activetext: 'show wysiwyg', cssclass: 'toggle'},
                resize: {cssclass: 'resize'}
            });
        </script>
    </div>
</div>
</div>




</html>