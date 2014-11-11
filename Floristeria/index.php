<?php
require_once './core/App.php';
require_once './core/Session.php';
require_once './core/Connection.php';
require_once './core/WebPage.php';
require_once './libs/Flower.php';
require_once './model/FlowersModel.php';include_once './core/init.php';
session_start();
$category = array(0 => "ramo", 1 => "centro", 2 => "boda", 3 => "planta", 4 => "funerario");
$flowers = FlowersModel::getRandomFlowers(5);
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
        <div data-iview:image="media/slide1.jpg">
            
            <div class="ancho iview-caption caption1" data-x="100" data-y="250" data-transition="expandDown">
                <h3>Variedad</h3>
            </div>
            <div class="iview-caption caption1" data-x="100" data-y="350" data-transition="expandDown">
                <h5 >Disponemos de una gran variedad de flores perfectas para todas las ocasiones.</h5>
            </div>
        </div>
        <div data-iview:image="media/scr6-500px.jpg" data-iview:transition="block-drop-random" data-iview:pausetime="5000">
            <div class="ancho iview-caption caption1" data-x="100" data-y="250" data-transition="expandDown">
                <h3>Variedad</h3>
            </div>
            <div class="iview-caption caption1" data-x="100" data-y="350" data-transition="expandDown">
                <h5 >Disponemos de una gran variedad de flores perfectas para todas las ocasiones.</h5>
            </div>
        </div>
        <div data-iview:image="media/scr3-500px.jpg">
            <div class="iview-caption caption1 ancho" data-x="100" data-y="250" data-transition="expandDown">
                <h3>Variedad</h3>
            </div>
            <div class="iview-caption caption1" data-x="100" data-y="350" data-transition="expandDown">
                <h5>Disponemos de una gran variedad de flores perfectas para todas las ocasiones.</h5>
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
        foreach ($flowers as $flower):
            $link = "flower_to_cart.php?mode=" . Session::_INSERT_ . "&";
            $link.= "id={$flower->id}&";
            $link.= "v=" . md5($flower->id);
            ?>
            <li> 
                <a href='/floristeria/<?php echo $category[$flower->category]; ?>/<?php echo $flower->name; ?>.html'
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
