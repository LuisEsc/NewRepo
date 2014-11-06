<?php
$link = ListPages::$list;
?>
<div class="sf-contener clearfix second-bg ">
    <nav class="nav-wrap container_9"><a class="logo " href="inicio.html" title="Floristería Albahaca"><img src="public/images/logo.png" alt="logo"></a>
        <ul class="sf-menu clearfix  ">
            <li class="item"><a href="<?php echo ListPages::$list['ramos'] ?>" class="parent">Ramoaaaaas</a> </li>
            <li class="item"><a href="<?php echo ListPages::$list['centros'] ?>" class="parent">Centros</a></li>
            <li class="item"><a href="<?php echo ListPages::$list['bodas']; ?>" class="parent">Bodas</a> </li>
            <li class="item"><a href="<?php echo ListPages::$list['plantas'] ?>" class="parent">Plantas</a> </li>
            <li class="item"><a href="<?php echo ListPages::$list['funerarios'] ?>" class="parent">Funerarios</a> </li>
            <li class="item"><a href="<?php echo ListPages::$list['carro'] ?>" class="parent">Carro de compra</a></li>
        </ul>
    </nav>
</div>