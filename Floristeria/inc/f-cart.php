<?php
$cart = Session::getArraySession();
?>

<header id="header" role="heading" class="third-bg" >
    <div class="header-content container_9">
        <div class="quick-access">
            <ul>
                <li><a href="manageSession.php"><?php if(isset($_SESSION['user'])){ echo "Cerrar Session"; } else { echo "Iniciar Sesion"; }?></a></li>
                <?php if( isset($_SESSION['user'])){ ?><li class="cart-icon" > 
                    <a title="View my shopping cart" href="/" ><i class="icon-shopping-cart"></i></a>

                    <span><?php echo(Session::getItemsCount()); ?> item(s) - <?php echo(Session::getTotalPrice()); ?>&nbsp;&euro;</span>
                    <ul class="cart-items clearfix">

                        <?php
                        if ($cart !== null ) {
                            foreach ($cart as $S_flower):
                                $r_link = "flower_to_cart.php?mode=" . Session::_DELETE_ . "&";
                                $r_link.= "id={$S_flower['id']}&";
                                $r_link.= "v=" . md5($S_flower['id']);
                                ?>

                                <li class="item"> <a href="<?php echo($r_link); ?>" class="closed">X</a>
                                    <div class="item-thumbnail">
                                        <a title="" href="#"><img src="data:<?php echo $S_flower['imagetype']; ?>;base64,<?php echo $S_flower['str_imgcodificada']; ?>" width="89" height="89"></a>
                                    </div>
                                    <a class="item-name" href="product.html"><?php echo($S_flower['name']); ?></a>
                                    <div class="info-item-cart"> 
                                        <span class="qount"><?php echo($S_flower['cant']); ?> X</span> 
                                        <span class="item-price">
                                            <span class="price"><?php echo($S_flower['price']); ?>&nbsp;&euro;</span>                                           
                                        </span> 
                                    </div>
                                </li>

                            <?php endforeach; ?>

                            <li class="footer-cart-items">
                                <div class="footer-totals"> <span>Total :</span> <span class="price"><?php echo(Session::getTotalPrice()); ?>&nbsp;&euro;</span></div>
                                <div class="footer-checkout">
                                    <a href="carrito.php"><button onclick="" class="btn btn-add">Pasar por caja</button></a>
                                </div>
                            </li>

                <?php }} ?>
                    </ul>
                </li>
            </ul>
        </div>
        <form method="get"  id="searchbox">
            <p>
                <input type="text" placeholder="Type and hit enter" value="" name="search_query">
            </p>
        </form>
    </div>

    <!-- Mobile menu -->

    <script>
        $(function() {
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
            <li><a class="parent"  href="shopping-cart.html">Carro de compra</a></li>
        </ul>
    </div>
</header>