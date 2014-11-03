
<html lang="en">
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

        <!-- Esmonet login css -->
        <link rel="stylesheet" href="css/login.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <title>Inicio de sesión - servidores esmonet</title>
    </head>

    <body>

        <div class="container">

            <div class="box">
                <div class="b_logo">
                    <img class="logo" src="img/logo.png" width="240">
                </div>


                <form class="form-signin" role="form" action="loguear.php" method="post">
                    <h2 class="form-signin-heading">Inicia sesión</h2>
                    <input name="login_user" type="email" class="form-control" placeholder="Correo electrónico" required autofocus>
                    <input name="login_pass" type="password" class="form-control" placeholder="Contraseña" required>
                    <button class="btn btn-lg btn-primary btn-block btn-login" type="submit">Iniciar sesión</button>
                    <a class="help_login" href="#">¿No puedes acceder a tu cuenta?</a>
                </form>
            </div><!-- /box -->
        </div> <!-- /container -->

        <div class="footer">
            <ul id="footer-list">
                <li>
                    <a class="link_footer" href="#">Contacta con nosotros</a> </li>
                <li>
                    <a class="link_footer" href="#" target="_blank">Condiciones de uso</a>
                </li>
                <li>
                    <a class="link_footer" href="#" target="_blank">Privacidad y cookies</a>
                </li>
                <li>
                    <span>©2014 Esmonet Soluciones Informáticas</span>
                </li>
            </ul>
        </div>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>
