<?php
include_once './core/init.php';

include_once './inc/f-header.php';
include_once './inc/f-cart.php';
include_once './inc/f-menu.php';
?>

<html>
<head>
<script src="js/jquery-1.7.1.min.js"></script>
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
                  <h3>¿Nuevo Usuario?</h3>
                  <div class="wrap-login">
                        <form method="post" action="registro.php">
                         <ul class="form-list">
                           <li class="control">
                             <input type="radio" class="radio" value="guest" id="login:guest" name="checkout_method">
                             <label for="login:guest">Continuar como invitado</label>
                           </li>
                           <li class="control">
                             <input type="radio" class="radio" value="register" id="login:register" name="checkout_method">
                             <label for="login:register">Registrar</label>
                           </li>
                         </ul>
                         <p>Al crear una cuenta en nuestra tienda, usted será capaz de realizar el proceso de compra más rápidamente, almacenar varias direcciones de envío, ver y rastrear sus pedidos en su cuenta y más.</p>
                         <div class="buttons-set">
                           <button onclick="" class="button" type="button" id="onepage-guest-register-button"><span><span>Continuar</span></span></button>
                         </div>
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
                          <button onClick="" class="button" type="button" id="onepage-guest-register-button"><span><span>Iniciar sesión</span></span></button>
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