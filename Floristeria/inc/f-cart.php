<?php
$cart = Session::getArraySession();
$category = array(0 => "ramo", 1 => "centro", 2 => "boda", 3 => "planta", 4 => "funerario");
session_start();
?>

<header id="header" role="heading" class="third-bg" >
    <div class="header-content container_9">
        <div class="quick-access">
            <ul>
                <li><?php if ($_SESSION['user']->email != null) { ?><button onclick="window.location.href = '/floristeria/datospersonales.html'" style="background-color: #efefef"><img src="/floristeria/media/user.png"/><br/>Datos personales</button><?php echo "  Hola, " . $_SESSION['user']->email . "     ";
}
?><a href="/floristeria/manageSession.php"><?php
                        if (isset($_SESSION['user'])) {
                            echo "Cerrar Session";
                        } else {
                            echo "Iniciar Sesion";
                        }
                        ?></a></li>
                <li class="cart-icon" > 
                    <a title="Ver mi carrito" href="/floristeria/carrito.html" ><i class="icon-shopping-cart" ></i></a>

                    <span style="background-color: transparent; color: black;"><?php echo(Session::getItemsCount()); ?> Producto(s) - <?php echo(Session::getTotalPrice()); ?>&nbsp;&euro;</span>  
                    <ul class="cart-items clearfix">

                        <?php
                        if ($cart !== null) {
                            foreach ($cart as $S_flower):
                                $r_link = "flower_to_cart.php?mode=" . Session::_DELETE_ . "&";
                                $r_link.= "id={$S_flower['id']}&";
                                $r_link.= "v=" . md5($S_flower['id']);
                                ?>

                                <li class="item"> <a href="/floristeria/<?php echo($r_link); ?>" class="closed">X</a>
                                    <div class="item-thumbnail">
                                        <a title="" ><img src="data:<?php echo $S_flower['imagetype']; ?>;base64,<?php echo $S_flower['str_imgcodificada']; ?>" width="89" height="89"></a>
                                    </div>
                                    <a class="item-name" href="/floristeria/<?php echo $category[0]; ?>/<?php echo $S_flower['name']; ?>.html"><?php echo($S_flower['name']); ?></a>
                                    <div class="info-item-cart"> 
                                        <span class="qount" style="background-color: transparent; color: black;"><?php echo($S_flower['cant']); ?> X</span> 
                                        <span class="item-price" style="background-color: transparent; color: black;">
                                            <span class="price" style="background-color: transparent; color: black;"><?php echo($S_flower['price']); ?>&nbsp;&euro;</span>                                           
                                        </span> 
                                    </div>
                                </li>

    <?php endforeach; ?>
                            <li class="footer-cart-items">
                                <div class="footer-totals"> <span style="background-color: transparent; color: black;">Total :</span> <span class="price" style="background-color: transparent; color: black;"><?php echo(Session::getTotalPrice()); ?>&nbsp;&euro;</span></div>
                                <div class="footer-checkout">
                                    <a href="/floristeria/carrito.html"><button onclick="" class="btn btn-add">Pasar por caja</button></a>
                                </div>
                            </li>

<?php } ?>
                    </ul>
                </li>
            </ul>
        </div>
        Telefono de Contacto: 974 231 468 - 687 938 631     

        <form method="get"  id="searchbox">
            <p>
                <input type="text" placeholder="Type and hit enter" value="" name="search_query">
            </p>
        </form>
    </div>

    <!-- Mobile menu -->

    <script>
        $(function () {
            'use strict';
            $('#dl-menu').dlmenu();
        });

    </script>

    <div id="dl-menu" class="dl-menuwrapper none" >
        <button class="dl-trigger">Abrir Menu</button>
        <ul class="dl-menu">
            <li><a class="parent" href="inicio.html">Ramos</a> </li>
            <li><a class="parent" href="centros.html">Centros</a></li>
            <li><a class="parent" href="bodas.html">Bodas</a> </li>
            <li><a class="parent" href="plantas.html">Plantas</a> </li>
            <li><a class="parent" href="funerarios.html">Funerarios</a> </li>
            <li><a class="parent" href="carrito.html">Carro de compra</a></li>
        </ul>
    </div>
</header>