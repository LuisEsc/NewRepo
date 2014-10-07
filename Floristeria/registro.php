<?php
include_once './core/init.php';

include_once './inc/f-header.php';
include_once './inc/f-cart.php';
include_once './inc/f-menu.php';
?>
<html>
<head>
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
                            <li>
                              <label class="required" for="login-password2"><em>*</em>Confirmar contraseña</label>
                              <div class="input-box">
                                <input type="text" value="" name="login[password2]" id="login-password2" class="input-text required-entry">
                              </div>
                            </li>
                          </ul>
                          <input type="hidden" value="checkout" name="context">
                        </fieldset>
                    </form>
                    <div class="buttons-set">
                      <button onClick="" class="button" type="button" id="onepage-guest-register-button"><span><span>Registrar</span></span></button>
                    </div>
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
