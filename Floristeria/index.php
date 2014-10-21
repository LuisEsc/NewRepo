<?php

include_once './core/init.php';

include_once './inc/f-header.php';

include_once './inc/f_session_usuario.php';

include_once './inc/f-cart.php';
include_once './inc/f-menu.php';
/*$index = new WebPage("Floristeria Albahaca");
$index->headerCreate();
$index->cartCreate();
$index->menuCreate();*/

foreach (FlowersModel::getFlowers() as $flower) {
    //print "<a href=\"product.php?id={$flower->id}&mode=0\">{$flower->name}</a>";
}
?>
<?php
//echo $_SESSION['email'];
include_once './inc/f-footer.php';
//$index->footerCreate();
