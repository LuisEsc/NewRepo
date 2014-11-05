<?php
include_once './core/init.php';
$flower = null;


if (isset($_REQUEST['id'])) {
    $flower = FlowersModel::getFlowerById($_REQUEST['id']);
} else {
    header("Location: index.php");
}
?> <title itemprop="title"> Floristeria Albahaca - <?php echo $flower->name; ?> - <?php echo round($flower->price, 2); ?> €</title> <?php
include_once './inc/f-header.php';
include_once './inc/f-cart.php';
include_once './inc/f-menu.php';
require_once './info/mostrarDescripcion.php';
require_once './admin/libs/BinaryImage.php';
?>
<html>
    <head >
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="css/styles.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/custom-style.css" rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" type="text/css" href="css/component.css" />

        <meta name="description" content="Mira esta flor que vende la Floristería Albahaca: <?php echo $flower->name; ?> a <?php echo round($flower->price, 2); ?> €" />
        
        <script src="js/jquery-1.7.1.min.js"></script>
        <script src="js/modernizr.custom.js"></script>
        <script src="js/jquery.dlmenu.js"></script>
        <script src="js/scripts.js"></script>
        <link rel="stylesheet" href="css/prettyPhoto.css" />
        <script src="js/jquery.prettyPhoto.js"></script> 
        <script src="js/jquery.bxslider.min.js"></script> 
        <script type="text/javascript" src="js/photoZoom.min.js"></script>
        <script type="text/javascript">var switchTo5x = true;</script><script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
        <script type="text/javascript">stLight.options({publisher: 'f1ac6bbe-5eb3-4b22-95f6-e82a3cd1e8ec', embeds: true});</script>
        <link href="css/jquery.bxslider.css" rel="stylesheet" />
    </head>
    <body>


        <section  id="columns" class="container_9 clearfix col1" >
            <div id="primary_block" class="clearfix">
                <div  itemprop="image" id="imageContainer">
                    <img   id="foto" src="data:<?php echo $flower->image_type; ?>;base64,<?php echo $flower->str_imgcodificada; ?>" height="332"/>
                    <?php /* <img id="zoom_02" height="332" src="data:<?php echo $flower->image_type; ?>;base64,<?php echo $flower->str_imgcodificada; ?>" style="max-width: 50%; max-height: 50%;"> */ ?>
                </div>
                <div id="short_description_block">
                    <h1  style="font-size: 35px;"><?php echo $flower->name; ?></h1>
                    <div class="price">
                        <p class="our_price_display" style="font-size: 25px;"> <?php echo round($flower->price,2) . " €"; ?> </p>
                    </div>
                    <div id="short_description_content" class="rte align_justify">
                        <?php echo mostrarDescripcion($flower->description); ?>
                    </div>
                    <?php
                    $link = "flower_to_cart.php?mode=" . Session::_INSERT_ . "&";
                    $link.= "id={$flower->id}&";
                    $link.= "v=" . md5($flower->id);
                    ?> 
                    <button class="btn btn-add" onclick="window.location.href = '<?php echo $link; ?>'">AÑADIR AL CARRO</button>
                    <!-- Go to www.addthis.com/dashboard to customize your tools -->
                </div>


            </div>
        </section>
        <div class="wrap-tabs">
            <div class="tabs container_9">
                <ul class="i-tab">
                    <li>Descripción</li>
                </ul>
                <ul class="tab-content">
                    <li  class="content-li active ">
                        <div class="box-collateral box-description">
                            <div   class="std">
                                <p ><?php echo $flower->description; ?></p>
                                <span id="button_1" style="background-color: transparent; color: black;"> COMPARTIR:</span>
                                <script>
                                    
                                    stWidget.addEntry({
                                        "service": "sharethis",
                                        "element": document.getElementById('button_1'),
                                        "url": "http://www.floristeriaalbahaca.es/floristeria/fichaflor.php?id=<?php echo $flower->id; ?>",
                                        "title": "Floristeria Albahaca - Huesca",
                                        "type": "large",
                                        "text": "ShareThis",
                                        "image": "http://www.floristeriaalbahaca.es/floristeria/resources/image.php?ID=<?php echo $flower->id; ?>",
                                        "summary": "Mira esta flor que vende la Floristería Albahaca: <?php echo $flower->name; ?> a <?php echo round($flower->price, 2); ?> €"
                                    });
                                </script>
                            </div>
                        </div>
                    </li>

                </ul>


            </div>
        </div>


        <script>


            $(document).ready(function () {

                "use strict";

                $('.content-li:first').addClass('active');
                $('.content-li:first').css('display', 'block');

                $('ul.i-tab').delegate('li:not(.active)', 'click', function () {
                    $(this).addClass('active').siblings().removeClass('active')
                            .parents('.tabs').find('ul.tab-content .content-li').hide()
                            .eq($(this).index()).show();
                })

                stLight.options({publisher: "12345"});

            });
        </script>
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5450b019262f18a6" async="async"></script> 

        <?php
        include_once './inc/f-footer.php';
        