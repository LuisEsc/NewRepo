<?php
include_once './core/init.php';

include_once './inc/f-header.php';
include_once './inc/f-cart.php';
include_once './inc/f-menu.php';
require_once './libs/Usuario.php';
?>
<html>
    <head>
        <script src="js/jquery-1.7.1.min.js"></script>
        <script src="js/jquery.validate.js"></script>
        <script type="text/javascript">

            $(document).ready(function () {
                

            });

            function eliminarCuenta() {
                var confirmar = window.confirm("¿Esta seguro de que desea eliminar su cuenta?\nNo se podrán recuperar el historial de pedidos ni los datos personales");
                if (confirmar == true) {

                }
            }
            function eliminarFormulario(){
                
                $("#register-form").submit();
            }

        </script>
    </head>
    <body>
        <section  id="columns" class="container_9 clearfix col1" >
            <ol id="checkoutSteps" class="opc">
                <li class="section allow active" id="opc-login">
                    <div class="step-title">
                        <h2>Actualizar datos</h2>
                        <a href="#">Edit</a> </div>
                    <div  class="step a-item" id="checkout-step-login">
                        <div class="col1-set">
                            <div class="col-2">
                                <h3>Insertar Datos Personales</h3>
                                <div class="wrap-login">
                                    <form method="post" id="register-form" action="posts/actualizardatos.php">                                       
                                        <ul class="form-list">

                                            <li>
                                                <div>
                                                    Nombre: <input     type="text" maxlength="20"  id="txt_nombre"    name="txt-nombre"    class="input-text required-entry" value="<?php echo $_SESSION['user']->nombre; ?>"/>
                                                    Apellidos:  <input type="text" maxlength="100" id="txt_apellidos" name="txt-apellidos" class="input-text required-entry" value="<?php echo $_SESSION['user']->apellidos; ?>"/>
                                                    D.N.I.: <input     type="text" maxlength="11"  id="txt_dni"       name="txt-dni"       class="input-text required-entry" value="<?php echo $_SESSION['user']->dni ?>"/>
                                                </div>
                                            </li>
                                            <br />
                                            <br />
                                            <li>
                                                <div>
                                                    Teléfono: <input  type="text" id="txt_telefono"  maxlength="13"  name="txt-telefono"  class="input-text required-entry col-sm-10" value="<?php echo $_SESSION['user']->telefono; ?>" />
                                                    Direccion: <input type="text" id="txt_direccion" maxlength="120" name="txt-direccion" class="input-text required-entry col-sm-10" value="<?php echo $_SESSION['user']->direccion; ?>"/>
                                                    Localidad: <input type="text" id="txt_localidad" maxlength="30"  name="txt-localidad" class="input-text required-entry col-sm-10" value="<?php echo $_SESSION['user']->localidad; ?>"/>          
                                                </div>
                                            </li>
                                            <br />
                                            <br />
                                            <li>
                                                <div>
                                                    Codigo Postal:<input type="text" maxlength="6"  id="txt_codpostal" name="txt-codpostal" class="input-text required-entry"           value="<?php echo $_SESSION['user']->codpostal; ?>"/>
                                                    Provincia:<input     type="text" maxlength="20" id="txt_provincia" name="txt-provincia" class="input-text required-entry col-sm-10" value="<?php echo $_SESSION['user']->provincia; ?>"/>
                                                    País:<input          type="text" maxlength="20" id="txt_pais"      name="txt-pais"      class="input-text required-entry"           value="<?php echo $_SESSION['user']->pais; ?>"/>
                                                </div>
                                            </li> 
                                            <br />
                                            <br />
                                            <li>
                                                <div>
                                                    Email: <input maxlength="100" readonly  type="label"     id="txt_email" name="txt-email"  class="input-text required-entry" value="<?php echo $_SESSION['user']->email; ?>"/>
                                                    Contraseña<input                        type="password"  id="txt_pass"  name="txt-pass"   class="input-text required-entry"/>
                                                    Repite Contraseña<input                 type="password"  id="txt_pass2" name="txt-pass2"  class="input-text required-entry"/>
                                                </div>
                                            </li>
                                            <br />
                                            <br />
                                            <li>
                                                <div>
                                                    <button onclick="enviarFormulario();" type="button" id="btn_continuar"      class="button"  name="btn-continuar"     ><pre><span>Guardar cambios</span></pre></button>
                                                    <button onclick="eliminarCuenta();"             type="button" id="btn_eliminarCuenta" class="button"  name="btn-eliminarCuenta"><pre><span>Eliminar cuenta</span></pre></button>
                                                </div>
                                            </li>
                                        </ul> 
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ol>
        </section>
        <?php
        include_once './inc/f-footer.php';
        ?>
</html>
