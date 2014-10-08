<html>
    <head>
    </head>
    <body>
<?php
include_once './core/init.php';

include_once './inc/f-header.php';
include_once './inc/f-cart.php';
include_once './inc/f-menu.php';
include_once './inc/f-footer.php';

    $login = $_REQUEST['login[email]'];
    $pass = md5($_REQUEST['login[password]']);
    
    $_SESSION['usuario'] = $login;
    $_SESSION['pass']= $pass;
    
    echo $login."...".$pass."...".pass2;

    ?>
</body>
</html>