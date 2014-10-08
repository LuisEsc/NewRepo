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
           
            $(document).ready(function (){
               console.log("entra"); 
               $("#login-email").focusout(function(){
                  comprobarEmailAjax();
               });
               $("#register-form").validate({
                    rules: {
                        login_email: { required: true, email: true, maxlength: 100},
                        login_password: { required: true, minlength: 6},
                        login_password2: { required:true, minlength: 6, equalTo: "#login-password"}
                    },
                    messages: {
                        login_email: "Introduzca una dirección de correo eletrónico.",
                        login_password: "La contraseña debe tener al menos 6 carácteres de longitud.",
                        login_password2 : "Las dos contraseñas deben coincidir.",
                    },
                    submitHandler: function(form) {

                        
                      comprobarEmailAjax();
                    }
                });
            });
            function comprobarEmailAjax(){
                $("#emailstatus").html("<span>Comprobando...</span>");
                $.ajax({
                    type: "GET",
                    url: "posts/emailcheck.php",
                    data: { email : $("#login-email").val() },
                    success: function(data){
                        // si el correo no está en la base de datos
                        if(data==0){
                           $("#emailstatus").html("");
                           $("#emailstatus").html("<span>Email Correcto</span>");
                        }
                        else{
                           $("#emailstatus").html("");
                           $("#emailstatus").html("<span>Email Inorrecto</span>");
                            
                        }
                    }
		});
            }
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
                                                        <input type="email" maxlength="100" value="" name="login_email" id="login-email" class="input-text required-entry validate-email">
                                                    </div>
                                                    <div id="emailstatus">
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