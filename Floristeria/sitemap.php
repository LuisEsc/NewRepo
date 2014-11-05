<?php
require_once './core/App.php';
require_once './core/Session.php';
require_once './core/Connection.php';
require_once './core/WebPage.php';
require_once './libs/Flower.php';
require_once './model/FlowersModel.php';
require_once './inc/f_session_usuario.php';

include_once './inc/f-header.php';
include_once './inc/f-cart.php';
include_once './inc/f-menu.php';
?>
<style type="text/css">

    .ancho{

        width: auto;
        overflow: hidden;
    }

</style>

<div class="slider-home-page">


    <link rel="stylesheet" href="css/iview.css" />
    <link rel="stylesheet" href="css/skin/style.css" />
    <script type="text/javascript" src="js/raphael-min.js"></script> 
    <script type="text/javascript" src="js/jquery.easing.js"></script> 


</div>
<div class="width-carousel recommend-block">
    <div class="container_9">
        <h3 class="title-block">SiteMap</h3>
    </div>
</div>

<section  id="columns" class="container_9 clearfix col1" >
    <ul style="color:green;">

        <li><a href="index.php">Página principal</a></li>
        <li><a href="ramos.php">Ramos</a></li>
        <li><a href="Bodas.php">Bodas</a></li>
        <li><a href="centros.php">Centros</a></li>
        <li><a href="plantas.php">Plantas</a></li>
        <li><a href="Funerarios.php">Funerarios</a></li>
        <li><a href="carrito.php">Carrito</a></li>
        <li><a href="politicaPrivacidad.php">Política de privacidad</a></li>
        <?php if ($_SESSION['user'] == null) { ?>
            <li><a href="registro.php">Registro y Login</a></li>
        <?php } ?>
        <?php if ($_SESSION['user'] != null) { ?>
            <li><a href="mispedidos.php">Mis pedidos</a></li>
            <li><a href="panelcontrolusuario.php">Mis Datos Personales</a></li>
        <?php } ?>

    </ul>
</section>
<?php
//echo $_SESSION['email'];
include_once './inc/f-footer.php';
//$index->footerCreate();
