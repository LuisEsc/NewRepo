<?php
require_once './core/init.php';

include_once './inc/f-header.php';
include_once './inc/f-cart.php';
include_once './inc/f-menu.php';
require_once './libs/PoblacionEnvio.php';
require_once './inc/poblacionesEnvio.php';
$_SESSION['cometario'] = "";
$cart = Session::getArraySession();
?>

<style type="text/css">
    .newcenter{
        text-align: center;
    }
    ul{
        width: 100
    }
    .input{
        margin: auto;
        display: table;

    }

</style>
<h3 class="page-title">Carrito</h3>
<?php if ($cart !== null): ?>


    <script type="text/javascript">
        var str = "";
        var gasto = 0.0;
        $(document).ready(function () {
            str = $("#country").find(":selected").attr("str");
            $("#country").change(function () {
                str = $("#country").find(":selected").attr("str");
            });


        });
        function datosCorrectos() {

            var direccion = <?php echo ((isset($_SESSION['user']->direccion) && !empty($_SESSION['user']->direccion)) ? "\"" . $_SESSION['user']->direccion . "\"" : "\"\""); ?>;
            var localidad = <?php echo ((isset($_SESSION['user']->localidad) && !empty($_SESSION['user']->localidad)) ? "\"" . $_SESSION['user']->localidad . "\"" : "\"\""); ?>;
            var codpostal = <?php echo ((isset($_SESSION['user']->codpostal) && !empty($_SESSION['user']->codpostal)) ? "\"" . $_SESSION['user']->codpostal . "\"" : "\"\""); ?>;
            var nombre = <?php echo ((isset($_SESSION['user']->nombre) && !empty($_SESSION['user']->nombre)) ? "\"" . $_SESSION['user']->nombre . "\"" : "\"\""); ?>;
            var apellido = <?php echo ((isset($_SESSION['user']->apellidos) && !empty($_SESSION['user']->apellidos)) ? "\"" . $_SESSION['user']->apellidos . "\"" : "\"\""); ?>;
            var provincia = <?php echo ((isset($_SESSION['user']->provincia) && !empty($_SESSION['user']->provincia)) ? "\"" . $_SESSION['user']->provincia . "\"" : "\"\""); ?>;
            var telefono = <?php echo ((isset($_SESSION['user']->telefono) && !empty($_SESSION['user']->telefono)) ? "\"" . $_SESSION['user']->telefono . "\"" : "\"\""); ?>;
            if (direccion == "" || localidad == "" || codpostal == "" || nombre == "" || apellido == "" || provincia == "" || telefono == "") {
                alert("Por favor, complete sus datos personales antes de completar el pedido.");
                return false;
            }
            else {
                if (str == "" || localidad != str) {
                    alert("La localidad de sus datos personales no coincide con la seleccionada en el pedido.");
                    return false;
                }
                else {

                    $.ajax({
                        data: {"gasto": gasto},
                        url: "posts/establecerCosteEnvioEnSesion.php",
                        type: "post",
                        success: function (data) {

                        }

                    });

                    return true;
                }
            }

        }
        function procesarPedido() {

            if (datosCorrectos()) {
                $.ajax({
                    data: {"comentario": $("#comentario").text()},
                    url: "posts/establecerComentario.php",
                    type: "post",
                    success: function (data) {

                    }

                });
                window.location.href = 'checkout.php';
            }
            else {
                alert("Verifica tus datos personales.\nSelecciona una poblacion de envio que coincida con tu poblacion para poder continuar.\nSi la poblacion en la que reside no está en la lista, no podrá realizar compras online en esta tienda.");
            }

        }


    </script>
    <div class="cart">
        <form method="post" action="./checkout.php">
            <fieldset>
                <table class="data-table cart-table" id="shopping-cart-table">
                    <colgroup>
                        <col width="1">
                        <col >
                        <col width="1">
                        <col width="1">
                        <col width="1">
                        <col width="1">
                        <col width="1">
                    </colgroup>
                    <thead>
                        <tr class="first last">
                            <th rowspan="1" class="product-image-unit">Imagen</th>
                            <th rowspan="1" class="product-name-unit">Producto </th>
                            <th colspan="1" class="a-center">Precio Unitario</th>
                            <th class="a-center" rowspan="1">Cantidad</th>
                            <th colspan="1" class="a-center">Subtotal</th>
                            <th class="a-center" rowspan="1">Acción</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr class="first last">
                            <td class="a-center last" colspan="50"><button class="button btn-continue" title="Continue Shopping" onclick="window.location.href = 'index.php'" type="button"><span><span><i class="icon-shopping-cart"></i>Continuar comprando</span></span></button>
                                <button class="button btn-update" onclick="window.location.reload();" type="button"><span><span><i class="icon-refresh"></i>Actualizar carrito</span></span></button></td>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        foreach ($cart as $S_flower):
                            $r_link = "flower_to_cart.php?mode=" . Session::_DELETE_ . "&";
                            $r_link.= "id={$S_flower['id']}&";
                            $r_link.= "v=" . md5($S_flower['id']);
                            ?>

                            <tr class="first last odd">
                                <td><a class="product-image" href="fichaflor.php?id=<?php echo $S_flower['id']; ?>"><img width="180" height="auto" src="data:<?php echo $S_flower['imagetype']; ?>;base64,<?php echo $S_flower['str_imgcodificada']; ?>"/></a></td>
                                <td><h2 class="product-name" > <a href="sony-vaio-vgn-txn27n-b-11-1-notebook-pc.html"><?php echo($S_flower['name']); ?></a> </h2>
                                    <!-- properties
                                    <dl>
                                        <dt><strong>Color:</strong> Brown</dt>
                                        <dt><strong>Size:</strong>12</dt>
                                    </dl>
                                    -->
                                </td>
                                <td class="a-center"><span class="cart-price"> <span class="price"  style="background-color: white; color: grey;"><?php echo round($S_flower['price'], 2); ?>&nbsp;&euro;</span></span></td>
                                <td class="a-center newcenter" >
                                    <div class="input-qty-box">
                                        <div class="input">
                                            <ul class="range">
                                                <li class="item minus"><a>-</a></li>
                                                <li>
                                                    <input maxlength="3" size="2" value="<?php echo($S_flower['cant']); ?>" class="input-text qty text" flower="<?php echo($S_flower['id']); ?>" id="quantity_wanted" name="qty" type="text">
                                                </li>
                                                <li class="item plus"><a>+</a></li>
                                            </ul>
                                        </div>
                                    </div></td>
                                <td class="a-center"><span class="cart-price"><span class="price"  style="background-color: white; color: grey;"><?php echo(Session::priceFormat(((double) $S_flower['cant']) * $S_flower['price'])); ?>&nbsp;&euro;</span></span></td>
                                <td class="a-center last"><a class="btn-remove btn-remove2" title="Remove item" href="<?php echo $r_link; ?>">x</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </fieldset>
        </form>
        <div class="cart-collaterals">
            <div class="col2-set">
                <div class="col-1">
                    <div class="shipping">
                        <form action="" method="post">
                            <h2>Población de envio</h2>
                            <div   class="shipping-form">
                                <ul class="form-list">
                                    <li>
                                        <div  class="input-box">
                                            <div class="styled-select">
                                                <select hidden title="Country" class="validate-select" id="country" name="country_id">
                                                    <option str="null" value="-1">-- Selecciona una población --</option>
                                                    <?php
                                                    foreach ($poblaciones as $poblacionesEnvio) {
                                                        if ($poblacionesEnvio->pob == $_SESSION['user']->localidad)
                                                            echo "<option selected str=\"{$poblacionesEnvio->pob}\" value=\"{$poblacionesEnvio->km}\" data\"{$poblacionesEnvio->id}\">{$poblacionesEnvio->pob}</option>";
                                                        else
                                                            echo "<option str=\"{$poblacionesEnvio->pob}\" value=\"{$poblacionesEnvio->km}\" data\"{$poblacionesEnvio->id}\">{$poblacionesEnvio->pob}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <input type="hidden" name="poblacion" value="">
                                        <input type="hidden" name="precios" value="">
                                        <input type="hidden" name="total" value="">
                                        <input type="hidden" name="gastos" value="">
                                    </li>
                                </ul>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
            <h2><b>Si lo desea, puede insertar un comentario en el pedido<br/>Por ejemplo, un mensaje en una tarjeta sorpresa:</b></h2>
            
            <textarea rows="3" cols="70" name="comentario" id="comentario"></textarea>

            <div class="totals">

                <table id="shopping-cart-totals-table">
                    <colgroup>
                        <col>
                        <col width="1">
                    </colgroup>
                    <tbody>
                        <tr>
                            <th colspan="1" class="a-center" >&nbsp;Subtotal&nbsp;</th>
                            <td class="a-center"><span class="price"  style="background-color: white; color: black;"><?php echo(Session::getTotalPrice()); ?>&nbsp;&euro;</span></td>
                        </tr>
                        <tr>
                            <th colspan="1" class="a-center">&nbsp;Gastos Envio&nbsp;</th>
                            <td class="a-center"><span id="g_envio" class="price"  style="background-color: white; color: black;"></span></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="1" class="a-center">&nbsp;Total&nbsp;</th>
                            <td class="a-center"><span id="total" class="price"  style="background-color: white; color: blue;"><?php echo(Session::getTotalPrice()); ?>&nbsp;&euro;</span></td>
                        </tr>
                    </tfoot>

                </table>
                <ul class="checkout-types">
                    <li>
                        <button onclick="procesarPedido();" class="button btn-proceed-checkout btn-checkout" title="Proceed to Checkout" type="button"><span><span>FINALIZAR PEDIDO</span></span></button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            "use strict";
            $(".input a").click(function () {

                var inputEl = $(this).parent().parent().children().next().children();
                var qty = inputEl.val();
                var id = inputEl.attr('flower');
                if ($(this).parent().hasClass("plus")) {
                    qty++;
                }
                else {
                    qty--;
                }
                if (qty < 1) {
                    qty = 1;
                }
                var link = 'flower_to_cart.php?';
                link += 'mode=0' + '&id=' + id + '&cant=' + qty;
                $(location).attr('href', link);
                //inputEl.val(qty);

            })

            $('#country').change(function () {
                /* var min = <?php echo(PoblacionEnvio::PRECIO_FIJO); ?>;
                 var gastos = min + ($(this).val() * <?php echo(PoblacionEnvio::PRECIO_KM); ?>);
                 var html_envio = (gastos > 0) ? (Math.round(gastos * 100) / 100).toFixed(2) + "&nbsp;&euro;" : "Gratuito";
                 var html_total = gastos + <?php echo(Session::getTotalPrice()); ?>;*/

                alert($("#country").val());
                var gastos = $("#country").val();
                var html_envio = (gastos > 0) ? (Math.round(gastos * 100) / 100).toFixed(2) + "&nbsp;&euro;" : "Gratuito";
                var html_total = gastos * 1.0 + <?php echo(Session::getTotalPrice() * 1.0); ?>;
                $('#g_envio').html(html_envio);
                $('#total').html((Math.round(html_total * 100) / 100).toFixed(2) + "&nbsp;&euro;");
                gasto = (Math.round(gastos * 100) / 100).toFixed(2);
            });
            str = $("#country").find(":selected").attr("str");
            if (str != null) {
                var gastos = $("#country").val();
                var html_envio = (gastos > 0) ? (Math.round(gastos * 100) / 100).toFixed(2) + "&nbsp;&euro;" : "seleccione<br/>poblacion";
                var html_total = gastos * 1.0 + <?php echo(Session::getTotalPrice() * 1.0); ?>;
                $('#g_envio').html(html_envio);
                $('#total').html((Math.round(html_total * 100) / 100).toFixed(2) + "&nbsp;&euro;");
            }
        }
        );
    </script>
    <?php
endif;
include_once './inc/f-footer.php';
