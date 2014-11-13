<?php
include_once './core/init.php';

include_once './inc/f-header.php';
include_once './inc/f-cart.php';
include_once './inc/f-menu.php';
require_once './info/mostrarDescripcion.php';
include_once './inc/poblacionesEnvio.php';

?>

<div class="width-carousel recommend-block">
    <div class="container_9">
        <h3  class="title-block">Zona de trabajo</h3>
        <div align="center">
        </div>
    </div>
</div>

<section id = "columns" class = "container_9 clearfix col1" >
    <ul id = "og-grid" class = "og-grid">
       
    </ul>
    <script type="text/javascript" src="js/grid.js"></script> 
    
       <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Localidad</th>
                        <th>Coste</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    foreach ($poblaciones as $poblacion):
                        ?>
                        <tr>
                            <td><?php echo($poblacion->pob) ?></td>
                            <td><?php echo($poblacion->coste); ?> &euro;</td>
                            
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    
</section>

<?php
include_once './inc/f-footer.php';