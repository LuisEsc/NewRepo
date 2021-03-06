<?php
include_once './core/init.php';

include_once './inc/f-header.php';
include_once './inc/f-cart.php';
include_once './inc/f-menu.php';
require_once './info/mostrarDescripcion.php';
?>


<script src="js/jquery-1.7.1.min.js"></script>



<div class="width-carousel recommend-block">
    <div class="container_9">
        <h3  class="title-block">Trabajos Realizados</h3>
        <div align="center">
            <img src="resources/images/slide22.jpg" width="380"/>
            <img src="resources/images/slide33.jpg" width="380"/>
            <img src="resources/images/slide44.jpg" width="380"/>
        </div>
    </div>
</div>
<div class = "width-carousel recommend-block">
    <div class = "container_9">
        <h3 class = "title-block"><?php echo "Bodas - Productos" ?></h3>
    </div>
</div>

<section id = "columns" class = "container_9 clearfix col1" >
    <ul id = "og-grid" class = "og-grid">
        <?php
        foreach (FlowersModel::getFlowersByCategory(Category::Bodas) as $flower):
            $link = "/floristeria/flower_to_cart.php?mode=" . Session::_INSERT_ . "&";
            $link.= "id={$flower->id}&";
            $link.= "v=" . md5($flower->id);
            ?>
            <li style="padding: 20px"> 
                <a href='boda/<?php echo $flower->name; ?>.html'
                   data-addtohref = "<?php echo($link); ?>"
                   data-onclick ="addToCart();"
                   data-addtocart = "Añadir al carro"
                   data-or = "O"
                   data-more = "Leer Más"
                   data-currency = "&euro;"
                   data-price = "<?php echo($flower->price); ?>"
                   data-largesrc = "data:<?php echo $flower->image_type; ?>;base64,<?php echo $flower->str_imgcodificada; ?>"
                   data-title = "<?php echo($flower->name); ?>"
                   data-description = "<?php echo($flower->description); ?>"> 
                    <span class = "overlay-grid"><i class = "icon-zoom-in"></i></span> 
                    <img height="200" src ="data:<?php echo $flower->image_type ?>;base64,<?php echo $flower->str_imgcodificada; ?>" > 
                </a> 
            </li>
        <?php endforeach; ?>
    </ul>
    <script type="text/javascript" src="js/grid.js"></script> 
    <script>
    $(function () {
        "use strict";
        Grid.init();
    });

    function addToCart() {
        //alert("entra");

    }
    </script>
</section>

<?php
include_once './inc/f-footer.php';
