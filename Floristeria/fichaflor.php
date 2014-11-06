<?php
include_once './core/init.php';
$flower = null;
$category = array(0 => "ramo", 1 => "centro", 2 => "boda", 3 => "planta", 4 => "funerario");


if (isset($_REQUEST['name'])) {
    $flower = FlowersModel::getFlowerByName($_REQUEST['name']);
} else {
    header("Location: /floristeria/inicio.html");
}
?> <html>
    <head>

        <title>Floristería Albahaca - Huesca</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="/floristeria/css/styles.css" rel="stylesheet" type="text/css" media="all" />
        <link href="/floristeria/css/custom-style.css" rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" type="text/css" href="/floristeria/css/component.css" />

        <script src="/floristeria/js/jquery-1.7.1.min.js"></script>
        <script src="/floristeria/js/modernizr.custom.js"></script>
        <script src="/floristeria/js/jquery.dlmenu.js"></script>
        <script src="/floristeria/js/scripts.js"></script>
        <link rel="stylesheet" href="/floristeria/css/prettyPhoto.css" />
        <script src="/floristeria/js/jquery.prettyPhoto.js"></script> 
        <script src="/floristeria/js/jquery.bxslider.min.js"></script> 
        <script type="text/javascript" src="/floristeria/js/photoZoom.min.js"></script>

        <link href="/floristeria/css/jquery.bxslider.css" rel="stylesheet" />

    </head>
    <body id="index">
        <div id="fb-root"></div>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&appId=999652026718072&version=v2.0";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>

        <div id="page" class="clearfix"><?php
            include_once './inc/f-cart.php';
            include_once './inc/f-menu.php';
            require_once './info/mostrarDescripcion.php';
            require_once './admin/libs/BinaryImage.php';
            ?>



            <section  id="columns" class="container_9 clearfix col1" >
                <div id="primary_block" class="clearfix">
                    <div  itemprop="image" id="imageContainer">
                        <img   id="foto" src="data:<?php echo $flower->image_type; ?>;base64,<?php echo $flower->str_imgcodificada; ?>" height="332"/>
                        <?php /* <img id="zoom_02" height="332" src="data:<?php echo $flower->image_type; ?>;base64,<?php echo $flower->str_imgcodificada; ?>" style="max-width: 50%; max-height: 50%;"> */ ?>
                    </div>
                    <div id="short_description_block">
                        <h1  style="font-size: 35px;"><?php echo $flower->name; ?></h1>
                        <div class="price">
                            <p class="our_price_display" style="font-size: 25px;"> <?php echo round($flower->price, 2) . " €"; ?> </p>
                        </div>
                        <div id="short_description_content" class="rte align_justify">
                            <?php echo mostrarDescripcion($flower->description); ?>
                        </div>
                        <?php
                        $link = "/floristeria/flower_to_cart.php?mode=" . Session::_INSERT_ . "&";
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
                                    <div class="fb-share-button" data-href="http://www.floristeriaalbahaca.es/floristeria/<?php echo $category[$flower->category]; ?>/<?php echo $flower->name; ?>.html" data-layout="icon_link"></div>

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



                });
            </script>

            <?php
            include_once './inc/f-footer.php';
            