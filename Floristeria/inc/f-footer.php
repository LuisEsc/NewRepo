  
<!-- Footer -->
<footer id="footer" class="clearfix second-bg">
    <div class="footer-wrap container_9 ">
        <div class="footer-set">
            <div class="block">
                <h4>Realizamos envíos a:</h4>
                <div class="block_content">
                    <ul>
                        <li class="first_item"><a title="Floristería" href="/">Cuarte, Almudévar, Gurrea de Gállego, Zuera
                            </a></li>
                        <li class="item"><a title="Floristería" href="/">Tardienta, Grañén, Sariñena, Angüés
                            </a></li>
                        <li class="item"><a title="Floristería" href="/">Ayerbe, Bolea, Sabiñánigo
                            </a></li>
                        <li class="item"><a title="Ver Nuestra Zona de trabajo" href="/">Zona de trabajo</a></li>
                    </ul>
                </div>
            </div>
            <div class="block">
                <h4>Información</h4>
                <div class="block_content">
                    <ul>
                        <li class="item"><a title="Política de Privacidad y Cookies" href="politicaPrivacidad.php">Política de Privacidad y Cookies</li>
                        <li class="item"><a title="¿Quienes Somos?" href="/">¿Quienes Somos?</a></li>
                        <li><a title="Sitemap" href="index.php?controller=sitemap">Sitemap</a></li>
                    </ul>
                </div>
            </div>

            <?php if (isset($_SESSION['user'])) { ?>
                <div class="block">
                    <h4>Mi Cuenta</h4>
                    <div class="block_content">
                        <ul>
                            <li><a href="mispedidos.php">Mis Pedidos</a></li>
                            <li><a href="panelcontrolusuario.php">Mis Datos Personales</a></li>
                        </ul>
                    </div>
                </div>
            <?php } ?>
            <div class="block last">
                <h4>Contactar</h4>
                <div class="block_content">
                    <p><a href="mailto:info@floristeriaalbahaca.es">info@floristeriaalbahaca.es</a> <br/>
                        974 231 468<br />
                        C/Jose María Lacasa nº 17, 22001, Huesca</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<footer id="footer-absolute" class="clearfix">
    <div class="container_9">
        <div class="copy">
            <p>Diseñado por Esmonet © 2014</p>
        </div>
        <div class="social">
            <p><a href="#"> <em class="icon-facebook"><span>icon</span></em></a></p>
        </div>
    </div>
</footer>
<!-- div id="page" -->
</div> 
<script>CookieTool.API.ask();</script>
</body>
</html>

