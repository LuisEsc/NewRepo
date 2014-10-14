<?php
include_once './core/init.php';

include_once './inc/f-header.php';
include_once './inc/f-cart.php';
include_once './inc/f-menu.php';
?>
<html>
    <head>
        <script src="js/jquery-1.7.1.min.js"></script>
        <script src="js/jquery.validate.js"></script>
        <script src="js/flregister.js"></script>
    </head>
    <body>
        <section  id="columns" class="container_9 clearfix col1" >
            <ol id="checkoutSteps" class="opc">
                <li class="section allow active" id="opc-login">
                    <div class="step-title"> <span class="number">PASO  1</span>
                        <h2>Método de pago</h2>
                        <a href="#">Edit</a> </div>
                    <div  class="step a-item" id="checkout-step-login">
                        <div class="col2-set">
                            <div class="col-1">
                                <h3>Registrarse como nuevo usuario</h3>
                                <div class="wrap-login">
                                    <form method="post" id="register-form" action="posts/creausuarioregistro.php">
                                        <fieldset>
                                            <ul class="form-list">
                                                <li>
                                                    <label class="required" for="login-email"><em>*</em>Correo electrónico</label>

                                                    <div class="input-box">
                                                        <input type="email" maxlength="100" name="login_email" value="" onblur="pierdefoco();"  id="login-email" class="input-text required-entry validate-email">
                                                    </div>
                                                    <div><img id="emailstatus" src=""/>
                                                    </div>

                                                </li>
                                                <li>
                                                    <label class="required" for="login-password"><em>*</em>Contraseña</label>
                                                    <div class="input-box">
                                                        <input type="password" maxlength="" name="login_password" id="login-password" class="input-text required-entry">
                                                    </div>
                                                </li>
                                                <li>
                                                    <label class="required" for="login-password2"><em>*</em>Confirmar contraseña</label>
                                                    <div class="input-box">
                                                        <input type="password" value="" name="login_password2" id="login-password2" class="input-text required-entry">
                                                    </div>
                                                </li>
                                            </ul>
                                            <input type="hidden" value="checkout" name="context">
                                            <div class="buttons-set">
                                                <button onClick="enviarFormulario();"  class="button" type="button"><span>Registrar</span></button>
                                            </div>
                                        </fieldset>
                                    </form>

                                </div>
                            </div>
                            <div class="col-2">
                                <h3>¿Usted ya es cliente?</h3>
                                <div class="wrap-login">
                                    <form method="post"  id="login-form" action="posts/loguear.php">
                                        <fieldset>
                                            <ul class="form-list">
                                                <li>
                                                    <label class="required" for="login-email"><em>*</em>Correo electrónico</label>
                                                    <div class="input-box">
                                                        <input type="text" value="" name="login--email" id="login---email" class="input-text required-entry validate-email">
                                                    </div>
                                                </li>
                                                <li>
                                                    <label class="required" for="login-password"><em>*</em>Contraseña</label>
                                                    <div class="input-box">
                                                        <input type="password" name="login--password" id="login---password" class="input-text required-entry">
                                                    </div>
                                                </li>

                                            </ul>
                                            <input type="hidden" value="checkout" name="context">
                                        </fieldset>
                                    <div class="buttons-set">
                                        <button type="button" onClick="submitt();" class="button"  ><span>Iniciar Sesión</span></button>
                                    </div>
                                      
                                    </form>  
                                </div>
                            </div>
                        </div>
                    </div>


                </li>
            </ol>
        </section>

        <script type="text/javascript">
            cargarValidador();
        </script>
    </body>

    <?php
    include_once './inc/f-footer.php';
    ?>
</html>