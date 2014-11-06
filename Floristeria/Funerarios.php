<?php
include_once './core/init.php';

include_once './inc/f-header.php';
include_once './inc/f-cart.php';
include_once './inc/f-menu.php';
require_once './info/mostrarDescripcion.php';
?>

<div class="width-carousel recommend-block">
    <div class="container_9">
        <h3  class="title-block">Trabajos Relaizados</h3>
        <div align="center">
        </div>
    </div>
</div>
<div class = "width-carousel recommend-block">
    <div class = "container_9">
        <h3 class = "title-block"><?php echo "Funerarios - Productos" ?></h3>
    </div>
</div>


<section id = "columns" class = "container_9 clearfix col1" >
    <ul id = "og-grid" class = "og-grid">
        <?php
        foreach (FlowersModel::getFlowersByCategory(Category::Funerarios) as $flower):
            $link = "/floristeria/flower_to_cart.php?mode=" . Session::_INSERT_ . "&";
            $link.= "id={$flower->id}&";
            $link.= "v=" . md5($flower->id);
            ?>
            <li> 
                <a href='funerario/<?php echo $flower->name; ?>.html'
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
                    <img width="150" src ="data:<?php echo $flower->image_type ?>;base64,<?php echo $flower->str_imgcodificada; ?>" > 
                </a> 
            </li>
        <?php endforeach; ?>
    </ul>
    <script type="text/javascript" src="js/grid.js"></script> 
    <script>
        $(function() {
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