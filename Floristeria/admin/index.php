<?php
session_start();
if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') == 'POST') {
    if (($sign = filter_input(INPUT_POST, 'sign_off', FILTER_DEFAULT)) != null) {
        if (($sign == 'off') && (isset($_SESSION['admin']))) {
            unset($_SESSION['admin']);
            session_destroy();
        }
    }
}
$admin = (isset($_SESSION['admin'])) ? $_SESSION['admin'] : null;

if ($admin == null) {
    header('location: login.php');
}

// Categorias

$category = array(0 => "Ramos", 1 => "Centros", 2 => "Bodas", 3 => "Plantas", 4 => "Funerarios");

?>

<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html;" charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/bootstrap.css" />
        <script type="text/javascript" src="../js/jquery-1.7.1.min.js"></script>
        <title>Administrador</title>
    </head>
    <body>
        <form action="" method="post">
            <input type="hidden" name="sign_off" value="off">
            <input type="submit" value="cerrar sesión">
        </form>


        <form action="upload.php" enctype="multipart/form-data" method="POST">

            <label>Título</label>
            <input name="title" type="text">
            <label>Precio</label>
            <input name="price" type//

                   <label>Categoría</label>
            <select title="category" >
                <option value="-1">-- Elige una categoria --</option>
                <?php foreach ($category as $key => $value): ?>
                    <option value="<?php echo($key); ?>"><?php echo($value); ?></option>
                <?php endforeach; ?>
            </select>

            <label>Image</label>
            <input name="image" type="file">

            <label>Descripción</label>
            <input type="submit" value="Enviar">
        </form>
        <div id="preview"></div>


        <script type="text/javascript">
            $(document).ready(function() {
                var data = new FormData();
                data.append("username", "luis");
                $.ajax({
                    url: "upload.php",
                    type: "POST",
                    data: data,
                    success: function(data) {
                        console.log(data)
                    }
                    //processData: false, // tell jQuery not to process the data
                    //contentType: false   // tell jQuery not to set contentType
                });
            });
        </script>
    </body>
</html>