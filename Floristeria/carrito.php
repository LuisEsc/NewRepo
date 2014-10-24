<?php
require_once './core/init.php';

include_once './inc/f-header.php';
include_once './inc/f-cart.php';
include_once './inc/f-menu.php';

$poblaciones = array(
    new PoblacionEnvio("HU", "Huesca", 0),
    new PoblacionEnvio("SI", "Sietamo", 12),
    new PoblacionEnvio("MO", "Monflorite", 5)
);

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
                            <td class="a-center last" colspan="50"><button class="button btn-continue" title="Continue Shopping" onclick="window.location.href='index.php'" type="button"><span><span><i class="icon-shopping-cart"></i>Continuar comprando</span></span></button>
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
                                <td><a class="product-image" href="/"><img width="180" height="180" src="data:<?php echo $S_flower['imagetype']; ?>;base64,<?php echo $S_flower['str_imgcodificada']; ?>"></a></td>
                                <td><h2 class="product-name"> <a href="sony-vaio-vgn-txn27n-b-11-1-notebook-pc.html"><?php echo($S_flower['name']); ?></a> </h2>
                                    <!-- properties
                                    <dl>
                                        <dt><strong>Color:</strong> Brown</dt>
                                        <dt><strong>Size:</strong>12</dt>
                                    </dl>
                                    -->
                                </td>
                                <td class="a-center"><span class="cart-price"> <span class="price"><?php echo round($S_flower['price'],2,PHP_ROUND_HALF_UP); ?>&nbsp;&euro;</span></span></td>
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
                                <td class="a-center"><span class="cart-price"><span class="price"><?php echo(Session::priceFormat(((double) $S_flower['cant']) * $S_flower['price'])); ?>&nbsp;&euro;</span></span></td>
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
                            <div class="shipping-form">
                                <ul class="form-list">
                                    <li>
                                        <div class="input-box">
                                            <div class="styled-select">
                                                <select title="Country" class="validate-select" id="country" name="country_id">
                                                    <option  value="">-- Selecciona una población --</option>
    <?php
    foreach ($poblaciones as $poblacionesEnvio) {
        echo "<option value=\"{$poblacionesEnvio->km}\" data\"{$poblacionesEnvio->id}\">{$poblacionesEnvio->pob}</option>";
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
            <div class="totals">
                <table id="shopping-cart-totals-table">
                    <colgroup>
                        <col>
                        <col width="1">
                    </colgroup>
                    <tbody>
                        <tr>
                            <th colspan="1" class="a-center">&nbsp;Subtotal&nbsp;</th>
                            <td class="a-center"><span class="price"><?php echo(Session::getTotalPrice()); ?>&nbsp;&euro;</span></td>
                        </tr>
                        <tr>
                            <th colspan="1" class="a-center">&nbsp;Gastos Envio&nbsp;</th>
                            <td class="a-center"><span id="g_envio" class="price"></span></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="1" class="a-center">&nbsp;Total&nbsp;</th>
                            <td class="a-center"><strong><span id="total" class="price"><?php echo(Session::getTotalPrice()); ?>&nbsp;&euro;</span></strong></td>
                        </tr>
                    </tfoot>

                </table>
                <ul class="checkout-types">
                    <li>
                        <button onclick="window.location = 'checkout.php';" class="button btn-proceed-checkout btn-checkout" title="Proceed to Checkout" type="button"><span><span>PROCEED TO CHECKOUT</span></span></button>
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
                var min = <?php echo(PoblacionEnvio::PRECIO_FIJO); ?>;
                var gastos = min + ($(this).val() * <?php echo(PoblacionEnvio::PRECIO_KM); ?>);
                var html_envio = (gastos > 0) ? (Math.round(gastos * 100) / 100).toFixed(2) + "&nbsp;&euro;" : "Gratuito";
                var html_total = gastos + <?php echo(Session::getTotalPrice()); ?>;
                $('#g_envio').html(html_envio);
                $('#total').html((Math.round(html_total * 100) / 100).toFixed(2) + "&nbsp;&euro;");
            });
        });
    </script>
    <?php
endif;
include_once './inc/f-footer.php';
