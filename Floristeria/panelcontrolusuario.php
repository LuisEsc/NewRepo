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
        
            function continuar(){
                
                if($("#txt_pass").val()==$("#txt_pass2").val()){
                    alert("iguales");
                }
                
            }
            
            function cancelar(){
                
                
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
                                          
                                        <pre>
                                            <table  cellpadding="200">
                                                <tr>
                                                    
                                                    <td>Nombre:</td><td><input type="text" id="txt_nombre" name="txt-nombre" class="input-text required-entry"/></td>
                                                    <td>Apellidos:</td><td><input type="text" id="txt_apellidos" name="txt-apellidos"class="input-text required-entry"/></td>
                                                    <td>D.N.I.:</td><td><input type="text" id="txt_dni" name="txt-dni"class="input-text required-entry"/></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td>Teléfono:</td><td><input type="text" id="txt_telefono" name="txt-telefono"class="input-text required-entry col-sm-10"/></td>
                                                    <td>Direccion:</td><td><input type="text" id="txt_direccion" name="txt-direccion" class="input-text required-entry col-sm-10"/></td>
                                                    <td>Localidad:</td><td><input type="text" id="txt_localidad" name="txt-localidad"class="input-text required-entry col-sm-10"/></td>          
                                                </tr>
                                                <tr>
                                                    <td>Codigo Postal:</td><td><input type="text" id="txt_codpostal" name="txt-codpostal" class="input-text required-entry"/></td>
                                                    <td>Provincia:</td><td><input type="text" id="txt_provincia" name="txt-provincia" class="input-text required-entry col-sm-10"/></td>
                                                    <td>País:</td><td><input type="text" id="txt_pais" name="txt-pais"  class="input-text required-entry"/></td>

                                                </tr> 
                                                <tr>
                                                    <td>Email</td><td><input type="text" disable="true" id="txt_email" name="txt-email"  class="input-text required-entry"/></td>
                                                    <td>Contraseña</td><td><input type="text" id="txt_pass" name="txt-pass"  class="input-text required-entry"/></td>
                                                    <td>Repite Contraseña</td><td><input type="text" id="txt_pass2" name="txt-pass2"  class="input-text required-entry"/></td>
                                                </tr>
                                                
                                            </table> 
                                            <input type="button" onclick="continuar();" id="btn_continuar" name="btn-continuar" value="Continuar" />
                                            <input type="button" onclick="cancelar();" id="btn_cancelar" name="btn-cancelar" value="Cancelar">
                                        </pre> 
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