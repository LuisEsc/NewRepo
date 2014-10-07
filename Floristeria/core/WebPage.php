<?php

/**
 * Description of WebPage
 *
 * @author Esmonet
 */
class WebPage {

    private $html;
    private $title;
    private $content;
    // ficheros de hojas de estilo
    private $stylesheets = array(
        "styles.css",
        "custom-style.css",
        "component.css"
    );
    // ficheros javascript
    private $javascripts = array(
        "jquery-1.7.1.min.js",
        "modernizr.custom.js",
        "jquery.dlmenu.js",
        "scripts.js"
    );

    public function __construct($title) {
        $this->title = "<title>" . $title . "</title>";
    }

    public function show() {
        $this->html = "<html>";
        $this->html .= $this->headerCreate();
        $this->html .= $this->menuCreate();
        $this->html .= $this->content;
        $this->html .= $this->footerCreate();
        $this->html .= "</html>";
        echo (string) $this->html;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function headerCreate() {
        $header = '<html>';
        $header .= '<head>';
        $header .= $this->title;
        $header .= $this->getStyle();
        $header .= $this->getJavaScript();
        $header .= "</head>";
        $header .= "<body id=\"index\">";
        echo $header;
    }

    public function menuCreate() {
        $items = array(
            "Ramos" => "ramos.php",
            "Centros" => "centros.php",
            "Bodas" => "bodas.php",
            "Plantas" => "plantas.php",
            "Funerarios" => "funerarios.php",
            "Carrito" => "carro.php"
        );

        $menu = '<div class="sf-contener clearfix second-bg"><nav class="nav-wrap container_9">';
        $menu .= '<a class="logo " href="inicio.html" title="Floristería Albahaca"><img src="images/logo.png" alt="logo"></a>';
        $menu .= '<ul class="sf-menu clearfix">';
        foreach ($items as $key => $value) {
            $menu .= "<li class = \"item\"><a href=\"{$value} \"class=\"parent\">{$key}</a></li>";
        }
        $menu.='</ul></nav></div>';

        echo $menu;
    }

    public function cartCreate() {
        return require_once 'inc/headerCart.php';
    }

    public function footerCreate() {
        echo

        '<footer></footer>';
    }

    private function getStyle() {
        $styles = '';
        foreach ($this->stylesheets as $style) {
            $styles .= "<link href=\"css/{$style}\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />";
        }
        return

                $styles;
    }

    private function getJavaScript() {
        $scripts = '';
        foreach ($this->javascripts as $script) {
            $scripts .= "<script type=\"text/javascript\" src=\"js/{$script
                    }\"></script>";
        }
        return

                $scripts;
    }

    private function bolletinCreate() {
        
    }

}

