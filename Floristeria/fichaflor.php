<?php
include_once './core/init.php';
require_once './resources/image.php';
$flower = null;
$category = array(0 => "ramo", 1 => "centro", 2 => "boda", 3 => "planta", 4 => "funerario");


if (isset($_REQUEST['name'])) {
    $flower = FlowersModel::getFlowerByNameAndType($_REQUEST['name'], $_REQUEST['type']);
} else {
    header("Location: /floristeria/inicio.html");
}
if ($flower == null) {
    header("Location: /floristeria/inicio.html");
}
?> <html>
    <head>  

        <title>Floristería Albahaca - Huesca</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="google-site-verification" content="5GcTY_1k8flzVI1POG4gCFh1" />
        <meta name="msvalidate.01" content="8DCB25076A85F9699A7B1FE77E47B840" />



        <meta name="robots" content="All" />
        <meta property="og:description" content="<?php echo strip_tags($flower->description); ?>"/>
        <meta property="og:type"            content="product"/>
        <meta property="og:url"             content="http://www.floristeriaalbahaca.es/floristeria/<?php echo $category[$flower->category]; ?>/<?php echo $flower->name; ?>.html"/>
        <meta property="og:title"           content="<?php echo $flower->name . " a " . round($flower->price, 2) . " €"; ?>" />
        <meta property="og:image" content="http://www.floristeriaalbahaca.es/floristeria/resouces/image.php?ID=<?php echo $flower->id; ?>"/>
        <meta property="og:image:url" content="http://www.floristeriaalbahaca.es/floristeria/resouces/image.php?ID=<?php echo $flower->id; ?>"/>

        <meta property="fb:app_id" content="1452262828383247"/>


        <script src="/floristeria/js/jquery-1.7.1.min.js"></script>
        <script src="/floristeria/js/modernizr.custom.js"></script>
        <script src="/floristeria/js/jquery.dlmenu.js"></script>
        <script src="/floristeria/js/scripts.js"></script>
        <link rel="stylesheet" href="/floristeria/css/prettyPhoto.css" />
        <script src="/floristeria/js/jquery.prettyPhoto.js"></script> 
        <script src="/floristeria/js/jquery.bxslider.min.js"></script> 
        <script type="text/javascript" src="/floristeria/js/photoZoom.min.js"></script>

        <link href="/floristeria/css/styles.css" rel="stylesheet" type="text/css" media="all" />
        <link href="/floristeria/css/custom-style.css" rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" type="text/css" href="/floristeria/css/component.css" />
        <link href="/floristeria/css/jquery.bxslider.css" rel="stylesheet" />

    </head>
    <body itemscope itemtype="http://schema.org/Product" id="index">
        <script>
            window.fbAsyncInit = function () {
                FB.init({
                    appId: '1452262828383247',
                    xfbml: true,
                    version: 'v2.2'
                });
            };

            (function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {
                    return;
                }
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/es_LA/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>



    </script>

    <div id="page" class="clearfix"><?php
include_once './inc/f-cart.php';
include_once './inc/f-menu.php';
require_once './info/mostrarDescripcion.php';
?>



        <section  id="columns" class="container_9 clearfix col1" >
            <div id="primary_block" class="clearfix">
                <div id="imageContainer">
                    <img itemprop="image" id="foto" src="http://www.floristeriaalbahaca.es/floristeria/resouces/image.php?ID=<?php echo $flower->id; ?>" height="332"/>

                </div>
                <div id="short_description_block">
                    <h1 itemprop="name" style="font-size: 35px;"><?php echo $flower->name; ?></h1>
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
                            <div  class="std"style="background-color: transparent" >
                                <p  ><?php echo $flower->description; ?></p>
                                <div hidden><p itemprop="description"><?php echo strip_tags($flower->description); ?></p></div>
                                <div
                                    class="fb-like"
                                    data-share="true"
                                    data-width="450"
                                    data-show-faces="true">
                                </div>
                                <script src="https://apis.google.com/js/plusone.js"></script>
                                <!-- Inserta esta etiqueta donde quieras que aparezca Botón Compartir. -->
                                <div class="g-plus" data-action="share" data-annotation="none"></div>

                                <!-- Inserta esta etiqueta después de la última etiqueta de compartir. -->
                                <script type="text/javascript">
                        window.___gcfg = {lang: 'es'};

                        (function () {
                            var po = document.createElement('script');
                            po.type = 'text/javascript';
                            po.async = true;
                            po.src = 'https://apis.google.com/js/platform.js';
                            var s = document.getElementsByTagName('script')[0];
                            s.parentNode.insertBefore(po, s);
                        })();
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



            });
        </script>

        <?php
        include_once './inc/f-footer.php';
        