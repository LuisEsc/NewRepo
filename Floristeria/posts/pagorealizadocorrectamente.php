<?php
require_once '../core/App.php';
require_once '../core/Session.php';
require_once '../core/Connection.php';
require_once '../core/WebPage.php';
require_once '../libs/Flower.php';
require_once '../model/FlowersModel.php';
require_once '../phpmailer/class.phpmailer.php';
require_once '../phpmailer/class.smtp.php';
require_once '../model/OrderModel2.php';
session_start();

$order =  $_SESSION['order'];

OrderModel2::setPagado($order);


    $mail = new PHPMailer();

    $mail->IsSMTP();
    $mail->IsSendmail();

    $mail->Host = 'ssl://smtp.gmail.com';
    $mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail->Username = 'esmonetpruebas@gmail.com';
    $mail->Password = 'esmonet1234';

    $mail->From = "esmonetpruebas@gmail.com";
    $mail->FromName = "Floristeria Albahaca";
    $mail->Subject = "Resumen de su pedido";
    $mail->AddAddress($_SESSION['user']->email);

    ob_start();
    include '../plantillafacturacorreo.php';
    $msg = ob_get_clean();
    $mail->MsgHTML($msg);
    if (!$mail->Send()) {
        //echo "No se pudo enviar el Mensaje.  ".$mail->ErrorInfo;
    } else {
        //echo "Mensaje enviado";
    }


include_once '../inc/f-header.php';
include_once '../inc/f-cart.php';
include_once '../inc/f-menu.php';
?>
<style type="text/css">

    .ancho{            
        width: auto;
        overflow: hidden;
    }

</style>

<div class="slider-home-page">
    <link rel="stylesheet" href="css/iview.css" />
    <link rel="stylesheet" href="css/skin/style.css" />
    <script type="text/javascript" src="js/raphael-min.js"></script> 
    <script type="text/javascript" src="js/jquery.easing.js"></script> 
    <script src="js/iview.js"></script> 
    <div class="width-carousel recommend-block">
        <div class="container_9">
            <h3 class="title-block">GRACIAS POR COMPRAR EN FLORISTERÍA ALBAHACA</h3>
        </div>
    </div>
    <div class="width-carousel recommend-block">
        <div class="container_9">
            <h3 class="title-block">Le hemos enviado un correo electrónico con el resumen de su pedido</h3>
        </div>
    </div>
    
        <?php
//echo $_SESSION['email'];
                        include_once '../inc/f-footer.php';
//$index->footerCreate();
