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
        <script type="text/javascript">
           
            $(document).ready(function(){ 
                rules: {
                    name: { required: true, minlength: 2},
                    lastname: { required: true, minlength: 2},
                    email: { required:true, email: true},
                    phone: { minlength: 2, maxlength: 15},
                    years: { required: true},
                    message: { required:true, minlength: 2}
                },
                messages: {
                    name: "Debe introducir su nombre.",
                    lastname: "Debe introducir su apellido.",
                    email : "Debe introducir un email válido.",
                    phone : "El número de teléfono introducido no es correcto.",
                    years : "Debe introducir solo números.",
                    message : "El campo Mensaje es obligatorio.",
                },
                 $("#register-form").validate({
                submitHandler: function(form) {
                  // some other code
                  // maybe disabling submit button
                  // then:
                  alert("esta validando");
                 // $(form).submit();
                }
            });
            });
           
        </script>

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
                                    <form method="post" id="register-form" class="login-form">
                                        <fieldset>
                                            <ul class="form-list">
                                                <li>
                                                    <label class="required" for="login-email"><em>*</em>Correo electrónico</label>
                                                    <div class="input-box">
                                                        <input type="email" maxlength="100" value="" name="login[email]" id="login-email" class="input-text required-entry validate-email">
                                                    </div>
                                                </li>
                                                <li>
                                                    <label class="required" for="login-password"><em>*</em>Contraseña</label>
                                                    <div class="input-box">
                                                        <input type="password" maxlength="" name="login[password]" id="login-password" class="input-text required-entry">
                                                    </div>
                                                </li>
                                                <li>
                                                    <label class="required" for="login-password2"><em>*</em>Confirmar contraseña</label>
                                                    <div class="input-box">
                                                        <input type="text" value="" name="login[password2]" id="login-password2" class="input-text required-entry">
                                                    </div>
                                                </li>
                                            </ul>
                                            <input type="hidden" value="checkout" name="context">
                                            <div class="buttons-set">
                                                <input type="submit" value="Registrar" class="button"/>
                                            </div>
                                        </fieldset>
                                    </form>

                                </div>
                            </div>
                            <div class="col-2">
                                <h3>¿Usted ya es cliente?</h3>
                                <div class="wrap-login">
                                    <form method="post" action="/customer/account/loginPost/" id="login-form">
                                        <fieldset>
                                            <ul class="form-list">
                                                <li>
                                                    <label class="required" for="login-email"><em>*</em>Correo electrónico</label>
                                                    <div class="input-box">
                                                        <input type="text" value="" name="login[username]" id="login-email" class="input-text required-entry validate-email">
                                                    </div>
                                                </li>
                                                <li>
                                                    <label class="required" for="login-password"><em>*</em>Contraseña</label>
                                                    <div class="input-box">
                                                        <input type="password" name="login[password]" id="login-password" class="input-text required-entry">
                                                    </div>
                                                </li>

                                            </ul>
                                            <input type="hidden" value="checkout" name="context">
                                        </fieldset>
                                    </form>
                                    <div class="buttons-set">
                                        <input type="submit" value="Iniciar sesión" class="button"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                  
        </li>
    </ol>
   </section>
</body>
               



<?php
include_once './inc/f-footer.php';
?>
</html>