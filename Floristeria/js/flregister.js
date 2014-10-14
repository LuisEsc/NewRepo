
            var correoCorrecto = false;
            var formularioCorrecto = false;
            $(document).ready(init());
            function init() {}


            function cargarValidador() {
                $("#register-form").validate(
                        {
                            rules: {
                                login_email: {required: true, email: true, maxlength: 100},
                                login_password: {required: true, minlength: 6},
                                login_password2: {required: true, minlength: 6, equalTo: "#login-password"},
                            },
                            messages: {
                                login_email: "Introduzca una dirección de correo eletrónico.",
                                login_password: "La contraseña debe tener al menos 6 carácteres de longitud.",
                                login_password2: "Las dos contraseñas deben coincidir.",
                            }
                        });
            }

            function enviarFormulario() {
                if ($("#register-form").valid() == true && $("#login-email").val().match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$")) {
                    comprobarEmailAjax($("#login-email").val());
                    if (correoCorrecto == true) {
                        $("#register-form").submit();
                    }
                }

            }

            function pierdefoco() {
                if ($("#login-email").val().match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$")) {
                    comprobarEmailAjax($("#login-email").val());
                }
                else {
                    $("#emailstatus").prop("src", "resources/images/img_incorrecto.jpg");
                }
            }

            function comprobarEmailAjax(loginemail) {
                $("#emailstatus").prop("src", "resources/images/gifCargando.gif");
                $("#login-email").attr("disabled", true);
                $.ajax({
                    type: "GET",
                    url: "posts/emailcheck.php",
                    data: {email: loginemail},
                    success: function (data) {
                        // si el correo no está en la base de datos
                        //alert(data);
                        if (data == 0) {
                            $("#emailstatus").prop("src", "resources/images/img_correcto.jpg");
                            //formularioCorrecto=true;
                            correoCorrecto = true;
                        }
                        else {
                            $("#emailstatus").prop("src", "resources/images/img_incorrecto.jpg");
                            correoCorrecto = false;
                        }
                    }
                });
                $("#login-email").attr("disabled", false);
            }
            
            function submitt(){
                $("#login-form").submit();
            }




