<?php

require_once './core/init.php';
$index = new WebPage("Floristeria Albahaca");
$index->headerCreate();
$index->cartCreate();
$index->menuCreate();

foreach (FlowersModel::getFlowers() as $flower) {
    print "<a href=\"product.php?id={$flower->id}&mode=0\">{$flower->name}</a>";
}
?>
<?php
//echo $_SESSION['email'];

$index->footerCreate();
