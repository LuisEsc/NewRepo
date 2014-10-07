<?php

require_once './core/init.php';
$index = new WebPage("Floristeria Albahaca");
$index->headerCreate();
$index->cartCreate();
$index->menuCreate();

foreach (FlowesModel::getFlowers() as $flower) {
    print "<a href=\"product.php?id={$flower->id}&mode=0\">{$flower->title}</a>";
}
?>

<?php

$index->footerCreate();