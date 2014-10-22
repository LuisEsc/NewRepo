<?php
include_once './core/init.php';

include_once './inc/f-header.php';

include_once './inc/f_session_usuario.php';

include_once './inc/f-cart.php';
include_once './inc/f-menu.php';
?>

<div class="slider-home-page">


    <link rel="stylesheet" href="css/iview.css" />
    <link rel="stylesheet" href="css/skin/style.css" />
    <script type="text/javascript" src="js/raphael-min.js"></script> 
    <script type="text/javascript" src="js/jquery.easing.js"></script> 
    <script src="js/iview.js"></script> 
    <script>
        $(document).ready(function () {

            "use strict";

            $('#iview').iView({
                pauseTime: 7000,
                pauseOnHover: true,
                directionNav: true,
                directionNavHide: false,
                controlNav: true,
                controlNavNextPrev: false,
                controlNavTooltip: false,
                nextLabel: "Próximo",
                previousLabel: "Anterior",
                playLabel: "Jugada",
                pauseLabel: "Pausa",
                timer: "360Bar",
                timerBg: "#EEE",
                timerColor: "#000",
                timerDiameter: 40,
                timerPadding: 4,
                timerStroke: 8,
                timerPosition: "bottom-right"
            });
        });
    </script>
    <div id="iview">
        <div data-iview:thumbnail="media/scr1-500px.jpg" data-iview:image="media/scr1-500px.jpg">
            <div class="iview-caption caption1" data-x="100" data-y="250" data-transition="expandDown">
                <h3>Mis tulipanes</h3>
            </div>
            <div class="iview-caption caption1" data-x="100" data-y="350" data-transition="expandDown">
                <h5 > Una variedad de tulipanes preciosos para decorar tu casa.</h5>
            </div>
        </div>
        <div data-iview:thumbnail="media/scr6-500px.jpg" data-iview:image="media/scr6-500px.jpg" data-iview:transition="block-drop-random" data-iview:pausetime="2000">
            <div class="iview-caption caption1" data-x="100" data-y="250" data-transition="expandDown">
                <h3>Claveles</h3>
            </div>
            <div class="iview-caption caption1" data-x="100" data-y="350" data-transition="expandDown">
                <h5 > Una variedad de claveles perfecta para una velada romántica.</h5>
            </div>
        </div>
        <div data-iview:thumbnail="media/scr3-500px.jpg" data-iview:image="media/scr3-500px.jpg">
            <div class="iview-caption caption1" data-x="100" data-y="250" data-transition="expandDown">
                <h3>Florecillas azules</h3>
            </div>
            <div class="iview-caption caption1" data-x="100" data-y="350" data-transition="expandDown">
                <h5 >Estas alegres florecillas azules seran la alegría de la huerta.</h5>
            </div>
        </div>
    </div>
</div>
<div class="width-carousel recommend-block">
    <div class="container_9">
        <h3 class="title-block">Nuestros productos</h3>
    </div>
</div>

<section  id="columns" class="container_9 clearfix col1" >
    <ul id="og-grid" class="og-grid">
        <?php
        foreach (FlowersModel::getFlowers() as $flower):
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
                   data-largesrc = "data:<?php echo $flower->image_type; ?>;base64,<?php echo $flower->str_imgcodificada; ?>"
                   data-title = "<?php echo($flower->name); ?>"
                   data-description = "<?php echo($flower->description); ?>"> 
                    <span class = "overlay-grid"><i class = "icon-zoom-in"></i></span> 
                    <img width="200" height="200" src ="data:<?php echo $flower->image_type ?>;base64,<?php echo $flower->str_imgcodificada; ?>" > 
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
//echo $_SESSION['email'];
        include_once './inc/f-footer.php';
//$index->footerCreate();
