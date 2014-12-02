<?php
require_once './inc/Session.php';
require_once '../core/Connection.php';
require_once '../resources/image.php';
$con = Connection::getConnection();
$res = $con->query("SELECT textoCorto,textoLargo FROM quienessomos");
$resultado = mysqli_fetch_array($res);
$textoCorto = $resultado['textoCorto'];
$textoLargo = $resultado['textoLargo'];
$con->close();
?>
<html lang="es">
    <script type="text/javascript" src="../js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="ckeditor.js"></script>

    <?php
    require_once './inc/header_struct.php';
    ?>

    <style type="text/css">
        .thumb{
            margin-top: 1em;
            border: 1px dashed grey;
            width: 160px;
            height: 160px;
            overflow: hidden;
        }
        .imgThumb{
            margin: 0;
            padding: 0;
        }
    </style>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Añadir nueva flor</h1>
        <form id="form" action="posts/actualizarQuienesSomos.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nombre">QUIENES SOMOS:</label>
                <br/>
                <label>Texto Corto: </label>
                <textarea id="editor1" name="editor1" style="width:400px; height:200px"><?php echo $textoCorto; ?></textarea>
                <br/>
                <label>Texto Largo: </label>
                <textarea id="editor2" name="editor2" style="width:400px; height:200px"><?php echo $textoLargo; ?></textarea>
            </div>
            <input type="submit" value="Acualizar"/>
        </form>

        <script type="text/javascript">
        var editor1 = CKEDITOR.replace('editor1');
        var editor2 = CKEDITOR.replace('editor2');

        
        </script>



    </div>
</div>
</div>

</body>
</html>