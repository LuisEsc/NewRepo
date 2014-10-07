<div class="slider-home-page">

    <!--[if IE 8 ]>
    <link rel="stylesheet" href="css/skin/ie-style.css" />
<![endif]-->

    <link rel="stylesheet" href="css/iview.css" />
    <link rel="stylesheet" href="css/skin/style.css" />
    <script type="text/javascript" src="js/raphael-min.js"></script> 
    <script type="text/javascript" src="js/jquery.easing.js"></script> 
    <script src="js/iview.js"></script> 
    <script>
        $(document).ready(function() {

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
                <h3>Mucho más que una floristería</h3>
            </div>
            <div class="iview-caption caption1" data-x="100" data-y="350" data-transition="expandDown">
                <h5 > pensar una frase para poner.</h5>
            </div>
        </div>
        <div data-iview:thumbnail="media/scr6-500px.jpg" data-iview:image="media/scr6-500px.jpg" data-iview:transition="block-drop-random" data-iview:pausetime="2000">
            <div class="iview-caption caption1" data-x="100" data-y="250" data-transition="expandDown">
                <h3>Flores de temporada</h3>
            </div>
            <div class="iview-caption caption1" data-x="100" data-y="350" data-transition="expandDown">
                <h5 >pensar otra frase o no poner nada.</h5>
            </div>
        </div>
        <div data-iview:thumbnail="media/scr3-500px.jpg" data-iview:image="media/scr3-500px.jpg">
            <div class="iview-caption caption1" data-x="100" data-y="250" data-transition="expandDown">
                <h3>sunny toulips</h3>
            </div>
            <div class="iview-caption caption1" data-x="100" data-y="350" data-transition="expandDown">
                <h5 >Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem.</h5>
            </div>
        </div>
    </div>
</div>