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
        <script type="text/javascript">var switchTo5x = true;</script>
        <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
        <script type="text/javascript" src="http://s.sharethis.com/loader.js"></script>
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
                        <p class="our_price_display" style="font-size: 25px;"> <?php echo$flower->price . " €"; ?> </p>
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

                            </div>
                        </div>
                    </li>

                </ul>
                <span class='st_facebook_hcount' displayText='Facebook'></span>
                <span class='st_twitter_hcount' displayText='Tweet'></span>
                <span class='st__hcount' displayText=''></span>

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
        <script type="text/javascript">stLight.options({publisher: "d853da7b-dcb4-421f-8ce8-c0370f7eba27", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
        <script>
            var options = {"publisher": "d853da7b-dcb4-421f-8ce8-c0370f7eba27", "logo": {"visible": true, "url": "www.floristeriaalbahaca.es/floristeria", "img": "http://www.floristeriaalbahaca.es/floristeria/images/logo.png", "height": 90}, "ad": {"visible": false, "openDelay": "5", "closeDelay": "0"}, "livestream": {"domain": "", "type": "sharethis", "customColors": {"widgetBackgroundColor": "#FFFFFF", "articleLinkColor": "#006fbb"}}, "ticker": {"visible": false, "domain": "", "title": "", "type": "sharethis", "customColors": {"widgetBackgroundColor": "#4b5c4f", "articleLinkColor": "#FFFFFF"}}, "facebook": {"visible": false, "profile": "facebook"}, "fblike": {"visible": false, "url": ""}, "twitter": {"visible": false, "user": "sharethis"}, "twfollow": {"visible": false}, "custom": [{"visible": false, "title": "Custom 1", "url": "", "img": "", "popup": false, "popupCustom": {"width": 300, "height": 250}}, {"visible": false, "title": "Custom 2", "url": "", "img": "", "popup": false, "popupCustom": {"width": 300, "height": 250}}, {"visible": false, "title": "Custom 3", "url": "", "img": "", "popup": false, "popupCustom": {"width": 300, "height": 250}}], "chicklets": {"items": ["facebook", "twitter", "linkedin", "pinterest", "email", "sharethis"]}, "background": "#659671", "color": "#005a25", "arrowStyle": "light"};
            var st_bar_widget = new sharethis.widgets.sharebar(options);
        </script>

        <?php
        include_once './inc/f-footer.php';
        