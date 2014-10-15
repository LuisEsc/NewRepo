<?php
include_once './core/init.php';

include_once './inc/f-header.php';
include_once './inc/f-cart.php';
include_once './inc/f-menu.php';
?>

<div class = "width-carousel recommend-block">
    <div class = "container_9">
        <h3 class = "title-block"><?php echo "Centros" ?></h3>
    </div>
</div>

<section id = "columns" class = "container_9 clearfix col1" >
    <ul id = "og-grid" class = "og-grid">
        <?php
        foreach (FlowersModel::getFlowersByCategory(Category::Centros) as $flower):
            $link = "flower_to_cart.php?mode=" . Session::_INSERT_ . "&";
            $link.= "id={$flower->id}&";
            $link.= "v=" . md5($flower->id);
            ?>
            <li> 
                <a href = "#"
                   data-addtohref = "<?php echo($link); ?>"
                   data-onclick ="addToCart();"
                   data-addtocart = "Añadir al carro"
                   data-or = "O"
                   data-more = "Leer más"
                   data-currency = "&euro;"
                   data-price = "<?php echo($flower->price); ?>"
                   data-largesrc = "resources/images/<?php echo($flower->image_name); ?>"
                   data-title = "<?php echo($flower->name); ?>"
                   data-description = "<?php echo($flower->description); ?>"> 
                    <span class = "overlay-grid"><i class = "icon-zoom-in"></i></span> 
                    <img src = "./images/<?php echo($flower->image_name); ?>" width="150" height="180"> 
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