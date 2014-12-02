<?php
include_once './core/init.php';

include_once './inc/f-header.php';
include_once './inc/f-cart.php';
include_once './inc/f-menu.php';
require_once './info/mostrarDescripcion.php';

$con = Connection::getConnection();
$res = $con->query("SELECT textoCorto,textoLargo FROM quienessomos");
$resultado = mysqli_fetch_array($res);
$textoCorto = $resultado['textoCorto'];
$textoLargo = $resultado['textoLargo'];
$con->close();
?>


<script src="js/jquery-1.7.1.min.js"></script>

<div class = "width-carousel recommend-block">
    <div class = "container_9">
        <h3 class = "title-block"><?php echo "¿Quienes somos?" ?></h3>
    </div>
</div>
<script type="text/javascript" src="js/grid.js"></script> 
<table width="100%">
    <thead>
        <th width="5%"></th>
        <th width="40%"></th>
        <th width="3%"></th>
        <th width="35%"></th>
        <th width="5%"></th>
    </thead>
    <tbody>
        <tr>
            <div><td></td>
    <td>
        <div style="align-adjust:top ">
            <img src="images/floristeria2.jpg" style=" width:100%; height:100%;"  />
        </div></td><td></td><td valign="middle">
        <div style="alignment-adjust:top">
            <h1><?php echo $textoCorto; ?></h1>
            <br/><br/>
            <h2><?php echo $textoLargo; ?></h2></div></td><td></td>
</div>
</tr>
</tbody>
</table>





<?php
include_once './inc/f-footer.php';
